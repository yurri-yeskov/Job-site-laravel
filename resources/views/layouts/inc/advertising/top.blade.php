@if (isset($topAdvertising) and !empty($topAdvertising))
	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'])
	<div class="container">
		<?php
		$responsiveClass = (isset($topAdvertising) and $topAdvertising->is_responsive != 1) ? ' d-none d-xl-block d-lg-block d-md-none d-sm-none' : '';
		?>
		{{-- Desktop --}}
		<div class="container ads-parent-responsive{{ $responsiveClass }}">
			<div class="text-center">
				{!! $topAdvertising->tracking_code_large !!}
			</div>
		</div>
		@if ($topAdvertising->is_responsive != 1)
			{{-- Tablet --}}
			<div class="container ads-parent-responsive d-none d-xl-none d-lg-none d-md-block d-sm-none">
				<div class="text-center">
					{!! $topAdvertising->tracking_code_medium !!}
				</div>
			</div>
			{{-- Mobile --}}
			<div class="container ads-parent-responsive d-block d-xl-none d-lg-none d-md-none d-sm-block">
				<div class="text-center">
					{!! $topAdvertising->tracking_code_small !!}
				</div>
			</div>
		@endif
	</div>
@endif