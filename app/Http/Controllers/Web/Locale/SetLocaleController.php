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

namespace App\Http\Controllers\Web\Locale;

use App\Http\Controllers\Web\FrontController;
use App\Http\Controllers\Web\Locale\Traits\TranslateUrlTrait;
use Illuminate\Support\Str;

class SetLocaleController extends FrontController
{
	use TranslateUrlTrait;
	
	/**
	 * @param $langCode
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function redirect($langCode)
	{
		// Check if the selected Language Code is supported by the system
		if (!isAvailableLang($langCode)) {
			$message = t('language_not_supported', ['code' => $langCode]);
			flash($message)->error();
			
			return redirect()->back();
		}
		
		// Check if Language Code can be saved into the session
		// and remove the Language Code session, if its cannot be saved.
		$langCanBeSaved = $this->checkIfLangCanBeSavedInSession($langCode);
		
		// Save the Language Code in Session
		$this->saveLangInSession($langCode, $langCanBeSaved);
		
		// After the Language Operation is done, ...
		
		// If the next path (URI) is filled (using the '?from=' parameter,
		// Then, redirect to this path
		if (request()->filled('from')) {
			$path = ltrim(request()->get('from'), '/');
			if (!empty($path) && !Str::contains($path, '#')) {
				return redirect(request()->root() . '/' . $path);
			}
		}
		
		// If the Country selection parameter is filled,
		// Redirect to the homepage with it (without the eventual 'from' parameter)
		// If not, redirect user to the previous page
		if (request()->filled('d')) {
			$queryString = '';
			$queryArray = request()->except(['from']);
			if (!empty($queryArray)) {
				$queryString = '?' . httpBuildQuery($queryArray);
			}
			
			$nextUrl = request()->root() . '/' . $queryString;
			
			if (config('settings.app.auto_detect_language') == '2') {
				$nextUrl = $this->removeCountrySelectionParameter($nextUrl);
			}
			
			return redirect($nextUrl);
		} else {
			$previousUrl = url()->previous();
			if (config('settings.app.auto_detect_language') == '2') {
				$previousUrl = $this->removeCountrySelectionParameter($previousUrl);
			}
			$previousUrl = $this->translateUrl($previousUrl, $langCode);
			
			if (config('plugins.domainmapping.installed')) {
				$previousUrl = request()->root();
				
				$origParsedUrl = mb_parse_url(url()->previous());
				$parsedUrl = mb_parse_url(request()->root());
				
				if (isset($origParsedUrl['host'], $parsedUrl['host'])) {
					if ($origParsedUrl['host'] == $parsedUrl['host']) {
						$previousPath = isset($origParsedUrl['path']) && !empty($origParsedUrl['path'])
							? $origParsedUrl['path']
							: '';
						$previousPath = ltrim($previousPath, '/');
						$previousUrl = $previousUrl . '/' . $previousPath;
						$previousUrl = $this->translateUrl($previousUrl, $langCode, request()->root());
					}
				}
			}
			
			return redirect($previousUrl);
		}
	}
	
	/**
	 * Check if Language Code can be saved into the session
	 * and remove the Language Code session, if its cannot be saved.
	 * ie:
	 *   - When, selected Language Code is equal to the website master Language Code
	 *   - Or when, the 'Website Country Language' detection option is activated
	 *     and the selected Language Code is equal to the Country's Language Code
	 *
	 * @param $langCode
	 * @return bool
	 */
	private function checkIfLangCanBeSavedInSession($langCode)
	{
		$langCanBeSaved = true;
		if ($langCode == config('appLang.abbr')) {
			if (config('settings.app.auto_detect_language') == '2') {
				if ($langCode == config('lang.abbr')) {
					$langCanBeSaved = false;
				}
			} else {
				$langCanBeSaved = false;
			}
		}
		
		return $langCanBeSaved;
	}
	
	/**
	 * Save the Language Code in Session
	 *
	 * @param $langCode
	 * @param $langCanBeSaved
	 */
	private function saveLangInSession($langCode, $langCanBeSaved)
	{
		if ($langCanBeSaved) {
			session()->put('langCode', $langCode);
		} else {
			// Remove the Language Code from Session
			if (session()->has('langCode')) {
				session()->forget('langCode');
			}
		}
	}
	
	/**
	 * Remove the Country selection parameter from the URL
	 * (Helpful when the 'Website Country Language' detection option is activated)
	 * '(config('settings.app.auto_detect_language') == '2'))
	 *
	 * @param null $url
	 * @return string|string[]|null
	 */
	private function removeCountrySelectionParameter($url = null)
	{
		$parsedUrl = mb_parse_url($url);
		
		if (isset($parsedUrl['query'])) {
			parse_str($parsedUrl['query'], $queryArray);
			if (array_key_exists('d', $queryArray)) {
				$url = preg_replace('|\?.*|ui', '', $url);
				unset($queryArray['d']);
				if (!empty($queryArray)) {
					$queryString = '?' . httpBuildQuery($queryArray);
					$url = $url . $queryString;
				}
			}
		}
		
		return $url;
	}
}
