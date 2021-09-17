<?php
/**
 * JobClass - Job Board Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Web\Auth\Traits\VerificationTrait;
use App\Http\Requests\UserRequest;
use App\Models\Scopes\VerifiedScope;
use App\Models\UserType;
use App\Models\Post;
use App\Models\SavedPost;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;

class EditController extends AccountBaseController
{
	use VerificationTrait;

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$data = [];

		$data['genders'] = Gender::query()->get();
		$data['userTypes'] = UserType::all();

		// Mini Stats
		$data['countPostsVisits'] = DB::table((new Post())->getTable())
			->select('user_id', DB::raw('SUM(visits) as total_visits'))
			->where('country_code', config('country.code'))
			->where('user_id', auth()->user()->id)
			->groupBy('user_id')
			->first();
		$data['countPosts'] = Post::currentCountry()
			->where('user_id', auth()->user()->id)
			->count();
		$data['countFavoritePosts'] = SavedPost::whereHas('post', function ($query) {
			$query->currentCountry();
		})->where('user_id', auth()->user()->id)
			->count();

		// Meta Tags
		MetaTag::set('title', t('my_account'));
		MetaTag::set('description', t('my_account_on', ['appName' => config('settings.app.app_name')]));

		return appView('account.edit', $data);
	}

	public function dashboard()
	{
		return appView('account.dashboard');
	}

	/**
	 * @param UserRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function updateDetails(UserRequest $request)
	{
		$validator = Validator::make($request->all(), [
            'name' => 'required',
			'username' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
		// Check if these fields has changed
		$emailChanged = $request->filled('email') && $request->input('email') != auth()->user()->email;
		$phoneChanged = $request->filled('phone') && $request->input('phone') != auth()->user()->phone;
		$usernameChanged = $request->filled('username') && $request->input('username') != auth()->user()->username;

		// Conditions to Verify User's Email or Phone
		$emailVerificationRequired = config('settings.mail.email_verification') == 1 && $emailChanged;
		$phoneVerificationRequired = config('settings.sms.phone_verification') == 1 && $phoneChanged;

		// Get User
		$user = User::withoutGlobalScopes([VerifiedScope::class])->find(auth()->user()->id);

		// Update User
		$input = $request->only($user->getFillable());
		foreach ($input as $key => $value) {
			if (in_array($key, ['email', 'phone', 'username']) && empty($value)) {
				continue;
			}
			$user->{$key} = $value;
		}

		$user->phone_hidden = $request->input('phone_hidden');

		// Email verification key generation
		if ($emailVerificationRequired) {
			$user->email_token = md5(microtime() . mt_rand());
			$user->verified_email = 0;
		}

		// Phone verification key generation
		if ($phoneVerificationRequired) {
			$user->phone_token = mt_rand(100000, 999999);
			$user->verified_phone = 0;
		}

		// Don't logout the User (See User model)
		if ($emailVerificationRequired || $phoneVerificationRequired) {
			session()->put('emailOrPhoneChanged', true);
		}

		// Save
		$user->save();

		// Message Notification & Redirection
		flash(t('account_details_has_updated_successfully'))->success();
		$nextUrl = 'account';

		// Send Email Verification message
		if ($emailVerificationRequired) {
			$this->sendEmailVerification($user);
			$this->showReSendVerificationEmailLink($user, 'user');
		}

		// Send Phone Verification message
		if ($phoneVerificationRequired) {
			// Save the Next URL before verification
			session()->put('itemNextUrl', $nextUrl);

			$this->sendPhoneVerification($user);
			$this->showReSendVerificationSmsLink($user, 'user');

			// Go to Phone Number verification
			$nextUrl = 'users/verify/phone/';
		}

		// Redirection
		return redirect($nextUrl);
	}

	/**
	 * @param UserRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function updateSettings(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'old_password' => 'required',
			'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
		// Get User
		$user = User::find(auth()->user()->id);

		if (Hash::check($request->old_password, $user->password)) {
			// Update
			$user->disable_comments = (int)$request->input('disable_comments');
			if ($request->filled('password')) {
				$user->password = Hash::make($request->input('password'));
			}
			if ($request->filled('accept_terms')) {
				$user->accept_terms = (int)$request->input('accept_terms');
			}
			$user->accept_marketing_offers = (int)$request->input('accept_marketing_offers');
			$user->time_zone = $request->input('time_zone');
			$user->save();

			flash(t('account_settings_has_updated_successfully'))->success();
			return redirect('account');

		 } else {
			return back()->withErrors(['error' => 'Old password and new password does not match..!'])->withInput();
		 }
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function updatePreferences()
	{
		$data = [];

		return appView('account.edit', $data);
	}

	/**
	 * Send a reset link to the given user.
	 *
	 * @param ForgotPasswordRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function sendResetLinkOld(ResetPasswordRequest $request)
	{
		// Call API endpoint
		$endpoint = '/auth/password/reset';
		$data = makeApiRequest('post', $endpoint, $request->all());

		// Parsing the API's response
		$message = !empty(data_get($data, 'message')) ? data_get($data, 'message') : 'Unknown Error.';

		if (data_get($data, 'isSuccessful') && data_get($data, 'success')) {
			if (
				!empty(data_get($data, 'extra.authToken'))
				&& !empty(data_get($data, 'result.id'))
			) {
				auth()->loginUsingId(data_get($data, 'result.id'));
				session()->put('authToken', data_get($data, 'extra.authToken'));
			}

			return redirect($this->redirectPath())->with('status', $message);
		}

		return redirect()->back()
			->withInput($request->only('email'))
			->withErrors(['email' => $message]);
	}

	public function sendResetLink(Request $request)
    {
		$email = $request->email;
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['flag' => 0, 'msg' => 'Given email address is not registered..!'], 200);
        }

        try {
            $subject = "Forgot Password.";
            $username = $user->name;
            $token = app('auth.password.broker')->createToken($user);
            Mail::send('email.forgot_password', ['username' => $username, 'url' => url('password/reset', $token)],function($mail) use ($email, $username, $subject){
                    $mail->to($email, $username);
                    $mail->subject($subject);
                });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['flag' => 0, 'msg' => $error_message], 200);
        }
        return response()->json([
            'flag' => 1, 'msg'=> 'Mail sent successfully..!'
        ],200);
    }
}