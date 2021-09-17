<div class="modal fade" id="applyJob" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-header">
				<h4 class="modal-title">
					<i class="icon-mail-2"></i> {{ t('Contact Employer') }}
				</h4>
				
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">{{ t('Close') }}</span>
				</button>
			</div>
			
			<form role="form" method="POST" action="{{ url('account/messages/posts/' . $post->id) }}" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="modal-body">

					@if (isset($errors) && $errors->any() && old('messageForm')=='1')
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<ul class="list list-check">
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					@if (auth()->check())
						<input type="hidden" name="from_name" value="{{ auth()->user()->name }}">
						@if (!empty(auth()->user()->email))
							<input type="hidden" name="from_email" value="{{ auth()->user()->email }}">
						@else
							<!-- from_email -->
							<?php $fromEmailError = (isset($errors) && $errors->has('from_email')) ? ' is-invalid' : ''; ?>
							<div class="form-group required">
								<label for="from_email" class="control-label">{{ t('email') }}
									@if (!isEnabledField('phone'))
										<sup>*</sup>
									@endif
								</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="icon-mail"></i></span>
									</div>
									<input id="from_email"
										name="from_email"
										type="text"
										class="form-control{{ $fromEmailError }}"
										placeholder="{{ t('eg_email') }}"
										value="{{ old('from_email', auth()->user()->email) }}"
									>
								</div>
							</div>
						@endif
					@else
						<!-- from_name -->
						<?php $fromNameError = (isset($errors) && $errors->has('from_name')) ? ' is-invalid' : ''; ?>
						<div class="form-group required">
							<label for="from_name" class="control-label">{{ t('Name') }} <sup>*</sup></label>
							<div class="input-group">
								<input id="from_name"
									name="from_name"
									type="text"
									class="form-control{{ $fromNameError }}"
									placeholder="{{ t('your_name') }}"
									value="{{ old('from_name') }}"
								>
							</div>
						</div>
							
						<!-- from_email -->
						<?php $fromEmailError = (isset($errors) && $errors->has('from_email')) ? ' is-invalid' : ''; ?>
						<div class="form-group required">
							<label for="from_email" class="control-label">{{ t('email') }}
								@if (!isEnabledField('phone'))
									<sup>*</sup>
								@endif
							</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="icon-mail"></i></span>
								</div>
								<input id="from_email"
									name="from_email"
									type="text"
									class="form-control{{ $fromEmailError }}"
									placeholder="{{ t('eg_email') }}"
									value="{{ old('from_email') }}"
								>
							</div>
						</div>
					@endif
					
					<!-- from_phone -->
					<?php $fromPhoneError = (isset($errors) && $errors->has('from_phone')) ? ' is-invalid' : ''; ?>
					<div class="form-group required">
						<label for="phone" class="control-label">{{ t('phone_number') }}
							@if (!isEnabledField('email'))
								<sup>*</sup>
							@endif
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span id="phoneCountry" class="input-group-text"><i class="icon-phone-1"></i></span>
							</div>
							<input id="from_phone"
								name="from_phone"
								type="text"
								maxlength="60"
								class="form-control{{ $fromPhoneError }}"
								placeholder="{{ t('phone_number') }}"
								value="{{ old('from_phone', (auth()->check()) ? auth()->user()->phone : '') }}"
							>
						</div>
					</div>
					
					<!-- body -->
					<?php $bodyError = (isset($errors) && $errors->has('body')) ? ' is-invalid' : ''; ?>
					<div class="form-group required">
						<label for="body" class="control-label">
							{{ t('Message') }} <span class="text-count">(500 max)</span> <sup>*</sup>
						</label>
						<textarea id="body"
							name="body"
							rows="5"
							class="form-control required{{ $bodyError }}"
							placeholder="{{ t('your_message_here') }}"
						>{{ old('body') }}</textarea>
					</div>
					
					<!-- filename -->
					<?php $resumeIdError = (isset($errors) && $errors->has('resume_id')) ? ' is-invalid' : ''; ?>
					<div class="form-group">
						<label class="control-label" for="filename">{{ t('Resume') }} </label>
						<small id="" class="form-text text-muted">{!! t('Select a Resume') !!}</small>
						<div id="resumeId" class="mb10 input-btn-padding">
							<?php
							$selectedResume = 0;
							?>
							@if (isset($resumes) && $resumes->count() > 0)
								@foreach ($resumes as $iResume)
									@continue(!$disk->exists($iResume->filename))
									<?php
									if (old('resume_id', 0) == $iResume->id) {
										$selectedResume = $iResume->id;
									} else {
										$selectedResume = isset($lastResume) ? $lastResume->id : 0;
									}
									?>
									<div class="form-check pt-2">
										<input id="resumeId{{ $iResume->id }}"
											   name="resume_id"
											   value="{{ $iResume->id }}"
											   type="radio"
											   class="form-check-input{{ $resumeIdError }}"
												{{ ($selectedResume == $iResume->id) ? 'checked="checked"' : '' }}
										>
										<label class="form-check-label" for="resumeId{{ $iResume->id }}">
											{{ $iResume->name }} - <a href="{{ fileUrl($iResume->filename) }}" target="_blank">{{ t('Download') }}</a>
										</label>
									</div>
								@endforeach
							@endif
							<div class="form-check pt-2">
								<input id="resumeId0"
									   name="resume_id"
									   value="0"
									   type="radio"
									   class="form-check-input{{ $resumeIdError }}"
										{{ ($selectedResume == 0) ? 'checked="checked"' : '' }}
								>
								<label class="form-check-label" for="resumeId0">
									{{ '[+] ' . t('New Resume') }}
								</label>
							</div>
						</div>
					</div>
					
					@includeFirst([config('larapen.core.customizedViewPath') . 'account.resume._form', 'account.resume._form'], ['originForm' => 'message'])
					
					@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.tools.captcha', 'layouts.inc.tools.captcha'], ['label' => true])
					
					<input type="hidden" name="country_code" value="{{ config('country.code') }}">
					<input type="hidden" name="post_id" value="{{ $post->id }}">
					<input type="hidden" name="messageForm" value="1">
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">{{ t('Cancel') }}</button>
					<button type="submit" class="btn btn-success pull-right">{{ t('send_message') }}</button>
				</div>
			</form>
			
		</div>
	</div>
</div>
@section('after_styles')
	@parent
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
    @parent
	
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
	<script src="{{ url('js/fileinput/locales/' . config('app.locale') . '.js') }}" type="text/javascript"></script>
	
	<script>
		/* Resume */
		var lastResumeId = {{ old('resume_id', ((isset($lastResume) && $disk->exists($lastResume->filename)) ? $lastResume->id : 0)) }};
		getResume(lastResumeId);
		
		$(document).ready(function () {
			@if (isset($errors) && $errors->any())
				@if ($errors->any() && old('messageForm')=='1')
					$('#applyJob').modal();
				@endif
			@endif
			
			/* Resume */
			$('#resumeId input').bind('click, change', function() {
				lastResumeId = $(this).val();
				getResume(lastResumeId);
			});
		});
	</script>
@endsection
