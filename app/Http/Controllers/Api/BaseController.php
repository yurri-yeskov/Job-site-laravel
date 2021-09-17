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

use App\Helpers\Date;
use App\Http\Controllers\Api\Base\ApiResponseTrait;
use App\Http\Controllers\Api\Base\SettingsTrait;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Base\LocalizationTrait;
use App\Http\Controllers\Web\Traits\CommonTrait;
use App\Http\Controllers\Web\Traits\EnvFileTrait;

class BaseController extends Controller
{
	use CommonTrait, SettingsTrait, EnvFileTrait, LocalizationTrait, ApiResponseTrait;
	
	public $locale = null;
	public $countryCode = null;
	
	public $messages = [];
	public $errors = [];
	
	public $cacheExpiration = 3600; // In minutes (e.g. 60 * 60 for 1h)
	public $perPage = 10;
	
	/**
	 * BaseController constructor.
	 */
	public function __construct()
	{
		// CommonTrait : Set the storage disk
		$this->setStorageDisk();
		
		// SettingsTrait
		$this->applyFrontSettings();
		
		// CommonTrait : Check & Change the App Key (If needed)
		$this->checkAndGenerateAppKey();
		
		// CommonTrait : Load the Plugins
		$this->loadPlugins();
		
		// EnvFileTrait : Check & Update the /.env file
		$this->checkDotEnvEntries();
		
		// LocalizationTrait
		$this->loadLocalizationData();
		
		// Items Per Page
		$perPage = config('settings.listing.items_per_page');
		if (is_numeric($perPage) && $perPage > 1 && $perPage <= 50) {
			$this->perPage = $perPage;
		}
		if (request()->has('perPage')) {
			$perPage = request()->get('itemsPerPage');
			if (is_numeric($perPage) && $perPage > 1 && $perPage <= 100) {
				$this->perPage = $perPage;
			}
		}
		
		// Set Date Locale
		Date::setAppLocale(config('lang.locale', 'en_US'));
	}
}
