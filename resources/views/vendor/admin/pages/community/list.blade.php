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
			<li class="breadcrumb-item"><a href="" class="text-capitalize">{{ trans('Chart') }}</a></li>
			<li class="breadcrumb-item active">{{ trans('admin.list') }}</li>
		</ol>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="card rounded">

			<div class="card-header with-border">
				<a href="/admin/community/create_category" class="btn btn-primary shadow ladda-button" data-style="zoom-in">
					<span class="ladda-label">
						<i class="fas fa-plus"></i> Add Chatter Category
					</span>
				</a>
			</div>
			<div class="card-body">
				@if (\Session::has('success'))
				<div class="alert alert-success">
					<ul>
						<li>{!! \Session::get('success') !!}</li>
					</ul>
				</div>
				@endif
				<label style="font-size: 15px">Categories</label>
				
				<table id="crudTable" class="table table-bordered table-striped display dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th >Order</th>
							<th >Name</th>
							<th >Color</th>
							<th >Slug</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($category_list as $list)
						<tr>
							<td>{{ $list->order }}</td>
							<td>{{ $list->name }}</td>
							<td>{{ $list->color }}</td>
							<td>{{ $list->slug }}</td>
							<td><a href="/admin/community/category/{{$list->id}}/edit" class="btn btn-xs btn-primary">
									<i class="far fa-edit"></i> Edit
								</a>

								<a href="#" onclick="HandleDelete({{$list->id}})" class="btn btn-xs btn-danger" data-button-type="delete">
									<i class="far fa-trash-alt"></i> Delete
								</a>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-body">
				<label  style="font-size: 15px">Discussions</label>
				<table id="crudTable_1" class="table table-bordered table-striped display dt-responsive nowrap" width="100%">
					<thead>
						<tr>
						
							<th >Title</th>
							<th >Category</th>
							<th >Creator</th>
							<th >Views</th>
							<th>Posts</th>
							<th>Votes</th>
							<th>Created_at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="chatter">
						@foreach($discussions as $discussion)
						<tr>
							
							<td><a class="discussion_list" href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $discussion->category->slug }}/{{ $discussion->slug }}">{{ $discussion->title }}</a></td>
							<td>
								<span class="chatter_cat" style="background-color:{{ $discussion->category->color }}; color:white; border-radius:5px; padding:5px 3px">{{ $discussion->category->name }}</span>
							</td>
							<td>
								{{ ucfirst($discussion->user->{Config::get('chatter.user.database_field_with_user_name')}) }}
							</td>
							<td><i class="far fa-eye"></i> {{ $discussion->views }}</td>
							<td><i class="far fa-eye"></i> {{ $discussion->postsCount[0]->total }}</td>
							<td><i class="far fa-eye"></i> @if(count($discussion->votesCount)>0) {{ $discussion->votesCount[0]->total }} @else 0  @endif</td>
							<td><i class="far fa-eye"></i> {{ $discussion->created_at }}</td>
							<td>
								<a href="/admin/community/{{$discussion->id}}/edit" class="btn btn-xs btn-primary">
									<i class="far fa-edit"></i> Edit
								</a>

								<a href="#" onclick="discussionDelete({{$discussion->id}})" class="btn btn-xs btn-danger" data-button-type="delete">
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
	function HandleDelete(id) {
		var base_url = window.location.origin;
		var retVal = confirm("Are you sure, Want to delete this item?");
		if (retVal == true) {
		
			window.location = `${base_url}/admin/community/category/${id}/delete`
			return true;
		} else {
			return false;
		}
	}

	function discussionDelete(id) {
		var base_url = window.location.origin;
		var retVal = confirm("Are you sure, Want to delete this item?");
		if (retVal == true) {
		
			window.location = `${base_url}/admin/community/${id}/delete`
			return true;
		} else {
			return false;
		}
	}

	jQuery(document).ready(function($) {
		var table = $("#crudTable").DataTable({
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

		var table = $("#crudTable_1").DataTable({
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