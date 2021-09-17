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

namespace App\Http\Controllers\Api\HomeSection;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

trait SectionSettingTrait
{
	/**
	 * @param array $value
	 * @return array
	 */
	protected function getSearchFormSettings($value = [])
	{
		// Load Country's Background Image
		if (!empty(config('country.background_image'))) {
			if (isset($this->disk) && $this->disk->exists(config('country.background_image'))) {
				$value['background_image'] = config('country.background_image');
			}
		}
		
		// Title: Count Posts & Users
		if (isset($value['title_' . config('app.locale')]) && !empty($value['title_' . config('app.locale')])) {
			$title = $value['title_' . config('app.locale')];
			$title = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $title);
			if (Str::contains($title, '{count_ads}')) {
				try {
					$countPosts = Post::currentCountry()->unarchived()->count();
				} catch (\Exception $e) {
					$countPosts = 0;
				}
				$title = str_replace('{count_ads}', $countPosts, $title);
			}
			if (Str::contains($title, '{count_users}')) {
				try {
					$countUsers = User::query()->count();
				} catch (\Exception $e) {
					$countUsers = 0;
				}
				$title = str_replace('{count_users}', $countUsers, $title);
			}
			$value['title_' . config('app.locale')] = $title;
		}
		
		// SubTitle: Count Posts & Users
		if (isset($value['sub_title_' . config('app.locale')]) && !empty($value['sub_title_' . config('app.locale')])) {
			$subTitle = $value['sub_title_' . config('app.locale')];
			$subTitle = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $subTitle);
			if (Str::contains($subTitle, '{count_ads}')) {
				try {
					$countPosts = Post::currentCountry()->unarchived()->count();
				} catch (\Exception $e) {
					$countPosts = 0;
				}
				$subTitle = str_replace('{count_ads}', $countPosts, $subTitle);
			}
			if (Str::contains($subTitle, '{count_users}')) {
				try {
					$countUsers = User::query()->count();
				} catch (\Exception $e) {
					$countUsers = 0;
				}
				$subTitle = str_replace('{count_users}', $countUsers, $subTitle);
			}
			$value['sub_title_' . config('app.locale')] = $subTitle;
		}
		
		return $value;
	}
}
