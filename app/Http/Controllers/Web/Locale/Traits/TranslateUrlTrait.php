<?php
/**
 * JobClass - Job Board Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Web\Locale\Traits;

use App\Http\Controllers\Web\Traits\Sluggable\CategoryBySlug;
use App\Http\Controllers\Web\Traits\Sluggable\PageBySlug;
use Illuminate\Support\Str;

trait TranslateUrlTrait
{
	use CategoryBySlug, PageBySlug;
	
	/**
	 * @param $url
	 * @param $langCode
	 * @param null $baseUrl
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string|string[]
	 */
	private function translateUrl($url, $langCode, $baseUrl = null)
	{
		try {
			$route = app('router')->getRoutes()->match(request()->create($url, request()->method()));
			if (!empty($route)) {
				$prevUriPattern = $route->uri;
				$prevUriParameters = $route->parameters();
				
				if (Str::contains($route->action['controller'], 'Search\CategoryController')) {
					$prevUriParameters = $this->translateRouteUriParametersForCat($prevUriParameters, $langCode);
				}
				if (Str::contains($route->action['controller'], 'PageController')) {
					$prevUriParameters = $this->translateRouteUriParametersForPage($prevUriParameters, $langCode);
				}
				
				// Translatable route
				// $routeKey = array_search($prevUriPattern, trans('routes'));
				$routeKey = array_search($prevUriPattern, config('routes'));
				if (!empty($routeKey)) {
					$queryString = '';
					$queryArray = getRequestQuery($url, 'from');
					if (!empty($queryArray)) {
						$queryString = '?' . httpBuildQuery($queryArray);
					}
					
					$search = collect($prevUriParameters)->mapWithKeys(function ($value, $key) {
						return ['{' . $key . '}' => $key];
					})->keys()->toArray();
					
					$replace = collect($prevUriParameters)->mapWithKeys(function ($value, $key) {
						return [$value => $key];
					})->keys()->toArray();
					
					// $prevUriPattern = trans('routes.' . $routeKey, [], $langCode);
					
					$translatedUrl = str_replace($search, $replace, $prevUriPattern);
					$translatedUrl = $translatedUrl . $queryString;
					
					return $translatedUrl;
				} else {
					// Non-translatable route
					return $url;
				}
			}
		} catch (\Exception $e) {
		}
		
		return (!empty($baseUrl)) ? $baseUrl : url('/');
	}
	
	/**
	 * @param $prevUriParameters
	 * @param $langCode
	 * @return array
	 */
	private function translateRouteUriParametersForCat($prevUriParameters, $langCode)
	{
		$countryCode = $prevUriParameters['countryCode'] ?? null;
		$catSlug = $prevUriParameters['catSlug'] ?? null;
		$parentCatSlug = $prevUriParameters['subCatSlug'] ?? null;
		
		$cat = $this->getCategoryBySlug($catSlug, $parentCatSlug, $langCode);
		if (!empty($cat)) {
			$cat = $this->getCategoryById($cat->id, $langCode);
		}
		
		if (!empty($cat)) {
			$prevUriParameters = [
				'countryCode' => $countryCode,
				'catSlug'     => $cat->slug,
			];
			if (!empty($parentCatSlug)) {
				$prevUriParameters = [
					'countryCode' => $countryCode,
					'catSlug'     => $cat->parent->slug,
					'subCatSlug'  => $cat->slug,
				];
			}
		}
		
		return $prevUriParameters;
	}
	
	/**
	 * @param $prevUriParameters
	 * @param $langCode
	 * @return array
	 */
	private function translateRouteUriParametersForPage($prevUriParameters, $langCode)
	{
		$slug = $prevUriParameters['slug'] ?? null;
		
		$page = $this->getPageBySlug($slug, $langCode);
		if (!empty($page)) {
			$page = $this->getPageById($page->id, $langCode);
		}
		
		if (!empty($page)) {
			$prevUriParameters = ['slug' => $page->slug];
		}
		
		return $prevUriParameters;
	}
}
