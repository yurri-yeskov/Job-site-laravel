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

namespace App\Models\HomeSection;

class GetCategories
{
	public static function getValues($value)
	{
		if (empty($value)) {
			
			$value['type_of_display'] = 'c_check_list';
			$value['show_icon'] = '0';
			$value['max_sub_cats'] = '3';
			
		} else {
			
			if (!isset($value['type_of_display'])) {
				$value['type_of_display'] = 'c_check_list';
			}
			if (!isset($value['show_icon'])) {
				$value['show_icon'] = '0';
			}
			if (!isset($value['max_sub_cats'])) {
				$value['max_sub_cats'] = '3';
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
				'name'              => 'type_of_display',
				'label'             => trans('admin.Type of display'),
				'type'              => 'select2_from_array',
				'options'           => [
					'c_normal_list'    => 'Normal List',
					'c_circle_list'    => 'Circle List',
					'c_check_list'     => 'Check List',
					'c_border_list'    => 'Border List',
					'c_picture_icon'   => 'Picture as Icon',
					'cc_normal_list'   => 'Normal List CC',
					'cc_normal_list_s' => 'Normal List Styled CC',
				],
				'allows_null'       => false,
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'max_items',
				'label'             => trans('admin.max_categories_label'),
				'type'              => 'number',
				'hint'              => trans('admin.max_categories_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'show_icon',
				'label'             => trans('admin.Show the categories icons'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.NOTE: This will be applied for all of "Types of display", except "Picture as Icon".'),
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
				'name'              => 'max_sub_cats',
				'label'             => trans('admin.Max subcategories displayed by default'),
				'type'              => 'number',
				'hint'              => trans('admin.NOTE: This will be applied for only the "Categories + Children" type of display.'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'cache_expiration',
				'label'             => trans('admin.Cache Expiration Time for this section'),
				'type'              => 'number',
				'attributes'        => [
					'placeholder' => '0',
				],
				'hint'              => trans('admin.home_cache_expiration_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'  => 'separator_last',
				'type'  => 'custom_html',
				'value' => '<hr>',
			],
			[
				'name'  => 'hide_on_mobile',
				'label' => trans('admin.hide_on_mobile_label'),
				'type'  => 'checkbox',
				'hint'  => trans('admin.hide_on_mobile_hint'),
			],
			[
				'name'  => 'active',
				'label' => trans('admin.Active'),
				'type'  => 'checkbox',
			],
		];
		
		return $fields;
	}
}
