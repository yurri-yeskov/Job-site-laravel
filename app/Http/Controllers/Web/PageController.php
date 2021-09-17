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

use App\Helpers\ArrayHelper;
use App\Helpers\UrlGen;
use App\Http\Controllers\Web\Traits\Sluggable\PageBySlug;
use App\Http\Requests\ContactRequest;
use App\Models\City;
use App\Models\Package;
use App\Models\Permission;
use App\Models\User;
use App\Notifications\FormSent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;

class PageController extends FrontController
{
	use PageBySlug;
	
	/**
	 * @return mixed
	 */
	public function pricing()
	{
		$data = [];
		
		// Get Packages
		$cacheId = 'packages.with.currency.' . config('app.locale');
		$packages = Cache::remember($cacheId, $this->cacheExpiration, function () {
			$packages = Package::applyCurrency()->with('currency')->orderBy('lft')->get();
			
			return $packages;
		});
		$data['packages'] = $packages;
		
		// Select a Package and go to previous URL ---------------------
		// Add Listing possible URLs
		$addListingUriArray = [
			'create',
			'post\/create',
		];
		// Default Add Listing URL
		$addListingUrl = UrlGen::addPost();
		if (request()->filled('from')) {
			foreach ($addListingUriArray as $uriPattern) {
				if (preg_match('#' . $uriPattern . '#', request()->get('from'))) {
					$addListingUrl = url(request()->get('from'));
					break;
				}
			}
		}
		view()->share('addListingUrl', $addListingUrl);
		// --------------------------------------------------------------
		
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'pricing'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'pricing')));
		MetaTag::set('keywords', getMetaTag('keywords', 'pricing'));
		
		return appView('pages.pricing', $data);
	}
	
	/**
	 * @param $slug
	 * @return \Illuminate\Http\RedirectResponse|mixed
	 */
	public function cms($slug)
	{
		// Get the Page
		$page = $this->getPageBySlug($slug);
		if (empty($page)) {
			abort(404);
		}
		
		view()->share('page', $page);
		view()->share('uriPathPageSlug', $slug);
		
		// Check if an external link is available
		if (!empty($page->external_link)) {
			return redirect()->away($page->external_link, 301)->withHeaders(config('larapen.core.noCacheHeaders'));
		}
		
		// SEO
		$title = $page->title;
		$description = Str::limit(str_strip($page->content), 200);
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		
		// Open Graph
		$this->og->title($title)->description($description);
		if (!empty($page->picture)) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
			$this->og->image(imgUrl($page->picture, 'bgHeader'), [
				'width'  => 600,
				'height' => 600,
			]);
		}
		view()->share('og', $this->og);
		
		return appView('pages.cms');
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function contact()
	{
		// Get the Country's largest city for Google Maps
		$cacheId = config('country.code') . '.city.population.desc.first';
		$city = Cache::remember($cacheId, $this->cacheExpiration, function () {
			$city = City::currentCountry()->orderBy('population', 'desc')->first();
			
			return $city;
		});
		view()->share('city', $city);
		
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'contact'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'contact')));
		MetaTag::set('keywords', getMetaTag('keywords', 'contact'));
		
		return appView('pages.contact');
	}
	
	/**
	 * @param ContactRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function contactPost(ContactRequest $request)
	{
		// Add required data in the request for API
		request()->merge([
			'country_code' => config('country.code'),
			'country_name' => config('country.name'),
		]);
		
		// Call API endpoint
		$endpoint = '/contact';
		$data = makeApiRequest('post', $endpoint, $request->all());
		
		// Parsing the API's response
		$message = !empty(data_get($data, 'message')) ? data_get($data, 'message') : 'Unknown Error.';
		
		// HTTP Error Found
		if (!data_get($data, 'isSuccessful')) {
			return back()->withErrors(['error' => $message])->withInput();
		}
		
		// Notification Message
		if (data_get($data, 'success')) {
			flash($message)->success();
		} else {
			flash($message)->error();
		}
		
		return redirect(UrlGen::contact());
	}
	
	public function aboutus()
	{
		return appView('pages.aboutus');
	}
	
	public function worker()
	{ 
		return appView('pages.worker');
	}
	
	public function employer()
	{
		return appView('pages.employer');
	}
	
	public function howitwork()
	{
		return appView('pages.how_it_work');
	}
	
	public function blogpage()
	{
		return appView('pages.blog_page');
	}
	
	public function bloglist()
	{
		return appView('pages.blog_list');
	}

	public function jobdetail()
	{
		return appView('pages.job_detail');
	}
	
	public function workprofile()
	{
		return appView('pages.work_profile');
	}
	
	public function alljobs()
	{
		return appView('pages.all_jobs');
	}
	
	public function allworker()
	{
		return appView('pages.all_worker');
	}
	
	public function companyprofile()
	{
		return appView('pages.company_profile');
	}

}
