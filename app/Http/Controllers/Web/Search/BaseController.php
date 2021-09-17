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

namespace App\Http\Controllers\Web\Search;

use App\Helpers\ArrayHelper;
use App\Http\Controllers\Web\FrontController;
use App\Http\Controllers\Web\Search\Traits\CategoryTrait;
use App\Http\Controllers\Web\Search\Traits\LocationTrait;
use App\Http\Controllers\Web\Search\Traits\TitleTrait;
use App\Http\Requests\SendPostByEmailRequest;
use App\Models\Category;
use App\Models\SubAdmin1;
use App\Models\PostType;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Larapen\LaravelDistance\Libraries\mysql\DistanceHelper;

class BaseController extends FrontController
{
	use CategoryTrait, LocationTrait, TitleTrait;
	
	public $request;
	public $countries;
	
	/**
	 * All Types of Search
	 * Variables declaration required
	 */
	public $isIndexSearch = false;
	public $isCatSearch = false;
	public $isSubCatSearch = false;
	public $isCitySearch = false;
	public $isAdminSearch = false;
	public $isUserSearch = false;
	public $isCompanySearch = false;
	public $isTagSearch = false;
	
	private $cats;
	
	public $preSearch;
	public $cat = null;
	public $locationArr = null;
	public $city = null;
	public $admin = null;
	
	/**
	 * SearchController constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request)
	{
		parent::__construct();
		
		$this->middleware(function ($request, $next) {
			$this->commonQueries();
			
			return $next($request);
		});
		
		$this->request = $request;
		
		// Create the MySQL Distance Calculation function, If doesn't exist
		if (!DistanceHelper::checkIfDistanceCalculationFunctionExists(config('settings.listing.distance_calculation_formula'))) {
			$res = DistanceHelper::createDistanceCalculationFunction(config('settings.listing.distance_calculation_formula'));
		}
	}
	
	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		// Get Root Categories
		$rootCats = $this->getRootCategories();
		view()->share('rootCats', $rootCats);
		
		// Get Category
		$this->cat = $this->getCategory();
		
		// Get Category's Subcategories
		$popCatId = (isset($cat->parent, $cat->parent->parent) && !empty($cat->parent->parent))
			? $cat->parent->parent->id
			: ((isset($cat->parent) && !empty($cat->parent)) ? $cat->parent->id : null);
		$cats = $this->getCategories($popCatId);
		view()->share('cats', $cats);
		
		// Get Location (City or Administrative Division)
		$this->locationArr = $this->getLocation();
		
		// PreSearch Array
		$this->preSearch = $this->locationArr;
		$this->preSearch['cat'] = $this->cat;
		
		
		// LEFT MENU VARS
		// Count Posts by Category
		$countPostsByCat = collect();
		if (config('settings.listing.count_categories_posts')) {
			if (isset($this->city) && !empty($this->city) && $this->city instanceof City) {
				$cityId = $this->city->id;
				$cacheId = config('country.code') . '.' . $cityId . '.count.posts.by.cat.' . config('app.locale');
				$countPostsByCat = Cache::remember($cacheId, $this->cacheExpiration, function () use ($cityId) {
					$countPostsByCat = Category::countPostsByCategory($cityId);
					
					return $countPostsByCat;
				});
			} else {
				$cacheId = config('country.code') . '.count.posts.by.cat.' . config('app.locale');
				$countPostsByCat = Cache::remember($cacheId, $this->cacheExpiration, function () {
					$countPostsByCat = Category::countPostsByCategory();
					
					return $countPostsByCat;
				});
			}
		}
		view()->share('countPostsByCat', $countPostsByCat);
		
		// Get the 100 most populate Cities
		$limit = 100;
		if (config('settings.listing.count_cities_posts')) {
			$cacheId = config('country.code') . '.cities.withCountPosts.take.' . $limit;
			$cities = Cache::remember($cacheId, $this->cacheExpiration, function () use ($limit) {
				return City::currentCountry()->withCount('posts')->take($limit)->orderBy('population', 'DESC')->orderBy('name')->get();
			});
		} else {
			$cacheId = config('country.code') . '.cities.take.' . $limit;
			$cities = Cache::remember($cacheId, $this->cacheExpiration, function () use ($limit) {
				return City::currentCountry()->take($limit)->orderBy('population', 'DESC')->orderBy('name')->get();
			});
		}
		view()->share('cities', $cities);
		
		
		// Get Post Types
		$cacheId = 'postTypes.all.' . config('app.locale');
		$postTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return PostType::orderBy('lft')->get();
		});
		view()->share('postTypes', $postTypes);
		
		// Get Date Ranges
		$dates = ArrayHelper::toObject([
			'2'  => '24 ' . t('hours'),
			'4'  => '3 ' . t('days'),
			'8'  => '7 ' . t('days'),
			'31' => '30 ' . t('days'),
		]);
		$this->dates = $dates;
		view()->share('dates', $dates);
		// END - LEFT MENU VARS
		
		
		// Get the Country first Administrative Division
		$cacheId = config('country.code') . '.subAdmin1s.all';
		$modalAdmins = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return SubAdmin1::currentCountry()->orderBy('name')->get(['code', 'name'])->keyBy('code');
		});
		view()->share('modalAdmins', $modalAdmins);
		
		// Get Distance Range
		$distanceRange = [];
		if (config('settings.listing.cities_extended_searches')) {
			config()->set('distance.distanceRange.min', 0);
			config()->set('distance.distanceRange.max', config('settings.listing.search_distance_max', 500));
			config()->set('distance.distanceRange.interval', config('settings.listing.search_distance_interval', 150));
			$distanceRange = DistanceHelper::distanceRange();
		}
		view()->share('distanceRange', $distanceRange);
	}
	
	/**
	 * Send Post by Email.
	 *
	 * @param SendPostByEmailRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function sendByEmail(SendPostByEmailRequest $request)
	{
		$postId = $request->input('post_id');
		
		// Call API endpoint
		$endpoint = '/posts/' . $postId . '/sendByEmail';
		$data = makeApiRequest('post', $endpoint, $request->all());
		
		// Parsing the API's response
		$message = !empty(data_get($data, 'message')) ? data_get($data, 'message') : 'Unknown Error.';
		
		// HTTP Error Found
		if (!data_get($data, 'isSuccessful')) {
			flash($message)->error();
			
			return redirect()->back()->withInput();
		}
		
		// Notification Message
		if (data_get($data, 'success')) {
			flash($message)->success();
		} else {
			flash($message)->error();
		}
		
		return redirect(url()->previous());
	}
}
