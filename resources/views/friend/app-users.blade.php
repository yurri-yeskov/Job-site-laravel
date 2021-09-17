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
@extends('layouts.profile-master')

@section('content')
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<div class="main-content">
        <div class="step-form step-2">
             <div class="container">
                <h4>Increase your changes of gaining the job you deserve by connection with others</h4>
                <div class="prog-bar">
                    <div class="here">
                        <p>You are Here</p>
                    </div>
                    <div class="progress-layout">
                        <div class="progress">
                            <span>50%</span>
                        </div>
                    </div>
                    <div class="prog-cont">
                        <ul>
                            <li>Synchronize</li>
                            <li>Connect</li>
                            <li>Receive Job Referrals </li>
                        </ul>
                    </div>
                </div>
                <div class="my-network">
                    <h3>My Network</h3>
                    <p>Congratulation</p>
                    <p>you have connections that are using Virtualworkers.PH.</p>
                 </div>
                <form role="form" method="POST" action="/friends/selection" class="formClass">
	                <div class="addr-cont">
	                    <div class="requ">
	                        <p>Send connection requests.</p>
	                        <span class="checkbox">
	                            <input type="checkbox" id="selectAll" name="selectAll" value="1">
	                            <label for="select">Select All ({{count($userData)}})</label>
	                        </span>
	                    </div>
	                    <div class="step-btn">
	                        <a href="javascript:void(0)" class="btns btnSubmitUsrSlt">Next</a>
	                        <a href="#freeResumeModal" data-toggle="modal">Skip</a>
	                    </div>
	                </div>
	                <div class="connt-requ">
	                    <div class="row con-users">
	                    	@if(!empty($userData))
		                        @foreach($userData as $key => $user)
			                        <div class="col-6 col-lg-2 col-md-4 col-sm-6 usr-card">
			                            <div class="select-request">
			                                <span class="checkbox">
			                                    <input type="checkbox" class="checkUser" id="select_{{$key}}" name="select[]" value="{{$user->email}}">
			                                    <label for="select">select</label>
			                                </span>
			                                <div class="profile">
			                                    <img src="{{ asset('/images/img.png') }}" alt="img">
			                                    <p class="name">{{$user->first_name}} {{$user->last_name}}</p>
			                                </div>
			                            </div>
			                        </div>
		                        @endforeach
		                    @endif
	                    </div>
	                </div>
	            </form>
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
<!-- 	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
	<script src="{{ url('js/fileinput/locales/' . config('app.locale') . '.js') }}" type="text/javascript"></script> -->
	
	<script>
		// var userTypeId = '<?php //echo old('user_type_id', request()->get('type')); ?>';

		// $(document).ready(function ()
		// {
		// 	/* Set user type */
		// 	setUserType(userTypeId);
		// 	$('.user-type').click(function () {
		// 		userTypeId = $(this).val();
		// 		setUserType(userTypeId);
		// 	});

		// 	/* Submit Form */
		// 	$("#signupBtn").click(function () {
		// 		$("#signupForm").submit();
		// 		return false;
		// 	});
		// });
	</script>
@endsection
