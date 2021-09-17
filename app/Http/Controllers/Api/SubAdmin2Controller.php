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

use App\Http\Resources\SubAdmin2Resource;
use App\Http\Resources\EntityCollection;
use App\Models\SubAdmin2;

/**
 * @group Countries
 */
class SubAdmin2Controller extends BaseController
{
	/**
	 * List admin. divisions (2)
	 *
	 * @queryParam embed string Comma-separated list of the administrative division (2) relationships for Eager Loading. Possible values: country,subAdmin1
	 *
	 * @urlParam countryCode string The country code of the country of the cities to retrieve. Example: US
	 *
	 * @param $countryCode
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index($countryCode)
	{
		$subAdmins2 = SubAdmin2::query()->where('country_code', $countryCode);
		
		$embed = explode(',', request()->get('embed'));
		
		if (in_array('country', $embed)) {
			$subAdmins2->with('country');
		}
		if (in_array('subAdmin1', $embed)) {
			$subAdmins2->with('subAdmin1');
		}
		
		$subAdmins2 = $subAdmins2->paginate($this->perPage);
		
		$resourceCollection = new EntityCollection(class_basename($this), $subAdmins2);
		
		return $this->respondWithCollection($resourceCollection);
	}
	
	/**
	 * Get admin. division (2)
	 *
	 * @queryParam embed string Comma-separated list of the administrative division (2) relationships for Eager Loading. Possible values: country,subAdmin1
	 *
	 * @param $code
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($code)
	{
		$subAdmin2 = SubAdmin2::query()->where('code', $code);
		
		$embed = explode(',', request()->get('embed'));
		
		if (in_array('country', $embed)) {
			$subAdmin2->with('country');
		}
		if (in_array('subAdmin1', $embed)) {
			$subAdmin2->with('subAdmin1');
		}
		
		$subAdmin2 = $subAdmin2->firstOrFail();
		
		$resource = new SubAdmin2Resource($subAdmin2);
		
		return $this->respondWithResource($resource);
	}
}
