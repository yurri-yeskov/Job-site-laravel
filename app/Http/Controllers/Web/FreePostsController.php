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

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\Auth\Traits\VerificationTrait;
use App\Models\Post;
use App\Models\SavedPost;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Web\FrontController;
use App\Models\PostType;
use Illuminate\Support\Facades\Auth;

use Redirect;
class FreePostsController extends FrontController
{
	use VerificationTrait;


	/**
	 * CreateController constructor.
	 */
	public function __construct()
	{
		parent::__construct();


		$this->commonQueries();
	}

	/**
	 * Common Queries
	 */
	public function commonQueries()
	{

		// Get Post Types
		$cacheId = 'postTypes.all.' . config('app.locale');
		$postTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return PostType::orderBy('lft')->get();
		});
		view()->share('postTypes', $postTypes);

		// Get Salary Types
		$cacheId = 'salaryTypes.all.' . config('app.locale');
		$salaryTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return SalaryType::orderBy('lft')->get();
		});
		view()->share('salaryTypes', $salaryTypes);

		// get catagory ...
		$cacheId = 'categoriesTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$categoriesTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return Category::orderBy('lft')->where('created_by', NULL)->get();
		});
		view()->share('categoriesTypes', $categoriesTypes);

		// get skills ...
		$cacheId = 'SkillsTypes.all.' . config('app.locale');
		$SkillsTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return Skills::where('created_by', '')->orderBy('id')->get();
		});
		view()->share('SkillsTypes', $SkillsTypes);

		// get team size list
		$cacheId = 'teamSizeTypes.all.' . config('app.locale');
		// dd($cacheId);
		$teamSizeTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('team_size')->get();
		});
		view()->share('teamSizeTypes', $teamSizeTypes);

		// get education level list
		$cacheId = 'educationLevels.all.' . config('app.locale');
		$educationLevels = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('education_levels')->get();
		});
		view()->share('educationLevels', $educationLevels);

		// get languages list
		$cacheId = 'languagesList.all.' . config('app.locale');
		$languagesList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('languages')->orderBy('lft')->get();
		});
		view()->share('languagesList', $languagesList);


		// get experience list
		$cacheId = 'experienceList.all.' . config('app.locale');
		$experienceList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('experience')->orderBy('id')->get();
		});
		view()->share('experienceList', $experienceList);

		// get max list
		$cacheId = 'maxsalaryList.all.' . config('app.locale');
		$maxsalaryList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('max_salary')->orderBy('id')->get();
		});
		view()->share('maxsalaryList', $maxsalaryList);

		// get min list
		$cacheId = 'minsalaryList.all.' . config('app.locale');
		$minsalaryList = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return  DB::table('min_salary')->orderBy('id')->get();
		});
		view()->share('minsalaryList', $minsalaryList);


	}

	function updateChache()
	{
		$cacheId = 'SkillsTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$SkillsTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('job_skills')->orderBy('id')->where('created_by', NULL)->get();
		});
		view()->share('SkillsTypes', $SkillsTypes);
	}

	/**
	 * controller file of create free post from home page.
	 * 
	 */

	public function getFreePostStep(Request $request)
	{
		$user_id = "";
		$first_name = "";
		$last_name = "";
		$email = "";
		if (auth()->check()) {
			$user_id = auth()->user()->id;
			$first_name = auth()->user()->first_name;
			$last_name = auth()->user()->last_name;
			$email = auth()->user()->email;
		}
		$this->updateChache();
		return appView('freepost-create', compact('user_id', 'first_name', 'last_name', 'email'));
	}

	//post
	public function postFreePostStep(Request $request)
	{

		$user_id = (int)$request->user_id;
		if ($user_id === '') return redirect('/posts/free/create')->with('error', 'User Singup required.');
		// authanticate user....
		if (Auth::loginUsingId($user_id)) {
			Auth::User();
		} else {
			return redirect('route(jobs.create-v2)')->with('error', 'Failed to authanticate user.');
		}
		//......

		// server side form validation ....
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'job_title' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'company_name' => 'required',
			'team_size' => 'required',
			'founded_year' => 'required|integer',
			'edu_level' => 'required',
			'langs' => 'required',
			'job_type' => 'required',
			'experience' => 'required',
			'address' => 'required',
			'industry' => 'required',
			'skills' => 'required',
			'job_desc' => 'required',
			'key_resp' => 'required',
			'company_desc' => 'required',
			'from_salary' => 'required',
			'to_salary' => 'required',
			'rate' => 'required',
			'negotiable' => 'required'
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			/** Upload logo if exist */
			$imageName =  '';
			if (!empty($request->company_logo)) {
				$imageName = time() . '_logo.' . $request->company_logo->extension();
				$request->company_logo->move(public_path('/images/posts_logo'), $imageName);
			}
			//...

			/** create new indesteries entery */
			// dd($request);
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
				$values = array('name' =>  json_encode(array('en' => $newInders)), 'slug' => $newInders, 'created_by' => $request->user_id);
				$categories = DB::table('categories')->insertGetId($values);
				// dd($categories);
				array_push($indersteries_id, $categories);
			}
			// end...

			/** create new skills entery */
			$req_skills = $request->skills;
			$skills_id =  array();
			$newskills = array();
			foreach ($req_skills as $value) {
				$newVal = (int)$value;
				if ($newVal != 0 || $newVal != null) {
					array_push($skills_id, $value);
				} else {
					array_push($newskills, $value);
				}
			}

			// create new indesteries entery
			foreach ($newskills as $newskl) {
				$values = array('name' =>  json_encode(array('en' => $newskl)), 'created_by' => $request->user_id);
				$newskls = DB::table('job_skills')->insertGetId($values);
				// dd($categories);
				array_push($skills_id, $newskls);
			}
			// end...

			/** Save company profile */
			$companyModel = new Company();
			if (empty(DB::table('companies')->where('user_id', $request->user_id)->first())) {

				$companyModel->user_id = $request->user_id;
				$companyModel->name = $request->company_name;
				$companyModel->team_size = $request->team_size;
				$companyModel->industries =  implode(",", $indersteries_id); //industry
				$companyModel->founded_year = $request->founded_year; //founded_year
				$companyModel->address = $request->address; //founded_year3
				$companyModel->map_lat  = $request->map_lat; //map_lat 
				$companyModel->map_lng  = $request->map_lng; //map_lng 
				$companyModel->map_place_id  = $request->map_place_id; //map_place_id 
				$companyModel->logo = $imageName; //logo
				$companyModel->description = $_REQUEST['company_desc'];
				$companyModel->email = $request->email;
				$companyModel->save();
			}
			// ....

			/** Saving values in post table */
			$postModel = new Post();
			$postModel->user_id  = $request->user_id;
			$postModel->company_id  = $companyModel->id;
			$postModel->email  = $request->email;
			$postModel->contact_name   = $request->first_name . ' ' . $request->last_name;
			$postModel->post_type_id   = $request->job_type;
			$postModel->company_name = $request->company_name;
			$postModel->key_responsibilities = $_REQUEST['key_resp']; //key_resp
			$postModel->company_description = $_REQUEST['company_desc'];
			$postModel->team_size = $request->team_size;
			$postModel->founded_year = $request->founded_year; //founded_year
			$postModel->industries =  implode(",", $indersteries_id); //industry
			$postModel->education_levels = $request->edu_level; //education_levels
			$postModel->languages = implode(",", $request->langs); //languages
			$postModel->experience = $request->experience; //experience
			$postModel->skills = implode(",", $skills_id); //skills_id
			$postModel->salary_min  = $request->from_salary; //salary_min 
			$postModel->salary_max  = $request->to_salary; //salary_max 
			$postModel->rate  = $request->rate; //rate 
			$postModel->negotiable  = $request->negotiable; //negotiable 
			$postModel->map_lat  = $request->map_lat; //map_lat 
			$postModel->map_lng  = $request->map_lng; //map_lng 
			$postModel->map_place_id  = $request->map_place_id; //map_place_id 
			$postModel->logo = $imageName;
			$postModel->title  = $request->job_title;
			$postModel->description  = $_REQUEST['job_desc'];
			$postModel->title  = $request->job_title;
			$postModel->address   = $request->address;
			$postModel->save();
			//...

			/** Creating post entery in saved post table */
			$savePostModel = new SavedPost();
			$savePostModel->post_id = $postModel->id;
			$savePostModel->user_id  = $request->user_id;
			$savePostModel->save();

			return redirect('/account/company/profile');
		}
		return Redirect::back()->withErrors($validator->errors()->all()); // If any filed validation exist the return error.
	}

	/** --end-- */
}
