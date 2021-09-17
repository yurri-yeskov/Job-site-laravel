<?php
// Search parameters
$queryString = (request()->getQueryString() ? ('?' . request()->getQueryString()) : '');

// Check if the Multi-Countries selection is enabled
$multiCountriesIsEnabled = false;
$multiCountriesLabel = '';
if (config('settings.geo_location.country_flag_activation')) {
	if (!empty(config('country.code'))) {
		if (isset($countries) && $countries->count() > 1) {
			$multiCountriesIsEnabled = true;
			$multiCountriesLabel = 'title="' . t('Select a Country') . '"';
		}
	}
}

// Logo Label
$logoLabel = '';
if (request()->segment(1) != 'countries') {
	if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled) {
		$logoLabel = config('settings.app.app_name') . ((!empty(config('country.name'))) ? ' ' . config('country.name') : '');
	}
}
?>
<div class="header">
	<nav class="navbar fixed-top navbar-site navbar-light bg-light navbar-expand-md site-header" role="navigation">
		<div class="container-fluid container-max">

			<div class="navbar-identity">
				{{-- Logo --}}
				<a href="{{ url('/') }}" class="navbar-brand logo logo-title">
					<img src="{{asset('img/logo/logo.png')}}"
					alt="{{ strtolower(config('settings.app.app_name')) }}" class="tooltipHere main-logo" title="" data-placement="bottom"
					data-toggle="tooltip"
					data-original-title="{!! isset($logoLabel) ? $logoLabel : '' !!}"/>
				</a>
				
				{{-- Country Flag (Mobile) --}}
				@if (request()->segment(1) != 'countries')
				@if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled)
				@if (!empty(config('country.icode')))
				@if (file_exists(public_path().'/images/flags/24/' . config('country.icode') . '.png'))
				<button class="flag-menu country-flag d-block d-md-none btn btn-secondary hidden pull-right" href="#selectCountry" data-toggle="modal">
					<img src="{{ url('images/flags/24/' . config('country.icode') . '.png') . getPictureVersion() }}"
					alt="{{ config('country.name') }}"
					style="float: left;"
					>
					<span class="caret hidden-xs"></span>
				</button>
				@endif
				@endif
				@endif
				@endif
			</div>
			
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<!-- {{-- Country Flag --}}
					@if (request()->segment(1) != 'countries')
					@if (config('settings.geo_location.country_flag_activation'))
					@if (!empty(config('country.icode')))
					@if (file_exists(public_path() . '/images/flags/32/' . config('country.icode') . '.png'))
					<li class="flag-menu country-flag tooltipHere hidden-xs nav-item" data-toggle="tooltip" data-placement="{{ (config('lang.direction') == 'rtl') ? 'bottom' : 'right' }}" {!! $multiCountriesLabel !!}>
						@if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled)
						<a href="#selectCountry" data-toggle="modal" class="nav-link">
							<img class="flag-icon"
							src="{{ url('images/flags/32/' . config('country.icode') . '.png') . getPictureVersion() }}"
							alt="{{ config('country.name') }}"
							>
							<span class="caret hidden-sm"></span>
						</a>
						@else
						<a style="cursor: default;">
							<img class="flag-icon no-caret"
							src="{{ url('images/flags/32/' . config('country.icode') . '.png') . getPictureVersion() }}"
							alt="{{ config('country.name') }}"
							>
						</a>
						@endif
					</li>
					@endif
					@endif
					@endif
					@endif -->
					<!-- <li class="nav-item">
						<a href="{{ \App\Helpers\UrlGen::search() }}" class="nav-link">
							<i class="icon-th-list-2 hidden-sm"></i> {{ t('Browse Jobs') }}
						</a>
					</li> -->
					<li class="nav-item">
						<a href="{{ url('/worker') }}" class="nav-link">For Worker</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('/employer') }}" class="nav-link">For Employers</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('/how-it-work') }}" class="nav-link">How it works</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('/aboutus') }}" class="nav-link">About</a>
					</li>
					<li class="nav-item">
						<a href="{{ url('/blog-list') }}" class="nav-link">Blog</a>
					</li>
				</ul>
			</div>
			<div class="right-menu">
				<ul class="nav navbar-nav ml-auto navbar-right">
					@if (!auth()->check())
					<li class="nav-item custom-link">
						<a href="#quickSignupAll" class="nav-link" data-toggle="modal">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
								<path d="M14.5261 0.991209L14.0093 0.474391C13.7028 0.167902 13.2969 0 12.8648 0C12.4328 0 12.0252 0.169534 11.7188 0.476022L1.41391 10.7988C1.35032 10.8624 1.30142 10.9374 1.26881 11.0189L0.046119 14.1066C-0.0500661 14.3479 0.00699285 14.6234 0.191212 14.8076C0.316742 14.9332 0.483028 15 0.654205 15C0.734088 15 0.81397 14.9853 0.892223 14.9543L3.98971 13.7414C4.07285 13.7088 4.14948 13.6583 4.21306 13.5947L14.5277 3.2801C15.157 2.64919 15.157 1.62375 14.5261 0.991209ZM2.40836 11.684L3.32457 12.6003L1.81006 13.1937L2.40836 11.684ZM13.6033 2.35898L4.59943 11.3629L3.64573 10.4092L12.6415 1.39714C12.7214 1.31726 12.8159 1.30421 12.8632 1.30421C12.9121 1.30421 13.005 1.31563 13.0865 1.39714L13.6033 1.91392C13.7256 2.03619 13.7256 2.23508 13.6033 2.35898Z" fill="white"/>
							</svg>
							<span>
								{{ t('sign_up') }}
							</span>
						</a>
					</li>
					<li class="nav-item custom-link">
						<a href="#quickLogin" class="nav-link" data-toggle="modal">
							<svg xmlns="http://www.w3.org/2000/svg" width="19" height="15" viewBox="0 0 19 15" fill="none">
								<path d="M12.1622 10.4817V14.1892C12.1622 14.6372 11.8378 15 11.3899 15H0.810811C0.362838 15 0 14.6372 0 14.1892V0.810811C0 0.362838 0.362838 0 0.810811 0H11.3878C11.8358 0 12.1601 0.362838 12.1601 0.810811V4.51825C12.1601 4.96622 11.7973 5.32906 11.3493 5.32906C10.9014 5.32906 10.5385 4.96622 10.5385 4.51825V1.62162H1.61959V13.3784H10.5385V10.4817C10.5385 10.0338 10.9014 9.67094 11.3493 9.67094C11.7993 9.67094 12.1622 10.0338 12.1622 10.4817ZM18.4135 6.90204L15.2371 3.69324C14.923 3.37499 14.4081 3.37296 14.0899 3.68715C13.7716 4.00134 13.7696 4.51624 14.0838 4.83448L15.898 6.66484L6.05879 6.68716C5.61081 6.68919 5.24798 7.05203 5.25001 7.5C5.25203 7.94797 5.61284 8.30878 6.06082 8.30878H6.06285L15.8898 8.28646L14.0858 10.1088C13.7716 10.4271 13.7737 10.9399 14.0919 11.2561C14.25 11.4122 14.4568 11.4912 14.6615 11.4912C14.8703 11.4912 15.079 11.4101 15.2371 11.25L18.4135 8.0412C18.7277 7.72701 18.7277 7.21825 18.4135 6.90204Z" fill="white"/>
							</svg>
							<span>
								{{ t('log_in') }}
							</span>
						</a>
					</li>
					@else
					<li class="nav-item custom-link login-links">
						@if (app('impersonate')->isImpersonating())
						<a href="{{ route('impersonate.leave') }}" class="nav-link">
							<i class="icon-logout"></i> 
							<span>{{ t('Leave') }}</span>
						</a>
						@else
						<a href="{{ \App\Helpers\UrlGen::logout() }}" class="nav-link">
							<i class="icon-logout"></i>
							<span>{{ t('log_out') }}</span>
						</a>
						@endif
					</li>
					<li class="nav-item dropdown no-arrow custom-link login-links">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="icon-user fa"></i>
							<span>{{ auth()->user()->name }}</span>
							<span class="badge badge-pill badge-important count-threads-with-new-messages hidden-sm">0</span>
							<i class="icon-down-open-big fa"></i>
						</a>
						<ul id="userMenuDropdown" class="dropdown-menu user-menu dropdown-menu-right shadow-sm">
							<li class="dropdown-item active"><a href="{{ url('account') }}"><i class="icon-home"></i> {{ t('Personal Home') }}</a></li>
							@if (in_array(auth()->user()->user_type_id, [1]))
							<li class="dropdown-item"><a href="{{ url('account/companies') }}"><i class="icon-town-hall"></i> {{ t('My companies') }} </a></li>
							<li class="dropdown-item"><a href="{{ url('account/my-posts') }}"><i class="icon-th-thumb"></i> {{ t('my_ads') }} </a></li>
							<li class="dropdown-item"><a href="{{ url('account/pending-approval') }}"><i class="icon-hourglass"></i> {{ t('pending_approval') }} </a></li>
							<li class="dropdown-item"><a href="{{ url('account/archived') }}"><i class="icon-folder-close"></i> {{ t('archived_ads') }}</a></li>
							<li class="dropdown-item">
								<a href="{{ url('account/messages') }}">
									<i class="icon-mail-1"></i> {{ t('messenger') }}
									<span class="badge badge-pill badge-important count-threads-with-new-messages">0</span>
								</a>
							</li>
							<li class="dropdown-item"><a href="{{ url('account/transactions') }}"><i class="icon-money"></i> {{ t('Transactions') }}</a></li>
							@endif
							@if (in_array(auth()->user()->user_type_id, [2]))
							<li class="dropdown-item"><a href="{{ url('account/resumes') }}"><i class="icon-attach"></i> {{ t('My resumes') }} </a></li>
							<li class="dropdown-item"><a href="{{ url('account/favourite') }}"><i class="icon-heart"></i> {{ t('Favourite jobs') }} </a></li>
							<li class="dropdown-item"><a href="{{ url('account/saved-search') }}"><i class="icon-star-circled"></i> {{ t('Saved searches') }} </a></li>
							<li class="dropdown-item">
								<a href="{{ url('account/messages') }}">
									<i class="icon-mail-1"></i> {{ t('messenger') }}
									<span class="badge badge-pill badge-important count-threads-with-new-messages">0</span>
								</a>
							</li>
							@endif
							<li class="dropdown-divider"></li>
							<li class="dropdown-item">
								@if (app('impersonate')->isImpersonating())
								<a href="{{ route('impersonate.leave') }}"><i class="icon-logout"></i> {{ t('Leave') }}</a>
								@else
								<a href="{{ \App\Helpers\UrlGen::logout() }}"><i class="icon-logout"></i> {{ t('log_out') }}</a>
								@endif
							</li>
						</ul>
					</li>
					@endif
					
					@if (!auth()->check() || (auth()->check() && in_array(auth()->user()->user_type_id, [1])))
					@if (config('settings.single.pricing_page_enabled') == '2')
					<li class="nav-item pricing">
						<a href="{{ \App\Helpers\UrlGen::pricing() }}" class="nav-link">
							<i class="fas fa-tags"></i> {{ t('pricing_label') }}
						</a>
					</li>
					@endif
					@endif

					<?php
					$addListingCanBeShown = false;
					// $addListingUrl = \App\Helpers\UrlGen::addPost();
					$addListingUrl = \App\Helpers\UrlGen::addFreePost();
					// $addFreePostUrl = \App\Helpers\UrlGen::addFreePost();
					$addListingAttr = '';
					if (!auth()->check()) {
						$addListingCanBeShown = true;
						if (config('settings.single.guests_can_post_ads') != '1') {
							$addListingUrl = '#quickLogin';
							$addListingAttr = ' data-toggle="modal"';
						}
					} else {
						if (in_array(auth()->user()->user_type_id, [1])) {
							$addListingCanBeShown = true;
						}
					}
					if (config('settings.single.pricing_page_enabled') == '1') {
						$addListingUrl = \App\Helpers\UrlGen::pricing();
						$addListingAttr = '';
					}
					?>
					@if ($addListingCanBeShown)
					<li class="nav-item postadd">
						<a class="btn-post" href="{{ route('jobs.create') }}">
							Post a <span>Free</span> Job!
						</a>
					</li>
					@endif
				</ul>
			</div>
			{{-- Toggle Nav (Mobile) --}}
			<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right" type="button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
					<title>{{ t('Menu') }}</title>
					<path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
				</svg>
			</button>
		</div>
	</nav>

</div>
