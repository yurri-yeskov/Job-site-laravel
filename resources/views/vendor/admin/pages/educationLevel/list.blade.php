
<div class="row">
	<div class="col-12">
		<?php
		// print_r($teamSizeList);
		?>

		<div class="card rounded">

			<div class="card-header with-border pt-5">
				<a href="/admin/education/create" class="btn btn-primary shadow ladda-button" data-style="zoom-in">
					<span class="ladda-label">
						<i class="fas fa-plus"></i> Add Education level
					</span>
				</a>
			</div>
			<div class="card-body">
			
				<table id="crudTable" class="crudTable table table-bordered table-striped display dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($Educationlist as $items)
						<tr>
							<?php
							$types = json_decode($items->name, true);
							?>
							<td>{{ $types['en']}}</td>
							<td><a href="/admin/education/{{$items->id}}/edit?locale=en" class="btn btn-xs btn-primary">
									<i class="far fa-edit"></i> Edit
								</a>

								<a href="#" onclick="edulevelHandleDelete({{$items->id}})" class="btn btn-xs btn-danger" data-button-type="delete">
									<i class="far fa-trash-alt"></i> Delete
								</a>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>

			</div>


		</div>
	</div>
</div>


@section('after_styles')
{{-- DATA TABLES --}}
<link href="{{ asset('vendor/admin-theme/plugins/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendor/admin-theme/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendor/admin-theme/plugins/datatables/extensions/Responsive/2.2.5/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style>
	.form-inline {
		display: inherit !important;
		flex-flow: row wrap;
	}
</style>
{{-- CRUD LIST CONTENT - crud_list_styles stack --}}
@stack('crud_list_styles')


@endsection

@section('after_scripts')
{{-- DATA TABLES SCRIPT --}}
<script src="{{ asset('vendor/admin-theme/plugins/datatables/js/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/admin-theme/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/admin-theme/plugins/datatables/extensions/Responsive/2.2.5/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/admin-theme/plugins/datatables/extensions/Responsive/2.2.5/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>

{{--
	<script src="{{ asset('vendor/admin-theme/plugins/datatables/js/pages/datatable/custom-datatable.js') }}"></script>
<script src="{{ asset('vendor/admin-theme/plugins/datatables/js/pages/datatable/datatable-basic.init.js') }}"></script>
--}}


<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js" type="text/javascript"></script>



<script type="text/javascript">
	

	jQuery(document).ready(function($) {
		var table = $(".crudTable").DataTable({
			"pageLength": 10,
			"lengthMenu": [
				[10, 25, 50, 100, 250, 500],
				[10, 25, 50, 100, 250, 500]
			],
			/* Disable initial sort */
			"aaSorting": [],
			"language": {
				"emptyTable": "{{ trans('admin.emptyTable') }}",
				"info": "{{ trans('admin.info') }}",
				"infoEmpty": "{{ trans('admin.infoEmpty') }}",
				"infoFiltered": "{{ trans('admin.infoFiltered') }}",
				"infoPostFix": "{{ trans('admin.infoPostFix') }}",
				"thousands": "{{ trans('admin.thousands') }}",
				"lengthMenu": "{{ trans('admin.lengthMenu') }}",
				"loadingRecords": "{{ trans('admin.loadingRecords') }}",
				"processing": "{{ trans('admin.processing') }}",
				"search": "{{ trans('admin.search') }}",
				"zeroRecords": "{{ trans('admin.zeroRecords') }}",
				"paginate": {
					"first": "{{ trans('admin.paginate.first') }}",
					"last": "{{ trans('admin.paginate.last') }}",
					"next": "{{ trans('admin.paginate.next') }}",
					"previous": "{{ trans('admin.paginate.previous') }}"
				},
				"aria": {
					"sortAscending": "{{ trans('admin.aria.sortAscending') }}",
					"sortDescending": "{{ trans('admin.aria.sortDescending') }}"
				}
			},
			responsive: true




			/* Fire some actions after the data has been retrieved and renders the table */
			/* NOTE: This only fires once though. */


			/* Other initialisation options */

		});
	})
</script>
@stack('crud_list_scripts')
@endsection