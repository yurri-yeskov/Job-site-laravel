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

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Web\Auth\Traits\VerificationTrait;
use App\Http\Controllers\Web\FrontController;
use App\Http\Requests\UserRequest;
use App\Models\Gender;
use App\Helpers\Auth\Traits\RegistersUsers;
use App\Models\UserType;
use Torann\LaravelMetaTags\Facades\MetaTag;
use Illuminate\Http\Request;
use Validator;
use App\Mail\SignupMail;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use App\Helpers\Curl;
use App\Helpers\SendInBlueListIDs;
use App\Models\Country;
use App\Models\PhilippineCity;

class RegisterController extends FrontController
{
	use RegistersUsers, VerificationTrait;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/account';

	/**
	 * RegisterController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware(function ($request, $next) {
			$this->commonQueries();

			return $next($request);
		});
	}

	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		$this->redirectTo = 'account';
	}

	/**
	 * Show the form the create a new user account.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showRegistrationForm()
	{
		$data = [];

		// References
		$data['genders'] = Gender::query()->get();
		$data['userTypes'] = UserType::query()->get();

		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'register'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'register')));
		MetaTag::set('keywords', getMetaTag('keywords', 'register'));

		return appView('auth.register.index', $data);
	}

	/**
	 * Register a new user account.
	 *
	 * @param UserRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function register(UserRequest $request)
	{
		// Call API endpoint
		$endpoint = '/users';
		$data = makeApiRequest('post', $endpoint, $request->all(), [], true);

		// Parsing the API's response
		$message = !empty(data_get($data, 'message')) ? data_get($data, 'message') : 'Unknown Error.';

		// HTTP Error Found
		if (!data_get($data, 'isSuccessful')) {
			return back()->withErrors(['error' => $message])->withInput();
		}

		// Notification Message
		if (data_get($data, 'success')) {
			session()->put('message', $message);
		} else {
			flash($message)->error();
		}

		// Get User Resource
		$user = data_get($data, 'result');

		// Get the next URL
		$nextUrl = url('register/finish');

		if (
			data_get($data, 'extra.sendEmailVerification.emailVerificationSent')
			|| data_get($data, 'extra.sendPhoneVerification.phoneVerificationSent')
		) {
			session()->put('userNextUrl', $nextUrl);

			if (data_get($data, 'extra.sendEmailVerification.emailVerificationSent')) {
				session()->put('emailVerificationSent', true);

				// Show the Re-send link
				$this->showReSendVerificationEmailLink($user, 'users');
			}

			if (data_get($data, 'extra.sendPhoneVerification.phoneVerificationSent')) {
				session()->put('phoneVerificationSent', true);

				// Show the Re-send link
				$this->showReSendVerificationSmsLink($user, 'users');

				// Go to Phone Number verification
				$nextUrl = url('users/verify/phone/');
			}
		} else {
			if (
				!empty(data_get($data, 'extra.authToken'))
				&& !empty(data_get($user, 'id'))
			) {
				// Auto logged in the User
				if (auth()->loginUsingId(data_get($data, 'result.id'))) {
					session()->put('authToken', data_get($data, 'extra.authToken'));
					$nextUrl = url('account');
				}
			}
		}

		// Mail Notification Message
		if (data_get($data, 'extra.mail.message')) {
			$mailMessage = data_get($data, 'extra.mail.message');
			if (data_get($data, 'extra.mail.success')) {
				flash($mailMessage)->success();
			} else {
				flash($mailMessage)->error();
			}
		}

		return redirect($nextUrl);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
	public function finish()
	{
		if (!session()->has('message')) {
			return redirect('/');
		}

		// Meta Tags
		MetaTag::set('title', session()->get('message'));
		MetaTag::set('description', session()->get('message'));

		return appView('auth.register.finish');
	}


	//worker screen one signup
	public function registerWorkerFirst(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email',
			'password' => 'required',
		]);

		if ($validator->passes()) {
			DB::transaction(function () use ($request) {

				$code = $this->generateUniqueCode();
				$userModel = new User;
				$userModel->email = $request->email;
				$userModel->password = Hash::make($request->password);
				$userModel->verification_code = $code;
				$userModel->user_type_id = 2;
				$userModel->verified_email = 0;
				$userModel->save();

				$details = [
					'token' => $userModel->email_token,
					'code' => $code
				];

				\Mail::to($request->email)->send(new \App\Mail\SignupMail($details));
			});

			return response()->json(['success' => 'Done.']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}

	//worker and employee screen two signup
	public function registerWorkerSecondScreen(Request $request)
	{
		if($request->city == 0){
			$validator = Validator::make($request->all(), [
				'first_name' => 'required',
				'last_name' => 'required',
				'country' => 'required',
			]);
		}else{
			$validator = Validator::make($request->all(), [
				'first_name' => 'required',
				'last_name' => 'required',
				// 'country' => 'required',
				'city' => 'required',
			]);
		}

		if ($validator->passes()) {
			$email = $request->email;
			$userModel = User::where('email', $email)->first();
			if (empty($userModel)) {
				return response()->json(['error' => ['User not found!']]);
			}
			$userModel->first_name = $request->first_name;
			$userModel->last_name = $request->last_name;
			$userModel->country = !empty($request->country) ? $request->countryName : 'Philippines';
			$userModel->city = $request->city ==0 ? null : $request->city;
			$userModel->save();
			// fetching list ID from helper function and calling Curl function to create contact in sendinblue list
			$listId = SendInBlueListIDs::getListId($userModel->user_type_id);
			Curl::createWorkerContact($request->email, $listId, $request->first_name, $request->last_name);
			return response()->json(['success' => 'Done.']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}

	function updateUserProfile($firstName, $lastName, $email)
	{
		$userModel = User::where('email', $email)->first();
		$userModel->first_name = $firstName;
		$userModel->last_name = $lastName;
		$userModel->save();
		return true;
	}
	//worker and employee screen three signup
	public function registerWorkerThirdScreen(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'code' => 'required',
		]);
		if ($validator->passes()) {
			$email = $request->email;
			if ($request->firstName && !empty($request->firstName)) {
				$this->updateUserProfile($request->firstName, $request->lastName, $email);
			}

			$userModel = User::where('email', $email)->first();
			if (empty($userModel)) {
				return response()->json(['error' => ['User not found!']]);
			}

			if ($userModel->verification_code != $request->code) {
				return response()->json(['error' => ['Code not matched!']]);
			}

			$userModel->verification_code = null;
			$userModel->verified_email = 1;
			$userModel->email_verified_at = Carbon::now();
			$userModel->updated_at = Carbon::now();
			$userModel->save();

			Auth::loginUsingId($userModel->id);
			return response()->json(['success' => 'User Registered successfully.', 'user_id' => $userModel->id]);
		}
		return response()->json(['error' => $validator->errors()->all()]);
	}

	//worker and employeer screen one signup header menu link
	public function registerFirst(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email',
			'password' => 'required',
			'user_type' => 'required',
		]);

		if ($validator->passes()) {
			// dd($request->all());

			DB::transaction(function () use ($request) {
				$code = $this->generateUniqueCode();
				$userModel = new User;
				$userModel->email = $request->email;
				$userModel->password = Hash::make($request->password);
				$userModel->verification_code = $code;
				$userModel->user_type_id = $request->user_type;
				$userModel->verified_email = 0;
				$userModel->save();

				$details = [
					'token' => $userModel->email_token,
					'code' => $code
				];
				\Mail::to($request->email)->send(new \App\Mail\SignupMail($details));
			});

			return response()->json(['success' => 'Done.']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}


	public function verifyEmail($emailToken)
	{
		$userModel = User::where('email_token', $emailToken)->first();
		if (!empty($userModel)) {
			if ($userModel->verified_email == 1) {
				flash('Email already verified.')->success();
			} else {
				$userModel->email_token = null;
				$userModel->verified_email = 1;
				$userModel->email_verified_at = Carbon::now();
				$userModel->updated_at = Carbon::now();
				$userModel->save();
				flash('Email verified successfully.')->success();

				\Mail::to($userModel->email)->send(new \App\Mail\VerificationMail());
			}
		} else {
			flash('Error while verifying email.')->error();
		}

		return redirect('/');
	}

	public function resednEmailVerification(Request $request)
	{
		$email = $request->email;
		$userModel = User::where('email', $email)->first();
		if (empty($userModel)) {
			return response()->json(['error' => ['User not found!']]);
		}

		$code = $this->generateUniqueCode();
		$userModel->verification_code = $code;
		$userModel->updated_at = Carbon::now();
		$userModel->save();

		$details = [
			'token' => $userModel->email_token,
			'code' => $code
		];

		\Mail::to($request->email)->send(new \App\Mail\SignupMail($details));

		return response()->json(['success' => 'Verification code sent successfully, please check your mail.']);
	}

	//worker screen one signup
	public function registerEmployerFirst(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email',
			'password' => 'required',
		]);

		if ($validator->passes()) {
			DB::transaction(function () use ($request) {
				$code = $this->generateUniqueCode();
				$userModel = new User;
				$userModel->email = $request->email;
				$userModel->password = Hash::make($request->password);
				$userModel->verification_code = $code;
				$userModel->user_type_id = 1;
				$userModel->verified_email = 0;
				$userModel->save();

				$details = [
					'token' => $userModel->email_token,
					'code' => $code
				];

				\Mail::to($request->email)->send(new \App\Mail\SignupMail($details));
			});

			return response()->json(['success' => 'Done.']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}

	//employer screen two signup
	public function registerEmployerSecond(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'last_name' => 'required',
			'country' => 'required',
			// 'city' => 'required',
		]);

		if ($validator->passes()) {
			$email = $request->email;
			$userModel = User::where('email', $email)->first();
			if (empty($userModel)) {
				return response()->json(['error' => ['User not found!']]);
			}
			$userModel->first_name = $request->first_name;
			$userModel->last_name = $request->last_name;
			$userModel->country = $request->countryName;
			$userModel->save();
			// fetching list ID from helper function and calling Curl function to create contact in sendinblue list
			$listId = SendInBlueListIDs::getListId($userModel->user_type_id);
			Curl::createWorkerContact($request->email, $listId, $request->first_name, $request->last_name);
			return response()->json(['success' => 'Done.']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}

	// get countries
	public function getCountries(Request $request){
		$countryName = strtolower($request->countryName);

		$countryModel = DB::table('countries')
				->where(DB::raw("lower(json_unquote(json_extract(name, '$.en')))"),'LIKE', '%'.$countryName.'%')
                ->get();
		return response()->json(['success' => $countryModel]);
	}

	// get cities
	public function getCities(Request $request){
		$cityName = strtolower($request->cityName);

		$cityModel = DB::table('philippine_cities')
					->where(DB::raw("lower(city)"), 'LIKE', '%'.$cityName.'%')->get();

		// dd($cityModel);
		return response()->json(['success' => $cityModel]);
	}
	/**
	 * Write code on Method
	 *
	 * @return response()
	 */
	public function generateUniqueCode()
	{
		do {
			$code = random_int(100000, 999999);
		} while (User::where("verification_code", "=", $code)->first());

		return $code;
	}
}
