<!-- Modal Select Category -->
<div class="modal fade" id="browseCategories" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			
			<div class="modal-header">
				<h4 class="modal-title" id="categoriesModalLabel">
					<i class="icon-map"></i> {{ t('select_a_category') }}
				</h4>
				
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">{{ t('Close') }}</span>
				</button>
			</div>
			
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-12" id="selectCats"></div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- /.modal -->

@section('after_scripts')
	@parent
	<script>
		/* Modal Default Admin1 Code */
        @if (isset($city) and !empty($city))
            var modalDefaultAdminCode = '{{ $city->subadmin1_code }}';
        @elseif (isset($admin) and !empty($admin))
            var modalDefaultAdminCode = '{{ $admin->code }}';
        @else
            var modalDefaultAdminCode = 0;
        @endif
	</script>
	<?php /*<script src="{{ url('assets/js/app/load.cities.js') . vTime() }}"></script>*/ ?>
@endsection