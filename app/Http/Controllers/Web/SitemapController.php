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

use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Facades\Cache;
use Torann\LaravelMetaTags\Facades\MetaTag;

class SitemapController extends FrontController
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$data = [];
		
		// Get Categories
		$cacheId = 'categories.all.' . config('app.locale');
		$cats = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return Category::orderBy('lft')->get();
		});
		$cats = collect($cats)->keyBy('id');
		$cats = $subCats = $cats->groupBy('parent_id');
		
		if ($cats->has(null)) {
			$col = round($cats->get(null)->count() / 3, 0, PHP_ROUND_HALF_EVEN);
			$col = ($col > 0) ? $col : 1;
			$data['cats'] = $cats->get(null)->chunk($col);
			$data['subCats'] = $subCats->forget(null);
		} else {
			$data['cats'] = collect([]);
			$data['subCats'] = collect([]);
		}
		
		// Get Cities
		$limit = 100;
		$cacheId = config('country.code') . '.cities.take.' . $limit;
		$cities = Cache::remember($cacheId, $this->cacheExpiration, function () use ($limit) {
			return City::currentCountry()->take($limit)->orderBy('population', 'DESC')->orderBy('name')->get();
		});
		
		$col = round($cities->count() / 4, 0, PHP_ROUND_HALF_EVEN);
		$col = ($col > 0) ? $col : 1;
		$data['cities'] = $cities->chunk($col);
		
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'sitemap'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'sitemap')));
		MetaTag::set('keywords', getMetaTag('keywords', 'sitemap'));
		
		return appView('sitemap.index', $data);
	}
}
