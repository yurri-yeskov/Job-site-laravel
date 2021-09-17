@if (config('captcha.option') && !empty(config('captcha.option')))
	<?php
	$captchaUrl = captcha_src(config('settings.security.captcha'));
	$captchaReloadUrl = url('captcha/' . config('settings.security.captcha'));
	$blankImage = url('images/blank.gif');
	
	$captchaImage = '<img src="' . $blankImage . '" style="cursor: pointer;">';
	$captchaHint = '<small class="form-text text-muted hide" style="margin-bottom: 2px;">' . t('captcha_hint') . '</small>';
	$captchaWidth = config('captcha.' . config('settings.security.captcha') . '.width', 150);
	$styleCss = ' style="width: ' . $captchaWidth . 'px;"';
	
	$captchaReloadBtn = '';
	$captchaReloadBtn .= '<a rel="nofollow" href="javascript:;" class="hide" title="' . t('captcha_reload_hint') . '">';
	$captchaReloadBtn .= '<button type="button" class="btn btn-primary btn-refresh"><i class="fas fa-sync"></i></button>';
	$captchaReloadBtn .= '</a>';
	
	// DEBUG
	// The generated key need to be un-hashed before to be stored in session
	// dump(session()->get('captcha.key'));
	?>
	
	@if (isFromAdminPanel())
		
		<?php
		$captchaDivError = (isset($errors) && $errors->has('captcha')) ? ' has-danger' : '';
		$captchaError = (isset($errors) && $errors->has('captcha')) ? ' form-control-danger' : '';
		$captchaField = '<input type="text" name="captcha" autocomplete="off" class="hide form-control' . $captchaError . '"' . $styleCss . '>';
		?>
		
		<div class="captcha-div form-group required{{ $captchaDivError }}">
			<div class="no-label">
				{!! $captchaReloadBtn !!}
				{!! $captchaHint !!}
				{!! $captchaField !!}
			</div>
			
			@if ($errors->has('captcha'))
				<small class="form-control-feedback hide">{{ $errors->first('captcha') }}</small>
			@endif
		</div>
	
	@else
		
		<?php
		$captchaError = (isset($errors) && $errors->has('captcha')) ? ' is-invalid' : '';
		$captchaField = '<input type="text" name="captcha" autocomplete="off" class="hide form-control input-md' . $captchaError . '"' . $styleCss . '>';
		?>
		
		@if (isset($colLeft) && isset($colRight))
			<div class="captcha-div form-group row required{{ $captchaError }}">
				<label class="{{ $colLeft }} col-form-label hide" for="captcha">
					@if (isset($label) && $label == true)
						{{ t('captcha_label') }}
					@endif
				</label>
				<div class="{{ $colRight }}">
					{!! $captchaReloadBtn !!}
					{!! $captchaHint !!}
					{!! $captchaField !!}
				</div>
			</div>
		@else
			@if (isset($label) && $label == true)
				<div class="captcha-div form-group required{{ $captchaError }}">
					<label class="control-label hide" for="captcha">{{ t('captcha_label') }}</label>
					<div>
						{!! $captchaReloadBtn !!}
						{!! $captchaHint !!}
						{!! $captchaField !!}
					</div>
				</div>
			@elseif (isset($noLabel) && $noLabel == true)
				<div class="captcha-div form-group required{{ $captchaError }}">
					<div class="no-label">
						{!! $captchaReloadBtn !!}
						{!! $captchaHint !!}
						{!! $captchaField !!}
					</div>
				</div>
			@else
				<div class="captcha-div form-group required{{ $captchaError }}">
					<div>
						{!! $captchaReloadBtn !!}
						{!! $captchaHint !!}
						{!! $captchaField !!}
					</div>
				</div>
			@endif
		@endif
	
	@endif
@endif

@section('captcha_head')
@endsection

@section('captcha_footer')
	@if (config('captcha.option') && !empty(config('captcha.option')))
		<?php $captchaDelay = (int)config('settings.security.captcha_delay', 600); ?>
		<script>
			let captchaImage = '{!! $captchaImage !!}';
			let captchaUrl = '{{ $captchaReloadUrl }}';
			
			$(document).ready(function () {
				/* Load the captcha image */
				{{-- createCaptchaImage(captchaImage, captchaUrl); --}}
				{{--
				 * Load the captcha image N ms after the page is loaded
				 *
				 * Admin panel: 0ms
				 * Front:
				 * Chrome: 600ms
				 * Edge: 600ms
				 * Safari: 500ms
				 * Firefox: 100ms
				--}}
				setTimeout(function () {
					loadCaptchaImage(captchaImage, captchaUrl);
				}, {{ $captchaDelay }});
				
				/* Reload the captcha image on by clicking on it */
				$(document).on('click', '.captcha-div img', function(e) {
					e.preventDefault();
					reloadCaptchaImage($(this), captchaUrl);
				});
				
				/* Reload the captcha image on by clicking on the reload link */
				$(document).on('click', '.captcha-div a', function(e) {
					e.preventDefault();
					reloadCaptchaImage($('.captcha-div img'), captchaUrl);
				});
			});
			
			function loadCaptchaImage(captchaImage, captchaUrl) {
				captchaImage = captchaImage.replace(/src="[^"]*"/gi, 'src="' + captchaUrl + '?'  + Math.random() + '"');
				$('.captcha-div > div').prepend(captchaImage);
				
				/* Show the captcha' div only when the image src is fully loaded */
				$('.captcha-div img').on('load', function() {
					$('.captcha-div label, .captcha-div a, .captcha-div small, .captcha-div input').removeClass('hide');
				});
			}
			
			function reloadCaptchaImage(captchaImageEl, captchaUrl) {
				captchaImageEl.attr('src', captchaUrl + '?' + Math.random());
			}
		</script>
	@endif
@endsection