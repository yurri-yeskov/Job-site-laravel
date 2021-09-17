<div class="modal fade" id="fPassword" tabindex="-1" role="dialog">
	<div class="modal-dialog  modal-sm">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">{{ t('Close') }}</span>
				</button>
			</div>
			<div class="signup-wrap">
				<div class="modal-body">
					<div class="signup-heading">
						<img src="{{ asset('/images/site_logo.png') }}" title="" />
					</div>
					
					<div class="signup-heading">Forgotten Password</div>

					<form method="POST" action="{{ url('password/email') }}" class="formClass">
						{!! csrf_field() !!}
						<!-- login -->
						<?php $loginError = (isset($errors) and $errors->has('login')) ? ' is-invalid' : ''; ?>
						<div class="form-group row required">
							<div class="col-md-12">
								<div class="input-group show-pwd-group">
									<input id="login" name="login" type="email" class="form-control{{ $loginError }}" placeholder="{{ t('email') }}" autocomplete="off" value="{{session()->get('f_email')}}">
									<span class="icon-append show-pwd">
										<button type="button" class="email">
											<img src="{{ asset('/images/email_icon.png') }}" class="input-img" />
										</button>
									</span>
								</div>
							</div>
						</div>

						<div class="form-group row required">
							<div class="col-md-12 pl-4">
								<div class="g-recaptcha" data-sitekey="6LchFtsbAAAAALJmFoQlPdRcwGwZeZoLLKHCRRV9">
								</div>
							</div>
						</div>

						@if (session()->has('captcha_error'))
							<div class="alert alert-danger">
								<ul>
									<li>{{session()->get('captcha_error')}}</li>
								</ul>
							</div>
						@endif

						@if (session()->has('fp_error'))
							<div class="alert alert-danger">
								<ul>
									<li>{{session()->get('fp_error')}}</li>
								</ul>
							</div>
						@endif


						<!-- Button  -->
						<div class="form-group row mb-5 mt-4">
							<div class="col-md-12">
								<button type="button" class="btn btn-custom btn-lg btnclass"> {{ t('submit') }} </button>
							</div>
						</div>
					</form>

					<div class="form-group row mt-5">
						<div class="col-md-12 signupLogin">
							<a href="#" class="openSignup">{{ t('donot_have_account') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
