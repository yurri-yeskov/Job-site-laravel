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

namespace App\Http\Controllers\Web\Install\Traits\Install;

use App\Helpers\Number;

trait PhpTrait
{
	/**
	 * Get the composer.json required PHP version
	 *
	 * @return int|mixed|string
	 */
	protected function getComposerRequiredPhpVersion()
	{
		$version = null;
		
		$filePath = base_path('composer.json');
		
		try {
			$content = file_get_contents($filePath);
			$array = json_decode($content, true);
			
			if (isset($array['require']) && isset($array['require']['php'])) {
				$version = $array['require']['php'];
			}
		} catch (\Exception $e) {
		}
		
		if (empty($version)) {
			$version = config('app.phpVersion', '7.4.0');
		}
		
		return Number::getFloatRawFormat($version);
	}
	
	/**
	 * Get path of the PHP binary (PHP-cli) on the server
	 *
	 * @return mixed|string
	 */
	protected function getPhpBinaryPath()
	{
		$path = null;
		
		if (defined(PHP_BINARY)) {
			$path = PHP_BINARY;
		}
		
		if (empty($path)) {
			try {
				$path = exec('whereis php');
			} catch (\Exception $e) {
			}
			
			if (empty($path)) {
				try {
					$path = exec('which php');
				} catch (\Exception $e) {
				}
			}
		}
		
		if ($path == trim($path) && strpos($path, ' ') !== false) {
			$tmp = explode(' ', $path);
			if (isset($tmp[1])) {
				$path = $tmp[1];
			}
		}
		
		return $path;
	}
	
	protected function getPhpBinaryVersion()
	{
		$version = null;
		
		$phpBinaryPath = $this->getPhpBinaryPath();
		if (!empty($phpBinaryPath)) {
			try {
				exec($phpBinaryPath . ' --version', $version);
			} catch (\Exception $e) {
			}
		}
		
		if (is_array($version)) {
			$version = implode(' ', $version);
		}
		
		if (!empty($version) && is_string($version)) {
			$version = $this->parsePhpVersion($version);
		}
		
		return $version;
	}
	
	/**
	 * PHP: Extract version number for string
	 *
	 * @param $str
	 * @return mixed|null
	 */
	protected function parsePhpVersion($str)
	{
		preg_match("/(?:PHP|version|)\s*((?:[0-9]+\.?)+)/i", $str, $matches);
		
		return isset($matches[1]) ? $matches[1] : null;
	}
}
