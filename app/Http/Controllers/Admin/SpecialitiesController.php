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

class SpecialitiesController extends FrontController
{
	public function index()
	{
		$list = DB::table('specialities')->get();
		return view('vendor.admin.pages.specialities.list', compact('list'));
	}
	public function create()
	{
		return view('vendor.admin.pages.specialities.create');
	}
	//insert new
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			$values = array('name' =>   $request->name);
			DB::table('specialities')->insert($values);
			
			return redirect(route('employerSetting'))->with('success', 'New speciality added successfully.');
		}

		return Redirect::back()->withErrors($validator->errors()->all());
	}
	// edit
	public function edit(Request $request)
	{
		// dd($request->id);
		$specialities = DB::table('specialities')->where('id', $request->id)->first();
		return view('vendor.admin.pages.specialities.edit', compact('specialities'));
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required'
		]);
		if ($validator->passes()) {
			DB::table('specialities')->where('id', $request->id)->update([
				'name' =>$request->name
			]);

	

			return redirect(route('employerSetting'))->with('success', 'Speciality updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all());
	}

	public function delete(Request $request)
	{
		DB::table('specialities')->where('id', $request->id)->delete();
		return redirect(route('employerSetting'))->with('success', 'Speciality deleted successfully.');
	}
}
