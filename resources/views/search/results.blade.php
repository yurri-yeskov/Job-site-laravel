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
@extends('layouts.master')

@section('search')
	@parent
	@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.form', 'search.inc.form'])
@endsection

@section('content')
	<div class="main-container">
		
		@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.breadcrumbs', 'search.inc.breadcrumbs'])
		@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.categories', 'search.inc.categories'])
		<?php if (isset($topAdvertising) and !empty($topAdvertising)): ?>
			@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.top', 'layouts.inc.advertising.top'], ['paddingTopExists' => true])
		<?php
			$paddingTopExists = false;
		else:
			if (isset($paddingTopExists) and $paddingTopExists) {
				$paddingTopExists = false;
			}
		endif;
		?>
		@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
		
		<div class="container">

			<div class="row">
				@if (session()->has('flash_notification'))
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif
			</div>

			<div class="row">
				
				<!-- Sidebar -->
				@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.sidebar', 'search.inc.sidebar'])
				
				<!-- Content -->
				<div class="col-md-9 page-content col-thin-left">
					<div class="category-list">
						<div class="tab-box clearfix">

							<!-- Nav tabs -->
							<div class="col-xl-12 box-title no-border">
								<div class="inner">
									<h2>
										<small>{{ $count->get('all') }} {{ t('Jobs Found') }}</small>
									</h2>
								</div>
							</div>

							<!-- Mobile Filter bar -->
							<div class="col-xl-12 mobile-filter-bar">
								<ul class="list-unstyled list-inline no-margin no-padding">
									<li class="filter-toggle">
										<a class="">
											<i class="icon-th-list"></i> {{ t('Filters') }}
										</a>
									</li>
									<li>
										<div class="dropdown">
											<a data-toggle="dropdown" class="dropdown-toggle">{{ t('Sort by') }}</a>
											<ul class="dropdown-menu">
												<li>
													<a href="{!! qsUrl(request()->url(), request()->except(['orderBy', 'distance']), null, false) !!}" rel="nofollow">
														{{ t('Sort by') }}
													</a>
												</li>
												@if (request()->filled('q'))
													<li>
														<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'relevance']), null, false) !!}" rel="nofollow">
															{{ t('Relevance') }}
														</a>
													</li>
												@endif
												<li>
													<a href="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'date']), null, false) !!}" rel="nofollow">
														{{ t('Date') }}
													</a>
												</li>
												@if (isset($city, $distanceRange) and !empty($city) and !empty($distanceRange))
													@foreach($distanceRange as $key => $value)
													<li>
														<a href="{!! qsUrl(request()->url(), array_merge(request()->except('distance'), ['distance' => $value]), null, false) !!}" rel="nofollow">
															{{ t('around_x_distance', ['distance' => $value, 'unit' => getDistanceUnit()]) }}
														</a>
													</li>
													@endforeach
												@endif
											</ul>

										</div>
									</li>
								</ul>
							</div>
							<div class="menu-overly-mask"></div>
							<!-- Mobile Filter bar End-->


							<div class="tab-filter hide-xs">
								<select id="orderBy" class="niceselecter select-sort-by" data-style="btn-select" data-width="auto">
									<option value="{!! qsUrl(request()->url(), request()->except(['orderBy', 'distance']), null, false) !!}">{{ t('Sort by') }}</option>
									@if (request()->filled('q'))
										<option{{ (request()->get('orderBy')=='relevance') ? ' selected="selected"' : '' }}
												value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'relevance']), null, false) !!}">
											{{ t('Relevance') }}
										</option>
									@endif
									<option{{ (request()->get('orderBy')=='date') ? ' selected="selected"' : '' }}
											value="{!! qsUrl(request()->url(), array_merge(request()->except('orderBy'), ['orderBy'=>'date']), null, false) !!}">
										{{ t('Date') }}
									</option>
									@if (isset($city, $distanceRange) and !empty($city) and !empty($distanceRange))
										@foreach($distanceRange as $key => $value)
											<option{{ (request()->get('distance', config('settings.listing.search_distance_default', 100))==$value) ? ' selected="selected"' : '' }}
													value="{!! qsUrl(request()->url(), array_merge(request()->except('distance'), ['distance' => $value]), null, false) !!}">
												{{ t('around_x_distance', ['distance' => $value, 'unit' => getDistanceUnit()]) }}
											</option>
										@endforeach
									@endif
								</select>
							</div>

						</div>

						<div class="listing-filter hidden-xs">
							<div class="pull-left col-md-9 col-sm-8 col-12">
								<div class="breadcrumb-list text-center-xs">
									{!! (isset($htmlTitle)) ? $htmlTitle : '' !!}
								</div>
							</div>
							<div class="pull-right col-md-3 col-sm-4 col-12 text-right text-center-xs listing-view-action">
								@if (!empty(request()->all()))
									<a class="clear-all-button text-muted" href="{!! \App\Helpers\UrlGen::search() !!}">{{ t('Clear all') }}</a>
								@endif
							</div>
							<div style="clear:both;"></div>
						</div>

						<div class="posts-wrapper jobs-list">
							@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.posts', 'search.inc.posts'])
						</div>

						<div class="tab-box save-search-bar text-center">
							@if (request()->filled('q') and request()->get('q') != '' and $count->get('all') > 0)
								<a name="{!! qsUrl(request()->url(), request()->except(['_token', 'location']), null, false) !!}" id="saveSearch"
								   count="{{ $count->get('all') }}">
									<i class="icon-star-empty"></i> {{ t('Save Search') }}
								</a>
							@else
								<a href="#"> &nbsp; </a>
							@endif
						</div>
					</div>
					
					<nav class="pagination-bar mb-5 pagination-sm" aria-label="">
						{!! $posts->appends(request()->query())->links() !!}
					</nav>

					@if (!auth()->check())
						<div class="post-promo text-center">
							<h2> {{ t('Looking for a job') }} </h2>
							<h5> {{ t('Upload your Resume and easily apply to jobs from any device') }} </h5>
							<a href="{{ \App\Helpers\UrlGen::register() . '?type=2' }}" class="btn btn-border btn-post btn-add-listing">
								{{ t('Add your Resume') }} <i class="icon-attach"></i>
							</a>
						</div>
					@endif

				</div>
				
				<div style="clear:both;"></div>

				<!-- Advertising -->
				@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.bottom', 'layouts.inc.advertising.bottom'])

			</div>

		</div>
	</div>
@endsection

@section('modal_location')
	@parent
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.location', 'layouts.inc.modal.location'])
@endsection

@section('after_scripts')
	<script>
        $(document).ready(function () {
			$('#postType a').click(function (e) {
				e.preventDefault();
				var goToUrl = $(this).attr('href');
				redirect(goToUrl);
			});
			$('#orderBy').change(function () {
				var goToUrl = $(this).val();
				redirect(goToUrl);
			});
		});
	</script>
@endsection
