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

@section('header')
	@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.header', 'layouts.inc.header'])
@endsection

@section('search')
	@parent
@endsection

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container inner-page">
		<div class="container">
			<div class="section-content">
				<div class="row">

					<h1 class="text-center title-1" style="text-transform: none;">
						<strong>{{ t('countries') }}</strong>
					</h1>
					<hr class="center-block small mt-0">

					@if (isset($countryCols))
						<div class="col-md-12 page-content">
							<div class="inner-box relative">
								
								<h3 class="title-2"><i class="icon-location-2"></i> {{ t('select_a_country') }}</h3>
								
								<div class="row m-0">
									@if (!empty($countryCols))
										@foreach ($countryCols as $key => $col)
											<?php $classBorder = (count($countryCols) == $key+1) ? ' cat-list-border' : ''; ?>
											<ul class="cat-list col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 {{ $classBorder }}">
												@foreach ($col as $k => $country)
													<li>
														<img src="{{ url('images/blank.gif') . getPictureVersion() }}"
															 class="flag flag-{{ ($country->get('icode')=='uk') ? 'gb' : $country->get('icode') }}"
															 style="margin-bottom: 4px; margin-right: 5px;"
														>
														<a href="{{ dmUrl($country, '/', true, true) }}"
														   title="{!! $country->get('name') !!}"
														   class="tooltipHere"
														   data-toggle="tooltip"
														   data-original-title="{!! $country->get('name') !!}"
														>{{ \Illuminate\Support\Str::limit($country->get('name'), 30) }}</a>
													</li>
												@endforeach
											</ul>
										@endforeach
									@else
										<div class="col-12 text-center mb30 text-danger">
											<strong>{{ t('countries_not_found') }}</strong>
										</div>
									@endif
								</div>
								
							</div>
						</div>
					@endif

				</div>

				@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.social.horizontal', 'layouts.inc.social.horizontal'])

			</div>
		</div>
	</div>
@endsection

@section('info')
@endsection

@section('after_scripts')
@endsection
