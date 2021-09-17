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

namespace App\Http\Controllers\Web\Post\CreateOrEdit;

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
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Controllers\Web\FrontController;
use App\Models\PostType;
use Illuminate\Support\Facades\Auth;
use Redirect;

class PostsController extends FrontController
{
	use VerificationTrait;

	public function __construct()
	{
		parent::__construct();
		$this->middleware(function ($request, $next) {
			if (Auth::user()) {
				return $next($request);
			}
			return redirect('/');
		});
		// Get Salary Types
		$cacheId = 'salaryTypes.all.' . config('app.locale');
		$salaryTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return SalaryType::orderBy('lft')->get();
		});
		view()->share('salaryTypes', $salaryTypes);

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
		// get catagory ...
		$cacheId = 'categoriesTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$categoriesTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('categories')->orderBy('lft')->get();
		});
		view()->share('categoriesTypes', $categoriesTypes);


		//get skills
		$cacheId = 'SkillsTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$SkillsTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('job_skills')->orderBy('id')->get();
		});
		view()->share('SkillsTypes', $SkillsTypes);
	}
	/**
	 * handle profile view 
	 */
	public function list()
	{

		//get skills 
		$postInput = array();
		$userId =  auth()->user()->id;
		$user_id = $userId;
		$this->updateChache(); //update cheche
		$postTypes = DB::table('post_types')->get();
		$salaryTypes = DB::table('salary_types')->get();
		$allPosts =  DB::table('saved_posts')->join('posts', 'posts.id', '=', 'saved_posts.post_id')->where('saved_posts.user_id', $userId)->orderBy('posts.id', 'desc')->get();
		// dd($allPosts);
		return appView('post.List.list', compact('allPosts', 'postTypes', 'salaryTypes', 'user_id','postInput'));
	}

	public function viewSinglePost(Request $request)
	{
		$post_id = $request->route('id');
		$user_id =  auth()->user()->id;
		$postInput = array();
		$this->updateChache(); //update cheche
		$postTypes = DB::table('post_types')->get();
		$salaryTypes = DB::table('salary_types')->get();
		$teamSizes = DB::table('team_size')->get();
		$industeries = DB::table('categories')->get();
		$postData =  DB::table('posts')->where('id', $post_id)->first();
		return appView('post.List.display', compact('user_id', 'postInput', 'postTypes', 'salaryTypes', 'postData', 'teamSizes', 'industeries'));
	}

	public function editPost(Request $request)
	{
		$post_id = $request->route('id');
		$user_id =  auth()->user()->id;
		$postInput = array();
		$postTypes = DB::table('post_types')->get();
		$salaryTypes = DB::table('salary_types')->get();
		$teamSizes = DB::table('team_size')->get();
		$industeries = DB::table('categories')->get();
		$this->updateChache(); //update cheche
		// dd($salaryTypes);
		$postData =  DB::table('posts')->where('id', $post_id)->first();
		return appView('post.List.edit', compact('user_id', 'postInput', 'postTypes', 'salaryTypes', 'postData', 'industeries', 'teamSizes'));
	}

	public function createFree()
	{
		$user_id =  auth()->user()->id;
		$postInput = array();
		$postTypes = DB::table('post_types')->get();
		$salaryTypes = DB::table('salary_types')->get();
		$companyProfile = NewCompany::where('user_id', auth()->user()->id)->first();
		$this->updateChache(); //update cheche
		return appView('post.List.create', compact('user_id', 'postInput', 'postTypes', 'salaryTypes', 'companyProfile'));
	}

	public function delete(Request $request)
	{
		$post_id = $request->route('id');
		DB::table('saved_posts')->where('post_id', $post_id)->delete(); // deleteing entery from saved post
		DB::table('posts')->where('id', $post_id)->delete(); // deleteing entery from posts table
		return Redirect('/company/post/manage')->with('success', 'Post deleted successfully.');;
	}
	//update
	public function updatePost(Request $request)
	{

		$user_id =  auth()->user()->id;
		$post_id = $request->route('id');
		// server side form validation ....
		$validator = Validator::make($request->all(), [
			'job_title' => 'required',
			'edu_level' => 'required',
			'langs' => 'required',
			'job_type' => 'required',
			'experience' => 'required',
			'skills' => 'required',
			'job_desc' => 'required',
			'key_resp' => 'required',
			'from_salary' => 'required',
			'to_salary' => 'required',
			'rate' => 'required',
			'negotiable' => 'required'
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			/** Upload logo if exist */
			$imageName =  $request->old_logo;
			if (!empty($request->company_logo)) {
				$imageName = time() . '_logo.' . $request->company_logo->extension();
				$request->company_logo->move(public_path('/images/posts_logo'), $imageName);
			}
			//...

			/** Updating post entery in saved post table */


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
				$existInd = DB::table('job_skills')->where(DB::raw("lower(json_unquote(json_extract(name, '$.en')))"), strtolower($newskl))->first();
				if(empty($existInd)){
					$values = array('name' =>  json_encode(array('en' => $newskl)), 'created_by' => $request->user_id);
					$newskls = DB::table('job_skills')->insertGetId($values);
					// dd($categories);
					array_push($skills_id, $newskls);
				}
				
			}
			// end...

			// dd( $request->skills);

			DB::table('posts')->where('id', $post_id)->update([
				// 'email'  => $request->email,
				// 'contact_name'   => $request->first_name . ' ' . $request->last_name,
				'post_type_id'   => $request->job_type,
				// 'company_name' => $request->company_name,
				'key_responsibilities' => $_REQUEST['key_resp'], //key_resp
				// 'company_description' => $_REQUEST['company_desc'],
				// 'team_size' => $request->team_size,
				// 'founded_year' => $request->founded_year, //founded_year
				// 'industries' =>  implode(",", $indersteries_id), //industry
				'education_levels' => $request->edu_level, //education_levels
				'languages' => implode(",", $request->langs), //languages
				'experience' => $request->experience, //experience
				'skills' => implode(",", $skills_id), //experience
				'salary_min'  => $request->from_salary, //salary_min 
				'salary_max'  => $request->to_salary, //salary_max 
				'rate'  => $request->rate, //rate 
				'negotiable'  => $request->negotiable, //negotiable 
				// 'map_lat'  => $request->map_lat, //map_lat 
				// 'map_lng'  => $request->map_lng, //map_lng 
				// 'map_place_id'  => $request->map_place_id, //map_place_id 
				// 'logo' => $imageName,
				'title'  => $request->job_title,
				'description'  => $_REQUEST['job_desc'],
				// 'address'   => $request->address
			]);

			return Redirect('/company/post/manage')->with('success', 'Post updated successfully.');
		}
		return Redirect::back()->withErrors($validator->errors()->all()); // If any filed validation exist the return error.
	}

	public function createFreeAction(Request $request)
	{
		$user_id =  auth()->user()->id;
		// server side form validation ....
		$validator = Validator::make($request->all(), [
			'job_title' => 'required',
			'edu_level' => 'required',
			'langs' => 'required',
			'job_type' => 'required',
			'experience' => 'required',
			'skills' => 'required',
			'job_desc' => 'required',
			'key_resp' => 'required',
			'from_salary' => 'required',
			'to_salary' => 'required',
			'rate' => 'required',
			'negotiable' => 'required'
		]);

		if ($validator->passes()) { // If validation is empty inserting the post
			/** Upload logo if exist */
			$imageName =  $request->old_logo;
			if (!empty($request->company_logo)) {
				$imageName = time() . '_logo.' . $request->company_logo->extension();
				$request->company_logo->move(public_path('/images/posts_logo'), $imageName);
			}
			//...

			/** Save company profile */
			$companyModel =  NewCompany::where('user_id', auth()->user()->id)->first();
			if (empty($companyModel)) {
				$companyModel->user_id = $request->user_id;
				$companyModel->save();
			}
			// ....

			/** create new indesteries entery */
			// dd($request);
			// $req_indesteries = $request->industry;
			// $indersteries_id =  array();
			// $newIndersteries = array();
			// foreach ($req_indesteries as $value) {
			// 	$newVal = (int)$value;
			// 	if ($newVal != 0 || $newVal != null) {
			// 		array_push($indersteries_id, $value);
			// 	} else {
			// 		array_push($newIndersteries, $value);
			// 	}
			// }

			// // create new indesteries entery
			// foreach ($newIndersteries as $newInders) {
			// 	$values = array('name' =>  json_encode(array('en' => $newInders)), 'slug' => $newInders, 'created_by' => $request->user_id);
			// 	$categories = DB::table('categories')->insertGetId($values);
			// 	// dd($categories);
			// 	array_push($indersteries_id, $categories);
			// }
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
				$existInd = DB::table('job_skills')->where(DB::raw("lower(json_unquote(json_extract(name, '$.en')))"), strtolower($newskl))->first();
				if(empty($existInd)){
					$values = array('name' =>  json_encode(array('en' => $newskl)), 'created_by' => $request->user_id);
					$newskls = DB::table('job_skills')->insertGetId($values);
					// dd($categories);
					array_push($skills_id, $newskls);
				}
			}
			// end...


			/** Saving values in post table */
			$postModel = new Post();
			$postModel->user_id  = $request->user_id;
			$postModel->company_id  = $companyModel->id;
			// $postModel->email  = $companyModel->email;
			// $postModel->contact_name   = $companyModel->name;
			$postModel->post_type_id   = $request->job_type;
			// $postModel->company_name = $companyModel->name;
			$postModel->key_responsibilities = $_REQUEST['key_resp']; //key_resp
			// $postModel->company_description = $_REQUEST['company_desc'];
			// $postModel->team_size = $request->team_size;
			// $postModel->founded_year = $request->founded_year; //founded_year
			// $postModel->industries =  implode(",", $indersteries_id); //industry
			$postModel->education_levels = $request->edu_level; //education_levels
			$postModel->languages = implode(",", $request->langs); //languages
			$postModel->experience = $request->experience; //experience
			$postModel->skills = implode(",", $skills_id); //experience
			$postModel->salary_min  = $request->from_salary; //salary_min 
			$postModel->salary_max  = $request->to_salary; //salary_max 
			$postModel->rate  = $request->rate; //rate 
			$postModel->negotiable  = $request->negotiable; //negotiable 
			// $postModel->map_lat  = $request->map_lat; //map_lat 
			// $postModel->map_lng  = $request->map_lng; //map_lng 
			// $postModel->map_place_id  = $request->map_place_id; //map_place_id 
			// $postModel->logo = $imageName;
			$postModel->title  = $request->job_title;
			$postModel->description  = $_REQUEST['job_desc'];
			$postModel->title  = $request->job_title;
			// $postModel->address   = $request->address;
			$postModel->save();
			//...

			/** Creating post entery in saved post table */
			$savePostModel = new SavedPost();
			$savePostModel->post_id = $postModel->id;
			$savePostModel->user_id  = $request->user_id;
			$savePostModel->save();

			return Redirect('/company/post/manage')->with('success', 'Post created successfully.');;
		}
		return Redirect::back()->withErrors($validator->errors()->all()); // If any filed validation exist the return error.
	}
}
