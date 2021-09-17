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

class SalaryController extends FrontController
{
	public function index()
	{
		$list =  DB::table('max_salary')
			->join('min_salary', 'min_salary.id', '=', 'max_salary.id')
			->select('max_salary.*', 'min_salary.id as min_id', 'min_salary.name as min_name')
			->get();

		// dd($list);
		return view('vendor.admin.pages.salary.list', compact('list'));
	}
	public function create()
	{
		return view('vendor.admin.pages.salary.create');
	}
	//insert new
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'from' => 'required|integer',
			'to' => 'required|integer'
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			DB::table('max_salary')->insert(array('name' => $request->to));
			DB::table('min_salary')->insert(array('name' => $request->from));
			$this->updateChace(); // update chache
			return redirect(route('employerSetting'))->with('success', 'New salary option added successfully.');
		}

		return Redirect::back()->withErrors($validator->errors()->all());
	}

	function updateChace()
	{
		// get max list
		$cacheId = 'maxsalaryList.all.' . config('app.locale');
		Cache::pull($cacheId);
		$maxsalaryList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('max_salary')->orderBy('id')->get();
		});
		view()->share('maxsalaryList', $maxsalaryList);

		// get min list
		$cacheId = 'minsalaryList.all.' . config('app.locale');
		Cache::pull($cacheId);
		$minsalaryList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('min_salary')->orderBy('id')->get();
		});
		view()->share('minsalaryList', $minsalaryList);
	}

	// edit
	public function edit(Request $request)
	{
		// dd($request->id);
		$salary =  DB::table('max_salary')
			->join('min_salary', 'min_salary.id', '=', 'max_salary.id')
			->select('max_salary.*', 'min_salary.id as min_id', 'min_salary.name as min_name')
			->where('min_salary.id', $request->id)
			->first();
		// dd($salary);
		return view('vendor.admin.pages.salary.edit', compact('salary'));
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'from' => 'required|integer',
			'to' => 'required|integer'
		]);
		if ($validator->passes()) {
			DB::table('max_salary')->where('id', $request->id)->update([
				'name' => $request->to
			]);
			DB::table('min_salary')->where('id', $request->id)->update([
				'name' =>  $request->from
			]);
			$this->updateChace(); // update chache
			return redirect(route('employerSetting'))->with('success', 'Salary option updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all());
	}

	public function delete(Request $request)
	{
		DB::table('max_salary')->where('id', $request->id)->delete();
		DB::table('min_salary')->where('id', $request->id)->delete();
		$this->updateChace(); // update chache

		return redirect(route('employerSetting'))->with('success', 'Salary option deleted successfully.');
	}
}
