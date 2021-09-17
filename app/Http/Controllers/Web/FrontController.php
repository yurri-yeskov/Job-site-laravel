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

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Traits\CommonTrait;
use App\Http\Controllers\Web\Traits\EnvFileTrait;
use App\Http\Controllers\Web\Traits\RobotsTxtTrait;
use App\Http\Controllers\Web\Traits\SettingsTrait;

class FrontController extends Controller
{
	use SettingsTrait, EnvFileTrait, RobotsTxtTrait, CommonTrait;
	
	public $request;
	public $data = [];
	
	/**
	 * FrontController constructor.
	 */
	public function __construct()
	{
		// Set the storage disk
		$this->setStorageDisk();
		
		// Check & Change the App Key (If needed)
		$this->checkAndGenerateAppKey();
		
		// Load the Plugins
		$this->loadPlugins();
		
		// From Laravel 5.3.4+
		$this->middleware(function ($request, $next)
		{
			// Load Localization Data first
			// Check out the SetCountryLocale Middleware
			$this->checkDotEnvEntries();
			$this->applyFrontSettings();
			$this->checkRobotsTxtFile();
			
			return $next($request);
		});
		
		// Check the 'Domain Mapping' plugin
		if (config('plugins.domainmapping.installed')) {
			$this->middleware(['domain.verification']);
		}
	}
}
