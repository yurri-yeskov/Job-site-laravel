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

namespace App\Http\Controllers\Web\Install\Traits\Update;

use App\Models\Setting;
use Illuminate\Support\Str;

trait RoutesTrait
{
	/**
	 * (Try to) Sync. the multi-countries URLs with the dynamics routes
	 */
	private function syncMultiCountriesUrlsAndRoutes()
	{
		// Get the SEO settings
		$seoSetting = Setting::where('key', 'seo')->first();
		if (empty($seoSetting)) {
			return;
		}
		
		if (!is_array($seoSetting->value)) {
			return;
		}
		
		$dynamicRoutesIsForMultiCountriesUrl = (
			Str::startsWith(config('routes.search'), '{countryCode}')
			|| Str::startsWith(config('routes.searchPostsByCat'), '{countryCode}')
			|| Str::startsWith(config('routes.searchPostsByCity'), '{countryCode}')
		);
		$multiCountriesUrls = ($dynamicRoutesIsForMultiCountriesUrl) ? '1' : '0';
		
		$seoSettingValue = $seoSetting->value;
		if (!isset($seoSettingValue['multi_countries_urls'])) {
			$seoSettingValue['multi_countries_urls'] = '0';
		}
		
		if ($seoSettingValue['multi_countries_urls'] != $multiCountriesUrls) {
			$seoSettingValue['multi_countries_urls'] = $multiCountriesUrls;
			
			$seoSetting->value = $seoSettingValue;
			$seoSetting->save();
		}
	}
}
