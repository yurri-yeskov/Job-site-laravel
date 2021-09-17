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

namespace App\Http\Controllers\Web\Traits;

use App\Helpers\Date;
use App\Models\Advertising;
use App\Models\Page;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Cache;
use ChrisKonnertz\OpenGraph\OpenGraph;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use App\Helpers\Localization\Country as CountryLocalization;
use Torann\LaravelMetaTags\Facades\MetaTag;

trait SettingsTrait
{
	public $cacheExpiration = 3600; // In seconds (e.g. 60 * 60 for 1h)
	public $cookieExpiration = 3600; // In seconds (e.g. 60 * 60 for 1h)
	
	public $countries = null;
	
	public $paymentMethods;
	public $countPaymentMethods = 0;
	
	public $og;
	
	/**
	 * Set all the front-end settings
	 */
	public function applyFrontSettings()
	{
		// Cache Expiration Time
		$this->cacheExpiration = (int)config('settings.optimization.cache_expiration');
		view()->share('cacheExpiration', $this->cacheExpiration);
		
		// Cookie Expiration Time
		$this->cookieExpiration = (int)config('settings.other.cookie_expiration');
		view()->share('cookieExpiration', $this->cookieExpiration);
		
		// Ads photos number
		$picturesLimit = (int)config('settings.single.pictures_limit', 5);
		if ($picturesLimit <= 0) {
			$picturesLimit = 1;
		}
		view()->share('picturesLimit', $picturesLimit);
		
		/*
		// Default language for Bots
		$crawler = new CrawlerDetect();
		if ($crawler->isCrawler()) {
			$lang = collect(config('country.lang'));
			if ($lang->has('abbr')) {
				config()->set('lang.abbr', $lang->get('abbr'));
				config()->set('lang.locale', $lang->get('locale'));
			}
			app()->setLocale(config('lang.abbr'));
		}
		*/
		
		// Set Date Locale
		Date::setAppLocale(config('lang.locale', 'en_US'));
		
		// SEO
		$title = getMetaTag('title', 'home');
		$description = getMetaTag('description', 'home');
		$keywords = getMetaTag('keywords', 'home');
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', strip_tags($description));
		MetaTag::set('keywords', $keywords);
		
		// Open Graph
		$this->og = new OpenGraph();
		$locale = !empty(config('lang.locale')) ? config('lang.locale') : 'en_US';
		try {
			$this->og->siteName(config('settings.app.app_name', 'JobClass'))->locale($locale)->type('website')->url(rawurldecode(url()->current()));
		} catch (\Exception $e) {};
		view()->share('og', $this->og);
		
		// CSRF Control
		// CSRF - Some JavaScript frameworks, like Angular, do this automatically for you.
		// It is unlikely that you will need to use this value manually.
		setcookie('X-XSRF-TOKEN', csrf_token(), $this->cookieExpiration, '/', getCookieDomain());
		
		// Skin selection
		config(['app.skin' => getFrontSkin(request()->input('skin'))]);
		
		// Reset session Post view counter
		if (!Str::contains(Route::currentRouteAction(), 'Post\DetailsController')) {
			if (session()->has('postIsVisited')) {
				session()->forget('postIsVisited');
			}
		}
		
		// Pages Menu
		$pages = Cache::remember('pages.' . config('app.locale') . '.menu', $this->cacheExpiration, function () {
			return Page::where(function ($query) {
				$query->where('excluded_from_footer', '!=', 1)->orWhereNull('excluded_from_footer');
			})->orderBy('lft', 'ASC')->get();
		});
		view()->share('pages', $pages);
		
		// Get all Countries
		$this->countries = CountryLocalization::getCountries();
		view()->share('countries', $this->countries);
		$maxRowsPerCol = ceil($this->countries->count() / 4);
		$maxRowsPerCol = ($maxRowsPerCol > 0) ? $maxRowsPerCol : 1; // Fix array_chunk with 0
		view()->share('countryCols', $this->countries->chunk($maxRowsPerCol)->all());
		
		// Advertising
		$topAdvertising = null;
		$bottomAdvertising = null;
		$autoAdvertising = null;
		if (Schema::hasColumn('advertising', 'integration')) {
			$topAdvertising = Cache::remember('advertising.top', $this->cacheExpiration, function () {
				$topAdvertising = Advertising::where('integration', 'unitSlot')->where('slug', 'top')->first();
				
				return $topAdvertising;
			});
			$bottomAdvertising = Cache::remember('advertising.bottom', $this->cacheExpiration, function () {
				$bottomAdvertising = Advertising::where('integration', 'unitSlot')->where('slug', 'bottom')->first();
				
				return $bottomAdvertising;
			});
			$autoAdvertising = Cache::remember('advertising.auto', $this->cacheExpiration, function () {
				$autoAdvertising = Advertising::where('integration', 'autoFit')->where('slug', 'auto')->first();
				
				return $autoAdvertising;
			});
		}
		view()->share('topAdvertising', $topAdvertising);
		view()->share('bottomAdvertising', $bottomAdvertising);
		view()->share('autoAdvertising', $autoAdvertising);
		
		// Get Payment Methods
		$this->paymentMethods = Cache::remember(config('country.code') . '.paymentMethods.all', $this->cacheExpiration, function () {
			return PaymentMethod::whereIn('name', array_keys((array)config('plugins.installed')))
				->where(function ($query) {
					$query->whereRaw('FIND_IN_SET("' . config('country.icode') . '", LOWER(countries)) > 0')
						->orWhereNull('countries')->orWhere('countries', '');
				})->orderBy('lft')->get();
		});
		$this->countPaymentMethods = $this->paymentMethods->count();
		view()->share('paymentMethods', $this->paymentMethods);
		view()->share('countPaymentMethods', $this->countPaymentMethods);
	}
}
