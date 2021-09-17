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

namespace App\Http\Controllers\Web\Post\CreateOrEdit\MultiSteps;

use App\Helpers\UrlGen;
use App\Http\Controllers\Api\Payment\SingleStepPaymentTrait;
use App\Http\Controllers\Api\Post\CreateOrEdit\Traits\MakePaymentTrait;
use App\Http\Controllers\Api\Post\CreateOrEdit\Traits\RequiredInfoTrait;
use App\Http\Controllers\Web\Auth\Traits\VerificationTrait;
use App\Http\Controllers\Web\Post\CreateOrEdit\MultiSteps\Traits\Create\ClearTmpInputTrait;
use App\Http\Controllers\Web\Post\CreateOrEdit\MultiSteps\Traits\Create\SubmitTrait;
use App\Http\Controllers\Web\Post\CreateOrEdit\MultiSteps\Traits\WizardTrait;
use App\Http\Controllers\Web\Post\CreateOrEdit\Traits\PricingPageUrlTrait;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\PostRequest;
use App\Models\Company;
use App\Models\Skills;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostType;
use App\Models\SavedPost;
use App\Models\SalaryType;
use App\Models\NewCompany;
use App\Http\Controllers\Web\FrontController;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ReviewedScope;
use App\Observers\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Torann\LaravelMetaTags\Facades\MetaTag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Redirect;

class CreateController extends FrontController
{
	use VerificationTrait;
	use RequiredInfoTrait;
	use WizardTrait;
	use SingleStepPaymentTrait, MakePaymentTrait;
	use PricingPageUrlTrait;
	use PictureTrait, ClearTmpInputTrait;
	use SubmitTrait;

	protected $baseUrl = '/posts/create';
	protected $tmpUploadDir = 'temporary';

	/**
	 * CreateController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		// Check if guests can post Ads
		if (config('settings.single.guests_can_post_ads') != '1') {
			$this->middleware('auth')->only(['getForm', 'postForm']);
		}

		$this->middleware(function ($request, $next) {
			$this->commonQueries();

			return $next($request);
		});

		$this->baseUrl = url($this->baseUrl);
	}

	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		$this->setPostFormRequiredInfo();
		$this->paymentSettings();

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
			return Category::orderBy('lft')->get();
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


		$companies = collect();
		if (auth()->check()) {
			// Get all the User's Companies
			$companies = Company::where('user_id', auth()->user()->id)
				->take(100)
				->orderByDesc('id')
				->get();

			// Get the User's latest Company
			if ($companies->has(0)) {
				$postCompany = $companies->get(0);
				view()->share('postCompany', $postCompany);
			}

			$companies = collect($companies->toArray());
		}
		$postInput = request()->session()->get('postInput');
		if (isset($postInput['company'], $postInput['company']['name'])) {
			$companies = $companies->prepend($postInput['company']);
		}
		view()->share('companies', $companies);

		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'create'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'create')));
		MetaTag::set('keywords', getMetaTag('keywords', 'create'));
	}

	/**
	 * Check for current step
	 *
	 * @param Request $request
	 * @return int
	 */
	public function step(Request $request)
	{
		if ($request->get('error') == 'paymentCancelled') {
			if ($request->session()->has('postId')) {
				$request->session()->forget('postId');
			}
		}

		$postId = $request->session()->get('postId');

		$step = 0;

		$data = $request->session()->get('postInput');
		if (isset($data) || !empty($postId)) {
			$step = 1;
		} else {
			return $step;
		}

		$data = $request->session()->get('paymentInput');
		if (isset($data) || !empty($postId)) {
			$step = 2;
		} else {
			return $step;
		}

		return $step;
	}

	/**
	 * New Post's Form.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return mixed
	 */

	public function getPostStep(Request $request)
	{
		// Check if the 'Pricing Page' must be started first, and make redirection to it.
		$pricingUrl = $this->getPricingPage($this->getSelectedPackage());
		// echo"<pre>";print_r($pricingUrl);
		// exit;
		if (!empty($pricingUrl)) {
			return redirect($pricingUrl)->header('Cache-Control', 'no-store, no-cache, must-revalidate');
		}

		// Check if the form type is 'Single Step Form', and make redirection to it (permanently).
		if (config('settings.single.publication_form_type') == '2') {
			return redirect(url('create'), 301)->header('Cache-Control', 'no-store, no-cache, must-revalidate');
		}

		// Only Admin users and Employers/Companies can post ads
		if (auth()->check()) {
			if (!in_array(auth()->user()->user_type_id, [1])) {
				return redirect()->intended('account');
			}
		}

		$this->shareWizardMenu($request);

		// Create an unique temporary ID
		if (!$request->session()->has('uid')) {
			$request->session()->put('uid', uniqueCode(9));
		}

		$postInput = $request->session()->get('postInput');

		// Get the next URL button label
		if (
			isset($this->countPackages, $this->countPaymentMethods)
			&& $this->countPackages > 0
			&& $this->countPaymentMethods > 0
		) {
			$nextStepLabel = t('Next');
		} else {
			$nextStepLabel = t('submit');
		}
		view()->share('nextStepLabel', $nextStepLabel);

		return appView('post.createOrEdit.multiSteps.create', compact('postInput'));
	}

	function updateChache()
	{
		$cacheId = 'SkillsTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$SkillsTypes = Cache::remember($cacheId, $this->cacheExpiration, function () {
			return DB::table('job_skills')->orderBy('id')->get();
		});
		view()->share('SkillsTypes', $SkillsTypes);
	}

	/**
	 * Free post function...
	 */
	public function getFreePostStep()
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


		return appView('freePost.createOrEdit.multiSteps.create', compact('user_id', 'first_name', 'last_name', 'email'));
	}

	/**
	 * FREE POST CREATE 
	 * 
	 */
	public function postFreePostStep(Request $request)
	{
		$user_id = (int)$request->user_id;
		if ($user_id === '') return redirect('/job/free/create')->with('error', 'User Singup required.');
		// authanticate user....
		if (Auth::loginUsingId($user_id)) {
			// user session set succussfully
			Auth::User();
		} else {
			return redirect('/job/free/create')->with('error', 'Failed to authanticate user.');
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
				$existInd = DB::table('categories')->where(DB::raw("lower(json_unquote(json_extract(name, '$.en')))"), strtolower($newInders))->first();
				if (empty($existInd)) {
					$values = array('name' =>  json_encode(array('en' => $newInders)), 'slug' => $newInders, 'created_by' => $request->user_id);
					$categories = DB::table('categories')->insertGetId($values);
					
					array_push($indersteries_id, $categories);
				}
			}
			// dd($indersteries_id);
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

			// create new newskills entery
			foreach ($newskills as $newskl) {
				$existInd = DB::table('job_skills')->where(DB::raw("lower(json_unquote(json_extract(name, '$.en')))"), strtolower($newskl))->first();
				if (empty($existInd)) {
					$values = array('name' =>  json_encode(array('en' => $newskl)), 'created_by' => $request->user_id);
					$newskls = DB::table('job_skills')->insertGetId($values);
					// dd($categories);
					array_push($skills_id, $newskls);
				}
			}
			// end...

			/** Save company profile */
			$companyModel = new NewCompany();
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
			//dd($imageName);
			//dd('here');
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
			$postModel->is_free   = 1;
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

	/**
	 * Store a new Post.
	 *
	 * @param \App\Http\Requests\PostRequest $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function postPostStep(Request $request)
	{
		// Use unique ID to store post's pictures
		if ($request->session()->has('uid')) {
			$this->tmpUploadDir = $this->tmpUploadDir . '/' . $request->session()->get('uid');
		}

		$postInputOld = (array)$request->session()->get('postInput');
		$postInput = $request->all();

		// Set the company's temporary ID
		if (isset($postInput['company'], $postInput['company']['name'])) {
			$postInput['company']['id'] = 'new';
		}

		// Save uploaded file
		$file = $request->file('company.logo');
		if (!empty($file)) {
			$filePath = uploadPostLogo($this->tmpUploadDir, $file);
			$postInput['company']['logo'] = $filePath;

			// Remove old company logo
			if (isset($postInputOld['company'], $postInputOld['company']['logo'])) {
				try {
					$this->removePictureWithItsThumbs($postInputOld['company']['logo']);
				} catch (\Exception $e) {
				}
			}
		} else {
			// Skip old logo if the logo field is not filled
			if (isset($postInputOld['company'], $postInputOld['company']['logo'])) {
				$postInput['company']['logo'] = $postInputOld['company']['logo'];
			}
		}

		$request->session()->put('postInput', $postInput);

		// Get the next URL
		if (
			isset($this->countPackages, $this->countPaymentMethods)
			&& $this->countPackages > 0
			&& $this->countPaymentMethods > 0
		) {
			$nextUrl = url('posts/create/payment');
			$nextUrl = qsUrl($nextUrl, request()->only(['package']), null, false);

			return redirect($nextUrl);
		} else {
			return $this->storeInputDataInDatabase($request);
		}
	}

	/**
	 * Payment's Step
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
	 */
	public function getPaymentStep(Request $request)
	{
		if ($this->step($request) < 1) {
			$backUrl = url($this->baseUrl);
			$backUrl = qsUrl($backUrl, request()->only(['package']), null, false);

			return redirect($backUrl);
		}

		$this->shareWizardMenu($request);

		$payment = $request->session()->get('paymentInput');

		return appView('post.createOrEdit.multiSteps.packages.create', compact('payment'));
	}

	/**
	 * Payment's Step (POST)
	 *
	 * @param \App\Http\Requests\PackageRequest $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function postPaymentStep(PackageRequest $request)
	{
		if ($this->step($request) < 1) {
			$backUrl = url($this->baseUrl);
			$backUrl = qsUrl($backUrl, request()->only(['package']), null, false);

			return redirect($backUrl);
		}

		$request->session()->put('paymentInput', $request->validated());

		return $this->storeInputDataInDatabase($request);
	}

	/**
	 * Confirmation
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
	 */
	public function finish(Request $request)
	{
		if (!session()->has('message')) {
			return redirect('/');
		}

		// Clear the steps wizard
		if (session()->has('postId')) {
			// Get the Post
			$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
				->where('id', session()->get('postId'))
				->first();

			if (empty($post)) {
				abort(404, t('Post not found'));
			}

			session()->forget('postId');
		}

		// Redirect to the Post,
		// - If User is logged
		// - Or if Email and Phone verification option is not activated
		if (auth()->check() || (config('settings.mail.email_verification') != 1 && config('settings.sms.phone_verification') != 1)) {
			if (!empty($post)) {
				flash(session('message'))->success();

				return redirect(UrlGen::postUri($post));
			}
		}

		// Meta Tags
		MetaTag::set('title', session('message'));
		MetaTag::set('description', session('message'));

		return appView('post.createOrEdit.multiSteps.finish');
	}
}
