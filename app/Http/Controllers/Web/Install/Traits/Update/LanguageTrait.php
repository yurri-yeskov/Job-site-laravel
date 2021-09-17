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

use App\Helpers\Lang\LangManager;
use App\Models\Language;

trait LanguageTrait
{
	/**
	 * (Try to) Fill the missing lines in all languages files
	 */
	private function syncLanguageFilesLines()
	{
		// Get the current Default Language
		$defaultLang = Language::where('default', 1)->first();
		if (empty($defaultLang)) {
			return;
		}
		
		// Init. the language manager
		$manager = new LangManager();
		
		// SYNC. THE LANGUAGES FILES LINES
		// Get all the others languages (from DB)
		$languages = Language::where('abbr', '!=', $defaultLang->abbr)->get();
		if ($languages->count() > 0) {
			foreach ($languages as $language) {
				$manager->syncLines($defaultLang->abbr, $language->abbr);
			}
		}
	}
}
