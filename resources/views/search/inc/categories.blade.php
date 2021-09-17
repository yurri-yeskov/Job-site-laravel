@if (isset($cat) && !empty($cat))
	@if (isset($cat->children) && $cat->children->count() > 0)
		<div class="container hide-xs">
			<div>
				<ul class="list-inline">
					@foreach ($cat->children as $iSubCat)
						<li class="list-inline-item mt-2">
							<a href="{{ \App\Helpers\UrlGen::category($iSubCat, null, $city ?? null) }}" class="badge badge-light">
								{{ $iSubCat->name }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	@else
		@if (isset($cat->parent, $cat->parent->children) && $cat->parent->children->count() > 0)
			<div class="container hide-xs">
				<div>
					<ul class="list-inline mt-2">
						@foreach ($cat->parent->children as $iSubCat)
							<li class="list-inline-item">
								@if ($iSubCat->id == $cat->id)
									<span class="badge badge-primary">
										{{ $iSubCat->name }}
									</span>
								@else
									<a href="{{ \App\Helpers\UrlGen::category($iSubCat, null, $city ?? null) }}" class="badge badge-light">
										{{ $iSubCat->name }}
									</a>
								@endif
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		@else
			
			@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.categories-root', 'search.inc.categories-root'])
		
		@endif
	@endif
@else
	
	@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.categories-root', 'search.inc.categories-root'])

@endif