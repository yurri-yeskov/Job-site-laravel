<?php
/**
 * JobClass - Geo Classified Ads Software
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

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class XSSProtection
{
	/**
	 * The following method loops through all request input and strips out all tags from
	 * the request. This to ensure that users are unable to set ANY HTML within the form
	 * submissions, but also cleans up input.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Exception for Install & Upgrade Routes
		if (
			Str::contains(Route::currentRouteAction(), 'InstallController')
			|| Str::contains(Route::currentRouteAction(), 'UpgradeController')
		) {
			return $next($request);
		}
		
		if (env('ENABLE_ACCESS_BY_REFERRERS') == true) {
			$this->checkDemoReferrers();
		}
		
		$this->convertZeroToNull($request);
		
		if (request()->segment(1) == admin_uri()) {
			try {
				$aclTableNames = config('permission.table_names');
				if (isset($aclTableNames['permissions'])) {
					if (!Schema::hasTable($aclTableNames['permissions'])) {
						return $next($request);
					}
				}
			} catch (\Exception $e) {
				return $next($request);
			}
			
			if (auth()->check() and auth()->user()->can(Permission::getStaffPermissions())) {
				return $next($request);
			}
		}
		
		// Get all fields values
		$input = $request->all();
		
		// Remove all HTML tags in the fields values
		// Except fields: description
		array_walk_recursive($input, function (&$input, $key) use ($request) {
			if (!in_array($key, ['description'])) {
				if (!empty($input)) {
					$input = strip_tags($input);
				}
			}
			
			if (!(isUtf8mb4Enabled() && config('settings.single.allow_emojis'))) {
					$input = stripNonUtf($input);
			}
		});
		
		// Replace the fields values
		$request->merge($input);
		
		return $next($request);
	}
	
	/**
	 * @param $request
	 */
	private function convertZeroToNull($request)
	{
		// parent_id
		if ($request->filled('parent_id')) {
			$parentId = (!empty($request->input('parent_id'))) ? $request->input('parent_id') : null;
			$request->request->set('parent_id', $parentId);
		}
	}
	
	private function checkDemoReferrers()
	{
		if (!isDemoDomain()) {
			return;
		}
		
		// Referrers patterns
		$domainPattern = str_replace('.', '\.', config('larapen.core.demo.domain'));
		$referrersPatterns = [
			'.*codecanyon\.net.*',
			'.*themeforest\.net.*',
			'.*envato\.com.*',
			'https?://' . $domainPattern,
			'https?://demo\.' . $domainPattern,
		];
		
		// First we check to see if a valid session exists
		if (!session()->has('allowMeFromReferrer')) {
			$goodReferrer = false;
			$userReferrer = request()->server('HTTP_REFERER');
			foreach ($referrersPatterns as $referrerPattern) {
				// Check to see what the referrer is
				if (preg_match('|' . $referrerPattern . '|ui', $userReferrer)) {
					session()->put('allowMeFromReferrer', 1);
					$goodReferrer = true;
					
					break;
				}
			}
			// If the user comes from a bad referrer...
			if (!$goodReferrer) {
				if (request()->ajax()) {
					$this->accessForbidden();
				} else {
					// Solution #1: Invite to come from a good referrer
					$url = 'https://codecanyon.net/item/' . strtolower(config('app.name')) . '/' . config('larapen.core.itemId');
					redirectUrl($url, 302, config('larapen.core.noCacheHeaders'));
					
					// Solution #2: Block access bad referrer and no session
					$this->accessForbidden();
				}
			}
		}
	}
	
	/**
	 * Print Access Forbidden message and exit
	 */
	private function accessForbidden()
	{
		$msg = 'Access Forbidden. Please try later.';
		echo '<pre>';
		print_r($msg);
		echo '</pre>';
		exit();
	}
}
