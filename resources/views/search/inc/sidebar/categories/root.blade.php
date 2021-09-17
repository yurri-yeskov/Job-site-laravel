<!-- Category -->
<div id="catsList">
	<div class="block-title has-arrow sidebar-header">
		<h5 class="list-title">
			<span class="font-weight-bold">
				{{ t('all_categories') }}
			</span> {!! $clearFilterBtn ?? '' !!}
		</h5>
	</div>
	<div class="block-content list-filter categories-list">
		<ul class="list-unstyled">
			@if (isset($cats) && $cats->count() > 0)
				@foreach ($cats as $iCat)
					<li>
						@if (isset($cat) && !empty($cat) && $iCat->id == $cat->id)
							<strong>
								<a href="{{ \App\Helpers\UrlGen::category($iCat, null, $city ?? null) }}" title="{{ $iCat->name }}">
									<span class="title">{{ $iCat->name }}</span>
									@if (config('settings.listing.count_categories_posts'))
										<span class="count">&nbsp;{{ $countPostsByCat->get($iCat->id)->total ?? 0 }}</span>
									@endif
								</a>
							</strong>
						@else
							<a href="{{ \App\Helpers\UrlGen::category($iCat, null, $city ?? null) }}" title="{{ $iCat->name }}">
								<span class="title">{{ $iCat->name }}</span>
								@if (config('settings.listing.count_categories_posts'))
									<span class="count">&nbsp;{{ $countPostsByCat->get($iCat->id)->total ?? 0 }}</span>
								@endif
							</a>
						@endif
					</li>
				@endforeach
			@endif
		</ul>
	</div>
</div>