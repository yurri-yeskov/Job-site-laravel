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
	<div class="step-form step-1">
		<div class="container">
			<h4>Increase your changes of gaining the job you deserve by connection with others</h4>
			<div class="prog-bar">
				<div class="here">
					<p>You are Here</p>
				</div>
				<div class="progress-layout">
					<div class="progress">
						<span>0%</span>
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
			<form role="form" method="POST" action="/send/friends/invites" class="formSubmit" enctype="multipart/form-data" id="syncform">
				{!! csrf_field() !!}
				<input type="hidden" name="sync_type" id="syncType" value="{{old('sync_type') ? old('sync_type') : ''}}">
				<input type="hidden" name="sync_redirect" id="syncRedirect" value="{{old('sync_redirect') ? old('sync_redirect') : ''}}">
				<input type="hidden" name="googleContacts" id="googleContacts">
				<input type="hidden" id="googleApiKey" value="{{$googleAPIkey}}"/>
				<input type="hidden" id="googleClientKey" value="{{$clientIdGoogle}}"/>
				<div class="my-network">
					<h3>My Network</h3>
					<p>Synchronize contacts is the fastest way to grow your network and gain job referrals</p>
					<div class="contact syncSelectOpt">
						<ul>
							<li rel="google" id="sign-in-or-out-button"><span><img src="{{ asset('/images/google-plus.svg') }}" alt="google"></span></li>
							<li rel="yahoo"><span><img src="{{ asset('/images/yahoo.svg') }}" alt="yahoo"></span></li>
							<li rel="outlook" rel1={{$outlookUrl}} onclick="signIn()"><span><img src="{{ asset('/images/outlook.svg') }}" alt="outlook"></span></li>
							<li class="{{old('sync_type') == 'csv' ? 'syn-option': ''}}" rel="csv"><span><img src="{{ asset('/images/csv.png') }}" alt="csv"></span></li>
							<li class="{{old('sync_type') == 'email' ? 'syn-option': ''}}" rel="email"><span><img src="{{ asset('/images/email.svg') }}" alt="email"></span></li>
						</ul>
						<div class="start-here">
							<p>Start Here</p>
						</div>
					</div>
					<p><br></p>
				</div>

				<!-- <button type="button" id="sign-in-or-out-button" style="margin-left: 25px" class="d-none">Sign In/Authorize</button> -->

				<div id="auth-status" style="display: none; padding-left: 25px"></div>

				<div class="addr-cont">
					<div class="form-group mb-3">
						<input type="email" class="form-control mb-3" id="addr" name="emails" 
						style="display: {{old('sync_type') != 'email' ? 'none': ''}}" 
						value="{{old('emails')}}" placeholder="Add a email address "/>
					</div>
					
					
					<div class="form-group mb-5 csvUploadFnd" style="display: {{old('sync_type') == 'csv' ? 'show': 'none'}}">
							<label for="csvUploadEmails" class="form-label csvLabel">Upload CSV file</label>
							<input type="file" id="csvUploadEmails" name="csv">
							<span>Upload .csv or .txt from your computer</span>
					</div>
					<div class="step-btn">
						<a href="javascript:void(0)" class="btns syncBtn">Next</a>
						<a href="#freeResumeModal" data-toggle="modal">Skip</a>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
						<div class="alert alert-danger emailErrorMsg" style="display: {{session()->has('profile_error') ? 'block' : 'none'}};">
							<ul>
								<li>
									@if(session()->has('profile_error'))
									{{session()->get('profile_error')}}
									@endif
								</li>
							</ul>
						</div>
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
<!-- google sync contacts login -->
<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>
<script type="text/javascript" src="{{url('js/google/google_popup.js')}}"></script>
<!-- microsoft sync contacts login -->
<!-- msal.min.js can be used in the place of msal.js; included msal.js to make debug easy -->
<script src="https://alcdn.msauth.net/browser/2.15.0/js/msal-browser.js"
integrity="sha384-dFzMiVGB5HpWZ+5w5VSif6jhWfNeplSw9ACYmQKZcY2azuT9kCxVWVI9HyfGdkHV"
crossorigin="anonymous"></script>

<!-- To help ensure reliability, Microsoft provides a second CDN -->
<script type="text/javascript">
if (typeof Msal === 'undefined') document.write(unescape("%3Cscript src='https://alcdn.msftauth.net/browser/2.15.0/js/msal-browser.js' type='text/javascript' crossorigin='anonymous' %3E%3C/script%3E"));
</script>
<!-- importing app scripts (load order is important) -->
<script type="text/javascript" src="{{url('js/microsoft/authConfig.js')}}"></script>
<script type="text/javascript" src="{{url('js/microsoft/graphConfig.js')}}"></script>
<script type="text/javascript" src="{{url('js/microsoft/ui.js')}}"></script>
<script type="text/javascript" src="{{url('js/microsoft/authPopup.js')}}"></script>
<script type="text/javascript" src="{{url('js/microsoft/graph.js')}}"></script>
@endsection