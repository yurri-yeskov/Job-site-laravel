@if (isset($parent) and !empty($parent))
	@if (!empty($parent->parent))
		@includeFirst([config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.category.parent', 'post.createOrEdit.inc.category.parent'], ['parent' => $parent->parent])
		&nbsp;&raquo;&nbsp;
	@endif
	@if (isset($parent->children) and $parent->children->count() > 0)
		<a href="#browseCategories" data-toggle="modal" class="cat-link" data-id="{{ $parent->id }}">
			{{ $parent->name }}
		</a>
	@else
		{{ $parent->name }}&nbsp;
		[ <a href="#browseCategories"
			 data-toggle="modal"
			 class="cat-link"
			 data-id="{{ (isset($parent->parent) and !empty($parent->parent)) ? $parent->parent->id : 0 }}"
		><i class="far fa-edit"></i> {{ t('Edit') }}</a> ]
	@endif
@endif