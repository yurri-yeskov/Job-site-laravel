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

class EducationLevelController extends FrontController
{
	public function index()
	{
		$list = DB::table('education_levels')->get();
		return view('vendor.admin.pages.educationLevel.list', compact('list'));
	}
	public function create()
	{
		return view('vendor.admin.pages.educationLevel.create');
	}
	function updateChache()
	{
		$cacheId = 'educationLevels.all.' . config('app.locale');
		Cache::pull($cacheId);
		$educationLevels = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('education_levels')->get();
		});
		view()->share('educationLevels', $educationLevels);
	}
	//insert new
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			$values = array('name' =>  json_encode(array('en' => $request->name)));
			DB::table('education_levels')->insert($values);
			$this->updateChache();
			return redirect(route('employerSetting'))->with('success', 'New education level added successfully.');
		}

		return Redirect::back()->withErrors($validator->errors()->all());
	}
	// edit
	public function edit(Request $request)
	{
		// dd($request->id);
		$edcuationlevel = DB::table('education_levels')->where('id', $request->id)->first();
		return view('vendor.admin.pages.educationLevel.edit', compact('edcuationlevel'));
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);
		if ($validator->passes()) {
			DB::table('education_levels')->where('id', $request->id)->update([
				'name' => json_encode(array('en' => $request->name))
			]);

			// update chache
			$this->updateChache();
			// end...

			return redirect(route('employerSetting'))->with('success', 'Education level updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all());
	}

	public function delete(Request $request)
	{
		DB::table('education_levels')->where('id', $request->id)->delete();

		// update chache
		$this->updateChache();
		// end...

		return redirect(route('employerSetting'))->with('success', 'Education level deleted successfully.');
	}
}
