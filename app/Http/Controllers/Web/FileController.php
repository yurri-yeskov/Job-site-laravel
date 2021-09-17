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

use App\Helpers\Files\Response\FileContentResponseCreator;
use App\Helpers\Files\Storage\StorageDisk;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
	protected $disk;
	
	/**
	 * FileController constructor.
	 */
	public function __construct()
	{
		$this->disk = StorageDisk::getDisk();
	}
	
	/**
	 * @param FileContentResponseCreator $response
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\StreamedResponse|void
	 */
	public function show(FileContentResponseCreator $response)
	{
		$filePath = request()->get('path');
		$filePath = preg_replace('|\?.*|ui', '', $filePath);
		
		$out = $response::create($this->disk, $filePath);
		
		ob_end_clean(); // HERE IS THE MAGIC
		
		return $out;
	}
	
	/**
	 * Translation of the bootstrap-fileinput plugin
	 *
	 * @param string $code
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	public function fileInputLocales($code = 'en')
	{
		$fileInputArray = trans('fileinput', [], $code);
		if (is_array($fileInputArray) && !empty($fileInputArray)) {
			if (config('settings.optimization.minify_html_activation') == 1) {
				$fileInputJson = json_encode($fileInputArray, JSON_UNESCAPED_UNICODE);
			} else {
				$fileInputJson = json_encode($fileInputArray, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
			}
			
			if (!empty($fileInputJson)) {
				// $fileInputJson = str_replace('<\/', '</', $fileInputJson);
				$out = '';
				$out .= '(function ($) {' . "\n";
				$out .= '"use strict";' . "\n\n";
				$out .= "$.fn.fileinputLocales['$code'] = ";
				$out .= $fileInputJson . ';' . "\n";
				$out .= '})(window.jQuery);' . "\n";
				
				return response($out)->header('Content-Type', 'application/javascript');
			}
		}
		
		$filePath = public_path('assets/plugins/bootstrap-fileinput/js/locales/' . ietfLangTag(config('app.locale')) . '.js');
		if (file_exists($filePath)) {
			$out = file_get_contents($filePath);
			
			return response($out)->header('Content-Type', 'application/javascript');
		}
	}
}
