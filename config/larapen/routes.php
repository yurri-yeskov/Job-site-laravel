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

$routes = [
	
	// Post
	'post' => '{slug}/{id}',
	
	// Search
	'search' => 'latest-jobs',
	'searchPostsByUserId' => 'users/{id}/jobs',
	'searchPostsByUsername' => 'profile/{username}',
	'searchPostsByTag' => 'tag/{tag}',
	'searchPostsByCity' => 'jobs/{city}/{id}',
	'searchPostsBySubCat' => 'category/{catSlug}/{subCatSlug}',
	'searchPostsByCat' => 'category/{catSlug}',
	'searchPostsByCompanyId' => 'companies/{id}/jobs',
	
	// Auth
	'login' => 'login',
	'logout' => 'logout',
	'register' => 'register',
	
	// Other Pages
	'companies' => 'companies',
	'pageBySlug' => 'page/{slug}',
	'sitemap' => 'sitemap',
	'countries' => 'countries',
	'contact' => 'contact',
	'pricing' => 'pricing',
	
];

if (config('settings.seo.multi_countries_urls')) {
	
	$routes['search'] = '{countryCode}/search';
	$routes['searchPostsByUserId'] = '{countryCode}/users/{id}/jobs';
	$routes['searchPostsByUsername'] = '{countryCode}/profile/{username}';
	$routes['searchPostsByTag'] = '{countryCode}/tag/{tag}';
	$routes['searchPostsByCity'] = '{countryCode}/jobs/{city}/{id}';
	$routes['searchPostsBySubCat'] = '{countryCode}/category/{catSlug}/{subCatSlug}';
	$routes['searchPostsByCat'] = '{countryCode}/category/{catSlug}';
	$routes['company.posts'] = '{countryCode}/companies/{id}/jobs';
	$routes['companies'] = '{countryCode}/companies';
	$routes['sitemap'] = '{countryCode}/sitemap';
	
}

// Post
$postPermalinks = config('larapen.core.permalink.post');
if (in_array(config('settings.seo.post_permalink', '{slug}/{id}'), $postPermalinks)) {
	$routes['post'] = config('settings.seo.post_permalink', '{slug}/{id}') . config('settings.seo.post_permalink_ext', '');
}

return $routes;
