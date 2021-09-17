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

class SecuritySetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['login_open_in_modal'] = '1';
			$value['login_max_attempts'] = '5';
			$value['login_decay_minutes'] = '15';
			
		} else {
			
			if (!isset($value['login_open_in_modal'])) {
				$value['login_open_in_modal'] = '1';
			}
			if (!isset($value['login_max_attempts'])) {
				$value['login_max_attempts'] = '5';
			}
			if (!isset($value['login_decay_minutes'])) {
				$value['login_decay_minutes'] = '15';
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
				'name'  => 'csrf_protection_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.csrf_protection_title'),
			],
			[
				'name'  => 'csrf_protection',
				'label' => trans('admin.csrf_protection_label'),
				'type'  => 'checkbox',
				'hint'  => trans('admin.csrf_protection_hint'),
			],
			
			[
				'name'  => 'login_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.login_sep_value'),
			],
			[
				'name'  => 'login_open_in_modal',
				'label' => trans('admin.Open In Modal'),
				'type'  => 'checkbox',
				'hint'  => trans('admin.Open the top login link into Modal'),
			],
			[
				'name'              => 'login_max_attempts',
				'label'             => trans('admin.Max Attempts'),
				'type'              => 'select2_from_array',
				'options'           => [
					30 => '30',
					20 => '20',
					10 => '10',
					5  => '5',
					4  => '4',
					3  => '3',
					2  => '2',
					1  => '1',
				],
				'hint'              => trans('admin.The maximum number of attempts to allow'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'login_decay_minutes',
				'label'             => trans('admin.Decay Minutes'),
				'type'              => 'select2_from_array',
				'options'           => [
					1440 => '1440',
					720  => '720',
					60   => '60',
					30   => '30',
					20   => '20',
					15   => '15',
					10   => '10',
					5    => '5',
					4    => '4',
					3    => '3',
					2    => '2',
					1    => '1',
				],
				'hint'              => trans('admin.The number of minutes to throttle for'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			
			[
				'name'  => 'captcha_title',
				'type'  => 'custom_html',
				'value' => trans('admin.captcha_title'),
			],
			[
				'name'              => 'captcha',
				'label'             => trans('admin.captcha_label'),
				'type'              => 'select2_from_array',
				'options'           => [
					''        => 'Disabled',
					'default' => 'Default',
					'math'    => 'Math',
					'flat'    => 'Flat',
					'mini'    => 'Mini',
					'inverse' => 'Inverse',
					'custom'  => 'Custom',
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
				'hint'              => trans('admin.captcha_hint'),
			],
			[
				'name'              => 'captcha_delay',
				'label'             => trans('admin.captcha_delay_label'),
				'type'              => 'select2_from_array',
				'options'           => [
					600  => '600ms',
					700  => '700ms',
					800  => '800ms',
					900  => '900ms',
					1000 => '1000ms',
					1100 => '1100ms',
					1200 => '1200ms',
					1300 => '1300ms',
					1400 => '1400ms',
					1500 => '1500ms',
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
				'hint'              => trans('admin.captcha_delay_hint'),
			],
			[
				'name'  => 'captcha_custom',
				'type'  => 'custom_html',
				'value' => trans('admin.captcha_custom'),
			],
			[
				'name'  => 'captcha_custom_info',
				'type'  => 'custom_html',
				'value' => trans('admin.captcha_custom_info'),
			],
			[
				'name'              => 'captcha_width',
				'label'             => trans('admin.captcha_width_label', ['max' => 300]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 100,
					'max'  => 300,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_height',
				'label'             => trans('admin.captcha_height_label', ['max' => 150]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 30,
					'max'  => 150,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_length',
				'label'             => trans('admin.captcha_length_label', ['max' => 8]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 3,
					'max'  => 8,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_quality',
				'label'             => trans('admin.captcha_quality_label', ['max' => 100]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_bgImage',
				'label'             => trans('admin.captcha_bgImage_label'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-12',
				],
				'hint'              => trans('admin.captcha_bgImage_hint'),
			],
			[
				'name'                => 'captcha_bgColor',
				'label'               => trans('admin.captcha_bgColor_label'),
				'type'                => 'color_picker',
				'colorpicker_options' => [
					'customClass' => 'custom-class',
				],
				'attributes'          => [
					'placeholder' => '',
				],
				'wrapperAttributes'   => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'captcha_lines',
				'label'             => trans('admin.captcha_lines_label', ['max' => 20]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_angle',
				'label'             => trans('admin.captcha_angle_label', ['max' => 180]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 0,
					'max'  => 180,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_sharpen',
				'label'             => trans('admin.captcha_sharpen_label', ['max' => 20]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_blur',
				'label'             => trans('admin.captcha_blur_label', ['max' => 20]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 0,
					'max'  => 20,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_contrast',
				'label'             => trans('admin.captcha_contrast_label', ['max' => 50]),
				'type'              => 'number',
				'attributes'        => [
					'min'  => -50,
					'max'  => 50,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_expire',
				'label'             => trans('admin.captcha_expire_label'),
				'type'              => 'number',
				'attributes'        => [
					'min'  => 0,
					'step' => 1,
				],
				'wrapperAttributes' => [
					'class' => 'form-group col-md-3',
				],
			],
			[
				'name'              => 'captcha_math',
				'label'             => trans('admin.captcha_math_label'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
				'hint'              => trans('admin.captcha_math_hint'),
			],
			[
				'name'              => 'captcha_encrypt',
				'label'             => trans('admin.captcha_encrypt_label'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
				'hint'              => trans('admin.captcha_encrypt_hint'),
			],
			[
				'name'              => 'captcha_sensitive',
				'label'             => trans('admin.captcha_sensitive_label'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
				'hint'              => trans('admin.captcha_sensitive_hint'),
			],
			[
				'name'              => 'captcha_invert',
				'label'             => trans('admin.captcha_invert_label'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
				'hint'              => trans('admin.captcha_invert_hint'),
			],
		];
		
		return $fields;
	}
}
