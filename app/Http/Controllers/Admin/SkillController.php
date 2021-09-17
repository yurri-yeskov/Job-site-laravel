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
use App\Models\TeamSize;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Web\FrontController;
use Redirect;

class SkillController extends FrontController
{
	function __construct()
	{
	}
	public function index()
	{
		$list = DB::table('job_skills')->get();
		return view('vendor.admin.pages.skill.list', compact('list'));
	}
	public function create()
	{
		return view('vendor.admin.pages.skill.create');
	}
	//insert new
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			$values = array('name' =>  json_encode(array('en' => $request->name)));
			DB::table('job_skills')->insert($values);
			// get skills ...
			$this->updateChahce();
			//..end
			return redirect(route('employerSetting'))->with('success', 'New skill added successfully.');
		}

		return Redirect::back()->withErrors($validator->errors()->all());
	}
	// edit
	public function edit(Request $request)
	{
		// dd($request->id);
		$skill = DB::table('job_skills')->where('id', $request->id)->first();
		return view('vendor.admin.pages.skill.edit', compact('skill'));
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);
		if ($validator->passes()) {
			DB::table('job_skills')->where('id', $request->id)->update([
				'name' => json_encode(array('en' => $request->name))
			]);

			// get skills ...
			$this->updateChahce();
			//..end

			return redirect(route('employerSetting'))->with('success', 'Skill updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all());
	}

	function updateChahce()
	{
		// get skills ...
		$cacheId = 'SkillsTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$SkillsTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('job_skills')->orderBy('id')->get();
		});
		// dd($SkillsTypes);
		view()->share('SkillsTypes', $SkillsTypes);
		return null;
		//..end
	}
	public function delete(Request $request)
	{
		DB::table('job_skills')->where('id', $request->id)->delete();
		$this->updateChahce();
		return redirect(route('employerSetting'))->with('success', 'Skill deleted successfully.');
	}
}
