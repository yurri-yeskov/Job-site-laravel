@if (isset($bottomAdvertising) and !empty($bottomAdvertising))
	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'])
	<div class="container">
		<?php
		$responsiveClass = (isset($bottomAdvertising) and $bottomAdvertising->is_responsive != 1) ? ' d-none d-xl-block d-lg-block d-md-none d-sm-none' : '';
		?>
		{{-- Desktop --}}
		<div class="container mb20 ads-parent-responsive{{ $responsiveClass }}">
			<div class="text-center">
				{!! $bottomAdvertising->tracking_code_large !!}
			</div>
		</div>
		@if ($bottomAdvertising->is_responsive != 1)
			{{-- Tablet --}}
			<div class="container mb20 ads-parent-responsive d-none d-xl-none d-lg-none d-md-block d-sm-none">
				<div class="text-center">
					{!! $bottomAdvertising->tracking_code_medium !!}
				</div>
			</div>
			{{-- Mobile --}}
			<div class="container ads-parent-responsive d-block d-xl-none d-lg-none d-md-none d-sm-block">
				<div class="text-center">
					{!! $bottomAdvertising->tracking_code_small !!}
				</div>
			</div>
		@endif
	</div>
@endif