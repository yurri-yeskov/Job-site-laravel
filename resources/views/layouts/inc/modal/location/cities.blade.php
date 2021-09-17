@if (isset($countryCode, $languageCode, $currSearch, $_token, $cities))
<div class="row">

	@foreach ($cities as $col)
		<div class="col-md-4">
			<ul class="list-link list-unstyled">
				@foreach ($col as $city)
					@if ($loop->parent->first and $loop->first)
						<li><a href="{{ \App\Helpers\UrlGen::search() }}">{{ t('All Cities', [], 'global', $languageCode) }}</a></li>
					@endif
					<?php
						$params = ['d' => config('country.icode'), 'l' => $city->id];
						$inputs = array_merge($currSearch, $params);
						$except = ['_token'];
						$url = \App\Helpers\UrlGen::search($inputs, $except);
					?>
					<li><a href="{{ $url }}" title="{{ $city->name }}">{{ $city->name }}</a></li>
				@endforeach
			</ul>
		</div>
	@endforeach
	
</div>
@endif