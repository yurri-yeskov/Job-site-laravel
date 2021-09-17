<?php
// DEBUG
?>
@if (
		(config('settings.seo.no_index_all') == true)
		|| (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Search\CategoryController') && config('settings.seo.no_index_categories') == true)
		|| (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Search\TagController') && config('settings.seo.no_index_tags') == true)
		|| (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Search\CityController') && config('settings.seo.no_index_cities') == true)
		|| (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Search\UserController') && config('settings.seo.no_index_users') == true)
		|| (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Search\CompanyController') && config('settings.seo.no_index_companies') == true)
		|| (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Post\ReportController') && config('settings.seo.no_index_post_report') == true)
	)
	<meta name="robots" content="noindex,nofollow">
	<meta name="googlebot" content="noindex">
@endif