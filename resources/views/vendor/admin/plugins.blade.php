@extends('admin::layouts.master')

@section('after_styles')
    <!-- Ladda Buttons (loading buttons) -->
    <link href="{{ asset('vendor/admin/ladda/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h3 class="mb-0">
				{{ trans('admin.Plugins') }}
			</h3>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
				<li class="breadcrumb-item active">{{ trans('admin.Plugins') }}</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')
    <!-- Default box -->
	<div class="row">
		<div class="col-12">
			
			<div class="card rounded">
				<div class="card-header">
					<h3>{{ trans('admin.Existing plugins') }}</h3>
				</div>
				
				<div class="card-body">
					<table class="table table-hover table-condensed">
						<thead>
						<tr>
							<th>#</th>
							<th>{{ trans('admin.Name') }}</th>
							<th>{{ trans('admin.Description') }}</th>
							<th class="text-right">{{ trans('admin.Version') }}</th>
							<th class="text-right">{{ mb_ucfirst(trans('admin.options')) }}</th>
							<th class="text-right">{{ trans('admin.actions') }}</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($plugins as $key => $plugin)
							<tr>
								<th scope="row">{{ $loop->iteration }}</th>
								<td>{{ $plugin->display_name }}</td>
								<td>{{ $plugin->description }}</td>
								<td class="text-right">{{ $plugin->version }}</td>
								<td class="text-right">
									@if ($plugin->has_installer)
										@if ($plugin->installed and $plugin->activated)
											@if (!empty($plugin->options))
												@foreach($plugin->options as $option)
													@continue(!isset($option->url))
													<a class="btn btn-xs {{ (isset($option->btnClass) && !empty($option->btnClass)) ? $option->btnClass : 'btn-light' }}" href="{{ $option->url }}">
														<i class="{{ (isset($option->iClass) && !empty($option->iClass)) ? $option->iClass : 'fa fa-cog' }}"></i>
														{{ (isset($option->name) && !empty($option->name)) ? $option->name : trans('admin.Configure') }}
													</a>
												@endforeach
											@else
												-
											@endif
										@else
											-
										@endif
									@endif
								</td>
								<td class="text-right">
									@if ($plugin->has_installer)
										@if ($plugin->installed)
											@if ($plugin->activated)
												<a class="btn btn-xs btn-success btn-uninstall" href="{{ admin_url('plugins/' . $plugin->name . '/uninstall') }}">
													<i class="fa fa-toggle-on"></i> {{ trans('admin.Uninstall') }}
												</a>
											@else
												<a class="btn btn-xs btn-danger btn-install" data-name="{!! $plugin->display_name !!}" data-checkable="{{ (!empty($plugin->item_id)) ? true : false }}" href="{{ admin_url('plugins/' . $plugin->name . '/install') }}">
													<i class="fa fa-lock"></i> {{ trans('admin.Activate') }}
												</a>
											@endif
										@else
											<a class="btn btn-xs btn-light btn-install" data-name="{!! $plugin->display_name !!}" data-checkable="{{ (!empty($plugin->item_id)) ? true : false }}" href="{{ admin_url('plugins/' . $plugin->name . '/install') }}">
												<i class="fa fa-toggle-off"></i> {{ trans('admin.Install') }}
											</a>
										@endif
									@endif
									<!--
									<a class="btn btn-xs btn-danger" data-button-type="delete" href="{{ admin_url('plugins/' . $plugin->name . '/delete') }}">
										<i class="fa fa-trash-o"></i> {{ trans('admin.delete') }}
									</a>
									-->
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>

        </div>
    </div>


	<div class="modal fade" id="purchaseCodeModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ trans('admin.Plugin') }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			
				<form role="form" method="POST" action="">
					{!! csrf_field() !!}
				
					<div class="modal-body">
					
						@if (isset($errors) and $errors->any() and old('purchaseCodeForm')=='1')
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<ul class="list list-check">
									@foreach($errors->all() as $error)
										<li>{!! $error !!}</li>
									@endforeach
								</ul>
							</div>
						@endif
					
						<!-- purchase_code -->
						<div class="form-group required <?php echo (isset($errors) and $errors->has('purchase_code_valid')) ? ' is-invalid' : ''; ?>">
							<label for="purchase_code" class="control-label">{{ trans('admin.Purchase Code') }}</label>
							<input id="purchaseCode" name="purchase_code" class="form-control required" placeholder="{{ trans('admin.purchase_code_placeholder') }}" value="{{ old('purchase_code') }}">
							<p>{!! trans('admin.find_my_purchase_code') !!}</p>
						</div>
						
						<input type="hidden" name="displayName">
						<input type="hidden" name="installUrl">
						<input type="hidden" name="purchaseCodeForm" value="1">
					</div>
				
					<div class="modal-footer">
						<button type="button" class="btn btn-light pull-left" data-dismiss="modal">{{ t('Close') }}</button>
						<button type="submit" class="btn btn-primary" id="btnSubmit">{{ trans('admin.Install') }}</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

@endsection

@section('after_scripts')
    <!-- Ladda Buttons (loading buttons) -->
    <script src="{{ asset('vendor/admin/ladda/spin.js') }}"></script>
    <script src="{{ asset('vendor/admin/ladda/ladda.js') }}"></script>

    <script>
		var confirmRequestMessage = '<?php echo trans('admin.confirm_this_action'); ?>';
		
        jQuery(document).ready(function($)
        {
        	/* Installation: Display the Purchase Code Form */
            $(document).on('click', '.btn-install', function(e)
			{
				e.preventDefault(); /* prevents the submit or reload */
				
				// Clear form existing data
				clearFormData();
				
				// Retrieve form data
				var displayName = $(this).data('name');
				var installUrl = $(this).attr('href');
                var checkable = $(this).data('checkable');
                if (checkable) {
					return showInstallationForm(displayName, installUrl);
				} else {
					var confirmation = confirm(confirmRequestMessage);
					if (confirmation) {
						redirect(installUrl);
					}
				}
				
				return false;
            });
            
            /* Installation: Submit the Purchase Code Form */
			$(document).on('click', '#btnSubmit', function(e)
			{
				e.preventDefault(); /* prevents the submit or reload */
				$('#purchaseCodeModal form').submit();
				
				return false;
			});
	
            /* Un-installation */
			$(document).on('click', '.btn-uninstall', function()
			{
				var confirmation = confirm(confirmRequestMessage);
				
				return confirmation;
			});
	
			@if (isset($errors) and $errors->any())
				@if ($errors->any() and old('purchaseCodeForm')=='1')
					var displayName = '{!! old('displayName') !!}';
					var installUrl = '{!! old('installUrl') !!}';
					showInstallationForm(displayName, installUrl);
				@endif
			@endif
        });
        
        function showInstallationForm(displayName, installUrl) {
        	$('#purchaseCodeModal h4.modal-title').html(displayName);
			$('#purchaseCodeModal [name="displayName"]').val(displayName);
			$('#purchaseCodeModal form').attr('action', installUrl);
			$('#purchaseCodeModal [name="installUrl"]').val(installUrl);
			$('#purchaseCodeModal').modal();
			
			return false;
        }
        
        function clearFormData() {
			$('#purchaseCodeModal h4.modal-title').html('');
			$('#purchaseCodeModal [name="displayName"]').val('');
			$('#purchaseCodeModal form').attr('action', '');
			$('#purchaseCodeModal [name="installUrl"]').val('');
	
			$('#purchaseCodeModal .alert.alert-danger').html('').hide();
			var purchaseCodeFieldSelector = '#purchaseCodeModal [name="purchase_code"]';
			$(purchaseCodeFieldSelector).val('');
			$(purchaseCodeFieldSelector).parent('div.form-group').removeClass('has-error');
		}
    </script>
@endsection
