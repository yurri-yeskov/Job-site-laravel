<?php
// Clear Filter Button
$clearFilterBtn = \App\Helpers\UrlGen::getDateFilterClearLink($cat ?? null, $city ?? null);
?>
<!-- Date -->
<div class="block-title has-arrow sidebar-header">
	<h5 class="list-title">
		<span class="font-weight-bold">
			{{ t('Date Posted') }}
		</span> {!! $clearFilterBtn !!}
	</h5>
</div>
<div class="block-content list-filter">
	<div class="filter-date filter-content">
		<ul>
			@if (isset($dates) and !empty($dates))
				@foreach($dates as $key => $value)
					<li>
						<input type="radio"
							   name="postedDate"
							   value="{{ $key }}"
							   id="postedDate_{{ $key }}" {{ (request()->get('postedDate')==$key) ? 'checked="checked"' : '' }}
						>
						<label for="postedDate_{{ $key }}">{{ $value }}</label>
					</li>
				@endforeach
			@endif
			<input type="hidden" id="postedQueryString" value="{{ httpBuildQuery(request()->except(['page', 'postedDate'])) }}">
		</ul>
	</div>
</div>
<div style="clear:both"></div>

@section('after_scripts')
	@parent
	
	<script>
		$(document).ready(function ()
		{
			$('input[type=radio][name=postedDate]').click(function() {
				var postedQueryString = $('#postedQueryString').val();
				
				if (postedQueryString != '') {
					postedQueryString = postedQueryString + '&';
				}
				postedQueryString = postedQueryString + 'postedDate=' + $(this).val();
				
				var searchUrl = baseUrl + '?' + postedQueryString;
				redirect(searchUrl);
			});
		});
	</script>
@endsection