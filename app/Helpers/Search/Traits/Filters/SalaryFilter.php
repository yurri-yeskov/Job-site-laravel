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

namespace App\Helpers\Search\Traits\Filters;

trait SalaryFilter
{
	protected function applySalaryFilter()
	{
		if (!isset($this->having)) {
			return;
		}
		
		$minSalary = null;
		if (request()->filled('minSalary') && is_numeric(request()->get('minSalary'))) {
			$minSalary = request()->get('minSalary');
		}
		
		$maxSalary = null;
		if (request()->filled('maxSalary') && is_numeric(request()->get('maxSalary'))) {
			$maxSalary = request()->get('maxSalary');
		}
		
		if (!empty($minSalary) && !empty($maxSalary)) {
			if ($maxSalary > $minSalary) {
				$this->having[] = 'salary_min >= ' . $minSalary;
				$this->having[] = 'salary_max <= ' . $maxSalary;
			}
		} else {
			if (!empty($minSalary)) {
				$this->having[] = 'salary_min >= ' . $minSalary;
			}
			
			if (!empty($maxSalary)) {
				$this->having[] = 'salary_max <= ' . $maxSalary;
			}
		}
	}
}
