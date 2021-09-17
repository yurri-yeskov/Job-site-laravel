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

use App\Helpers\Ip;
use App\Helpers\UrlGen;
use App\Http\Controllers\Web\FrontController;
use App\Models\Blacklist;
use App\Models\Permission;
use App\Models\Post;
use App\Models\User;
use App\Models\Scopes\ReviewedScope;
use App\Models\Scopes\VerifiedScope;
use App\Notifications\UserActivated;
use App\Notifications\UserNotification;
use App\Helpers\Auth\Traits\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Session;
use App\Mail\VerificationMail;
use Cookie;

class SocialController extends FrontController
{
	use AuthenticatesUsers;
	
	protected $googleApiKey = 'AIzaSyCdW3iUBxPy6Pb_9utmHAv4RURMZdkXuP0';
	// If not logged in redirect to
	protected $loginPath = 'login';
	
	// After you've logged in redirect to
	protected $redirectTo = 'account';
	
	// Supported Providers
	private $network = ['facebook', 'linkedin', 'twitter', 'google', 'yahoo'];
	
	/**
	 * SocialController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		// Set default URLs
		$isFromLoginPage = Str::contains(url()->previous(), '/' . UrlGen::loginPath());
		$this->loginPath = $isFromLoginPage ? UrlGen::loginPath() : url()->previous();
		$this->redirectTo = $isFromLoginPage ? 'account' : url()->previous();
	}
	
	/**
	 * Redirect the user to the Provider authentication page.
	 *
	 * @return mixed
	 */
	public function redirectToProvider(Request $request)
	{
		
		// Get the Provider and verify that if it's supported
		$provider = request()->segment(2);
		if (!in_array($provider, $this->network)) {
			abort(404);
		}
		// If previous page is not the Login page...
		if (!Str::contains(url()->previous(), UrlGen::loginPath())) {
			// Save the previous URL to retrieve it after success or failed login.
			session()->put('url.intended', url()->previous());
		}

		if(!empty($_SERVER['QUERY_STRING'])){
			if(!$request->has('user_type') && empty($request->user_type)){
				//user_type is not selected
				flash('User type is not selected.')->error();
				return redirect('/');
			}

			$requestParams = ['type' => 'signup', 'user_type' => $request->user_type];
			
			if($provider == 'twitter' || $provider == 'yahoo'){

				$cookie = cookie('signup_query', base64_encode(json_encode($requestParams)), 60);
				return Socialite::driver($provider)->redirect()->cookie($cookie);
			}

			return Socialite::driver($provider)->stateless()->with(['state' => base64_encode(json_encode($requestParams))])->redirect();
		}
		
		$cookie = cookie('signup_query', '', -60);
		// Redirect to the Provider's website
		return Socialite::driver($provider)->redirect()->cookie($cookie);
	}
	
	/**
	 * Obtain the user information from Provider.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function handleProviderCallback(Request $request)
	{
		// Get the Provider and verify that if it's supported
		$provider = request()->segment(2);
		if (!in_array($provider, $this->network)) {
			abort(404);
		}
		
		// Check and retrieve previous URL to show the login error on it.
		if (session()->has('url.intended')) {
			$this->loginPath = session()->get('url.intended');
		}
		
		// Get the Country Code
		$countryCode = config('country.code', config('ipCountry.code'));
		
		// API CALL - GET USER FROM PROVIDER
		try {
			if($provider == 'twitter' || $provider == 'yahoo'){
				$userData = Socialite::driver($provider)->user();
			}else{
				$userData = Socialite::driver($provider)->stateless()->user();
			}
			// dd($userData);

			// Data not found
			if (!$userData) {
				$message = t("unknown_error_please_try_again");
				flash($message)->error();
				
				return redirect($this->loginPath);
			}
			
			// Email not found
			if (!$userData || !filter_var($userData->getEmail(), FILTER_VALIDATE_EMAIL)) {
				$message = t('email_not_found_at_provider', ['provider' => mb_ucfirst($provider)]);
				flash($message)->error();
				
				return redirect($this->loginPath);
			}
		} catch (\Exception $e) {
			$message = $e->getMessage();
			if (is_string($message) && !empty($message)) {
				flash($message)->error();
			} else {
				$message = "Unknown error. The social network API doesn't work.";
				flash($message)->error();
			}
			
			return redirect($this->loginPath);
		}
		
		// Debug
		// dd($userData);


		// DATA MAPPING
		try {
			$mapUser = [];
			$userType = 2;
			$loginType = 'login';

			if($request->has('state') && !empty($request->state)){
				$paramsData = json_decode(base64_decode($request->state), true);
				if(!empty($paramsData)){
					$userType = $paramsData['user_type'];
					$loginType = $paramsData['type'];
				}
			}

			if($provider == 'twitter' || $provider == 'yahoo'){
				$paramsData = json_decode(base64_decode($request->cookie('signup_query'), true));
				if(!empty($paramsData)){
					$userType = $paramsData->user_type;
					$loginType = $paramsData->type;
				}
			}
			
			
			// Get User Name (First Name & Last Name)
			$mapUser['name'] = (isset($userData->name) && is_string($userData->name)) ? $userData->name : '';
			if ($mapUser['name'] == '') {
				// facebook
				if (isset($userData->user['first_name']) && isset($userData->user['last_name'])) {
					$mapUser['name'] = $userData->user['first_name'] . ' ' . $userData->user['last_name'];
					$mapUser['first_name'] = $userData->user['first_name'];
					$mapUser['last_name'] = $userData->user['last_name'];
				}
			}else{
				$nameArr = $this->split_name($userData->name);
				$mapUser['first_name'] = $nameArr[0];
				$mapUser['last_name'] = $nameArr[1];
			}

			if ($mapUser['name'] == '') {
				// linkedin
				$mapUser['name'] = (isset($userData->user['formattedName'])) ? $userData->user['formattedName'] : '';
				if ($mapUser['name'] == '') {
					if (isset($userData->user['firstName']) && isset($userData->user['lastName'])) {
						$mapUser['name'] = $userData->user['firstName'] . ' ' . $userData->user['lastName'];
						$mapUser['first_name'] = $userData->user['first_name'];
						$mapUser['last_name'] = $userData->user['last_name'];
					}
				}else{
					$nameArr = $this->split_name($userData->name);
					$mapUser['first_name'] = $nameArr[0];
					$mapUser['last_name'] = $nameArr[1];
				}
			}
			
			// Check if the user's email address has been banned
			$bannedUser = Blacklist::ofType('email')->where('entry', $userData->getEmail())->first();
			if (!empty($bannedUser)) {
				$message = t('This user has been banned');
				flash()->error($message);
				
				return redirect()->guest(UrlGen::loginPath());
			}
			
			// GET LOCAL USER
			$user = User::withoutGlobalScopes([VerifiedScope::class])->where('provider', $provider)->where('provider_id', $userData->getId())->first();
			
			// CREATE LOCAL USER IF DON'T EXISTS
			if (empty($user)) {
				// Before... Check if user has not signup with an email
				$user = User::withoutGlobalScopes([VerifiedScope::class])->where('email', $userData->getEmail())->first();
				// redirect if user without signup tries to login
				if (empty($user) && $loginType == 'login') {
					$message = "You don't have an account.";
					flash($message)->error();
					
					return redirect($this->loginPath);
				}

				if (empty($user)) {
					$userInfo = [
						'country_code'   => $countryCode,
						'language_code'  => config('app.locale'),
						'name'           => $mapUser['name'],
						'user_type_id'   => $userType,
						'first_name'     => $mapUser['first_name'],
						'last_name'      => $mapUser['last_name'],
						'email'          => $userData->getEmail(),
						'ip_addr'        => Ip::get(),
						'verified_email' => 1,
						'verified_phone' => 1,
						'provider'       => $provider,
						'provider_id'    => $userData->getId(),
						'created_at'     => date('Y-m-d H:i:s'),
					];
					$user = new User($userInfo);
					$user->save();
					
					// Update Ads created by this email
					if (isset($user->id) && $user->id > 0) {
						Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->where('email', $userInfo['email'])->update(['user_id' => $user->id]);
					}
					
					// Send Admin Notification Email
					if (config('settings.mail.admin_notification') == 1) {
						try {
							// Get all admin users
							$admins = User::permission(Permission::getStaffPermissions())->get();
							if ($admins->count() > 0) {
								Notification::send($admins, new UserNotification($user));
								/*
								foreach ($admins as $admin) {
									Notification::route('mail', $admin->email)->notify(new UserNotification($user));
								}
								*/
							}
						} catch (\Exception $e) {
							flash($e->getMessage())->error();
						}
					}
					
					/*
					// Send Confirmation Email or SMS
					if (config('settings.mail.confirmation') == 1) {
						try {
							$user->notify(new UserActivated($user));
						} catch (\Exception $e) {
							flash($e->getMessage())->error();
						}
					}
					*/

					\Mail::to($user->email)->send(new \App\Mail\VerificationMail());
					
				} else {
					// Update 'created_at' if empty (for time ago module)
					if (empty($user->created_at)) {
						$user->created_at = date('Y-m-d H:i:s');
					}
					$user->verified_email = 1;
					$user->verified_phone = 1;
					$user->save();
				}
			} else {
				// Update 'created_at' if empty (for time ago module)
				if (empty($user->created_at)) {
					$user->created_at = date('Y-m-d H:i:s');
				}
				$user->verified_email = 1;
				$user->verified_phone = 1;
				$user->save();
			}
			

			//redirect to second screen if process is signup
			if($loginType == 'signup'){
				Session::flash('social_popup', 'show second screen!');
				Session::flash('first_name', $user->first_name);
				Session::flash('last_name', $user->last_name);
				Session::flash('email', $user->email);
				Session::flash('user_type', $user->user_type_id);
				return redirect($this->loginPath);
			}else{
				// GET A SESSION FOR USER
				if (Auth::loginUsingId($user->id)) {
					return redirect()->intended($this->redirectTo);
				} else {
					$message = t("Error on user's login.");
					flash($message)->error();
					
					return redirect($this->loginPath);
				}
			}


		} catch (\Exception $e) {
			$message = $e->getMessage();
			if (is_string($message) and !empty($message)) {
				flash($message)->error();
			} else {
				$message = "Unknown error. The service does not work.";
				flash($message)->error();
			}
			
			return redirect($this->loginPath);
		}
	}

	public function socialSignupScreen(Request $request){
		$email = $request->email;
        $userModel = User::where('email', $email)->first();
        if(empty($userModel)){
        	flash('Email not found.')->error();
        	return redirect($this->loginPath);
        }

		if($userModel->user_type_id == 1){
			$userModel->country = $request->country;
		}else{
			$userModel->country = 'Philippines';
			$userModel->city = $request->city_id;
		}
        $userModel->save();

        // GET A SESSION FOR USER
		if (Auth::loginUsingId($userModel->id)) {
			$userModel = User::where('id', $userModel->id)->first();
			if($userModel->signup_status != 1){
				$name = $userModel->first_name.' '.$userModel->last_name;
				Session::flash('success_msg', "<p>Congratulation ! $name <br> Your email has been confirmed <br> You have received reward points</p>");
				return redirect('find/friends');
			}else{
				return redirect()->intended($this->redirectTo);
			}
		} else {
			$message = t("Error on user's login.");
			flash($message)->error();
			
			return redirect($this->loginPath);
		}
	}


	public function split_name($name) {
	    $name = trim($name);
	    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
	    $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
	    if($first_name ==''){
	    	$first_name = $last_name;
	    }
	    return array($first_name, $last_name);
	}

}
