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

use App\Models\City;
use App\Http\Resources\EntityCollection;
use App\Http\Resources\CityResource;

/**
 * @group Countries
 */
class CityController extends BaseController
{
	/**
	 * List cities
	 *
	 * @queryParam embed string Comma-separated list of the city relationships for Eager Loading. Possible values: country,subAdmin1,subAdmin2
	 *
	 * @urlParam countryCode string The country code of the country of the cities to retrieve. Example: US
	 *
	 * @param $countryCode
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index($countryCode)
	{
		$cities = City::query()->where('country_code', $countryCode);
		
		$embed = explode(',', request()->get('embed'));
		
		if (in_array('country', $embed)) {
			$cities->with('country');
		}
		if (in_array('subAdmin1', $embed)) {
			$cities->with('subAdmin1');
		}
		if (in_array('subAdmin2', $embed)) {
			$cities->with('subAdmin2');
		}
		
		$cities = $cities->paginate($this->perPage);
		
		$resourceCollection = new EntityCollection(class_basename($this), $cities);
		
		return $this->respondWithCollection($resourceCollection);
	}
	
	/**
	 * Get city
	 *
	 * @queryParam embed string Comma-separated list of the city relationships for Eager Loading. Possible values: country,subAdmin1,subAdmin2
	 *
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($id)
	{
		$city = City::query()->where('id', $id);
		
		$embed = explode(',', request()->get('embed'));
		
		if (in_array('country', $embed)) {
			$city->with('country');
		}
		if (in_array('subAdmin1', $embed)) {
			$city->with('subAdmin1');
		}
		if (in_array('subAdmin2', $embed)) {
			$city->with('subAdmin2');
		}
		
		$city = $city->firstOrFail();
		
		$resource = new CityResource($city);
		
		return $this->respondWithResource($resource);
	}
}
