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

namespace App\Http\Controllers\Web\Post;

use App\Events\PostWasVisited;
use App\Helpers\ArrayHelper;
use App\Helpers\Date;
use App\Helpers\UrlGen;
use App\Http\Controllers\Web\Post\Traits\CatBreadcrumbTrait;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Package;
use App\Http\Controllers\Web\FrontController;
use App\Models\Resume;
use App\Models\User;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ReviewedScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Torann\LaravelMetaTags\Facades\MetaTag;

class DetailsController extends FrontController
{
	use CatBreadcrumbTrait;
	
	/**
	 * Post expire time (in months)
	 *
	 * @var int
	 */
	public $expireTime = 24;
	
	/**
	 * DetailsController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->middleware(function ($request, $next) {
			$this->commonQueries();
			
			return $next($request);
		});
	}
	
	/**
	 * Common Queries
	 */
	public function commonQueries()
	{
		// Count Packages
		$countPackages = Package::applyCurrency()->count();
		view()->share('countPackages', $countPackages);
		
		// Count Payment Methods
		view()->share('countPaymentMethods', $this->countPaymentMethods);
	}
	
	/**
	 * Show Post's Details.
	 *
	 * @param $postId
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index($postId)
	{
		$data = [];
		
		// Get and Check the Controller's Method Parameters
		$parameters = request()->route()->parameters();
		
		// Show 404 error if the Post's ID is not numeric
		if (!isset($parameters['id']) || empty($parameters['id']) || !is_numeric($parameters['id'])) {
			abort(404);
		}
		
		// Set the Parameters
		$postId = $parameters['id'];
		if (isset($parameters['slug'])) {
			$slug = $parameters['slug'];
		}
		
		// GET POST'S DETAILS
		if (auth()->check()) {
			// Get post's details even if it's not activated, not reviewed or archived
			$cacheId = 'post.withoutGlobalScopes.with.city.pictures.' . $postId . '.' . config('app.locale');
			$post = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
				return Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
					->withCountryFix()
					->where('id', $postId)
					->with([
						'category'      => function ($builder) { $builder->with(['parent']); },
						'postType',
						'city',
						'latestPayment' => function ($builder) { $builder->with(['package']); },
						'company',
						'savedByLoggedUser',
					])
					->first();
			});
			
			// If the logged user is not an admin user...
			if (!auth()->user()->can(Permission::getStaffPermissions())) {
				// Then don't get post that are not from the user
				if (!empty($post) && $post->user_id != auth()->user()->id) {
					$cacheId = 'post.with.city.pictures.' . $postId . '.' . config('app.locale');
					$post = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
						return Post::withCountryFix()
							->unarchived()
							->where('id', $postId)
							->with([
								'category'      => function ($builder) { $builder->with(['parent']); },
								'postType',
								'city',
								'latestPayment' => function ($builder) { $builder->with(['package']); },
								'company',
								'savedByLoggedUser',
							])
							->first();
					});
				}
			}
			
			// Get the User's Resumes
			$limit = config('larapen.core.selectResumeInto', 5);
			$cacheId = 'resumes.take.' . $limit . '.where.user.' . auth()->user()->id;
			$resumes = Cache::remember($cacheId, $this->cacheExpiration, function () use ($limit) {
				return Resume::where('user_id', auth()->user()->id)->take($limit)->orderByDesc('id')->get();
			});
			view()->share('resumes', $resumes);
			
			// Get the User's latest Resume
			if ($resumes->has(0)) {
				$lastResume = $resumes->get(0);
				view()->share('lastResume', $lastResume);
			}
		} else {
			$cacheId = 'post.with.city.pictures.' . $postId . '.' . config('app.locale');
			$post = Cache::remember($cacheId, $this->cacheExpiration, function () use ($postId) {
				return Post::withCountryFix()
					->unarchived()
					->where('id', $postId)
					->with([
						'category'      => function ($builder) { $builder->with(['parent']); },
						'postType',
						'city',
						'latestPayment' => function ($builder) { $builder->with(['package']); },
						'company',
						'savedByLoggedUser',
					])
					->first();
			});
		}
		
		// Preview the Post after activation
		if (request()->filled('preview') && request()->get('preview') == 1) {
			// Get post's details even if it's not activated and reviewed
			$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
				->withCountryFix()
				->where('id', $postId)
				->with([
					'category'      => function ($builder) { $builder->with(['parent']); },
					'postType',
					'city',
					'latestPayment' => function ($builder) { $builder->with(['package']); },
					'company',
					'savedByLoggedUser',
				])
				->first();
		}
		
		// Post not found
		if (empty($post) || empty($post->category) || empty($post->postType) || empty($post->city)) {
			abort(404, t('Post not found'));
		}
		
		// Share post's details
		view()->share('post', $post);
		
		// Archived posts message
		if (isset($post->archived) && $post->archived == 1) {
			flash(t('This ad has been archived'))->warning();
		}
		
		// Get possible post's registered Author (User)
		$user = null;
		if (isset($post->user_id) && !empty($post->user_id)) {
			$user = User::find($post->user_id);
		}
		view()->share('user', $user);
		
		// Get ad's user decision about comments activation
		$commentsAreDisabledByUser = false;
		// Get possible ad's user
		if (isset($user) && !empty($user)) {
			if ($user->disable_comments == 1) {
				$commentsAreDisabledByUser = true;
			}
		}
		view()->share('commentsAreDisabledByUser', $commentsAreDisabledByUser);
		
		// Category Breadcrumb
		$catBreadcrumb = $this->getCatBreadcrumb($post->category, 1);
		view()->share('catBreadcrumb', $catBreadcrumb);
		
		// Increment Post visits counter
		Event::dispatch(new PostWasVisited($post));
		
		// GET SIMILAR POSTS
		if (config('settings.single.similar_posts') == '1') {
			$cacheId = 'posts.similar.category.' . $post->category->id . '.post.' . $post->id;
			$posts = Cache::remember($cacheId, $this->cacheExpiration, function () use ($post) {
				return $post->getSimilarByCategory();
			});
			
			// Featured Area Data
			$featured = [
				'title' => t('Similar Jobs'),
				'link'  => UrlGen::category($post->category),
				'posts' => $posts,
			];
			$data['featured'] = (count($posts) > 0) ? ArrayHelper::toObject($featured) : null;
		} else if (config('settings.single.similar_posts') == '2') {
			$distance = 50; // km OR miles
			
			$cacheId = 'posts.similar.city.' . $post->city->id . '.post.' . $post->id;
			$posts = Cache::remember($cacheId, $this->cacheExpiration, function () use ($post, $distance) {
				return $post->getSimilarByLocation($distance);
			});
			
			// Featured Area Data
			$featured = [
				'title' => t('more_jobs_at_x_distance_around_city', [
					'distance' => $distance,
					'unit'     => getDistanceUnit(config('country.code')),
					'city'     => $post->city->name,
				]),
				'link'  => UrlGen::city($post->city),
				'posts' => $posts,
			];
			$data['featured'] = (count($posts) > 0) ? ArrayHelper::toObject($featured) : null;
		}
		
		// SEO
		$title = $post->title . ', ' . $post->city->name;
		$description = Str::limit(str_strip(strip_tags($post->description)), 200);
		
		// Meta Tags
		MetaTag::set('title', $title);
		MetaTag::set('description', $description);
		if (!empty($post->tags)) {
			MetaTag::set('keywords', str_replace(',', ', ', $post->tags));
		}
		
		// Open Graph
		$this->og->title($title)
			->description($description)
			->type('article');
		if (isset($post->logo) && !empty($post->logo)) {
			if ($this->og->has('image')) {
				$this->og->forget('image')->forget('image:width')->forget('image:height');
			}
			$this->og->image(imgUrl($post->logo, 'company'), [
				'width'  => 600,
				'height' => 600,
			]);
		}
		view()->share('og', $this->og);
		
		/*
		// Expiration Info
		$today = Carbon::now(Date::getAppTimeZone());
		if ($today->gt($post->created_at->addMonths($this->expireTime))) {
			flash(t("This ad has expired"))->error();
		}
		*/
		
		// View
		return appView('post.details', $data);
	}
}
