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

use App\Helpers\Files\Storage\StorageDisk;
use App\Models\Category;
use Illuminate\Support\Str;

trait StyleTrait
{
	/**
	 * Updating
	 *
	 * @param $setting
	 * @param $original
	 */
	public function styleUpdating($setting, $original)
	{
		// Storage Disk Init.
		$disk = StorageDisk::getDisk();
		
		$this->removeOldBodyBackgroundImage($setting, $original, $disk);
	}
	
	/**
	 * Saved
	 *
	 * @param $setting
	 */
	public function styleSaved($setting)
	{
		$this->updateCategoriesPicturesPaths($setting);
	}
	
	/**
	 * Remove old body_background_image from disk
	 *
	 * @param $setting
	 * @param $original
	 * @param $disk
	 */
	private function removeOldBodyBackgroundImage($setting, $original, $disk)
	{
		if (array_key_exists('body_background_image', $setting->value)) {
			if (
				is_array($original['value'])
				&& isset($original['value']['body_background_image'])
				&& $setting->value['body_background_image'] != $original['value']['body_background_image']
				&& $disk->exists($original['value']['body_background_image'])
			) {
				$disk->delete($original['value']['body_background_image']);
			}
		}
	}
	
	/**
	 * @param $setting
	 */
	private function updateCategoriesPicturesPaths($setting)
	{
		// If the Default Front Skin is changed, then update its assets paths (like categories pictures, etc.)
		if (isset($setting->value['app_skin']) && !empty($setting->value['app_skin'])) {
			$categories = Category::where(function ($query) {
				$query->where('parent_id', 0)->orWhereNull('parent_id');
			})->get();
			if ($categories->count() > 0) {
				foreach ($categories as $category) {
					$canSave = false;
					
					// If the Category contains a skinnable icon,
					// Change it by the selected skin icon.
					if (Str::contains($category->picture, 'app/categories/skin-')) {
						$pattern = '/app\/categories\/skin-[^\/]+\//ui';
						$replacement = 'app/categories/' . $setting->value['app_skin'] . '/';
						$picture = preg_replace($pattern, $replacement, $category->picture);
						if (!empty($picture)) {
							$category->picture = $picture;
							$canSave = true;
						}
					}
					
					// (Optional)
					// If the Category contains a skinnable default icon,
					// Change it by the selected skin default icon.
					if (Str::contains($category->picture, 'app/default/categories/fa-folder-')) {
						$pattern = '/app\/default\/categories\/fa-folder-[^\.]+\./ui';
						$replacement = 'app/default/categories/fa-folder-' . $setting->value['app_skin'] . '.';
						$picture = preg_replace($pattern, $replacement, $category->picture);
						if (!empty($picture)) {
							$category->picture = $picture;
							$canSave = true;
						}
					}
					
					if ($canSave) {
						$category->save();
					}
				}
			}
		}
	}
}
