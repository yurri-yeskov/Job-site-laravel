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

use App\Helpers\Search\PostQueries;
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;

class CategoryController extends BaseController
{
	public $isCatSearch = true;
	
	/**
	 * Category URL
	 * Pattern: (countryCode/)category/category-slug
	 * Pattern: (countryCode/)category/parent-category-slug/category-slug
	 *
	 * @param $countryCode
	 * @param $catSlug
	 * @param null $subCatSlug
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
	 */
	public function index($countryCode, $catSlug, $subCatSlug = null)
	{
		// Check if Category is found
		if (empty($this->cat)) {
			abort(404, t('category_not_found'));
		}
		
		// Search
		$data = (new PostQueries($this->preSearch))->fetch();
		
		// Get Titles
		$bcTab = $this->getBreadcrumb();
		$htmlTitle = $this->getHtmlTitle();
		view()->share('bcTab', $bcTab);
		view()->share('htmlTitle', $htmlTitle);
		
		// SEO
		$title = $this->getTitle();
		if (isset($this->cat->description) && !empty($this->cat->description)) {
			$description = Str::limit($this->cat->description, 200);
		} else {
			$description = Str::limit(t('ads_category_in_location', [
					'category' => $this->cat->name,
					'location' => config('country.name'),
				]) . '. ' . t('Looking for a job') . ' - ' . config('country.name'), 200);
		}
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		
		// Open Graph
		$this->og->title($title)->description($description)->type('website');
		if ($data['count']->get('all') > 0) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
		}
		view()->share('og', $this->og);
		
		return appView('search.results', $data);
	}
}
