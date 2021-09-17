@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				<span class="text-capitalize">{!! $xPanel->entityNamePlural !!}</span>
				<small id="tableInfo">{{ trans('admin.all') }}</small>
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
				<li class="breadcrumb-item"><a href="{{ url($xPanel->route) }}" class="text-capitalize">{!! $xPanel->entityNamePlural !!}</a></li>
				<li class="breadcrumb-item active">{{ trans('admin.list') }}</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			
			@if (isTranlatableModel($xPanel->model))
			<div class="card mb-0 rounded">
				<div class="card-body">
					<h3 class="card-title"><i class="fa fa-question-circle"></i> {{ trans('admin.Help') }}</h3>
					<p class="card-text">
						{!! trans('admin.help_translatable_table') !!}
						@if (config('larapen.admin.show_translatable_field_icon'))
							&nbsp;{!! trans('admin.help_translatable_column') !!}
						@endif
					</p>
				</div>
			</div>
			@endif
			
			<div class="card rounded">
					
				<div class="card-header {{ $xPanel->hasAccess('create')?'with-border':'' }}">
					@include('admin::panel.inc.button_stack', ['stack' => 'top'])
					<div id="datatable_button_stack" class="pull-right text-right"></div>
				</div>
				
				{{-- List Filters --}}
				@if ($xPanel->filtersEnabled())
					<div class="card-body">
						@include('admin::panel.inc.filters_navbar')
					</div>
				@endif
				
				<div class="card-body">
					
					<form id="bulkActionForm" action="{{ url($xPanel->getRoute() . '/bulk_delete') }}" method="POST">
						{!! csrf_field() !!}
						
						<table id="crudTable" class="table table-bordered table-striped display dt-responsive nowrap" width="100%">
							<thead>
							<tr>
								@if ($xPanel->details_row)
									<th data-orderable="false"></th> {{-- expand/minimize button column --}}
								@endif
	
								{{-- Table columns --}}
								@foreach ($xPanel->columns as $column)
									@if ($column['type'] == 'checkbox')
									<th {{ isset($column['orderable']) ? 'data-orderable=' .var_export($column['orderable'], true) : '' }}
										class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled"
										tabindex="0"
										aria-controls="massSelectAll"
										rowspan="1"
										colspan="1"
										style="width: 14px; text-align: center; padding-right: 10px;"
										data-col="0"
										aria-label=""
									>
										<input type="checkbox" id="massSelectAll" name="massSelectAll">
									</th>
									@else
									<th {{ isset($column['orderable']) ? 'data-orderable=' .var_export($column['orderable'], true) : '' }}>
										{!! $column['label'] !!}
									</th>
									@endif
								@endforeach
	
								@if ( $xPanel->buttons->where('stack', 'line')->count() )
									<th data-orderable="false">{{ trans('admin.actions') }}</th>
								@endif
							</tr>
							</thead>
	
							<tbody>
							</tbody>
	
							<tfoot>
							<tr>
								@if ($xPanel->details_row)
									<th></th> {{-- expand/minimize button column --}}
								@endif
	
								{{-- Table columns --}}
								@foreach ($xPanel->columns as $column)
									<th>{{ $column['label'] }}</th>
								@endforeach
	
								@if ( $xPanel->buttons->where('stack', 'line')->count() )
									<th>{{ trans('admin.actions') }}</th>
								@endif
							</tr>
							</tfoot>
						</table>
						
					</form>

				</div>

				@include('admin::panel.inc.button_stack', ['stack' => 'bottom'])
				
        	</div>
    	</div>
	</div>
@endsection

@section('after_styles')
    {{-- DATA TABLES --}}
    <link href="{{ asset('vendor/admin-theme/plugins/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('vendor/admin-theme/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('vendor/admin-theme/plugins/datatables/extensions/Responsive/2.2.5/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- CRUD LIST CONTENT - crud_list_styles stack --}}
    @stack('crud_list_styles')
    
    <style>
		@if ($xPanel->hasButton('bulk_delete_btn'))
		/* tr > td:first-child, */
		table.dataTable > tbody > tr:not(.no-padding) > td:first-child {
			width: 30px;
			white-space: nowrap;
			text-align: center;
        }
		@endif
		
		/* Fix the 'Actions' column size */
		/* tr > td:last-child, */
		table.dataTable > tbody > tr:not(.no-padding) > td:last-child,
		table:not(.dataTable) > tbody > tr > td:last-child {
			width: 10px;
			white-space: nowrap;
		}
    </style>
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

    @if (isset($xPanel->exportButtons) and $xPanel->exportButtons)
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
        <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js" type="text/javascript"></script>
    @endif

    <script type="text/javascript">
        jQuery(document).ready(function($) {
			
        	/* DEBUG */
			/* If don't want your end users to see the alert() message during error. */
			/* $.fn.dataTable.ext.errMode = 'throw'; */

            @if ($xPanel->exportButtons)
            var dtButtons = function(buttons){
                    var extended = [];
                    for(var i = 0; i < buttons.length; i++){
                        var item = {
                            extend: buttons[i],
                            exportOptions: {
                                columns: [':visible']
                            }
                        };
                        switch(buttons[i]){
                            case 'pdfHtml5':
                                item.orientation = 'landscape';
                                break;
                        }
                        extended.push(item);
                    }
                    return extended;
                }
            @endif

            var table = $("#crudTable").DataTable({
				"pageLength": {{ $xPanel->getDefaultPageLength() }},
				"lengthMenu": [[10, 25, 50, 100, 250, 500], [10, 25, 50, 100, 250, 500]],
				/* Disable initial sort */
				"aaSorting": [],
				"language": {
					"emptyTable":     "{{ trans('admin.emptyTable') }}",
					"info":           "{{ trans('admin.info') }}",
					"infoEmpty":      "{{ trans('admin.infoEmpty') }}",
					"infoFiltered":   "{{ trans('admin.infoFiltered') }}",
					"infoPostFix":    "{{ trans('admin.infoPostFix') }}",
					"thousands":      "{{ trans('admin.thousands') }}",
					"lengthMenu":     "{{ trans('admin.lengthMenu') }}",
					"loadingRecords": "{{ trans('admin.loadingRecords') }}",
					"processing":     "{{ trans('admin.processing') }}",
					"search":         "{{ trans('admin.search') }}",
					"zeroRecords":    "{{ trans('admin.zeroRecords') }}",
					"paginate": {
						"first":      "{{ trans('admin.paginate.first') }}",
						"last":       "{{ trans('admin.paginate.last') }}",
						"next":       "{{ trans('admin.paginate.next') }}",
						"previous":   "{{ trans('admin.paginate.previous') }}"
					},
					"aria": {
						"sortAscending":  "{{ trans('admin.aria.sortAscending') }}",
						"sortDescending": "{{ trans('admin.aria.sortDescending') }}"
					}
				},
				responsive: true,

				@if ($xPanel->ajaxTable)
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "{{ url($xPanel->route . '/search') . '?' . request()->getQueryString() }}",
					"type": "POST"
				},
				@endif
			
				@if ($xPanel->hasButton('bulk_delete_btn'))
				/* Mass Select All */
				'columnDefs': [{
					'targets': [0],
					'orderable': false
				}],
				@endif

				@if ($xPanel->exportButtons)
				/* Show the export datatable buttons */
				dom: '<"p-l-0 col-md-6"l>B<"p-r-0 col-md-6"f>rt<"col-md-6 p-l-0"i><"col-md-6 p-r-0"p>',
				buttons: dtButtons([
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5',
					'print',
					'colvis'
				]),
				@endif
	
				@if ($xPanel->hideSearchBar)
				searching: false,
				@endif
				
				/* Fire some actions after the data has been retrieved and renders the table */
				/* NOTE: This only fires once though. */
				'initComplete': function(settings, json) {
					/* console.log(json); */
					$('[data-toggle="tooltip"]').tooltip();
				},
			
				/* Other initialisation options */
				drawCallback : function() {
					/* Page Info */
					var info = this.api().page.info();
					var textInfo = "{{ trans('admin.info') }}";
					textInfo = textInfo.replace('_START_', (info.recordsTotal > 0) ? (info.start + 1) : 0);
					textInfo = textInfo.replace('_END_', info.end);
					textInfo = textInfo.replace('_TOTAL_', addThousandsSeparator(info.recordsTotal, '{{ trans('admin.thousands') }}'));
					if (info.recordsTotal <= 0) {
						textInfo = '{{ trans('admin.infoEmpty') }}';
					}
					$('#tableInfo').html(textInfo);
				}
			});
			
            @if ($xPanel->exportButtons)
            /* Move the datatable buttons in the top-right corner and make them smaller */
            table.buttons().each(function(button) {
                if (button.node.className.indexOf('buttons-columnVisibility') == -1)
                {
                    button.node.className = button.node.className + " btn-sm";
                }
            });
            $(".dt-buttons").appendTo($('#datatable_button_stack' ));
            @endif
			
            $.ajaxPrefilter(function(options, originalOptions, xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-XSRF-TOKEN', token);
                }
            });
			
            /* Make the delete button work in the first result page */
            register_delete_button_action();
			
            /* Make the delete button work on subsequent result pages */
            $('#crudTable').on('draw.dt', function () {
                register_delete_button_action();

                @if ($xPanel->details_row)
                 register_details_row_button_action();
                @endif
            }).dataTable();
			
            function register_delete_button_action() {
                $("[data-button-type=delete]").unbind('click');
                /* CRUD Delete */
                /* Ask for confirmation before deleting an item */
                $("[data-button-type=delete]").click(function(e) {
                    e.preventDefault();
                    var delete_button = $(this);
                    var delete_url = $(this).attr('href');

                    if (confirm("{{ trans('admin.delete_confirm') }}") == true) {
						if (isDemoDomainJs()) {
							/* Delete the row from the table */
							delete_button.parentsUntil('tr').parent().remove();
							return false;
						}
						
                        $.ajax({
                            url: delete_url,
                            type: 'DELETE',
                            success: function(result) {
                                /* Show an alert with the result */
                                new PNotify({
                                    title: "{{ trans('admin.delete_confirmation_title') }}",
                                    text: "{{ trans('admin.delete_confirmation_message') }}",
                                    type: "success"
                                });
                                /* Delete the row from the table */
                                delete_button.parentsUntil('tr').parent().remove();
                            },
                            error: function(result) {
								/* Show an alert with the result */
								/* console.log(result.responseText); */
								if (typeof result.responseText !== 'undefined') {
									if (result.responseText.indexOf("{{ trans('admin.unauthorized') }}") >= 0) {
										new PNotify({
											title: "{{ trans('admin.delete_confirmation_not_title') }}",
											text: result.responseText,
											type: "error"
										});
										
										return false;
									}
								}
								
								/* Show an alert with the standard message */
								new PNotify({
									title: "{{ trans('admin.delete_confirmation_not_title') }}",
									text: "{{ trans('admin.delete_confirmation_not_message') }}",
									type: "warning"
								});
                            }
                        });
						
                    } else {
                        new PNotify({
                            title: "{{ trans('admin.delete_confirmation_not_deleted_title') }}",
                            text: "{{ trans('admin.delete_confirmation_not_deleted_message') }}",
                            type: "info"
                        });
                    }
                });
            }
	
	
			/* Mass Select All */
			$('body').on('change', '#massSelectAll', function() {
				var rows, checked, colIndex;
				rows = $('#crudTable').find('tbody tr');
				checked = $(this).prop('checked');
				colIndex = {{ (isTranlatableModel($xPanel->model)) ? 1 : 0 }};
				$.each(rows, function() {
					var checkbox = $($(this).find('td').eq(colIndex)).find('input').prop('checked', checked);
				});
			});
			
			/* Bulk Items Deletion */
			$('#bulkDeleteBtn').click(function(e) {
				e.preventDefault();
				
				var atLeastOneItemIsSelected = $('input[name="entryId[]"]:checked').length > 0;
				
				if (atLeastOneItemIsSelected) {
					if (confirm("{{ trans('admin.Are you sure you want to delete the selected items') }}") == true) {
						if (isDemoDomainJs()) {
							return false;
						}
						$('#bulkActionForm').submit();
					}
				} else {
					new PNotify({
						title: "{{ trans('admin.delete_confirmation_not_deleted_title') }}",
						text: "{{ trans('admin.Please select at least one item below') }}",
						type: "warning"
					});
				}
				
				return false;
			});


            @if ($xPanel->details_row)
            function register_details_row_button_action() {
                /* Add event listener for opening and closing details */
                $('#crudTable tbody').on('click', 'td .details-row-button', function () {
                    var tr = $(this).closest('tr');
                    var btn = $(this);
                    var row = table.row( tr );

                    if ( row.child.isShown() ) {
                        /* This row is already open - close it */
                        $(this).removeClass('fa-minus-square').addClass('fa-plus-square');
                        $('div.table_row_slider', row.child()).slideUp( function () {
                            row.child.hide();
                            tr.removeClass('shown');
                        } );
                    }
                    else {
                        /* Open this row */
                        $(this).removeClass('fa-plus-square').addClass('fa-minus-square');
                        /* Get the details with ajax */
                        $.ajax({
                            url: '{{ request()->url() }}/'+btn.data('entry-id')+'/details',
                            type: 'GET',
							/*
                            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                            // data: {param1: 'value1'},
                            */
                        })
                            .done(function(data) {
                                /* console.log("-- success getting table extra details row with AJAX"); */
                                row.child("<div class='table_row_slider'>" + data + "</div>", 'no-padding').show();
                                tr.addClass('shown');
                                $('div.table_row_slider', row.child()).slideDown();
                                register_delete_button_action();
                            })
                            .fail(function(data) {
                                /* console.log("-- error getting table extra details row with AJAX"); */
                                row.child("<div class='table_row_slider'>{{ trans('admin.details_row_loading_error') }}</div>").show();
                                tr.addClass('shown');
                                $('div.table_row_slider', row.child()).slideDown();
                            })
                            .always(function(data) {
                                /* console.log("-- complete getting table extra details row with AJAX"); */
                            });
                    }
                } );
            }

            register_details_row_button_action();
            @endif

        });

		/**
		 * Add Thousands Separator (for DataTable Info)
		 * @param nStr
		 * @param separator
		 * @returns {*}
		 */
		function addThousandsSeparator(nStr, separator = ',') {
			nStr += '';
			nStr = nStr.replace(separator, '');
			var x = nStr.split('.');
			var x1 = x[0];
			var x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + separator + '$2');
			}
			return x1 + x2;
		}
    </script>

    {{-- CRUD LIST CONTENT - crud_list_scripts stack --}}
    @stack('crud_list_scripts')
@endsection
