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
<!DOCTYPE html>
<html lang="{{ ietfLangTag(config('app.locale')) }}"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow">
	<meta name="googlebot" content="noindex">
	<link rel="shortcut icon" href="{{ imgUrl(config('settings.app.favicon'), 'favicon') . getPictureVersion() }}">
	<title>@yield('title')</title>
	
	@if (file_exists(public_path('manifest.json')))
		<link rel="manifest" href="/manifest.json">
	@endif
	
	@yield('before_styles')
	
	@if (config('lang.direction') == 'rtl')
		<link href="https://fonts.googleapis.com/css?family=Cairo|Changa" rel="stylesheet">
		<link href="{{ url(mix('css/app.rtl.css')) }}" rel="stylesheet">
	@else
		<link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
	@endif
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.tools.style', 'layouts.inc.tools.style'])
	<link href="{{ url('css/custom.css') . getPictureVersion() }}" rel="stylesheet">
	<link href="{{ url()->asset('public/css/site.css') . getPictureVersion() }}" rel="stylesheet">
	
	@yield('after_styles')
	
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
	<script src="{{ url('assets/js/pace.min.js') }}"></script>
	@if(!auth()->check())
		<script src='https://www.google.com/recaptcha/api.js'></script>
	@endif
</head>
<body class="{{ config('settings.style.app_skin') }}">

<div id="wrapper">

	@section('header')
		@includeFirst([config('larapen.core.customizedViewPath') . 'errors.layouts.inc.header', 'errors.layouts.inc.header'])
	@show

	@section('search')
	@show

	@yield('content')

	@section('info')
	@show
	
	@section('footer')
		@includeFirst([config('larapen.core.customizedViewPath') . 'errors.layouts.inc.footer', 'errors.layouts.inc.footer'])
	@show

</div>
@includeWhen(!auth()->check(), 'layouts.inc.modal.login')
@includeWhen(!auth()->check(), 'layouts.inc.modal.register')
@includeWhen(!auth()->check(), 'layouts.inc.modal.forgot-password')
@includeWhen(!auth()->check(), 'layouts.inc.modal.forgot-pass-confirm')

@yield('before_scripts')

<script>
	{{-- Init. Root Vars --}}
	var siteUrl = '{{ url('/') }}';
	var languageCode = '<?php echo config('app.locale'); ?>';
	var countryCode = '<?php echo config('country.code', 0); ?>';
	
	{{-- Init. Translation Vars --}}
	var langLayout = {
		'hideMaxListItems': {
			'moreText': "{{ t('View More') }}",
			'lessText': "{{ t('View Less') }}"
		}
	};

	$(document).ready(function () {
		{{-- Modal Login --}}
		@if (isset($errors) and $errors->any())
			@if ($errors->any() and old('quickLoginForm')=='1')
				$('#quickLogin').modal();
			@endif
		@endif

		@if(session()->has('social_popup'))
			$('#socialFillSignup').modal();
		@endif

		@if(session()->has('captcha_error') || session()->has('fp_error'))
			$('#fPassword').modal();
		@endif

		@if(session()->has('f_pass_confirm'))
			$('#fPasswordConfirm').modal();
		@endif

	});
</script>
<script src="{{ url(mix('js/app.js')) }}"></script>
<script src="{{ url('js/custom.js') }}"></script>

@yield('after_scripts')

@if (config('settings.footer.tracking_code'))
	{!! printJs(config('settings.footer.tracking_code')) . "\n" !!}
@endif
</body>
</html>