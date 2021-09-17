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

namespace App\Http\Controllers\Api\Base;

use App\Helpers\Date;

trait SettingsTrait
{
	public $cacheExpiration = 3600; // In seconds (e.g. 60 * 60 for 1h)
	public $cookieExpiration = 3600; // In seconds (e.g. 60 * 60 for 1h)
	
	/**
	 * Set all the front-end settings
	 */
	public function applyFrontSettings()
	{
		// Cache Expiration Time
		$this->cacheExpiration = (int)config('settings.optimization.cache_expiration');
		
		// Cookie Expiration Time
		$this->cookieExpiration = (int)config('settings.other.cookie_expiration');
		
		// Set Date Locale
		Date::setAppLocale(config('lang.locale', 'en_US'));
		
		// CSRF Control
		// CSRF - Some JavaScript frameworks, like Angular, do this automatically for you.
		// It is unlikely that you will need to use this value manually.
		setcookie('X-XSRF-TOKEN', csrf_token(), $this->cookieExpiration, '/', getCookieDomain());
	}
}
