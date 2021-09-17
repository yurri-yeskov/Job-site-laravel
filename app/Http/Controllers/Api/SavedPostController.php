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

namespace App\Http\Controllers\Api;

use App\Http\Resources\EntityCollection;
use App\Models\SavedPost;
use Illuminate\Support\Str;

/**
 * @group Saved Posts
 */
class SavedPostController extends BaseController
{
	/**
	 * List saved posts
	 *
	 * @authenticated
	 * @header Authorization Bearer {YOUR_AUTH_TOKEN}
	 *
	 * @queryParam country_code string required The code of the user's country. Example: US
	 * @queryParam sort string required The sorting parameter. Sort by ascending with the prefix (-) or by descending without this prefix.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$user = auth('sanctum')->user();
		
		$countryCode = request()->get('country_code', config('country.code'));
		
		$favouritePosts = SavedPost::query()
			->whereHas('post', function ($query) use ($countryCode) {
				$query->countryOf($countryCode);
			})
			->where('user_id', $user->id)
			->with(['post.pictures', 'post.city']);
		
		$sort = request()->get('sort');
		$orderBy = ltrim($sort, '-');
		if (in_array($orderBy, (new SavedPost())->getFillable())) {
			if (Str::startsWith($sort, '-')) {
				$favouritePosts->orderBy($orderBy);
			} else {
				$favouritePosts->orderByDesc($orderBy);
			}
		} else {
			$favouritePosts->orderByDesc('created_at');
		}
		
		$favouritePosts = $favouritePosts->paginate($this->perPage);
		
		$collection = new EntityCollection(class_basename($this), $favouritePosts);
		
		return $this->respondWithCollection($collection);
	}
	
	/**
	 * Delete saved post(s)
	 *
	 * @authenticated
	 * @header Authorization Bearer {YOUR_AUTH_TOKEN}
	 *
	 * @urlParam ids string required The ID or comma-separated IDs list of saved post(s).
	 *
	 * @param $ids
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function destroy($ids)
	{
		$user = auth('sanctum')->user();
		
		$data = [
			'success' => false,
			'message' => t('no_deletion_is_done'),
			'result'  => null,
		];
		
		// Get Entries ID (IDs separated by comma accepted)
		$ids = explode(',', $ids);
		
		// Delete
		$res = false;
		foreach ($ids as $postId) {
			$savedPost = SavedPost::query()
				->where('user_id', $user->id)
				->where('post_id', $postId)
				->first();
			
			if (!empty($savedPost)) {
				$res = $savedPost->delete();
			}
		}
		
		// Confirmation
		if ($res) {
			$data['success'] = true;
			
			$count = count($ids);
			if ($count > 1) {
				$data['message'] = t('x entities has been deleted successfully', ['entities' => t('ads'), 'count' => $count]);
			} else {
				$data['message'] = t('1 entity has been deleted successfully', ['entity' => t('ad')]);
			}
		}
		
		return $this->apiResponse($data);
	}
}
