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

class TeamSizeController extends FrontController
{
	public function index()
	{
		$teamSizeList = DB::table('team_size')->get();
		return view('vendor.admin.pages.teamSize.list', compact('teamSizeList'));
	}
	public function create()
	{
		return view('vendor.admin.pages.teamSize.create');
	}

	function updateChache()
	{
		// update chache
		$cacheId = 'teamSizeTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$teamSizeTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('team_size')->get();
		});
		view()->share('teamSizeTypes', $teamSizeTypes);
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'min_num' => 'required|integer',
			'max_num' => 'required|integer'
		]);
		if ($validator->passes()) { // If validation is empty inserting the post
			$teamSizeModel = new TeamSize;

			$teamSizeModel->from_num = $request->min_num;
			$teamSizeModel->to_num = $request->max_num;

			$teamSizeModel->save();
			$this->updateChache();
			return redirect(route('employerSetting'))->with('success', 'New team size option created successfully.');
		}

		return Redirect::back()->withErrors($validator->errors()->all());
	}

	public function editSize(Request $request)
	{
		// dd($request->id);
		$teamSize = DB::table('team_size')->where('id', $request->id)->first();
		$this->updateChache();
		return view('vendor.admin.pages.teamSize.edit', compact('teamSize'));
	}

	public function updateSize(Request $request)
	{
		// dd($request);
		$validator = Validator::make($request->all(), [
			'min_num' => 'required|integer',
			'max_num' => 'required|integer'
		]);
		if ($validator->passes()) {
			$teamSize = DB::table('team_size')->where('id', $request->id)->update([
				'from_num' => $request->min_num,
				'to_num' => $request->max_num,
			]);
			$this->updateChache();
			return redirect(route('employerSetting'))->with('success', 'Team size option updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all());
	}

	public function delete(Request $request)
	{
		DB::table('team_size')->where('id', $request->id)->delete();
		$this->updateChache();
		return redirect(route('employerSetting'))->with('success', 'Team size deleted successfully.');
	}
}
