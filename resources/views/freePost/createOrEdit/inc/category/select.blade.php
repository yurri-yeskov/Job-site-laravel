@if (isset($hasChildren) and !$hasChildren)
	
	@if (isset($category) and !empty($category))
		@if (!empty($category->parent))
			@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.category.parent', 'post.createOrEdit.inc.category.parent'], ['parent' => $category->parent])
			&nbsp;&raquo;&nbsp;
		@endif
		@if (isset($category->children) and $category->children->count() > 0)
			<a href="#browseCategories" data-toggle="modal" class="cat-link" data-id="{{ $category->id }}">
				{{ $category->name }}
			</a>
		@else
			{{ $category->name }}&nbsp;
			[ <a href="#browseCategories"
				 data-toggle="modal"
				 class="cat-link"
				 data-id="{{ (isset($category->parent) and !empty($category->parent)) ? $category->parent->id : 0 }}"
			><i class="far fa-edit"></i> {{ t('Edit') }}</a> ]
		@endif
	@else
		<a href="#browseCategories" data-toggle="modal" class="cat-link" data-id="0">
			{{ t('select_a_category') }}
		</a>
	@endif
	
@else

	@if (isset($category) and !empty($category))
		<p>
			<a href="#" class="btn btn-sm btn-success cat-link" data-id="{{ $category->parent_id }}">
				<i class="fas fa-reply"></i> {{ t('go_to_parent_categories') }}
			</a>&nbsp;
			<strong>{{ $category->name }}</strong>
		</p>
		<div style="clear:both"></div>
	@endif
	
	@if (isset($categoriesOptions) and isset($categoriesOptions['type_of_display']))
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				@if ($categoriesOptions['type_of_display'] == 'c_picture_icon')
					
					@if (isset($categories) and $categories->count() > 0)
						@foreach($categories as $key => $cat)
							<div class="col-lg-2 col-md-3 col-sm-4 col-6 f-category">
								<a href="#" class="cat-link" data-id="{{ $cat->id }}">
									<img src="{{ imgUrl($cat->picture, 'cat') }}" class="lazyload img-fluid" alt="{{ $cat->name }}">
									<h6>
										{{ $cat->name }}
									</h6>
								</a>
							</div>
						@endforeach
					@endif
				
				@elseif (in_array($categoriesOptions['type_of_display'], ['cc_normal_list', 'cc_normal_list_s']))
					
					<div style="clear: both;"></div>
					<?php $styled = ($categoriesOptions['type_of_display'] == 'cc_normal_list_s') ? ' styled' : ''; ?>
					
					@if (isset($categories) and $categories->count() > 0)
						<div class="col-xl-12">
							<div class="list-categories-children{{ $styled }}">
								<div class="row">
									@foreach ($categories as $key => $cols)
										<div class="col-md-4 col-sm-4 {{ (count($categories) == $key+1) ? 'last-column' : '' }}">
											@foreach ($cols as $iCat)
												
												<?php
												$randomId = '-' . substr(uniqid(rand(), true), 5, 5);
												?>
												
												<div class="cat-list">
													<h3 class="cat-title rounded">
														@if (isset($categoriesOptions['show_icon']) and $categoriesOptions['show_icon'] == 1)
															<i class="{{ $iCat->icon_class ?? 'icon-ok' }}"></i>&nbsp;
														@endif
														<a href="#" class="cat-link" data-id="{{ $iCat->id }}">
															{{ $iCat->name }}
														</a>
														<span class="btn-cat-collapsed collapsed"
															  data-toggle="collapse"
															  data-target=".cat-id-{{ $iCat->id . $randomId }}"
															  aria-expanded="false"
														>
																<span class="icon-down-open-big"></span>
															</span>
													</h3>
													<ul class="cat-collapse collapse show cat-id-{{ $iCat->id . $randomId }} long-list-home">
														@if (isset($subCategories) and $subCategories->has($iCat->id))
															@foreach ($subCategories->get($iCat->id) as $iSubCat)
																<li>
																	<a href="#" class="cat-link" data-id="{{ $iSubCat->id }}">
																		{{ $iSubCat->name }}
																	</a>
																</li>
															@endforeach
														@endif
													</ul>
												</div>
											@endforeach
										</div>
									@endforeach
								</div>
							</div>
							<div style="clear: both;"></div>
						</div>
					@endif
				
				@else
					
					<?php
					$listTab = [
						'c_circle_list' => 'list-circle',
						'c_check_list'  => 'list-check',
						'c_border_list' => 'list-border',
					];
					$catListClass = (isset($listTab[$categoriesOptions['type_of_display']])) ? 'list ' . $listTab[$categoriesOptions['type_of_display']] : 'list';
					?>
					@if (isset($categories) and $categories->count() > 0)
						<div class="col-xl-12">
							<div class="list-categories">
								<div class="row">
									@foreach ($categories as $key => $items)
										<ul class="cat-list {{ $catListClass }} col-md-4 {{ (count($categories) == $key+1) ? 'cat-list-border' : '' }}">
											@foreach ($items as $k => $cat)
												<li>
													@if (isset($categoriesOptions['show_icon']) and $categoriesOptions['show_icon'] == 1)
														<i class="{{ $cat->icon_class ?? 'icon-ok' }}"></i>&nbsp;
													@endif
													<a href="#" class="cat-link" data-id="{{ $cat->id }}">
														{{ $cat->name }}
													</a>
												</li>
											@endforeach
										</ul>
									@endforeach
								</div>
							</div>
						</div>
					@endif
				
				@endif
			
			</div>
		</div>
	@endif
@endif

@section('before_scripts')
	@parent
	@if (isset($categoriesOptions) and isset($categoriesOptions['max_sub_cats']) and $categoriesOptions['max_sub_cats'] >= 0)
		<script>
			var maxSubCats = {{ (int)$categoriesOptions['max_sub_cats'] }};
		</script>
	@endif
@endsection
