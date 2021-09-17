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

namespace App\Observers\Traits\Setting;

use App\Helpers\Lang\LangManager;
use Illuminate\Support\Facades\File;
use Prologue\Alerts\Facades\Alert;

trait SeoTrait
{
	/**
	 * Updating
	 *
	 * @param $setting
	 * @param $original
	 */
	public function seoUpdating($setting, $original)
	{
		// Remove the "public/robots.txt" file (It will be re-generated automatically)
		if ($this->checkIfRobotsTxtFileCanBeRemoved($setting, $original)) {
			$this->removeRobotsTxtFile($setting, $original);
		}
		
		// Regenerate the "config/routes.php" file
		if ($this->checkIfDynamicRoutesFileCanBeRegenerated($setting, $original)) {
			$this->regenerateDynamicRoutes($setting);
		}
	}
	
	/**
	 * @param $setting
	 * @param $original
	 * @return bool
	 */
	private function checkIfRobotsTxtFileCanBeRemoved($setting, $original)
	{
		$canBeRemoved = false;
		
		if (
			array_key_exists('robots_txt', $setting->value)
			|| array_key_exists('robots_txt_sm_indexes', $setting->value)
		) {
			if (
				empty($original['value'])
				|| (
					is_array($original['value'])
					&& !isset($original['value']['robots_txt'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['robots_txt'])
					&& md5($setting->value['robots_txt']) != md5($original['value']['robots_txt'])
				)
				|| (
					is_array($original['value'])
					&& !isset($original['value']['robots_txt_sm_indexes'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['robots_txt_sm_indexes'])
					&& $setting->value['robots_txt_sm_indexes'] != $original['value']['robots_txt_sm_indexes']
				)
			) {
				$canBeRemoved = true;
			}
		}
		
		return $canBeRemoved;
	}
	/**
	 * Remove the robots.txt file (It will be re-generated automatically)
	 *
	 * @param $setting
	 * @param $original
	 */
	private function removeRobotsTxtFile($setting, $original)
	{
		$robotsFile = public_path('robots.txt');
		if (File::exists($robotsFile)) {
			File::delete($robotsFile);
		}
	}
	
	/**
	 * @param $setting
	 * @param $original
	 * @return bool
	 */
	private function checkIfDynamicRoutesFileCanBeRegenerated($setting, $original)
	{
		$canBeRegenerated = false;
		
		if (
			array_key_exists('post_permalink', $setting->value)
			|| array_key_exists('post_permalink_ext', $setting->value)
			|| array_key_exists('multi_countries_urls', $setting->value)
		) {
			if (
				empty($original['value'])
				|| (
					is_array($original['value'])
					&& !isset($original['value']['post_permalink'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['post_permalink'])
					&& $setting->value['post_permalink'] != $original['value']['post_permalink']
				)
				|| (
					is_array($original['value'])
					&& !isset($original['value']['post_permalink_ext'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['post_permalink_ext'])
					&& $setting->value['post_permalink_ext'] != $original['value']['post_permalink_ext']
				)
				|| (
					is_array($original['value'])
					&& !isset($original['value']['multi_countries_urls'])
				)
				|| (
					is_array($original['value'])
					&& isset($original['value']['multi_countries_urls'])
					&& $setting->value['multi_countries_urls'] != $original['value']['multi_countries_urls']
				)
			) {
				$canBeRegenerated = true;
			}
		}
		
		return $canBeRegenerated;
	}
	
	/**
	 * Regenerate the "config/routes.php" file
	 *
	 * @param null $setting
	 * @return bool
	 */
	private function regenerateDynamicRoutes($setting = null)
	{
		$doneSuccessfully = true;
		
		try {
			// Update in live the config vars related the Settings below before saving them.
			if (isset($setting->value)) {
				if (array_key_exists('post_permalink', $setting->value)) {
					config()->set('settings.seo.post_permalink', $setting->value['post_permalink']);
				}
				if (array_key_exists('post_permalink_ext', $setting->value)) {
					config()->set('settings.seo.post_permalink_ext', $setting->value['post_permalink_ext']);
				}
				if (array_key_exists('multi_countries_urls', $setting->value)) {
					// Check the Domain Mapping plugin
					if (config('plugins.domainmapping.installed')) {
						config()->set('settings.seo.multi_countries_urls', false);
					} else {
						config()->set('settings.seo.multi_countries_urls', $setting->value['multi_countries_urls']);
					}
				}
			}
			
			// Get current values of "config/larapen/routes.php" (Original version)
			$origRoutes = $this->getFileContent(config_path('larapen/routes.php'));
			
			// Create or Update the "config/routes.php" file
			$filePath = config_path('routes.php');
			$this->writeFile($filePath, $origRoutes);
		} catch (\Exception $e) {
			Alert::error($e->getMessage())->flash();
			$doneSuccessfully = false;
		}
		
		return $doneSuccessfully;
	}
	
	/**
	 * Get the content in the given file path.
	 *
	 * @param $filePath
	 * @return array
	 */
	private function getFileContent($filePath)
	{
		if (!File::exists($filePath)) {
			return [];
		}
		
		try {
			return (array)include $filePath;
		} catch (\ErrorException $e) {
			dd('File not found: ' . $filePath);
		}
	}
	
	/**
	 * Write a config/language file from array.
	 *
	 * @param $filePath
	 * @param array $translations
	 */
	private function writeFile($filePath, array $translations)
	{
		if (!File::exists($directory = dirname($filePath))) {
			mkdir($directory, 0777, true);
		}
		
		$content = "<?php \n\nreturn [";
		
		if (!empty($translations)) {
			$content .= $this->stringLineMaker($translations);
			$content .= "\n";
		}
		
		$content .= "];\n";
		
		File::put($filePath, $content);
	}
	
	/**
	 * Write the lines of the inner array of the config/language file.
	 *
	 * @param $array
	 * @param string $prepend
	 * @return string
	 */
	private function stringLineMaker($array, $prepend = '')
	{
		$output = '';
		
		foreach ($array as $key => $value) {
			$key = str_replace('\"', '"', addslashes($key));
			
			if (is_array($value)) {
				$value = $this->stringLineMaker($value, $prepend . '    ');
				
				$output .= "\n{$prepend}    '{$key}' => [{$value}\n{$prepend}    ],";
			} else {
				$value = str_replace('\"', '"', addslashes($value));
				
				$output .= "\n{$prepend}    '{$key}' => '{$value}',";
			}
		}
		
		return $output;
	}
}
