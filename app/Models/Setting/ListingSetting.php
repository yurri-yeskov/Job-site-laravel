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

use App\Helpers\DBTool;

class ListingSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['items_per_page'] = '12';
			$value['cities_extended_searches'] = '1';
			if (DBTool::isMySqlMinVersion('5.7.6') && !DBTool::isMariaDB()) {
				$value['distance_calculation_formula'] = 'ST_Distance_Sphere';
			} else {
				$value['distance_calculation_formula'] = 'haversine';
			}
			$value['search_distance_max'] = '500';
			$value['search_distance_default'] = '50';
			$value['search_distance_interval'] = '100';
			
		} else {
			
			if (!isset($value['items_per_page'])) {
				$value['items_per_page'] = '12';
			}
			if (!isset($value['cities_extended_searches'])) {
				$value['cities_extended_searches'] = '1';
			}
			if (!isset($value['distance_calculation_formula'])) {
				if (DBTool::isMySqlMinVersion('5.7.6') && !DBTool::isMariaDB()) {
					$value['distance_calculation_formula'] = 'ST_Distance_Sphere';
				} else {
					$value['distance_calculation_formula'] = 'haversine';
				}
			}
			if (!isset($value['search_distance_max'])) {
				$value['search_distance_max'] = '500';
			}
			if (!isset($value['search_distance_default'])) {
				$value['search_distance_default'] = '50';
			}
			if (!isset($value['search_distance_interval'])) {
				$value['search_distance_interval'] = '100';
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
				'name'  => 'separator_1',
				'type'  => 'custom_html',
				'value' => trans('admin.listing_html_displaying'),
			],
			[
				'name'              => 'items_per_page',
				'label'             => trans('admin.Items per page'),
				'type'              => 'number',
				'hint'              => trans('admin.Number of items per page'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'fake_locations_results',
				'label'             => trans('admin.fake_locations_results_label'),
				'type'              => 'select2_from_array',
				'options'           => [
					0 => trans('admin.fake_locations_results_op_1'),
					1 => trans('admin.fake_locations_results_op_2'),
					2 => trans('admin.fake_locations_results_op_3'),
				],
				'hint'              => trans('admin.fake_locations_results_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			
			[
				'name'  => 'count_posts_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.count_posts_title'),
			],
			[
				'name'              => 'count_categories_posts',
				'label'             => trans('admin.count_categories_posts_label'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.count_categories_posts_hint', ['extendedSearches' => trans('admin.cities_extended_searches_label')]),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'count_cities_posts',
				'label'             => trans('admin.count_cities_posts_label'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.count_cities_posts_hint', ['extendedSearches' => trans('admin.cities_extended_searches_label')]),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			
			[
				'name'  => 'dates_sep',
				'type'  => 'custom_html',
				'value' => trans('admin.dates_title'),
			],
			[
				'name'  => 'php_specific_date_format',
				'type'  => 'custom_html',
				'value' => trans('admin.php_specific_date_format_info'),
			],
			[
				'name'              => 'elapsed_time_from_now',
				'label'             => trans('admin.elapsed_time_from_now_label'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.listing_elapsed_time_from_now_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
					'style' => 'margin-top: 20px;',
				],
			],
			[
				'name'              => 'hide_dates',
				'label'             => trans('admin.hide_dates_label'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.listing_hide_dates_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
					'style' => 'margin-top: 20px;',
				],
			],
			
			[
				'name'  => 'separator_2',
				'type'  => 'custom_html',
				'value' => trans('admin.listing_html_distance'),
			],
			[
				'name'              => 'cities_extended_searches',
				'label'             => trans('admin.cities_extended_searches_label'),
				'type'              => 'checkbox',
				'hint'              => trans('admin.cities_extended_searches_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-12',
				],
			],
			[
				'name'              => 'distance_calculation_formula',
				'label'             => trans('admin.distance_calculation_formula_label'),
				'type'              => 'select2_from_array',
				'options'           => self::distanceCalculationFormula(),
				'hint'              => trans('admin.distance_calculation_formula_hint'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'search_distance_default',
				'label'             => trans('admin.Default Search Distance'),
				'type'              => 'select2_from_array',
				'options'           => [
					200 => '200',
					100 => '100',
					50  => '50',
					25  => '25',
					20  => '20',
					10  => '10',
					0   => '0',
				],
				'hint'              => trans('admin.Default search radius distance'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'  => 'separator_3',
				'type'  => 'custom_html',
				'value' => '<div style="clear: both;"></div>',
			],
			[
				'name'              => 'search_distance_max',
				'label'             => trans('admin.Max Search Distance'),
				'type'              => 'select2_from_array',
				'options'           => [
					1000 => '1000',
					900  => '900',
					800  => '800',
					700  => '700',
					600  => '600',
					500  => '500',
					400  => '400',
					300  => '300',
					200  => '200',
					100  => '100',
					50   => '50',
					0    => '0',
				],
				'hint'              => trans('admin.Max search radius distance'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
			[
				'name'              => 'search_distance_interval',
				'label'             => trans('admin.Distance Interval'),
				'type'              => 'select2_from_array',
				'options'           => [
					250 => '250',
					200 => '200',
					100 => '100',
					50  => '50',
					25  => '25',
					20  => '20',
					10  => '10',
					5   => '5',
				],
				'hint'              => trans('admin.The interval between filter distances'),
				'wrapperAttributes' => [
					'class' => 'form-group col-md-6',
				],
			],
		];
		
		return $fields;
	}
	
	/**
	 * @return array
	 */
	private static function distanceCalculationFormula()
	{
		$array = [
			'haversine'  => trans('admin.haversine_formula'),
			'orthodromy' => trans('admin.orthodromy_formula'),
		];
		if (DBTool::isMySqlMinVersion('5.7.6') && !DBTool::isMariaDB()) {
			$array['ST_Distance_Sphere'] = trans('admin.mysql_spherical_calculation');
		}
		
		return $array;
	}
}
