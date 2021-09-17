<?php

namespace App\Helpers\Auth\Traits;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
	use RedirectsUsers;
	
	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showRegistrationForm()
	{
		return view('auth.register');
	}
	
	/**
	 * Handle a registration request for the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function register(Request $request)
	{
		$this->validator($request->all())->validate();
		
		event(new Registered($user = $this->create($request->all())));
		
		auth()->guard()->login($user);
		
		return $this->registered($request, $user)
			?: redirect($this->redirectPath());
	}
	
	/**
	 * The user has been registered.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param mixed $user
	 * @return mixed
	 */
	protected function registered(Request $request, $user)
	{
		//
	}
}
