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

namespace App\Http\Controllers\Web;

// Increase the server resources
$iniConfigFile = __DIR__ . '/../../Helpers/Functions/ini.php';
if (file_exists($iniConfigFile)) {
	include_once $iniConfigFile;
}

use App\Helpers\ArrayHelper;
use App\Helpers\Date;
use App\Helpers\Localization\Country as CountryLocalization;
use App\Helpers\UrlGen;
use App\Models\Category;
use App\Models\Page;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\City;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Watson\Sitemap\Facades\Sitemap;

class SitemapsController extends FrontController
{
	protected $defaultDate = '2015-10-30T20:10:00+02:00';
	
	/**
	 * SitemapsController constructor.
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
		// Set the Country's Locale & Default Date
		$this->applyCountrySettings();
	}
	
	/**
	 * Index Sitemap
	 *
	 * @return mixed
	 */
	public function index()
	{
		foreach ($this->countries as $item) {
			// Get Country Settings
			$country = $this->getCountrySettings($item->get('code'), false);
			if (empty($country)) {
				continue;
			}
			
			Sitemap::addSitemap(dmUrl($country, $country->icode . '/sitemaps.xml'));
		}
		
		return Sitemap::index();
	}
	
	/**
	 * Index Single Country Sitemap
	 *
	 * @param null $countryCode
	 * @return bool
	 */
	public function site($countryCode = null)
	{
		if (empty($countryCode)) {
			$countryCode = config('country.code');
		}
		
		// Get Country Settings
		$country = $this->getCountrySettings($countryCode);
		if (empty($country)) {
			return false;
		}
		
		Sitemap::addSitemap(dmUrl(collect($country), $country->icode . '/sitemaps/pages.xml'));
		Sitemap::addSitemap(dmUrl(collect($country), $country->icode . '/sitemaps/categories.xml'));
		Sitemap::addSitemap(dmUrl(collect($country), $country->icode . '/sitemaps/cities.xml'));
		
		$countPosts = Post::verified()->countryOf($country->code)->count();
		if ($countPosts > 0) {
			Sitemap::addSitemap(dmUrl(collect($country), $country->icode . '/sitemaps/posts.xml'));
		}
		
		return Sitemap::index();
	}
	
	/**
	 * @param null $countryCode
	 * @return bool
	 */
	public function pages($countryCode = null)
	{
		if (empty($countryCode)) {
			$countryCode = config('country.code');
		}
		
		// Get Country Settings
		$country = $this->getCountrySettings($countryCode);
		if (empty($country)) {
			return false;
		}
		
		$queryString = '';
		if (!config('plugins.domainmapping.installed')) {
			$queryString = '?d=' . $country->code;
		}
		
		$url = url('/') . $queryString;
		Sitemap::addTag($url, $this->defaultDate, 'daily', '1.0');
		
		$url = UrlGen::sitemap($country->icode) . $queryString;
		Sitemap::addTag($url, $this->defaultDate, 'daily', '0.5');
		
		$url = UrlGen::search([], [], false, $country->icode) . $queryString;
		Sitemap::addTag($url, $this->defaultDate, 'daily', '0.6');
		
		$pages = Cache::remember('pages.' . $country->locale, $this->cacheExpiration, function () use ($country) {
			$pages = Page::orderBy('lft', 'ASC')->get();
			
			return $pages;
		});
		
		if ($pages->count() > 0) {
			foreach ($pages as $page) {
				$url = UrlGen::page($page, $country->icode);
				Sitemap::addTag($url, $this->defaultDate, 'daily', '0.7');
			}
		}
		
		$url = UrlGen::contact() . $queryString;
		Sitemap::addTag($url, $this->defaultDate, 'daily', '0.7');
		
		return Sitemap::render();
	}
	
	/**
	 * @param null $countryCode
	 * @return bool
	 */
	public function categories($countryCode = null)
	{
		if (empty($countryCode)) {
			$countryCode = config('country.code');
		}
		
		// Get Country Settings
		$country = $this->getCountrySettings($countryCode);
		if (empty($country)) {
			return false;
		}
		
		// Categories
		$cacheId = 'categories.' . $country->locale . '.all';
		$cats = Cache::remember($cacheId, $this->cacheExpiration, function () use ($country) {
			$cats = Category::orderBy('lft')->get();
			
			return $cats;
		});
		
		if ($cats->count() > 0) {
			$cats = collect($cats)->keyBy('id');
			
			foreach ($cats as $cat) {
				$url = UrlGen::category($cat, $country->locale, $country->icode);
				Sitemap::addTag($url, $this->defaultDate, 'daily', '0.8');
			}
		}
		
		return Sitemap::render();
	}
	
	/**
	 * @param null $countryCode
	 * @return bool
	 */
	public function cities($countryCode = null)
	{
		if (empty($countryCode)) {
			$countryCode = config('country.code');
		}
		
		// Get Country Settings
		$country = $this->getCountrySettings($countryCode);
		if (empty($country)) {
			return false;
		}
		
		$limit = (int)env('XML_SITEMAP_LIMIT', 1000);
		$cacheId = $country->icode . '.cities.take.' . $limit;
		$cities = Cache::remember($cacheId, $this->cacheExpiration, function () use ($country, $limit) {
			return City::countryOf($country->code)->take($limit)->orderBy('population', 'DESC')->orderBy('name')->get();
		});
		
		if ($cities->count() > 0) {
			foreach ($cities as $city) {
				$city->name = trim(head(explode('/', $city->name)));
				$url = UrlGen::city($city, $country->locale, $country->icode);
				Sitemap::addTag($url, $this->defaultDate, 'weekly', '0.7');
			}
		}
		
		return Sitemap::render();
	}
	
	/**
	 * @param null $countryCode
	 * @return bool
	 */
	public function posts($countryCode = null)
	{
		if (empty($countryCode)) {
			$countryCode = config('country.code');
		}
		
		// Get Country Settings
		$country = $this->getCountrySettings($countryCode);
		if (empty($country)) {
			return false;
		}
		
		$limit = (int)env('XML_SITEMAP_LIMIT', 1000);
		$cacheId = $country->icode . '.sitemaps.posts.xml';
		$posts = Cache::remember($cacheId, $this->cacheExpiration, function () use ($country, $limit) {
			return Post::verified()->countryOf($country->code)->take($limit)->orderBy('created_at', 'DESC')->get();
		});
		
		if ($posts->count() > 0) {
			foreach ($posts as $post) {
				$url = UrlGen::post($post, $country->locale);
				Sitemap::addTag($url, $post->created_at, 'daily', '0.6');
			}
		}
		
		return Sitemap::render();
	}
	
	/**
	 * Set the Country's Locale & Default Date
	 *
	 * @param null $locale
	 * @param null $timeZone
	 */
	public function applyCountrySettings($locale = null, $timeZone = null)
	{
		// Set the App Language
		if (!empty($locale)) {
			App::setLocale($locale);
		} else {
			App::setLocale(config('app.locale'));
		}
		
		// Date: Carbon object
		$this->defaultDate = Carbon::parse(date('Y-m-d H:i'));
		if (!empty($timeZone)) {
			$this->defaultDate->timezone($timeZone);
		} else {
			$this->defaultDate->timezone(Date::getAppTimeZone());
		}
	}
	
	/**
	 * Get Country Settings
	 *
	 * @param $countryCode
	 * @param bool $canApplySettings
	 * @return array|null
	 */
	public function getCountrySettings($countryCode, $canApplySettings = true)
	{
		$tab = [];
		
		// Get Country Info
		$country = CountryLocalization::getCountryInfo($countryCode);
		if ($country->isEmpty()) {
			return null;
		}
		
		$tab['code'] = $country->get('code');
		$tab['icode'] = $country->get('icode');
		$tab['time_zone'] = ($country->has('time_zone')) ? $country->get('time_zone') : config('app.timezone');
		
		// Language
		if (!$country->get('lang')->isEmpty() && $country->get('lang')->has('abbr')) {
			$tab['locale'] = $country->get('lang')->get('abbr');
		} else {
			$tab['locale'] = config('app.locale');
		}
		
		$tab = ArrayHelper::toObject($tab);
		
		// Set the Country's Locale & Default Date
		if ($canApplySettings) {
			$this->applyCountrySettings($tab->locale, $tab->time_zone);
		}
		
		return $tab;
	}
}
