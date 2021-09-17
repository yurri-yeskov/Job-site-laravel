<?php $hideOnMobile = isset($hideOnMobile) ? $hideOnMobile : ''; ?>
@if (isset($paddingTopExists))
	@if (isset($firstSection) and !$firstSection)
		<div class="h-spacer{{ $hideOnMobile }}"></div>
	@else
		@if (!$paddingTopExists)
			<div class="h-spacer{{ $hideOnMobile }}"></div>
		@endif
	@endif
@else
	<div class="h-spacer{{ $hideOnMobile }}"></div>
@endif