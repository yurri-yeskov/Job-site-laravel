<?php
// Search parameters
$queryString = (request()->getQueryString() ? ('?' . request()->getQueryString()) : '');

// Check if the Multi-Countries selection is enabled
$multiCountriesIsEnabled = false;
$multiCountriesLabel = '';

// Logo Label
$logoLabel = '';
if (request()->segment(1) != 'countries') {
	if (isset($multiCountriesIsEnabled) and $multiCountriesIsEnabled) {
		$logoLabel = config('settings.app.app_name') . ((!empty(config('country.name'))) ? ' ' . config('country.name') : '');
	}
}
?>
<div class="header">
	<nav class="navbar fixed-top navbar-site navbar-light bg-light navbar-expand-md" role="navigation">
		<div class="container">
			
			<div class="navbar-identity">
				{{-- Logo --}}
				<a href="{{ url('/') }}" class="navbar-brand logo logo-title">
					<img src="{{ imgUrl(config('settings.app.logo', config('larapen.core.logo')), 'logo') }}" class="tooltipHere main-logo" />
				</a>
				{{-- Toggle Nav (Mobile) --}}
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right" type="button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
						<title>{{ t('Menu') }}</title>
						<path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
					</svg>
				</button>
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
					{{-- Country Flag --}}
					@if (request()->segment(1) != 'countries')
						@if (config('settings.geo_location.country_flag_activation'))
							@if (!empty(config('country.icode')))
								@if (file_exists(public_path() . '/images/flags/32/' . config('country.icode') . '.png'))
									<li class="flag-menu country-flag tooltipHere hidden-xs nav-item" data-toggle="tooltip" data-placement="{{ (config('lang.direction') == 'rtl') ? 'bottom' : 'right' }}">
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
					@endif
				</ul>
				
				<ul class="nav navbar-nav ml-auto navbar-right">
					@if (!auth()->check())
						<li class="nav-item">
							<a href="#quickLogin" class="nav-link" data-toggle="modal"><i class="icon-user fa"></i> {{ t('log_in') }}</a>
						</li>
						<li class="nav-item">
							<a href="#quickSignupAll" class="nav-link" data-toggle="modal"><i class="icon-user-add fa"></i> {{ t('register') }}</a>
						</li>
					@else
						<li class="nav-item">
							@if (app('impersonate')->isImpersonating())
								<a href="{{ route('impersonate.leave') }}" class="nav-link">
									<i class="icon-logout hidden-sm"></i> {{ t('Leave') }}
								</a>
							@else
								<a href="{{ \App\Helpers\UrlGen::logout() }}" class="nav-link">
									<i class="glyphicon glyphicon-off"></i> {{ t('log_out') }}
								</a>
							@endif
						</li>
						<li class="nav-item dropdown no-arrow">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<i class="icon-user fa hidden-sm"></i>
								<span>{{ auth()->user()->name }}</span>
								<i class="icon-down-open-big fa"></i>
							</a>
							<ul id="userMenuDropdown" class="dropdown-menu user-menu dropdown-menu-right shadow-sm">
								<li class="dropdown-item active">
									<a href="{{ url('account') }}">
										<i class="icon-home"></i> {{ t('Personal Home') }}
									</a>
								</li>
								@if (in_array(auth()->user()->user_type_id, [1]))
									<li class="dropdown-item">
										<a href="{{ url('account/companies') }}">
											<i class="icon-town-hall"></i> {{ t('My companies') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/my-posts') }}">
											<i class="icon-th-thumb"></i> {{ t('my_ads') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/pending-approval') }}">
											<i class="icon-hourglass"></i> {{ t('pending_approval') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/archived') }}">
											<i class="icon-folder-close"></i> {{ t('archived_ads') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/messages') }}">
											<i class="icon-mail-1"></i> {{ t('messenger') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/transactions') }}">
											<i class="icon-money"></i> {{ t('Transactions') }}
										</a>
									</li>
								@endif
								@if (in_array(auth()->user()->user_type_id, [2]))
									<li class="dropdown-item">
										<a href="{{ url('account/resumes') }}">
											<i class="icon-attach"></i> {{ t('My resumes') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/favourite') }}">
											<i class="icon-heart"></i> {{ t('Favourite jobs') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/saved-search') }}">
											<i class="icon-star-circled"></i> {{ t('Saved searches') }}
										</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('account/messages') }}">
											<i class="icon-mail-1"></i> {{ t('messenger') }}
										</a>
									</li>
								@endif
							</ul>
						</li>
					@endif
					
					@if (!auth()->check())
						<li class="nav-item postadd">
							@if (config('settings.single.guests_can_post_ads') != '1')
								<a class="btn btn-block btn-post btn-add-listing" href="#quickLogin" data-toggle="modal">
									<i class="fa fa-plus-circle"></i> {{ t('Create a Job ad') }}
								</a>
							@else
								<a class="btn btn-block btn-post btn-add-listing" href="{{ \App\Helpers\UrlGen::addPost(true) }}">
									<i class="fa fa-plus-circle"></i> {{ t('Create a Job ad') }}
								</a>
							@endif
						</li>
					@else
						@if (in_array(auth()->user()->user_type_id, [1]))
							<li class="nav-item postadd">
								<a class="btn btn-block btn-post btn-add-listing" href="{{ \App\Helpers\UrlGen::addPost(true) }}">
									<i class="fa fa-plus-circle"></i> {{ t('Create a Job ad') }}
								</a>
							</li>
						@endif
					@endif

					@if (!empty(config('lang.abbr')))
						@if (is_array(getSupportedLanguages()) && count(getSupportedLanguages()) > 1)
							<!-- Language selector -->
							<li class="dropdown lang-menu nav-item">
								<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
									<span class="lang-title">{{ strtoupper(config('app.locale')) }}</span>
								</button>
								<ul id="langMenuDropdown" class="dropdown-menu dropdown-menu-right user-menu shadow-sm" role="menu">
									@foreach(getSupportedLanguages() as $langCode => $lang)
										@continue(strtolower($langCode) == strtolower(config('app.locale')))
										<li class="dropdown-item">
											<a href="{{ url('lang/' . $langCode) }}" tabindex="-1" rel="alternate" hreflang="{{ $langCode }}">
												<span class="lang-name">{{{ $lang['native'] }}}</span>
											</a>
										</li>
									@endforeach
								</ul>
							</li>
						@endif
					@endif
				</ul>

			</div>
		</div>
	</nav>
</div>
