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
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container">
		<div class="container">
			<div class="row">

				@if (isset($errors) && $errors->any())
					<div class="col-xl-12">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><strong>{{ t('oops_an_error_has_occurred') }}</strong></h5>
							<ul class="list list-check">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif

				@if (session()->has('flash_notification'))
					<div class="col-xl-12">
						<div class="row">
							<div class="col-lg-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif

				<div class="col-md-8 page-content">
					<div class="inner-box">
						<h2 class="title-2">
							<strong><i class="icon-user-add"></i> {{ t('create_your_account_it_is_free') }}</strong>
						</h2>
						
						@if (
							config('settings.social_auth.social_login_activation')
							and (
								(config('settings.social_auth.facebook_client_id') && config('settings.social_auth.facebook_client_secret'))
								or (config('settings.social_auth.linkedin_client_id') && config('settings.social_auth.linkedin_client_secret'))
								or (config('settings.social_auth.twitter_client_id') && config('settings.social_auth.twitter_client_secret'))
								or (config('settings.social_auth.google_client_id') && config('settings.social_auth.google_client_secret'))
								)
							)
							<div class="row mb-3 d-flex justify-content-center pl-3 pr-3">
								@if (config('settings.social_auth.facebook_client_id') && config('settings.social_auth.facebook_client_secret'))
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-1 pl-1 pr-1">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12 btn btn-lg btn-fb">
										<a href="{{ url('auth/facebook') }}" class="btn-fb"><i class="icon-facebook-rect"></i> {!! t('Login with Facebook') !!}</a>
									</div>
								</div>
								@endif
								@if (config('settings.social_auth.linkedin_client_id') && config('settings.social_auth.linkedin_client_secret'))
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-1 pl-1 pr-1">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12 btn btn-lg btn-lkin">
										<a href="{{ url('auth/linkedin') }}" class="btn-lkin"><i class="icon-linkedin"></i> {!! t('Login with LinkedIn') !!}</a>
									</div>
								</div>
								@endif
								@if (config('settings.social_auth.twitter_client_id') && config('settings.social_auth.twitter_client_secret'))
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-1 pl-1 pr-1">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12 btn btn-lg btn-tw">
										<a href="{{ url('auth/twitter') }}" class="btn-tw"><i class="icon-twitter-bird"></i> {!! t('Login with Twitter') !!}</a>
									</div>
								</div>
								@endif
								@if (config('settings.social_auth.google_client_id') && config('settings.social_auth.google_client_secret'))
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-1 pl-1 pr-1">
									<div class="col-xl-12 col-md-12 col-sm-12 col-12 btn btn-lg btn-danger">
										<a href="{{ url('auth/google') }}" class="btn-danger"><i class="icon-googleplus-rect"></i> {!! t('Login with Google') !!}</a>
									</div>
								</div>
								@endif
							</div>
							
							<div class="row d-flex justify-content-center loginOr">
								<div class="col-xl-12 mb-1">
									<hr class="hrOr">
									<span class="spanOr rounded">{{ t('or') }}</span>
								</div>
							</div>
						@endif
						
						<div class="row mt-5">
							<div class="col-xl-12">
								<form id="signupForm" class="form-horizontal" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">
									{!! csrf_field() !!}
									<fieldset>
										<?php
										/*
										<!-- gender_id -->
										<?php $genderIdError = (isset($errors) and $errors->has('gender_id')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label{{ $genderIdError }}">{{ t('gender') }} <sup>*</sup></label>
											<div class="col-md-7">
												<select name="gender_id" id="genderId" class="form-control selecter{{ $genderIdError }}">
													<option value="0"
															@if (old('gender_id')=='' or old('gender_id')==0)
																selected="selected"
															@endif
													> {{ t('Select') }} </option>
													@foreach ($genders as $gender)
														<option value="{{ $gender->id }}"
																@if (old('gender_id') == $gender->id)
																	selected="selected"
																@endif
														>
															{{ $gender->name }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
										*/
										?>

										<!-- name -->
										<?php $nameError = (isset($errors) && $errors->has('name')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-4 col-form-label">{{ t('Name') }} <sup>*</sup></label>
											<div class="col-md-6">
												<input name="name" placeholder="{{ t('Name') }}" class="form-control input-md{{ $nameError }}" type="text" value="{{ old('name') }}">
											</div>
										</div>

										<!-- user_type_id -->
										<?php $userTypeIdError = (isset($errors) && $errors->has('user_type_id')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-4 col-form-label">{{ t('you_are_a') }} <sup>*</sup></label>
											<div class="col-md-6">
												@foreach ($userTypes as $type)
													<div class="form-check form-check-inline pt-2">
														<input type="radio"
															   name="user_type_id"
															   id="userTypeId-{{ $type->id }}"
															   class="form-check-input user-type{{ $userTypeIdError }}"
															   value="{{ $type->id }}"
																{{ (old('user_type_id', request()->get('type'))==$type->id) ? 'checked="checked"' : '' }}
														>
														<label class="form-check-label" for="user_type_id-{{ $type->id }}">
															{{ t('' . $type->name) }}
														</label>
													</div>
												@endforeach
											</div>
										</div>

										<!-- country_code -->
										@if (empty(config('country.code')))
											<?php $countryCodeError = (isset($errors) && $errors->has('country_code')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required">
												<label class="col-md-4 col-form-label{{ $countryCodeError }}" for="country_code">{{ t('your_country') }} <sup>*</sup></label>
												<div class="col-md-6">
													<select id="countryCode" name="country_code" class="form-control sselecter{{ $countryCodeError }}">
														<option value="0" {{ (!old('country_code') || old('country_code')==0) ? 'selected="selected"' : '' }}>
															{{ t('Select') }}
														</option>
														@foreach ($countries as $code => $item)
															<option value="{{ $code }}" {{ (
																							old(
																								'country_code',
																								(!empty(config('ipCountry.code')))
																								? config('ipCountry.code')
																								: 0
																							) == $code
																						) ? 'selected="selected"' : '' }}
															>
																{{ $item->get('name') }}
															</option>
														@endforeach
													</select>
												</div>
											</div>
										@else
											<input id="countryCode" name="country_code" type="hidden" value="{{ config('country.code') }}">
										@endif
										
										@if (isEnabledField('phone'))
											<!-- phone -->
											<?php $phoneError = (isset($errors) and $errors->has('phone')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required">
												<label class="col-md-4 col-form-label">{{ t('phone') }}
													@if (!isEnabledField('email'))
														<sup>*</sup>
													@endif
												</label>
												<div class="col-md-6">
													<div class="input-group">
														<div class="input-group-prepend">
															<span id="phoneCountry" class="input-group-text">{!! getPhoneIcon(old('country', config('country.code'))) !!}</span>
														</div>
														
														<input name="phone"
															   placeholder="{{ (!isEnabledField('email')) ? t('Mobile Phone Number') : t('phone_number') }}"
															   class="form-control input-md{{ $phoneError }}"
															   type="text"
															   value="{{ phoneFormat(old('phone'), old('country', config('country.code'))) }}"
														>
														
														<div class="input-group-append tooltipHere"
															 data-placement="top"
															 data-toggle="tooltip"
															 data-original-title="{{ t('Hide the phone number on the ads') }}"
														>
															<span class="input-group-text">
																<input name="phone_hidden"
																	   id="phoneHidden"
																	   type="checkbox"
																	   value="1" {{ (old('phone_hidden')=='1') ? 'checked="checked"' : '' }}
																>&nbsp;<small>{{ t('Hide') }}</small>
															</span>
														</div>
													</div>
												</div>
											</div>
										@endif
										
										@if (isEnabledField('email'))
											<!-- email -->
											<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required">
												<label class="col-md-4 col-form-label" for="email">{{ t('email') }}
													@if (!isEnabledField('phone'))
														<sup>*</sup>
													@endif
												</label>
												<div class="col-md-6">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="icon-mail"></i></span>
														</div>
														<input id="email"
															   name="email"
															   type="email"
															   class="form-control{{ $emailError }}"
															   placeholder="{{ t('email') }}"
															   value="{{ old('email') }}"
														>
													</div>
												</div>
											</div>
										@endif
										
										@if (isEnabledField('username'))
											<!-- username -->
											<?php $usernameError = (isset($errors) and $errors->has('username')) ? ' is-invalid' : ''; ?>
											<div class="form-group row required">
												<label class="col-md-4 col-form-label" for="email">{{ t('Username') }}</label>
												<div class="col-md-6">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="icon-user"></i></span>
														</div>
														<input id="username"
															   name="username"
															   type="text"
															   class="form-control{{ $usernameError }}"
															   placeholder="{{ t('Username') }}"
															   value="{{ old('username') }}"
														>
													</div>
												</div>
											</div>
										@endif
										
										<!-- password -->
										<?php $passwordError = (isset($errors) and $errors->has('password')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-4 col-form-label" for="password">{{ t('password') }} <sup>*</sup></label>
											<div class="col-md-6">
												<div class="input-group show-pwd-group">
													<input id="password" name="password" type="password" class="form-control{{ $passwordError }}" placeholder="{{ t('password') }}" autocomplete="off">
													<span class="icon-append show-pwd">
														<button type="button" class="eyeOfPwd">
															<i class="far fa-eye-slash"></i>
														</button>
													</span>
												</div>
												<br>
												<input id="password_confirmation" name="password_confirmation" type="password" class="form-control{{ $passwordError }}"
													   placeholder="{{ t('Password Confirmation') }}" autocomplete="off">
												<small id="" class="form-text text-muted">
													{{ t('at_least_num_characters', ['num' => config('larapen.core.passwordLength.min', 6)]) }}
												</small>
											</div>
										</div>
										
										@if (config('larapen.core.register.showCompanyFields'))
											<div id="companyBloc">
												<div class="content-subheading">
													<i class="icon-town-hall fa"></i>
													<strong>{{ t('Company Information') }}</strong>
												</div>
												
												@includeFirst([config('larapen.core.customizedViewPath') . 'account.company._form', 'account.company._form'], ['originForm' => 'user'])
											</div>
										@endif
										
										@if (config('larapen.core.register.showResumeFields'))
											<div id="resumeBloc">
												<div class="content-subheading">
													<i class="icon-attach fa"></i>
													<strong>{{ t('Resume') }}</strong>
												</div>
												
												@includeFirst([config('larapen.core.customizedViewPath') . 'account.resume._form', 'account.resume._form'], ['originForm' => 'user'])
											</div>
										@endif
										
										@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.tools.captcha', 'layouts.inc.tools.captcha'], ['colLeft' => 'col-md-4', 'colRight' => 'col-md-6'])
										
										<!-- accept_terms -->
										<?php $acceptTermsError = (isset($errors) and $errors->has('accept_terms')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-4 col-form-label"></label>
											<div class="col-md-6">
												<div class="form-check">
													<input name="accept_terms" id="acceptTerms"
														   class="form-check-input{{ $acceptTermsError }}"
														   value="1"
														   type="checkbox" {{ (old('accept_terms')=='1') ? 'checked="checked"' : '' }}
													>
													
													<label class="form-check-label" for="acceptTerms" style="font-weight: normal;">
														{!! t('accept_terms_label', ['attributes' => getUrlPageByType('terms')]) !!}
													</label>
												</div>
												<div style="clear:both"></div>
											</div>
										</div>
										
										<!-- accept_marketing_offers -->
										<?php $acceptMarketingOffersError = (isset($errors) and $errors->has('accept_marketing_offers')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-4 col-form-label"></label>
											<div class="col-md-6">
												<div class="form-check">
													<input name="accept_marketing_offers" id="acceptMarketingOffers"
														   class="form-check-input{{ $acceptMarketingOffersError }}"
														   value="1"
														   type="checkbox" {{ (old('accept_marketing_offers')=='1') ? 'checked="checked"' : '' }}
													>
													
													<label class="form-check-label" for="acceptMarketingOffers" style="font-weight: normal;">
														{!! t('accept_marketing_offers_label') !!}
													</label>
												</div>
												<div style="clear:both"></div>
											</div>
										</div>

										<!-- Button  -->
										<div class="form-group row">
											<label class="col-md-4 col-form-label"></label>
											<div class="col-md-8">
												<button id="signupBtn" class="btn btn-success btn-lg"> {{ t('register') }} </button>
											</div>
										</div>

										<div style="margin-bottom: 30px;"></div>

									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 reg-sidebar">
					<div class="reg-sidebar-inner text-center">
						<div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>
							<h3><strong>{{ t('Post a Job') }}</strong></h3>
							<p>
								{{ t('Do you have a post to be filled within your company',
								['appName' => config('app.name')]) }}
							</p>
						</div>
						<div class="promo-text-box"><i class="icon-pencil-circled fa fa-4x icon-color-2"></i>
							<h3><strong>{{ t('Create and Manage Jobs') }}</strong></h3>
							<p>{{ t('become_a_best_company_text') }}</p>
						</div>
						<div class="promo-text-box"><i class="icon-heart-2 fa fa-4x icon-color-3"></i>
							<h3><strong>{{ t('create_your_favorite_jobs_list') }}</strong></h3>
							<p>{{ t('create_your_favorite_jobs_list_text') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	
	<script>
		var userTypeId = '<?php echo old('user_type_id', request()->get('type')); ?>';

		$(document).ready(function ()
		{
			/* Set user type */
			setUserType(userTypeId);
			$('.user-type').click(function () {
				userTypeId = $(this).val();
				setUserType(userTypeId);
			});

			/* Submit Form */
			$("#signupBtn").click(function () {
				$("#signupForm").submit();
				return false;
			});
		});
	</script>
@endsection
