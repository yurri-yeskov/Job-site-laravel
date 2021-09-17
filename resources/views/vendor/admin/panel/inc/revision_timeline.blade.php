<ul class="timeline">
	@foreach($revisions as $revisionDate => $dateRevisions)
		<li class="time-label" data-date="{{ date('Y-m-d', strtotime($revisionDate)) }}">
			<span class="bg-red">
				{{ \App\Helpers\Date::format(\Illuminate\Support\Carbon::parse($revisionDate)) }}
			</span>
		</li>
		
		@foreach($dateRevisions as $history)
		<li class="timeline-item-wrap">
			<i class="fa fa-calendar bg-default"></i>
			<div class="timeline-item">
				<span class="time">
					<i class="fa fa-clock-o"></i> {{ date('h:ia', strtotime($history->created_at)) }}
				</span>
				@if($history->key == 'created_at' && !$history->old_value)
					<h3 class="timeline-header">
						{{ $history->userResponsible() ? $history->userResponsible()->name : trans('admin.guest_user') }}
						{{ trans('admin.created_this') }} {{ $crud->entity_name }}
					</h3>
				@else
					<h3 class="timeline-header">
						{{ $history->userResponsible() ? $history->userResponsible()->name : trans('admin.guest_user') }}
						{{ trans('admin.changed_the') }} {{ $history->fieldName() }}
					</h3>
					<div class="timeline-body p-b-0">
						<div class="row">
							<div class="col-md-6">{{ mb_ucfirst(trans('admin.from')) }}:</div>
							<div class="col-md-6">{{ mb_ucfirst(trans('admin.to')) }}:</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card bg-light rounded">
									<div class="card-body">
										{{ $history->oldValue() }}
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card bg-light rounded">
									<div class="card-body">
										{{ $history->newValue() }}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="timeline-footer p-t-0">
						<form method="post" action="{{ url(request()->url() . '/' . $history->id . '/restore') }}">
							{!! csrf_field() !!}
							<button type="submit"
									class="btn btn-primary btn-sm restore-btn"
									data-entry-id="{{ $entry->id }}"
									data-revision-id="{{ $history->id }}"
									onclick="onRestoreClick(event)"
							>
								<i class="fa fa-undo"></i> {{ trans('admin.undo') }}
							</button>
						</form>
					</div>
				@endif
			</div>
		</li>
		@endforeach
	@endforeach
</ul>

@section('after_scripts')
	<script type="text/javascript">
		$.ajaxPrefilter(function(options, originalOptions, xhr) {
			var token = $('meta[name="csrf_token"]').attr('content');
			if (token) {
				return xhr.setRequestHeader('X-XSRF-TOKEN', token);
			}
		});
		function onRestoreClick(e) {
			e.preventDefault();
			var entryId = $(e.target).attr('data-entry-id');
			var revisionId = $(e.target).attr('data-revision-id');
			$.ajax('{{ request()->url() . '/' }}' +  revisionId + '/restore', {
				method: 'POST',
				data: {
					revision_id: revisionId
				},
				success: function(revisionTimeline) {
					// Replace the revision list with the updated revision list
					$('.timeline').replaceWith(revisionTimeline);
					
					// Animate the new revision in (by sliding)
					$('.timeline-item-wrap').first().addClass('fadein');
					new PNotify({
						text: '{{ trans('admin.revision_restored') }}',
						type: 'success'
					});
				}
			});
		}
	</script>
@endsection

@section('after_styles')
	{{-- Animations for new revisions after ajax calls --}}
	<style>
		.timeline-item-wrap.fadein {
			-webkit-animation: restore-fade-in 3s;
			animation: restore-fade-in 3s;
		}
		@-webkit-keyframes restore-fade-in {
			from {opacity: 0}
			to {opacity: 1}
		}
		@keyframes restore-fade-in {
			from {opacity: 0}
			to {opacity: 1}
		}
	</style>
@endsection