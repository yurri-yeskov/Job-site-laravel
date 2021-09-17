<div id="saveActions" class="form-group">
	
	<input type="hidden" name="save_action" value="{{ $saveAction['active']['value'] }}">
	
	<div class="btn-group">
		
		<button type="submit" class="btn btn-primary shadow">
			<span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
			<span data-value="{{ $saveAction['active']['value'] }}">{{ $saveAction['active']['label'] }}</span>
		</button>
		
		<button type="button" class="btn btn-primary shadow dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
			<span class="caret"></span>
			<span class="sr-only">Toggle Save Dropdown</span>
		</button>
		
		<div class="dropdown-menu">
			@foreach( $saveAction['options'] as $value => $label)
				<a class="dropdown-item" href="javascript:void(0);" data-value="{{ $value }}">{{ $label }}</a>
			@endforeach
		</div>
	
	</div>
	
	<a href="{{ url($xPanel->route) }}" class="btn btn-secondary shadow"><span class="fa fa-ban"></span> &nbsp;{{ trans('admin.cancel') }}</a>
</div>