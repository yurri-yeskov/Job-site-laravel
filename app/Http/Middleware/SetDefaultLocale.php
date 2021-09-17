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

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SetDefaultLocale
{
	protected static $cacheExpiration = 3600;
	
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Exception for Install & Upgrade Routes
		if (
			Str::contains(Route::currentRouteAction(), 'InstallController')
			|| Str::contains(Route::currentRouteAction(), 'UpgradeController')
		) {
			return $next($request);
		}
		
		if (isFromAdminPanel()) {
			$this->setTranslationOfCurrentCountry();
			
			return $next($request);
		}
		
		// If the 'Website Country Language' detection option is activated
		// And if a Country has been selected (through the 'd' parameter)
		// Then, remove saved Language Code session (without apply it to the system)
		if (config('settings.app.auto_detect_language') == '2') {
			if (request()->has('d') && request()->get('d') == config('country.code')) {
				if (session()->has('langCode')) {
					session()->forget('langCode');
				}
				
				$this->setTranslationOfCurrentCountry();
				
				return $next($request);
			}
		}
		
		// Apply Session Language Code to the system
		if (session()->has('langCode')) {
			$langCode = session()->get('langCode');
			
			$lang = Cache::remember('language.' . $langCode, self::$cacheExpiration, function () use ($langCode) {
				$lang = Language::where('abbr', $langCode)->first();
				
				return $lang;
			});
			
			if (!empty($lang)) {
				// Config: Language (Updated)
				config()->set('lang.abbr', $lang->abbr);
				config()->set('lang.locale', $lang->locale);
				config()->set('lang.direction', $lang->direction);
				config()->set('lang.russian_pluralization', $lang->russian_pluralization);
				config()->set('lang.date_format', $lang->date_format ?? null);
				config()->set('lang.datetime_format', $lang->datetime_format ?? null);
				
				// Apply Country's Language Code to the system
				config()->set('app.locale', $langCode);
			}
		}
		
		$this->setTranslationOfCurrentCountry();
		
		return $next($request);
	}
	
	/**
	 * Set the translation of the current Country
	 */
	private function setTranslationOfCurrentCountry()
	{
		if (config()->has('country.name')) {
			$countryName = getColumnTranslation(config('country.name'));
			config()->set('country.name', $countryName);
		}
	}
}
