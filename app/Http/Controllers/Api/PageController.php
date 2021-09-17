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

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Page\PageBySlug;
use App\Models\Page;
use App\Http\Resources\EntityCollection;
use App\Http\Resources\PageResource;

/**
 * @group Pages
 */
class PageController extends BaseController
{
	use PageBySlug;
	
	/**
	 * List pages
	 *
	 * @queryParam excludedFromFooter boolean Select or unselect pages that can list in footer.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$pages = Page::query();
		
		if (request()->get('excludedFromFooter') == 1) {
			$pages->where(function ($query) {
				$query->where('excluded_from_footer', '!=', 1)->orWhereNull('excluded_from_footer');
			});
		}
		
		$pages->orderBy('lft');
		
		$pages = $pages->get();
		
		$resourceCollection = new EntityCollection(class_basename($this), $pages);
		
		return $this->respondWithCollection($resourceCollection);
	}
	
	/**
	 * Get page
	 *
	 * @urlParam slugOrId string required The slug or ID of the page.
	 *
	 * @param $slugOrId
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($slugOrId)
	{
		if (is_numeric($slugOrId)) {
			$page = $this->getPageById($slugOrId);
		} else {
			$page = $this->getPageBySlug($slugOrId);
		}
		
		$resource = new PageResource($page);
		
		return $this->respondWithResource($resource);
	}
}
