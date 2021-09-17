{{--
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
--}}
<?php
	$plugins = array_keys((array)config('plugins'));
	$publicDisk = \Storage::disk(config('filesystems.default'));
	
?>
<!DOCTYPE html>
<html lang="{{ ietfLangTag(config('app.locale')) }}"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.meta-robots', 'common.meta-robots'])
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-title" content="{{ config('settings.app.app_name') }}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-144-precomposed.png') . getPictureVersion() }}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-114-precomposed.png') . getPictureVersion() }}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-72-precomposed.png') . getPictureVersion() }}">
	<link rel="apple-touch-icon-precomposed" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-57-precomposed.png') . getPictureVersion() }}">
	<link rel="shortcut icon" href="{{ imgUrl(config('settings.app.favicon'), 'favicon') }}">
	<title>{!! MetaTag::get('title') !!}</title>
	{!! MetaTag::tag('description') !!}{!! MetaTag::tag('keywords') !!}
	<link rel="canonical" href="{{ request()->fullUrl() }}"/>
	@if (isset($post))
		@if (isVerifiedPost($post))
			@if (config('services.facebook.client_id'))
				<meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />
			@endif
			{!! $og->renderTags() !!}
			{!! MetaTag::twitterCard() !!}
		@endif
	@else
		@if (config('services.facebook.client_id'))
			<meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />
		@endif
		{!! $og->renderTags() !!}
		{!! MetaTag::twitterCard() !!}
	@endif
	@include('feed::links')
	{!! seoSiteVerification() !!}
	
	@if (file_exists(public_path('manifest.json')))
		<link rel="manifest" href="/manifest.json">
	@endif
	
	@stack('before_styles_stack')
	@yield('before_styles')
	
	@if (config('lang.direction') == 'rtl')
		<link href="https://fonts.googleapis.com/css?family=Cairo|Changa" rel="stylesheet">
		<link href="{{ url(mix('css/app.rtl.css')) }}" rel="stylesheet">
	@else
		<link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
	@endif
	@if (config('plugins.detectadsblocker.installed'))
		<link href="{{ url('assets/detectadsblocker/css/style.css') . getPictureVersion() }}" rel="stylesheet">
	@endif

	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.tools.style', 'layouts.inc.tools.style'])
	<link href="{{ asset('assets/plugins/fontawesome/css/all.css') }}" rel="stylesheet">
	<link href="{{ url()->asset('public/css/custom.css') . getPictureVersion() }}" rel="stylesheet">
	<!-- <link href="{{ url()->asset('public/css/site.css') . getPictureVersion() }}" rel="stylesheet"> -->
	<link href="{{ url()->asset('public/css/profile.css') . getPictureVersion() }}" rel="stylesheet">
	
	@stack('after_styles_stack')
	@yield('after_styles')
	
	@if (isset($plugins) and !empty($plugins))
		@foreach($plugins as $plugin)
			@yield($plugin . '_styles')
		@endforeach
	@endif
	
	@if (config('settings.style.custom_css'))
		{!! printCss(config('settings.style.custom_css')) . "\n" !!}
	@endif
	
	@if (config('settings.other.js_code'))
		{!! printJs(config('settings.other.js_code')) . "\n" !!}
	@endif

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<script>
		paceOptions = {
			elements: true
		};
	</script>
	<script src="{{ url()->asset('assets/js/pace.min.js') }}"></script>
	<script src="{{ url()->asset('assets/plugins/modernizr/modernizr-custom.js') }}"></script>
	
	@yield('captcha_head')
</head>
<body class="{{ config('app.skin') }}">
<div id="wrappers" class="profile-cont">

	@section('header')
		@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.profile-header', 'layouts.inc.profile-header'])
	@show


	@yield('content')

	@section('info')
	@show
	
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.auto', 'layouts.inc.advertising.auto'])
	

</div>

@section('modal_location')
@show
@section('modal_abuse')
@show
@section('modal_message')
@show


@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.change-country', 'layouts.inc.modal.change-country'])
@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.error', 'layouts.inc.modal.error'])
@include('cookieConsent::index')

@if (config('plugins.detectadsblocker.installed'))
	@if (view()->exists('detectadsblocker::modal'))
		@include('detectadsblocker::modal')
	@endif
@endif

@include('layouts.inc.modal.free-resume')
<script>
	{{-- Init. Root Vars --}}
	var siteUrl = '{{ url('/') }}';
	var languageCode = '<?php echo config('app.locale'); ?>';
	var countryCode = '<?php echo config('country.code', 0); ?>';
	var timerNewMessagesChecking = <?php echo (int)config('settings.other.timer_new_messages_checking', 0); ?>;
	var isLogged = <?php echo (auth()->check()) ? 'true' : 'false'; ?>;
	var isLoggedAdmin = <?php echo (auth()->check() && auth()->user()->can(\App\Models\Permission::getStaffPermissions())) ? 'true' : 'false'; ?>;
	
	{{-- Init. Translation Vars --}}
	var langLayout = {
		'hideMaxListItems': {
			'moreText': "{{ t('View More') }}",
			'lessText': "{{ t('View Less') }}"
		},
		'select2': {
			errorLoading: function(){
				return "{!! t('The results could not be loaded') !!}"
			},
			inputTooLong: function(e){
				var t = e.input.length - e.maximum, n = {!! t('Please delete X character') !!};
				return t != 1 && (n += 's'),n
			},
			inputTooShort: function(e){
				var t = e.minimum - e.input.length, n = {!! t('Please enter X or more characters') !!};
				return n
			},
			loadingMore: function(){
				return "{!! t('Loading more results') !!}"
			},
			maximumSelected: function(e){
				var t = {!! t('You can only select N item') !!};
				return e.maximum != 1 && (t += 's'),t
			},
			noResults: function(){
				return "{!! t('No results found') !!}"
			},
			searching: function(){
				return "{!! t('Searching') !!}"
			}
		}
	};
	var fakeLocationsResults = "{{ config('settings.listing.fake_locations_results', 0) }}";
	var stateOrRegionKeyword = "{{ t('area') }}";
	var errorText = {
		errorFound: "{{ t('error_found') }}"
	};
</script>

@stack('before_scripts_stack')
@yield('before_scripts')

@if(!auth()->check())
<script src='https://www.google.com/recaptcha/api.js'></script>
@endif

<script src="{{ url(mix('js/app.js')) }}"></script>
<script src="{{ url('js/custom.js') }}"></script>
@if (file_exists(public_path() . '/assets/plugins/select2/js/i18n/'.config('app.locale').'.js'))
	<script src="{{ url()->asset('assets/plugins/select2/js/i18n/'.config('app.locale').'.js') }}"></script>
@endif
@if (config('plugins.detectadsblocker.installed'))
	<script src="{{ url('assets/detectadsblocker/js/script.js') . getPictureVersion() }}"></script>
@endif
<script>
	$(document).ready(function () {
		{{-- Select Boxes --}}
		$('.selecter').select2({
			language: langLayout.select2,
			dropdownAutoWidth: 'true',
			minimumResultsForSearch: Infinity,
			width: '100%'
		});
		
		{{-- Searchable Select Boxes --}}
		$('.sselecter').select2({
			language: langLayout.select2,
			dropdownAutoWidth: 'true',
			width: '100%'
		});
		
		{{-- Social Share --}}
		$('.share').ShareLink({
			title: '{{ addslashes(MetaTag::get('title')) }}',
			text: '{!! addslashes(MetaTag::get('title')) !!}',
			url: '{!! request()->fullUrl() !!}',
			width: 640,
			height: 480
		});
		
		{{-- popper.js --}}
		$('[data-toggle="popover"]').popover();
		

	});
</script>
@stack('after_scripts_stack')
@yield('after_scripts')
@yield('captcha_footer')

@if (isset($plugins) and !empty($plugins))
	@foreach($plugins as $plugin)
		@yield($plugin . '_scripts')
	@endforeach
@endif

@if (config('settings.footer.tracking_code'))
	{!! printJs(config('settings.footer.tracking_code')) . "\n" !!}
@endif
</body>
</html>