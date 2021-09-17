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
                 </div>
                <div class="addr-cont">
                    <p>Would you Like to send an send an email <br> to Your {{count($unMatchedEmail)}} connects</p>
                    <div class="step-btn">
                        <a href="javascript:void(0)" class="btns" id="sendMailsInvties" rel="/friends/send/mail">Next</a>
                        <a href="#freeResumeModal" data-toggle="modal">Skip</a>
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
