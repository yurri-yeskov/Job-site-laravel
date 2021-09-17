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

@section('wizard')
	@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.multiSteps.inc.wizard', 'post.createOrEdit.multiSteps.inc.wizard'])
@endsection

<?php
// Category
if ($post->category) {
    if (empty($post->category->parent_id)) {
        $postCatParentId = $post->category->id;
    } else {
        $postCatParentId = $post->category->parent_id;
    }
} else {
    $postCatParentId = 0;
}
?>
@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-container">
		<div class="container">
			<div class="row">
				
				@includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification', 'post.inc.notification'])

				<div class="col-md-9 page-content">
					<div class="inner-box category-content">
						<h2 class="title-2">
							<strong><i class="icon-docs"></i> {{ t('update_my_ad') }}</strong>
							-&nbsp;<a href="{{ \App\Helpers\UrlGen::post($post) }}"
							   class="tooltipHere" title="" data-placement="top"
							   data-toggle="tooltip"
							   data-original-title="{!! $post->title !!}"
							>{!! \Illuminate\Support\Str::limit($post->title, 45) !!}</a>
						</h2>
						
						<div class="row">
							<div class="col-sm-12">
								<form class="form-horizontal" id="postForm" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">
									{!! csrf_field() !!}
									<input name="_method" type="hidden" value="PUT">
									<input type="hidden" name="post_id" value="{{ $post->id }}">
									<fieldset>
										<!-- COMPANY -->
										<div class="content-subheading mt-0">
											<i class="icon-town-hall fa"></i>
											<strong>{{ t('Company Information') }}</strong>
										</div>
										
										<!-- company_id -->
										<?php
										$postCompanyId = (isset($postCompany, $postCompany->id)) ? $postCompany->id : 0;
										?>
										<?php $companyIdError = (isset($errors) and $errors->has('company_id')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label{{ $companyIdError }}">
												{{ t('Select a Company') }} <sup>*</sup>
											</label>
											<div class="col-md-8">
												<select id="companyId" name="company_id" class="form-control selecter{{ $companyIdError }}">
													<option value="0" data-logo=""
															@if (old('company_id', 0)==0)
																selected="selected"
															@endif
													>[+] {{ t('New Company') }}</option>
													@if (isset($companies) and $companies->count() > 0)
														@foreach ($companies as $item)
															<option value="{{ $item->id }}" data-logo="{{ imgUrl($item->logo, 'small') }}"
																	@if (old('company_id', $postCompanyId)==$item->id)
																		selected="selected"
																	@endif
															>{{ $item->name }}</option>
														@endforeach
													@endif
												</select>
											</div>
										</div>
										
										<!-- logo -->
										<div id="logoField" class="form-group row">
											<label class="col-md-3 col-form-label">&nbsp;</label>
											<div class="col-md-8">
												<div class="mb10">
													<div id="logoFieldValue"></div>
												</div>
												<small id="" class="form-text text-muted">
													<a id="companyFormLink" href="{{ url('account/companies/0/edit') }}" class="btn btn-default">
														<i class="fa fa-pencil-square-o"></i> {{ t('Edit the Company') }}
													</a>
												</small>
											</div>
										</div>
									
										@includeFirst([config('larapen.core.customizedViewPath') . 'account.company._form', 'account.company._form'], ['originForm' => 'post'])
										
									
										<!-- POST -->
										<div class="content-subheading">
											<i class="icon-town-hall fa"></i>
											<strong>{{ t('ad_details') }}</strong>
										</div>
										
										<!-- category_id -->
										<?php $categoryIdError = (isset($errors) and $errors->has('category_id')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label{{ $categoryIdError }}">{{ t('category') }} <sup>*</sup></label>
											<div class="col-md-8">
												<div id="catsContainer" class="rounded">
													<a href="#browseCategories" data-toggle="modal" class="cat-link" data-id="0">
														{{ t('select_a_category') }}
													</a>
												</div>
											</div>
											<input type="hidden" name="category_id" id="categoryId" value="{{ old('category_id', $post->category->id) }}">
										</div>

										<!-- title -->
										<?php $titleError = (isset($errors) and $errors->has('title')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="title">{{ t('Title') }} <sup>*</sup></label>
											<div class="col-md-8">
												<input id="title" name="title" placeholder="{{ t('Job title') }}" class="form-control input-md{{ $titleError }}"
													   type="text" value="{{ old('title', $post->title) }}">
												<small id="" class="form-text text-muted">
													{{ t('A great title needs at least 60 characters.') }}
												</small>
											</div>
										</div>

										<!-- description -->
										<?php $descriptionError = (isset($errors) and $errors->has('description')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<?php
												$descriptionErrorLabel = '';
												$descriptionColClass = 'col-md-8';
												if (config('settings.single.wysiwyg_editor') != 'none') {
													$descriptionColClass = 'col-md-12';
													$descriptionErrorLabel = $descriptionError;
												} else {
													$post->description = strip_tags($post->description);
												}
											?>
											<label class="col-md-3 col-form-label{{ $descriptionErrorLabel }}" for="description">
												{{ t('Description') }} <sup>*</sup>
											</label>
											<div class="{{ $descriptionColClass }}">
												<textarea class="form-control {{ $descriptionError }}"
														  id="description"
														  name="description"
														  rows="15"
														  required=""
												>{{ old('description', $post->description) }}</textarea>
												<small id="" class="form-text text-muted">{{ t('Describe what makes your ad unique') }}</small>
											</div>
										</div>

										<!-- post_type_id -->
										<?php $postTypeIdError = (isset($errors) and $errors->has('post_type_id')) ? ' is-invalid' : ''; ?>
										<div id="postTypeBloc" class="form-group row required">
											<label class="col-md-3 col-form-label{{ $postTypeIdError }}">
												{{ t('Job Type') }} <sup>*</sup>
											</label>
											<div class="col-md-8">
												<select name="post_type_id" id="postTypeId" class="form-control selecter{{ $postTypeIdError }}">
													@foreach ($postTypes as $postType)
														<option value="{{ $postType->id }}"
																@if (old('post_type_id', $post->post_type_id) == $postType->id)
																	selected="selected"
																@endif
														>{{ $postType->name }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<!-- salary_min & salary_max -->
										<?php $salaryMinError = (isset($errors) and $errors->has('salary_min')) ? ' is-invalid' : ''; ?>
										<?php $salaryMaxError = (isset($errors) and $errors->has('salary_max')) ? ' is-invalid' : ''; ?>
										<div id="salaryBloc" class="form-group row">
											<label class="col-md-3 col-form-label" for="salary_max">{{ t('Salary') }}</label>
											<div class="col-md-4">
												<div class="row">
													<div class="input-group col-md-12">
														@if (config('currency')['in_left'] == 1)
															<div class="input-group-prepend">
																<span class="input-group-text">{!! config('currency')['symbol'] !!}</span>
															</div>
														@endif
														<?php
														$salaryMin = \App\Helpers\Number::format(old('salary_min', $post->salary_min), 2, '.', '');
														?>
														<input id="salary_min"
															   name="salary_min"
															   class="form-control tooltipHere{{ $salaryMinError }}"
															   data-toggle="tooltip"
															   data-original-title="{{ t('salary_min') }}"
															   placeholder="{{ t('salary_min') }}"
															   type="number"
															   min="0"
															   step="{{ getInputNumberStep((int)config('currency.decimal_places', 2)) }}"
															   value="{!! $salaryMin !!}"
														>
														@if (config('currency')['in_left'] == 0)
															<div class="input-group-append">
																<span class="input-group-text">{!! config('currency')['symbol'] !!}</span>
															</div>
														@endif
													</div>
													<div class="input-group col-md-12">
														@if (config('currency')['in_left'] == 1)
															<div class="input-group-prepend">
																<span class="input-group-text">{!! config('currency')['symbol'] !!}</span>
															</div>
														@endif
														<?php
														$salaryMax = \App\Helpers\Number::format(old('salary_max', $post->salary_max), 2, '.', '');
														?>
														<input id="salary_max"
															   name="salary_max"
															   class="form-control tooltipHere{{ $salaryMaxError }}"
															   data-toggle="tooltip"
															   data-original-title="{{ t('salary_max') }}"
															   placeholder="{{ t('salary_max') }}"
															   type="number"
															   min="0"
															   step="{{ getInputNumberStep((int)config('currency.decimal_places', 2)) }}"
															   value="{!! $salaryMax !!}"
														>
														@if (config('currency')['in_left'] == 0)
															<div class="input-group-append">
																<span class="input-group-text">{!! config('currency')['symbol'] !!}</span>
															</div>
														@endif
													</div>
												</div>
											</div>

											<!-- salary_type_id -->
											<?php $salaryTypeIdError = (isset($errors) and $errors->has('salary_type_id')) ? ' is-invalid' : ''; ?>
											<div class="col-md-4">
												<select name="salary_type_id" id="salaryTypeId" class="form-control selecter{{ $salaryTypeIdError }}">
													@foreach ($salaryTypes as $salaryType)
														<option value="{{ $salaryType->id }}"
																@if (old('salary_type_id', $post->salary_type_id) == $salaryType->id)
																	selected="selected"
																@endif
														>{{ t('per') . ' ' . $salaryType->name }}</option>
													@endforeach
												</select>
												<div class="form-check form-check-inline">
													<label class="form-check-label pt-2">
														<input id="negotiable"
															   name="negotiable"
															   type="checkbox"
															   value="1" {{ (old('negotiable', $post->negotiable)=='1') ? 'checked="checked"' : '' }}
														>&nbsp;{{ t('negotiable') }}
													</label>
												</div>
											</div>
										</div>

										<!-- start_date -->
										<?php $startDateError = (isset($errors) and $errors->has('start_date')) ? ' is-invalid' : ''; ?>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="start_date">{{ t('Start Date') }} </label>
											<div class="col-md-8">
												<input id="start_date"
												   name="start_date"
												   placeholder="{{ t('Start Date') }}"
												   class="form-control input-md{{ $startDateError }} cf-date"
												   type="text"
												   value="{{ old('start_date', $post->start_date) }}"
												   autocomplete="off"
												>
											</div>
										</div>

										<!-- contact_name -->
										<?php $contactNameError = (isset($errors) and $errors->has('contact_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="contact_name">{{ t('Contact Name') }} <sup>*</sup></label>
											<div class="input-group col-md-8">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="icon-user"></i></span>
												</div>
												<input id="contact_name" name="contact_name" placeholder="{{ t('Contact Name') }}"
												   class="form-control input-md{{ $contactNameError }}" type="text"
												   value="{{ old('contact_name', $post->contact_name) }}">
											</div>
										</div>

										<!-- email -->
										<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="email"> {{ t('Contact Email') }} <sup>*</sup></label>
											<div class="input-group col-md-8">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="icon-mail"></i></span>
												</div>
												<input id="email" name="email" class="form-control{{ $emailError }}"
													   placeholder="{{ t('email') }}" type="text"
													   value="{{ old('email', $post->email) }}">
											</div>
										</div>

										<!-- phone -->
										<?php $phoneError = (isset($errors) and $errors->has('phone')) ? ' is-invalid' : ''; ?>
										<div class="form-group row required">
											<label class="col-md-3 col-form-label" for="phone">{{ t('phone_number') }}</label>
											<div class="input-group col-md-8">
												<div class="input-group-prepend">
													<span id="phoneCountry" class="input-group-text">{!! getPhoneIcon($post->country_code) !!}</span>
												</div>
												
												<input id="phone" name="phone"
													   placeholder="{{ t('phone_number') }}" class="form-control input-md{{ $phoneError }}"
													   type="text" value="{{ phoneFormat(old('phone', $post->phone), $post->country_code) }}"
												>
												
												<div class="input-group-append">
													<span class="input-group-text">
														<input name="phone_hidden" id="phoneHidden" type="checkbox"
															   value="1" {{ (old('phone_hidden', $post->phone_hidden)=='1') ? 'checked="checked"' : '' }}>&nbsp;
														<small>{{ t('Hide') }}</small>
													</span>
												</div>
											</div>
										</div>
										
										<!-- country_code -->
										<input id="countryCode" name="country_code" type="hidden" value="{{ !empty($post->country_code) ? $post->country_code : config('country.code') }}">
									
										@if (config('country.admin_field_active') == 1 and in_array(config('country.admin_type'), ['1', '2']))
											<!-- admin_code -->
											<?php $adminCodeError = (isset($errors) and $errors->has('admin_code')) ? ' is-invalid' : ''; ?>
											<div id="locationBox" class="form-group row required">
												<label class="col-md-3 col-form-label{{ $adminCodeError }}" for="admin_code">
													{{ t('location') }} <sup>*</sup>
												</label>
												<div class="col-md-8">
													<select id="adminCode" name="admin_code" class="form-control sselecter{{ $adminCodeError }}">
														<option value="0" {{ (!old('admin_code') or old('admin_code')==0) ? 'selected="selected"' : '' }}>
															{{ t('select_your_location') }}
														</option>
													</select>
												</div>
											</div>
										@endif
									
										<!-- city_id -->
										<?php $cityIdError = (isset($errors) and $errors->has('city_id')) ? ' is-invalid' : ''; ?>
										<div id="cityBox" class="form-group row required">
											<label class="col-md-3 col-form-label{{ $cityIdError }}" for="city_id">{{ t('city') }} <sup>*</sup></label>
											<div class="col-md-8">
												<select id="cityId" name="city_id" class="form-control sselecter{{ $cityIdError }}">
													<option value="0" {{ (!old('city_id') or old('city_id')==0) ? 'selected="selected"' : '' }}>
														{{ t('select_a_city') }}
													</option>
												</select>
											</div>
										</div>
										
										<!-- application_url -->
										<?php $applicationUrlError = (isset($errors) and $errors->has('application_url')) ? ' is-invalid' : ''; ?>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="title">{{ t('Application URL') }}</label>
											<div class="col-md-8">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="icon-reply"></i></span>
													</div>
													<input id="application_url" name="application_url"
														   placeholder="{{ t('Application URL') }}" class="form-control input-md{{ $applicationUrlError }}" type="text"
														   value="{{ old('application_url', $post->application_url) }}">
												</div>
												<small id="" class="form-text text-muted">
													{{ t('Candidates will follow this URL address to apply for the job') }}
												</small>
											</div>
										</div>
										
										<!-- tags -->
										<?php $tagsError = (isset($errors) and $errors->has('tags')) ? ' is-invalid' : ''; ?>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="tags">{{ t('Tags') }}</label>
											<div class="col-md-8">
												<input id="tags"
													   name="tags"
													   placeholder="{{ t('Tags') }}"
													   class="form-control input-md{{ $tagsError }}"
													   type="text"
													   value="{{ old('tags', $post->tags) }}"
												>
												<small id="" class="form-text text-muted">{{ t('Enter the tags separated by commas') }}</small>
											</div>
										</div>

										<!-- Button -->
										<div class="form-group row">
											<div class="col-md-12 text-center">
												<a href="{{ \App\Helpers\UrlGen::post($post) }}" class="btn btn-default btn-lg"> {{ t('Back') }}</a>
												<button id="nextStepBtn" class="btn btn-success btn-lg submitPostForm"> {{ t('Update') }} </button>
											</div>
										</div>

									</fieldset>
								</form>

							</div>
						</div>
					</div>
				</div>
				<!-- /.page-content -->

				<div class="col-md-3 reg-sidebar">
					@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.right-sidebar', 'post.createOrEdit.inc.right-sidebar'])
				</div>
				
			</div>
		</div>
	</div>
	@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.category-modal', 'post.createOrEdit.inc.category-modal'])
@endsection

@section('after_styles')
@endsection

@section('after_scripts')
@endsection

@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.form-assets', 'post.createOrEdit.inc.form-assets'])
