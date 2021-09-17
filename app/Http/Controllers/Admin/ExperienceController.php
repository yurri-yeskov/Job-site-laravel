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

class ExperienceController extends FrontController
{
	public function index()
	{
		$list = DB::table('experience')->get();
		return view('vendor.admin.pages.experience.list', compact('list'));
	}
	public function create()
	{
		return view('vendor.admin.pages.experience.create');
	}
	//insert new
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			$values = array('name' =>  json_encode(array('en' => $request->name)));
			DB::table('experience')->insert($values);
			// get experience list
			$cacheId = 'experienceList.all.' . config('app.locale');
			Cache::pull($cacheId);
			$experienceList = Cache::remember($cacheId, $this->cacheExpiration, function () {
				return  DB::table('experience')->orderBy('id')->get();
			});
			view()->share('experienceList', $experienceList);

			return redirect(route('employerSetting'))->with('success', 'New experience type added successfully.');
		}

		return Redirect::back()->withErrors($validator->errors()->all());
	}
	// edit
	public function edit(Request $request)
	{
		// dd($request->id);
		$experience = DB::table('experience')->where('id', $request->id)->first();
		return view('vendor.admin.pages.experience.edit', compact('experience'));
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);
		if ($validator->passes()) {
			DB::table('experience')->where('id', $request->id)->update([
				'name' => json_encode(array('en' => $request->name))
			]);

			// update chache
			$cacheId = 'experienceList.all.' . config('app.locale');
			Cache::pull($cacheId);
			$experienceList = Cache::remember($cacheId, $this->cacheExpiration, function () {
				return  DB::table('experience')->orderBy('id')->get();
			});
			view()->share('experienceList', $experienceList);
			// end...

			return redirect(route('employerSetting'))->with('success', 'Experience type updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all());
	}

	public function delete(Request $request)
	{
		DB::table('experience')->where('id', $request->id)->delete();

		// update chache
		$cacheId = 'experienceList.all.' . config('app.locale');
		Cache::pull($cacheId);
		$experienceList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('experience')->orderBy('id')->get();
		});
		view()->share('experienceList', $experienceList);
		// end...

		return redirect(route('employerSetting'))->with('success', 'Experience type deleted successfully.');
	}
}
