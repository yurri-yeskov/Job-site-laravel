<?php
// Clear Filter Button
$clearFilterBtn = \App\Helpers\UrlGen::getSalaryFilterClearLink($cat ?? null, $city ?? null);
?>
<!-- Salary -->
<div class="list-filter">
	<h5 class="list-title">
		<span class="font-weight-bold">
			{{ t('Salary Pay Range') }}
		</span> {!! $clearFilterBtn !!}
	</h5>
	<div class="filter-salary filter-content ">
		<form role="form" class="form-inline" action="{{ request()->url() }}" method="GET">
			<?php $i = 0; ?>
			@foreach(request()->except(['page', 'minSalary', 'maxSalary', '_token']) as $key => $value)
				@if (is_array($value))
					@foreach($value as $k => $v)
						@if (is_array($v))
							@foreach($v as $ik => $iv)
								@continue(is_array($iv))
								<input type="hidden" name="{{ $key.'['.$k.']['.$ik.']' }}" value="{{ $iv }}">
							@endforeach
						@else
							<input type="hidden" name="{{ $key.'['.$k.']' }}" value="{{ $v }}">
						@endif
					@endforeach
				@else
					<input type="hidden" name="{{ $key }}" value="{{ $value }}">
				@endif
			@endforeach
			<div class="form-group col-sm-4 no-padding">
				<input type="number" min="0" id="minSalary" name="minSalary" class="form-control" placeholder="{{ t('Min') }}" value="{{ request()->get('maxSalary') }}">
			</div>
			<div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
			<div class="form-group col-sm-4 no-padding">
				<input type="number" min="0" id="maxSalary" name="maxSalary" class="form-control" placeholder="{{ t('Max') }}" value="{{ request()->get('maxSalary') }}">
			</div>
			<div class="form-group col-sm-3 no-padding">
				<button class="btn btn-default pull-right btn-block-xs" type="submit">{{ t('GO') }}</button>
			</div>
		</form>
	</div>
</div>
<div style="clear:both"></div>