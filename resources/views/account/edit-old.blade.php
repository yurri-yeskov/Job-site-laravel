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

@section('content')
	@include('common.spacer')
	<div class="main-container">
		<div class="container">
			<div class="row">
				<div class="col-md-3 page-sidebar">
					@include('account.inc.sidebar')
				</div>
				<!--/.page-sidebar-->

				<div class="col-md-9 page-content">

					@include('flash::message')

					@if (isset($errors) && $errors->any())
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><strong>{{ t('oops_an_error_has_occurred') }}</strong></h5>
							<ul class="list list-check">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="inner-box default-inner-box">
						<div class="row">
							<div class="col-md-5 col-sm-4 col-12">
								<h3 class="no-padding text-center-480 useradmin">
									<a href="">
										<img class="userImg" src="{{ $user->photo_url }}" alt="user">&nbsp;
										{{ $user->name }}
									</a>
								</h3>
							</div>
							<div class="col-md-7 col-sm-8 col-12">
								<div class="header-data text-center-xs">
									<!-- Threads Stats -->
									<div class="hdata">
										<div class="mcol-left">
											<i class="fas fa-envelope ln-shadow"></i></div>
										<div class="mcol-right">
											<!-- Number of messages -->
											<p>
												<a href="{{ url('account/messages') }}">
													{{ isset($countThreads) ? \App\Helpers\Number::short($countThreads) : 0 }}
													<em>{{ trans_choice('global.count_mails', getPlural($countThreads), [], config('app.locale')) }}</em>
												</a>
											</p>
										</div>
										<div class="clearfix"></div>
									</div>
									
									@if (isset($user) && in_array($user->user_type_id, [1]))
									<!-- Traffic Stats -->
									<div class="hdata">
										<div class="mcol-left">
											<i class="fa fa-eye ln-shadow"></i>
										</div>
										<div class="mcol-right">
											<!-- Number of visitors -->
											<p>
												<a href="{{ url('account/my-posts') }}">
													<?php $totalPostsVisits = (isset($countPostsVisits) && $countPostsVisits->total_visits) ? $countPostsVisits->total_visits : 0 ?>
                                                    {{ \App\Helpers\Number::short($totalPostsVisits) }}
												    <em>{{ trans_choice('global.count_visits', getPlural($totalPostsVisits), [], config('app.locale')) }}</em>
                                                </a>
											</p>
										</div>
										<div class="clearfix"></div>
									</div>
									
									<!-- Ads Stats -->
									<div class="hdata">
										<div class="mcol-left">
											<i class="icon-th-thumb ln-shadow"></i>
										</div>
										<div class="mcol-right">
											<!-- Number of ads -->
											<p>
												<a href="{{ url('account/my-posts') }}">
                                                    {{ \App\Helpers\Number::short($countPosts) }}
												    <em>{{ trans_choice('global.count_posts', getPlural($countPosts), [], config('app.locale')) }}</em>
                                                </a>
											</p>
										</div>
										<div class="clearfix"></div>
									</div>
									@endif
                                    
                                    @if (isset($user) && in_array($user->user_type_id, [2]))
									<!-- Favorites Stats -->
									<div class="hdata">
										<div class="mcol-left">
											<i class="fa fa-user ln-shadow"></i>
										</div>
										<div class="mcol-right">
											<!-- Number of favorites -->
											<p>
												<a href="{{ url('account/favourite') }}">
                                                    {{ \App\Helpers\Number::short($countFavoritePosts) }}
												    <em>{{ trans_choice('global.count_favorites', getPlural($countFavoritePosts), [], config('app.locale')) }} </em>
                                                </a>
											</p>
										</div>
										<div class="clearfix"></div>
									</div>
                                    @endif
								</div>
							</div>
						</div>
					</div>

					<div class="inner-box default-inner-box">
						<div class="welcome-msg">
							<h3 class="page-sub-header2 clearfix no-padding">{{ t('Hello') }} {{ $user->name }} ! </h3>
							<span class="page-sub-header-sub small">
                                {{ t('You last logged in at') }}: {{ \App\Helpers\Date::format($user->last_login_at, 'datetime') }}
                            </span>
						</div>
						
						<div id="accordion" class="panel-group">
							{{-- USER --}}
							<div class="card card-default">
								<div class="card-header">
									<h4 class="card-title"><a href="#userPanel" data-toggle="collapse" data-parent="#accordion">{{ t('Account Details') }}</a></h4>
								</div>
								<?php
								$userPanelClass = '';
								$userPanelClass = request()->filled('panel')
									? (request()->get('panel') == 'user' ? 'show' : $userPanelClass)
									: ((old('panel')=='' || old('panel')=='user') ? 'show' : $userPanelClass);
								?>
								<div class="panel-collapse collapse {{ $userPanelClass }}" id="userPanel">
									<div class="card-body">
										<form name="details"
											  class="form-horizontal"
											  role="form"
											  method="POST"
											  action="{{ url('account') }}"
											  enctype="multipart/form-data"
										>
											{!! csrf_field() !!}
											<input name="_method" type="hidden" value="PUT">
											<input name="panel" type="hidden" value="user">
                                            
                                            @if (empty($user->user_type_id) || $user->user_type_id == 0)
												
												{{-- user_type_id --}}
												<?php $userTypeIdError = (isset($errors) && $errors->has('user_type_id')) ? ' is-invalid' : ''; ?>
                                                <div class="form-group row required">
                                                    <label class="col-md-3 col-form-label{{ $userTypeIdError }}">{{ t('you_are_a') }} <sup>*</sup></label>
                                                    <div class="col-md-9">
                                                        <select name="user_type_id" id="userTypeId" class="form-control selecter{{ $userTypeIdError }}">
                                                            <option value="0"
																	@if (old('user_type_id')=='' || old('user_type_id')==0)
																		selected="selected"
																	@endif
															>
                                                                {{ t('Select') }}
                                                            </option>
                                                            @foreach ($userTypes as $type)
                                                                <option value="{{ $type->id }}"
																		@if (old('user_type_id', $user->user_type_id)==$type->id)
																			selected="selected"
																		@endif
																>
                                                                    {{ t($type->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                    
                                            @else
												
												{{-- gender_id --}}
												<?php $genderIdError = (isset($errors) && $errors->has('gender_id')) ? ' is-invalid' : ''; ?>
                                                <div class="form-group row required">
                                                    <label class="col-md-3 col-form-label">{{ t('gender') }} <sup>*</sup></label>
                                                    <div class="col-md-9">
                                                        @if ($genders->count() > 0)
                                                            @foreach ($genders as $gender)
																<div class="form-check form-check-inline pt-2">
																	<input name="gender_id"
																		   id="gender_id-{{ $gender->id }}"
																		   value="{{ $gender->id }}"
																		   class="form-check-input{{ $genderIdError }}"
																		   type="radio" {{ (old('gender_id', $user->gender_id)==$gender->id) ? 'checked="checked"' : '' }}
																	>
																	<label class="form-check-label" for="gender_id">
																		{{ $gender->name }}
																	</label>
																</div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
												
												{{-- name --}}
												<?php $nameError = (isset($errors) && $errors->has('name')) ? ' is-invalid' : ''; ?>
                                                <div class="form-group row required">
                                                    <label class="col-md-3 col-form-label">{{ t('Name') }} <sup>*</sup></label>
                                                    <div class="col-md-9">
                                                        <input name="name" type="text" class="form-control{{ $nameError }}" placeholder="" value="{{ old('name', $user->name) }}">
                                                    </div>
                                                </div>
												
												{{-- username --}}
												<?php $usernameError = (isset($errors) && $errors->has('username')) ? ' is-invalid' : ''; ?>
												<div class="form-group row required">
													<label class="col-md-3 col-form-label" for="email">{{ t('Username') }}</label>
													<div class="input-group col-md-9">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="icon-user"></i></span>
														</div>
														
														<input id="username"
															   name="username"
															   type="text"
															   class="form-control{{ $usernameError }}"
															   placeholder="{{ t('Username') }}"
															   value="{{ old('username', $user->username) }}"
														>
													</div>
												</div>
												
												{{-- email --}}
												<?php $emailError = (isset($errors) && $errors->has('email')) ? ' is-invalid' : ''; ?>
                                                <div class="form-group row required">
                                                    <label class="col-md-3 col-form-label">{{ t('email') }}
														@if (!isEnabledField('phone'))
															<sup>*</sup>
														@endif
													</label>
													<div class="input-group col-md-9">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="icon-mail"></i></span>
														</div>
		
														<input id="email"
															   name="email"
															   type="email"
															   class="form-control{{ $emailError }}"
															   placeholder="{{ t('email') }}"
															   value="{{ old('email', $user->email) }}"
														>
													</div>
                                                </div>
												
												{{-- country_code --}}
                                                <?php
                                                /*
                                                <?php $countryCodeError = (isset($errors) and $errors->has('country_code')) ? ' is-invalid' : ''; ?>
                                                <div class="form-group row required">
                                                    <label class="col-md-3 col-form-label{{ $countryCodeError }}" for="country_code">{{ t('your_country') }} <sup>*</sup></label>
                                                    <div class="col-md-9">
                                                        <select name="country_code" class="form-control sselecter{{ $countryCodeError }}">
                                                            <option value="0" {{ (!old('country_code') or old('country_code')==0) ? 'selected="selected"' : '' }}>
                                                                {{ t('select_a_country') }}
                                                            </option>
                                                            @foreach ($countries as $item)
                                                                <option value="{{ $item->get('code') }}" {{ (old('country_code', $user->country_code)==$item->get('code')) ? 'selected="selected"' : '' }}>
                                                                    {{ $item->get('name') }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                */
                                                ?>
                                                <input name="country_code" type="hidden" value="{{ $user->country_code }}">
												
												{{-- phone --}}
												<?php $phoneError = (isset($errors) && $errors->has('phone')) ? ' is-invalid' : ''; ?>
                                                <div class="form-group row required">
                                                    <label for="phone" class="col-md-3 col-form-label">{{ t('phone') }}
														@if (!isEnabledField('email'))
															<sup>*</sup>
														@endif
													</label>
													<div class="input-group col-md-9">
														<div class="input-group-prepend">
															<span id="phoneCountry" class="input-group-text">{!! getPhoneIcon(old('country_code', $user->country_code)) !!}</span>
														</div>
		
														<input id="phone" name="phone" type="text" class="form-control{{ $phoneError }}"
															   placeholder="{{ (!isEnabledField('email')) ? t('Mobile Phone Number') : t('phone_number') }}"
															   value="{{ phoneFormat(old('phone', $user->phone), old('country_code', $user->country_code)) }}">
		
														<div class="input-group-append">
														<span class="input-group-text">
															<input name="phone_hidden" id="phoneHidden" type="checkbox"
																   value="1" {{ (old('phone_hidden', $user->phone_hidden)=='1') ? 'checked="checked"' : '' }}>&nbsp;
															<small>{{ t('Hide') }}</small>
														</span>
														</div>
													</div>
                                                </div>
                                                
                                            @endif

											<div class="form-group row">
												<div class="offset-md-3 col-md-9"></div>
											</div>
											
											{{-- button --}}
											<div class="form-group row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-primary">{{ t('Update') }}</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							
							{{-- SETTINGS --}}
							<div class="card card-default">
								<div class="card-header">
									<h4 class="card-title"><a href="#settingsPanel" data-toggle="collapse" data-parent="#accordion">{{ t('Settings') }}</a></h4>
								</div>
								<?php
								$settingsPanelClass = '';
								$settingsPanelClass = request()->filled('panel')
									? (request()->get('panel') == 'settings' ? 'show' : $settingsPanelClass)
									: ((old('panel')=='settings') ? 'show' : $settingsPanelClass);
								?>
								<div class="panel-collapse collapse {{ $settingsPanelClass }}" id="settingsPanel">
									<div class="card-body">
										<form name="settings"
											  class="form-horizontal"
											  role="form"
											  method="POST"
											  action="{{ url('account/settings') }}"
											  enctype="multipart/form-data"
										>
											{!! csrf_field() !!}
											<input name="_method" type="hidden" value="PUT">
											<input name="panel" type="hidden" value="settings">
											
											<input name="gender_id" type="hidden" value="{{ $user->gender_id }}">
											<input name="name" type="hidden" value="{{ $user->name }}">
											<input name="phone" type="hidden" value="{{ $user->phone }}">
											<input name="email" type="hidden" value="{{ $user->email }}">
										
											@if (config('settings.single.activation_facebook_comments') && config('services.facebook.client_id'))
												{{-- disable_comments --}}
												<div class="form-group row">
													<label class="col-md-3 col-form-label"></label>
													<div class="col-md-9">
														<div class="form-check form-check-inline pt-2">
															<label>
																<input id="disable_comments"
																	   name="disable_comments"
																	   value="1"
																	   type="checkbox" {{ ($user->disable_comments==1) ? 'checked' : '' }}
																>
																{{ t('Disable comments on my ads') }}
															</label>
														</div>
													</div>
												</div>
											@endif
											
											{{-- password --}}
											<?php $passwordError = (isset($errors) && $errors->has('password')) ? ' is-invalid' : ''; ?>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">{{ t('New Password') }}</label>
												<div class="col-md-9">
													<input id="password" name="password" type="password" class="form-control{{ $passwordError }}" placeholder="{{ t('password') }}">
												</div>
											</div>
											
											{{-- password_confirmation --}}
											<?php $passwordError = (isset($errors) && $errors->has('password')) ? ' is-invalid' : ''; ?>
											<div class="form-group row <?php echo (isset($errors) && $errors->has('password')) ? ' is-invalid' : ''; ?>">
												<label class="col-md-3 col-form-label">{{ t('Confirm Password') }}</label>
												<div class="col-md-9">
													<input id="password_confirmation" name="password_confirmation" type="password"
														   class="form-control{{ $passwordError }}" placeholder="{{ t('Confirm Password') }}">
												</div>
											</div>
											
											@if ($user->accept_terms != 1)
												{{-- accept_terms --}}
												<?php $acceptTermsError = (isset($errors) && $errors->has('accept_terms')) ? ' is-invalid' : ''; ?>
												<div class="form-group row required">
													<label class="col-md-3 col-form-label"></label>
													<div class="col-md-9">
														<div class="form-check">
															<input name="accept_terms" id="acceptTerms"
																   class="form-check-input{{ $acceptTermsError }}"
																   value="1"
																   type="checkbox" {{ (old('accept_terms', $user->accept_terms)=='1') ? 'checked="checked"' : '' }}
															>
															
															<label class="form-check-label" for="acceptTerms" style="font-weight: normal;">
																{!! t('accept_terms_label', ['attributes' => getUrlPageByType('terms')]) !!}
															</label>
														</div>
														<div style="clear:both"></div>
													</div>
												</div>
												
												<input type="hidden" name="user_accept_terms" value="{{ (int)$user->accept_terms }}">
											@endif
											
											{{-- accept_marketing_offers --}}
											<?php $acceptMarketingOffersError = (isset($errors) && $errors->has('accept_marketing_offers')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required">
												<label class="col-md-3 col-form-label"></label>
												<div class="col-md-9">
													<div class="form-check">
														<input name="accept_marketing_offers" id="acceptMarketingOffers"
															   class="form-check-input{{ $acceptMarketingOffersError }}"
															   value="1"
															   type="checkbox" {{ (old('accept_marketing_offers', $user->accept_marketing_offers)=='1') ? 'checked="checked"' : '' }}
														>
														
														<label class="form-check-label" for="acceptMarketingOffers" style="font-weight: normal;">
															{!! t('accept_marketing_offers_label') !!}
														</label>
													</div>
													<div style="clear:both"></div>
												</div>
											</div>
											
											{{-- time_zone --}}
											<?php $timeZoneError = (isset($errors) && $errors->has('time_zone')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required">
												<label class="col-md-3 col-form-label{{ $timeZoneError }}" for="time_zone">
													{{ t('preferred_time_zone_label') }} <sup>*</sup>
												</label>
												<div class="col-md-9">
													<select name="time_zone" class="form-control sselecter{{ $timeZoneError }}">
														<option value="" {{ (empty(old('time_zone'))) ? 'selected="selected"' : '' }}>
															{{ t('select_a_time_zone') }}
														</option>
														<?php $tz = !empty($user->time_zone) ? $user->time_zone : ''; ?>
														@foreach (\App\Helpers\Date::getTimeZones() as $key => $item)
															<option value="{{ $key }}" {{ (old('time_zone', $tz)==$key) ? 'selected="selected"' : '' }}>
																{{ $item }}
															</option>
														@endforeach
													</select>
													<small id="" class="form-text text-muted">
														@if (auth()->user()->can(\App\Models\Permission::getStaffPermissions()))
															{!! t('admin_preferred_time_zone_info', [
																	'frontTz' => config('country.time_zone'),
																	'country' => config('country.name'),
																	'adminTz' => config('app.timezone'),
																]) !!}
														@else
															{!! t('preferred_time_zone_info', [
																'frontTz' => config('country.time_zone'),
																'country' => config('country.name'),
															]) !!}
														@endif
													</small>
												</div>
											</div>
											
											{{-- button --}}
											<div class="form-group row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-primary">{{ t('Update') }}</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
						<!--/.row-box End-->

					</div>
				</div>
				<!--/.page-content-->
			</div>
			<!--/.row-->
		</div>
		<!--/.container-->
	</div>
	<!-- /.main-container -->
@endsection

@section('after_styles')
	<link href="{{ url('assets/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
	@if (config('lang.direction') == 'rtl')
		<link href="{{ url('assets/plugins/bootstrap-fileinput/css/fileinput-rtl.min.css') }}" rel="stylesheet">
	@endif
	<style>
		.krajee-default.file-preview-frame:hover:not(.file-preview-error) {
			box-shadow: 0 0 5px 0 #666666;
		}
	</style>
@endsection

@section('after_scripts')
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
	<script src="{{ url('js/fileinput/locales/' . config('app.locale') . '.js') }}" type="text/javascript"></script>
@endsection
