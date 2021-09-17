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

/**
 * @group Settings
 */
class SettingController extends BaseController
{
	/**
	 * List settings
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$data = [
			'success' => true,
			'result'  => config('settings'),
		];
		
		return $this->apiResponse($data);
	}
	
	/**
	 * Get setting
	 *
	 * @param $key
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($key)
	{
		$settingKey = 'settings.' . $key;
		
		if (config()->has($settingKey)) {
			$data = [
				'success' => true,
				'result'  => config($settingKey),
			];
			
			return $this->apiResponse($data);
		} else {
			return $this->respondNotFound();
		}
	}
}
