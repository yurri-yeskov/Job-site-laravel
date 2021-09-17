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

namespace App\Http\Controllers\Web\company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Web\FrontController;

class CompanyController extends FrontController
{
	public function __construct()
	{
		// parent::__construct();

		$this->middleware(function ($request, $next) {
			if (Auth::user()) {
				return $next($request);
			}
			return redirect('/');
		});
		// get languages list
		$cacheId = 'languagesList.all.' . config('app.locale');
		$languagesList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('languages')->orderBy('lft')->get();
		});
		view()->share('languagesList', $languagesList);

		// get catagory ...
		$cacheId = 'categoriesTypes.all.' . config('app.locale');
		$categoriesTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('categories')->orderBy('lft')->get();
		});
		view()->share('categoriesTypes', $categoriesTypes);

		// get skills ...
		$cacheId = 'SkillsTypes.all.' . config('app.locale');
		$SkillsTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('job_skills')->orderBy('id')->get();
		});
		view()->share('SkillsTypes', $SkillsTypes);
	}

	public function index()
	{
		return appView('account.companydashboard');
	}

	public function viewSearchWorker()
	{
		$workers = User::where('user_type_id', 2)->orderBy('id', 'DESC')->get();
		return appView('employer.search-and-find-workers.findworkers',compact('workers'));
	}

	// list applicants
	public function listApplicants()
	{
		return appView('employer.search-and-find-workers.applicantsList');
	}

	// resume alert
	public function listResumeAlert()
	{
		return appView('employer.resume.resumeAlert');
	}
}
