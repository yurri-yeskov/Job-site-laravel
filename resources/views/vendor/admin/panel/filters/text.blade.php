{{-- Text CRUD filter --}}

<li filter-name="{{ $filter->name }}"
	filter-type="{{ $filter->type }}"
	class="dropdown {{ request()->get($filter->name) ? 'active' : '' }}">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $filter->label }} <span class="caret"></span></a>
	<div class="dropdown-menu pt-0 pb-0">
		<div class="form-group backpack-filter mb-0">
			<div class="input-group">
				<input class="form-control pull-right"
					   id="text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}"
					   type="text"
					   @if ($filter->currentValue)
					   value="{{ $filter->currentValue }}"
					   @endif
				>
				<div class="input-group-append">
					<span class="input-group-text">
						<a class="text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}-clear-button" href=""><i class="fa fa-times"></i></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</li>

{{-- ########################################### --}}
{{-- Extra CSS and JS for this particular filter --}}


{{-- FILTERS EXTRA JS --}}
{{-- push things in the after_scripts section --}}

@push('crud_list_scripts')
	<!-- include select2 js-->
	<script>
		jQuery(document).ready(function($) {
			$('#text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}').on('change', function(e) {
				
				var parameter = '{{ $filter->name }}';
				var value = $(this).val();
				
				// behaviour for ajax table
				var ajaxTable = $('#crudTable').DataTable();
				var currentUrl = ajaxTable.ajax.url();
				var newUrl = addOrUpdateUriParameter(currentUrl, parameter, value);
				
				// replace the datatables ajax url with newUrl and reload it
				newUrl = normalizeAmpersand(newUrl.toString());
				ajaxTable.ajax.url(newUrl).load();
				
				// mark this filter as active in the navbar-filters
				if (URI(newUrl).hasQuery('{{ $filter->name }}', true)) {
					$('li[filter-name={{ $filter->name }}]').removeClass('active').addClass('active');
				} else {
					$('li[filter-name={{ $filter->name }}]').trigger('filter:clear');
				}
			});
			
			$('li[filter-name={{ \Illuminate\Support\Str::slug($filter->name) }}]').on('filter:clear', function(e) {
				$('li[filter-name={{ $filter->name }}]').removeClass('active');
				$('#text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}').val('');
			});
			
			// datepicker clear button
			$(".text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}-clear-button").click(function(e) {
				e.preventDefault();
				
				$('li[filter-name={{ \Illuminate\Support\Str::slug($filter->name) }}]').trigger('filter:clear');
				$('#text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}').val('');
				$('#text-filter-{{ \Illuminate\Support\Str::slug($filter->name) }}').trigger('change');
			})
		});
	</script>
@endpush
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}