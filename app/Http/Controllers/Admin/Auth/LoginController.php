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

namespace App\Http\Controllers\Admin\Auth;

use Larapen\Admin\app\Http\Controllers\Controller;

class LoginController extends Controller
{
	protected $redirectTo;
	
	/**
	 * AuthController constructor.
	 */
	public function __construct()
	{  

		parent::__construct();
		
		$this->middleware('guest');

		$this->redirectTo = admin_uri();

	}
	
	// -------------------------------------------------------
	// Laravel overwrites for loading admin views
	// -------------------------------------------------------
	
	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
	 */
	public function showLoginForm()
	{
		// Remembering Login
		if (auth()->viaRemember()) {
			return redirect()->intended($this->redirectTo);
		}

		return view('admin::auth.login', ['title' => trans('admin.login')]);
	}
}
