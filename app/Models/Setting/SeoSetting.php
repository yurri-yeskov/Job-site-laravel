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

class SeoSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['robots_txt'] = getDefaultRobotsTxtContent();
			$value['robots_txt_sm_indexes'] = '1';
			$value['multi_countries_urls'] = config('larapen.core.multiCountriesUrls');
			
		} else {
			
			if (!isset($value['robots_txt'])) {
				$value['robots_txt'] = getDefaultRobotsTxtContent();
			}
			if (!isset($value['robots_txt_sm_indexes'])) {
				$value['robots_txt_sm_indexes'] = '1';
			}
			if (!isset($value['multi_countries_urls'])) {
				$value['multi_countries_urls'] = config('larapen.core.multiCountriesUrls');
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
				'name'  => 'verification_tools_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.verification_tools_sep_value'),
			],
			[
				'name'              => 'google_site_verification',
				'label'             => trans('admin.google_site_verification_label'),
				'type'              => 'text',
				'hint'              => trans('admin.seo_site_verification_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'alexa_verify_id',
				'label'             => trans('admin.alexa_verify_id_label'),
				'type'              => 'text',
				'hint'              => trans('admin.seo_site_verification_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'msvalidate',
				'label'             => trans('admin.msvalidate_label'),
				'type'              => 'text',
				'hint'              => trans('admin.seo_site_verification_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'yandex_verification',
				'label'             => trans('admin.yandex_verification_label'),
				'type'              => 'text',
				'hint'              => trans('admin.seo_site_verification_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'twitter_username',
				'label'             => trans('admin.twitter_username_label'),
				'type'              => 'text',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'  => 'robots_txt_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.robots_txt_sep_value'),
			],
			[
				'name'         => 'robots_txt_info',
				'type'         => 'custom_html',
				'value'        => trans('admin.robots_txt_info_value', ['domain' => url('/')]),
				'disableTrans' => 'true',
			],
			[
				'name'       => 'robots_txt',
				'label'      => trans('admin.robots_txt_label'),
				'type'       => 'textarea',
				'attributes' => [
					'rows' => '5',
				],
				'hint'       => trans('admin.robots_txt_hint'),
			],
			[
				'name'              => 'robots_txt_sm_indexes',
				'label'             => trans('admin.robots_txt_sm_indexes_label'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.robots_txt_sm_indexes_hint', ['indexes' => getSitemapsIndexes(true)]),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-12',
				],
			],
			[
				'name'  => 'separator_2',
				'type'  => 'custom_html',
				'value' => trans('admin.seo_html_indexing'),
			],
			[
				'name'              => 'no_index_categories',
				'label'             => trans('admin.No Index Categories Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'no_index_tags',
				'label'             => trans('admin.No Index Tags Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'no_index_cities',
				'label'             => trans('admin.No Index Cities Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'no_index_users',
				'label'             => trans('admin.No Index Users Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'no_index_companies',
				'label'             => trans('admin.No Index Companies Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'no_index_post_report',
				'label'             => trans('admin.No Index Post Report Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'no_index_all',
				'label'             => trans('admin.No Index All Pages'),
				'type'              => 'checkbox',
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			
			[
				'name'  => 'seo_permalink_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.seo_permalink_title'),
			],
			[
				'name'  => 'seo_permalink_warning_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.seo_permalink_warning'),
			],
			[
				'name'              => 'post_permalink',
				'label'             => trans('admin.post_permalink_label'),
				'type'              => 'select2_from_array',
				'options'           => self::getPermalinks('post'),
				'hint'              => trans('admin.post_permalink_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'post_permalink_ext',
				'label'             => trans('admin.permalink_ext_label'),
				'type'              => 'select2_from_array',
				'options'           => self::getPermalinkExt(),
				'hint'              => trans('admin.permalink_ext_hint') . '<br>' . trans('admin.post_permalink_ext_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			
			[
				'name'  => 'separator_4',
				'type'  => 'custom_html',
				'value' => trans('admin.seo_html_multi_countries_urls'),
			],
			[
				'name'  => 'separator_4_1',
				'type'  => 'custom_html',
				'value' => trans('admin.multi_countries_urls_optimization_warning'),
			],
			[
				'name'  => 'multi_countries_urls',
				'label' => trans('admin.Enable The Multi-countries URLs Optimization'),
				'type'  => 'checkbox',
				'hint'  => trans('admin.multi_countries_urls_optimization_hint'),
			],
			[
				'name'  => 'separator_4_2',
				'type'  => 'custom_html',
				'value' => trans('admin.multi_countries_urls_optimization_info'),
			],
		];
		
		return $fields;
	}
	
	/**
	 * @param string $key
	 * @return array
	 */
	private static function getPermalinks(string $key)
	{
		$permalinks = config('larapen.core.permalink.' . $key);
		$permalinks = collect($permalinks)->mapWithKeys(function ($value, $key) {
			return [$value => $value];
		})->toArray();
		
		return $permalinks;
	}
	
	/**
	 * @return array
	 */
	private static function getPermalinkExt()
	{
		$permalinks = config('larapen.core.permalinkExt');
		$permalinks = collect($permalinks)->mapWithKeys(function ($value, $key) {
			return [$value => (!empty($value)) ? $value : '&nbsp;'];
		})->toArray();
		
		return $permalinks;
	}
}
