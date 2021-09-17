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

namespace App\Observers;

use App\Models\Language;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Scopes\ActiveScope;
use App\Notifications\PaymentApproved;
use Illuminate\Support\Facades\Cache;

class PaymentObserver
{
	/**
	 * Listen to the Entry updating event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function updating(Payment $payment)
	{
		// Get the original object values
		$original = $payment->getOriginal();
		
		if (config('settings.mail.confirmation') == 1) {
			// The Payment was not approved
			if ($original['active'] != 1) {
				if ($payment->active == 1) {
					$post = Post::find($payment->post_id);
					if (!empty($post)) {
						try {
							$post->notify(new PaymentApproved($payment, $post));
						} catch (\Exception $e) {
							flash($e->getMessage())->error();
						}
					}
				}
			}
		}
	}
	
	/**
	 * Listen to the Entry saved event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function saved(Payment $payment)
	{
		// Removing Entries from the Cache
		$this->clearCache($payment);
	}
	
	/**
	 * Listen to the Entry deleting event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function deleting(Payment $payment)
	{
		// Un-feature the payment's post if it haven't other payments
		$postOtherPayments = Payment::where('post_id', $payment->post_id);
		if ($postOtherPayments->count() <= 0) {
			$post = Post::find($payment->post_id);
			if (!empty($post)) {
				$post->featured = 0;
				$post->save();
			}
		}
	}
	
	/**
	 * Listen to the Entry deleted event.
	 *
	 * @param Payment $payment
	 * @return void
	 */
	public function deleted(Payment $payment)
	{
		// Removing Entries from the Cache
		$this->clearCache($payment);
	}
	
	/**
	 * Removing the Entity's Entries from the Cache
	 *
	 * @param $payment
	 */
	private function clearCache($payment)
	{
		if (!isset($payment->post) || empty($payment->post)) {
			return;
		}
		
		$post = $payment->post;
		
		Cache::forget($post->country_code . '.sitemaps.posts.xml');
		
		Cache::forget($post->country_code . '.home.getPosts.sponsored');
		Cache::forget($post->country_code . '.home.getPosts.latest');
		Cache::forget($post->country_code . '.home.getFeaturedPostsCompanies');
		
		Cache::forget('post.withoutGlobalScopes.with.city.pictures.' . $post->id);
		Cache::forget('post.with.city.pictures.' . $post->id);
		
		try {
			$languages = Language::withoutGlobalScopes([ActiveScope::class])->get(['abbr']);
		} catch (\Exception $e) {
			$languages = collect([]);
		}
		
		if ($languages->count() > 0) {
			foreach ($languages as $language) {
				Cache::forget('post.withoutGlobalScopes.with.city.pictures.' . $post->id . '.' . $language->abbr);
				Cache::forget('post.with.city.pictures.' . $post->id . '.' . $language->abbr);
			}
		}
		
		Cache::forget('posts.similar.category.' . $post->category_id . '.post.' . $post->id);
		Cache::forget('posts.similar.city.' . $post->city_id . '.post.' . $post->id);
	}
}
