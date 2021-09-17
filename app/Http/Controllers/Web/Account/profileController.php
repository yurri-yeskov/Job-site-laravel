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

namespace App\Http\Controllers\Web\Account;

use App\Http\Controllers\Web\Auth\Traits\VerificationTrait;
use App\Http\Requests\UserRequest;
use App\Models\Scopes\VerifiedScope;
use App\Models\UserType;
use App\Models\Post;
use App\Models\SavedPost;
use App\Models\Gender;
use App\Models\NewCompany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;
use Redirect;

class profileController extends AccountBaseController
{
	use VerificationTrait;

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$data = [];

		$data['genders'] = Gender::query()->get();
		$data['userTypes'] = UserType::all();

		// Mini Stats
		$data['countPostsVisits'] = DB::table((new Post())->getTable())
			->select('user_id', DB::raw('SUM(visits) as total_visits'))
			->where('country_code', config('country.code'))
			->where('user_id', auth()->user()->id)
			->groupBy('user_id')
			->first();
		$data['countPosts'] = Post::currentCountry()
			->where('user_id', auth()->user()->id)
			->count();
		$data['countFavoritePosts'] = SavedPost::whereHas('post', function ($query) {
			$query->currentCountry();
		})->where('user_id', auth()->user()->id)
			->count();

		// Meta Tags
		MetaTag::set('title', t('my_account'));
		MetaTag::set('description', t('my_account_on', ['appName' => config('settings.app.app_name')]));

		return appView('account.edit', $data);
	}

	/**
	 * handle profile view 
	 */
	public function getCompanyProfile()
	{
		// $CompanyModel = new Company();
		$companyProfile = NewCompany::where('user_id', auth()->user()->id)->first();
		$teamSizes = DB::table('team_size')->get();
		$industeries = DB::table('categories')->get();
		$specialities = DB::table('specialities')->get();
		// dd($companyProfile);

		return appView('account.profile', compact('companyProfile', 'specialities', 'industeries', 'teamSizes'));
	}

	function createCompanyEntry($request, $imageName, $indersteries_id, $specialities_id, $company_desc)
	{
		$companyModel = new NewCompany();

		$companyModel->user_id = auth()->user()->id;
		$companyModel->name = $request->company_name;
		$companyModel->team_size = $request->team_size;
		$companyModel->industries =  implode(",", $indersteries_id); //industry
		$companyModel->founded_year = $request->founded_year; //founded_year
		$companyModel->address = $request->address; //founded_year3
		$companyModel->map_lat  = $request->map_lat; //map_lat 
		$companyModel->map_lng  = $request->map_lng; //map_lng 
		$companyModel->map_place_id  = $request->map_place_id; //map_place_id 
		$companyModel->logo = $imageName; //logo
		$companyModel->description = $company_desc;
		$companyModel->specialities = $request->specialities ?  implode(",", $specialities_id) : '';
		$companyModel->email = $request->email;
		$companyModel->save();
		return redirect('/account/company/profile')->with('success', 'Company Profile created successfully.');
	}
	public function updateCompanyProfile(Request $request)
	{
		// server side form validation ....
		$validator = Validator::make($request->all(), [
			'company_name' => 'required',
			'team_size' => 'required',
			'founded_year' => 'required|integer',
			'address' => 'required',
			'industry' => 'required'
		]);


		if ($validator->passes()) { // If validation is empty inserting the post

			/** create new indesteries entery */
			$req_indesteries = $request->industry;
			$indersteries_id =  array();
			$newIndersteries = array();
			foreach ($req_indesteries as $value) {
				$newVal = (int)$value;
				if ($newVal != 0 || $newVal != null) {
					array_push($indersteries_id, $value);
				} else {
					array_push($newIndersteries, $value);
				}
			}

			// create new indesteries entery
			foreach ($newIndersteries as $newInders) {
				$existInd = DB::table('categories')->where(DB::raw("lower(json_unquote(json_extract(name, '$.en')))"), strtolower($newInders))->first();
				if (empty($existInd)) {
					$values = array('name' =>  json_encode(array('en' => $newInders)), 'slug' => $newInders, 'created_by' => $request->user_id);
					$categories = DB::table('categories')->insertGetId($values);
					// dd($categories);
					array_push($indersteries_id, $categories);
				}
			}
			// end...

			/** create new specialities  entery */
			// dd($request);
			$specialities_id =  array();
			$newspecialities = array();
			if ($request->specialities) {
				$req_specialities = $request->specialities;

				foreach ($req_specialities as $value) {
					$newVal = (int)$value;
					if ($newVal != 0 || $newVal != null) {
						array_push($specialities_id, $value);
					} else {
						array_push($newspecialities, $value);
					}
				}

				// create new specialities entery
				foreach ($newspecialities as $newInders) {
					$existInd = DB::table('specialities')->where('name', $newInders)->first();
					if (empty($existInd)) {
						$values = array('name' =>   $newInders);
						$categories = DB::table('specialities')->insertGetId($values);
						// dd($categories);
						array_push($specialities_id, $categories);
					}
				}
				// end...
			}
			// dd($specialities_id);

			/** Creagiting company profile entery if not exist */

			$imageName =  $request->old_logo;
			if (!empty($request->company_logo)) {
				$imageName = time() . '_logo.' . $request->company_logo->extension();
				$request->company_logo->move(public_path('/images/posts_logo'), $imageName);
			}

			$isCompanyExist = $request->isCompanyExist;
			if ($isCompanyExist == "no") return $this->createCompanyEntry($request, $imageName, $indersteries_id, $specialities_id, $_REQUEST['company_desc']);

			// else update company profile ....


			NewCompany::where('user_id', auth()->user()->id)->update([
				'name' => $request->company_name,
				'team_size' => $request->team_size,
				'industries' => implode(",", $indersteries_id),
				'founded_year' => $request->founded_year,
				'address' => $request->address,
				'map_lat' => $request->map_lat,
				'logo' => $imageName,
				'map_lng' => $request->map_lng,
				'map_place_id' => $request->map_place_id,
				'specialities' => $request->specialities ?  implode(",", $specialities_id) : '',
				'description' => $_REQUEST['company_desc']
			]);
			return redirect()->back()->with('success', 'Company Profile updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all()); // If any filed validation exist the return error.
	}
}
