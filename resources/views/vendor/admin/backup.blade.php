@extends('admin::layouts.master')

@section('after_styles')
    <!-- Ladda Buttons (loading buttons) -->
    <link href="{{ asset('vendor/admin/ladda/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				{{ trans('admin.backup') }}
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
				<li class="breadcrumb-item active">{{ trans('admin.backup') }}</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			
			<div class="card rounded">
				<div class="card-body">
					<h3 class="card-title">
						<i class="fa fa-question-circle"></i> {{ trans('admin.Help') }}
					</h3>
					<p class="card-text">{!! trans('admin.help_backup', ['backupLocalStorage' => relativeAppPath(storage_path('backups'))]) !!}</p>
				</div>
			</div>
			
			<div class="card rounded">
				<div class="card-body text-center">
					
					<button id="create-new-backup-button"
							href="{{ admin_url('backups/create') }}"
							class="btn btn-success shadow ladda-button backup-button"
							data-style="zoom-in"
					>
						<span class="ladda-label">
							<i class="fas fa-download"></i> {{ trans('admin.create_a_new_backup_all') }}
						</span>
					</button>
					
					<button id="create-new-backup-button1"
							href="{{ admin_url('backups/create').'?type=database' }}"
							class="btn btn-primary shadow ladda-button backup-button"
							data-style="zoom-in"
					>
						<span class="ladda-label">
							<i class="fa fa-database"></i> {{ trans('admin.create_a_new_backup_database') }}
						</span>
					</button>
					
					<button id="create-new-backup-button3"
							href="{{ admin_url('backups/create').'?type=languages' }}"
							class="btn btn-info shadow ladda-button backup-button"
							data-style="zoom-in"
					>
						<span class="ladda-label">
							<i class="fas fa-globe"></i> {{ trans('admin.create_a_new_backup_languages') }}
						</span>
					</button>
					
					<button id="create-new-backup-button2"
							href="{{ admin_url('backups/create').'?type=files' }}"
							class="btn btn-warning shadow text-white ladda-button backup-button"
							data-style="zoom-in"
					>
						<span class="ladda-label">
							<i class="far fa-copy"></i> {{ trans('admin.create_a_new_backup_files') }}
						</span>
					</button>
					
					<button id="create-new-backup-button4"
							href="{{ admin_url('backups/create').'?type=app' }}"
							class="btn btn-danger shadow ladda-button backup-button"
							data-style="zoom-in"
					>
						<span class="ladda-label">
							<i class="fa fa-industry"></i> {{ trans('admin.create_a_new_backup_app') }}
						</span>
					</button>
					
					<?php
					$backupSetting = \App\Models\Setting::where('key', 'backup')->first(['id']);
					?>
					@if (isset($backupSetting) and !empty($backupSetting))
						<a href="{{ admin_url('settings/' . $backupSetting->id . '/edit') }}" class="btn btn-secondary shadow" style="margin-bottom:5px;">
							<i class="fa fa-cog"></i> {{ trans('admin.backup_more_options') }}
						</a>
					@endif
					
				</div>
			</div>
			
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title">{{ trans('admin.existing_backups') }}:</h3>
				</div>
				<div class="card-body">
					<table class="table table-hover table-condensed">
						<thead>
						<tr>
							<th>#</th>
							<th>{{ trans('admin.location') }}</th>
							<th>{{ trans('admin.date') }}</th>
							<th class="text-right">{{ trans('admin.file_size') }}</th>
							<th class="text-right">{{ trans('admin.actions') }}</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($backups as $k => $b)
							<?php
							$lastModified = $b['last_modified'] ?? time();
							$lastModified = \Illuminate\Support\Carbon::createFromTimeStamp($lastModified);
							$lastModified = \App\Helpers\Date::format($lastModified, 'backup')
							?>
							<tr>
								<th scope="row">{{ $k+1 }}</th>
								<td>{{ $b['disk'] }}</td>
								<td>{{ $lastModified }}</td>
								<td class="text-right">{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
								<td class="text-right">
									@if ($b['download'])
										<a class="btn btn-xs btn-secondary"
										   href="{{ admin_url('backups/download/') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}"
										>
											<i class="fa fa-cloud-download"></i> {{ trans('admin.download') }}
										</a>
									@endif
									<a class="btn btn-xs btn-danger"
									   data-button-type="delete"
									   href="{{ admin_url('backups/delete/'.$b['file_name']) }}?disk={{ $b['disk'] }}"
									>
										<i class="fa fa-trash-o"></i> {{ trans('admin.delete') }}
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

@section('after_scripts')
    <!-- Ladda Buttons (loading buttons) -->
    <script src="{{ asset('vendor/admin/ladda/spin.js') }}"></script>
    <script src="{{ asset('vendor/admin/ladda/ladda.js') }}"></script>
    
    <script>
		jQuery(document).ready(function($) {
			
			// capture the Create new backup button
			$(".backup-button").click(function(e) {
				e.preventDefault();
				
				if (isDemoDomainJs()) {
					return false;
				}
				
				var buttonIdSelector = '#' + $(this).attr('id');
				var create_backup_url = $(this).attr('href');
				
				// Create a new instance of ladda for the specified button
				var l = Ladda.create( document.querySelector(buttonIdSelector) );
				
				// Start loading
				l.start();
				
				// Will display a progress bar for 10% of the button width
				l.setProgress( 0.3 );
				
				setTimeout(function(){ l.setProgress( 0.6 ); }, 2000);
				
				// do the backup through ajax
				$.ajax({
					url: create_backup_url,
					type: 'PUT',
					success: function(result) {
						l.setProgress( 0.9 );
						
						// Show an alert with the result
						if (result.indexOf('failed') >= 0) {
							new PNotify({
								title: "{{ trans('admin.create_warning_title') }}",
								text: "{{ trans('admin.create_warning_message') }}",
								type: "warning"
							});
						}
						else
						{
							new PNotify({
								title: "{{ trans('admin.create_confirmation_title') }}",
								text: "{{ trans('admin.create_confirmation_message') }}",
								type: "success"
							});
						}
						
						// Stop loading
						l.setProgress( 1 );
						l.stop();
						
						// refresh the page to show the new file
						setTimeout(function(){ location.reload(); }, 3000);
					},
					error: function(result) {
						l.setProgress( 0.9 );
						
						// Show an alert with the result
						new PNotify({
							title: "{{ trans('admin.create_error_title') }}",
							text: "{{ trans('admin.create_error_message') }}",
							type: "warning"
						});
						
						// Stop loading
						l.stop();
					}
				});
			});
			
			// capture the delete button
			$("[data-button-type=delete]").click(function(e) {
				e.preventDefault();
				
				if (isDemoDomainJs()) {
					return false;
				}
				
				var delete_button = $(this);
				var delete_url = $(this).attr('href');
				
				if (confirm("{{ trans('admin.delete_confirm') }}") == true) {
					$.ajax({
						url: delete_url,
						type: 'DELETE',
						success: function(result) {
							// Show an alert with the result
							new PNotify({
								title: "{{ trans('admin.delete_confirmation_title') }}",
								text: "{{ trans('admin.delete_confirmation_message') }}",
								type: "success"
							});
							// delete the row from the table
							delete_button.parentsUntil('tr').parent().remove();
						},
						error: function(result) {
							// Show an alert with the result
							new PNotify({
								title: "{{ trans('admin.delete_error_title') }}",
								text: "{{ trans('admin.delete_error_message') }}",
								type: "warning"
							});
						}
					});
				} else {
					new PNotify({
						title: "{{ trans('admin.delete_cancel_title') }}",
						text: "{{ trans('admin.delete_cancel_message') }}",
						type: "info"
					});
				}
			});
			
		});
    </script>
@endsection
