<div id="recoverform">
	<div class="logo">
		<h3 class="font-weight-medium mb-3">{{ trans('admin.reset_password') }}</h3>
		<span class="text-muted">{{ trans('admin.reset_password_info') }}</span>
	</div>
	
	<div class="row mt-3">
		{{-- Form --}}
		<form class="col-12" action="{{ url('password/email') }}" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="language_code" value="{{ config('app.locale') }}">
			
			{{-- email --}}
			<div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
				<div class="col-12">
					<input class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
						   type="email"
						   name="email"
						   value="{{ old('email') }}"
						   placeholder="{{ trans('admin.email_address') }}"
					>
					
					@if ($errors->has('email'))
						<small class="form-control-feedback">{{ $errors->first('email') }}</small>
					@endif
				</div>
			</div>
			
			@include('layouts.inc.tools.captcha')
			
			{{-- remember me & password recover --}}
			<div class="form-group">
				<div class="d-flex">
					<div class="ml-auto">
						<a href="javascript:void(0)" id="to-login" class="text-muted float-right">
							<i class="fas fa-sign-in-alt mr-1"></i> {{ trans('admin.login') }}
						</a>
					</div>
				</div>
			</div>
			
			{{-- button --}}
			<div class="row mt-3">
				<div class="col-12">
					<button class="btn btn-block btn-lg btn-primary" type="submit" name="action">{{ trans('admin.reset') }}</button>
				</div>
			</div>
		</form>
	</div>
</div>