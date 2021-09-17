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

namespace App\Models\Setting;

class GeoLocationSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['country_flag_activation'] = '1';
			
		} else {
			
			if (!isset($value['country_flag_activation'])) {
				$value['country_flag_activation'] = '1';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
	
	public static function getFields($diskName)
	{
		$fields = [
			[
				'name'              => 'geolocation_activation',
				'label'             => trans('admin.Enable Geolocation'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.enable_geolocation_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
					'style' => 'margin-top: 20px;',
				],
			],
			[
				'name'              => 'default_country_code',
				'label'             => trans('admin.Default Country'),
				'type'              => 'select2',
				'attribute'         => 'name',
				'model'             => '\\App\\Models\\Country',
				'allows_null'       => 'true',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'  => 'separator_clear_1',
				'type'  => 'custom_html',
				'value' => '<div style="clear: both;"></div>',
			],
			[
				'name'              => 'country_flag_activation',
				'label'             => trans('admin.Show country flag on top'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.<br>'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'local_currency_packages_activation',
				'label'             => trans('admin.Allow users to pay the Packages in their country currency'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.package_currency_by_country_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
		];
		
		return $fields;
	}
}
