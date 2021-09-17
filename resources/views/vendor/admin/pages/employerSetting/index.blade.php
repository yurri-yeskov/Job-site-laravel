@extends('admin::layouts.master')

@section('header')
<div class="row page-titles">
	<div class="col-md-6 col-12 align-self-center">
		<h2 class="mb-0">
			<span class="text-capitalize"></span>
			<small id="tableInfo">{{ trans('admin.all') }}</small>
		</h2>
	</div>
	<div class="col-md-6 col-12 align-self-center d-none d-md-block">
		<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
			<li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
			<li class="breadcrumb-item "><a href="/admin/employer" class="text-capitalize">employer</a></li>
			<li class="breadcrumb-item active">settings</li>
		</ol>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card rounded">
			@if (\Session::has('success'))
			<div class="alert alert-success">
				<ul>
					<li>{!! \Session::get('success') !!}</li>
				</ul>
			</div>
			@endif
			@include('admin::pages.teamSize.list')
			@include('admin::pages.experience.list')
			@include('admin::pages.specialities.list')
			@include('admin::pages.skill.list')
			@include('admin::pages.salary.list')
			@include('admin::pages.educationLevel.list')
		</div>
	</div>
</div>
@endsection

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

	div.dataTables_wrapper div.dataTables_paginate ul.pagination {
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
		transition: background-color .3s;
		border: 1px solid #ddd;
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