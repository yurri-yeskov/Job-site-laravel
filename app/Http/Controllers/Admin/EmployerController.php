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

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Web\FrontController;
use Redirect;

class EmployerController extends FrontController
{
	public function index()
	{
		$teamSizeList = DB::table('team_size')->orderBy('id','desc')->get();
		$Educationlist = DB::table('education_levels')->orderBy('id','desc')->get();
		$skilllist = DB::table('job_skills')->orderBy('id','desc')->get();
		$Experiencelist =  DB::table('experience')->orderBy('id','desc')->get();
		$Specilitieslist =  DB::table('specialities')->orderBy('id','desc')->get();
		$salarylist = DB::table('max_salary')
			->join('min_salary', 'min_salary.id', '=', 'max_salary.id')
			->select('max_salary.*', 'min_salary.id as min_id', 'min_salary.name as min_name')
			->get();

		return view('vendor.admin.pages.employerSetting.index', compact('skilllist', 'teamSizeList', 'Educationlist', 'Experiencelist', 'salarylist', 'Specilitieslist'));
	}
}
