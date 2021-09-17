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

namespace App\Http\Controllers\Web\Auth\Traits;

use App\Events\UserWasLogged;
use App\Http\Requests\LoginRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;

trait WebBasedLoginTrait
{
	/**
	 * @param \App\Http\Requests\LoginRequest $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function webBasedLogin(LoginRequest $request)
	{

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);
			
			return $this->sendLockoutResponse($request);
		}
		
		// Get the right login field
		$loginField = getLoginField($request->input('login'));

		// Get the User by Login field
		$user = User::where($loginField, $request->input('login'))->first();
		if (!empty($user)) {
			// Check the User's password
			if (Hash::check($request->input('password'), $user->password)) {
				
				// Login the User by ID
				auth()->loginUsingId($user->id);
				
				// Update last user logged Date
				Event::dispatch(new UserWasLogged($user));
				
				// Redirect admin users to the Admin panel
				if ($user->hasAllPermissions(Permission::getStaffPermissions())) {

					return redirect(admin_uri());
				}
				
				return redirect()->intended($this->redirectTo);
				
			}


		}
		
		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);
		
		// Check and retrieve previous URL to show the login error on it.
		if (session()->has('url.intended')) {
			$this->loginPath = session()->get('url.intended');
		}

		return redirect($this->loginPath)->withErrors(['error' => trans('auth.failed')])->withInput();
	}
}
