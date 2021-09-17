<!-- select multiple -->
<div @include('admin::panel.inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
	@include('admin::panel.fields.inc.translatable_icon')
    <select
    	class="form-control"
        name="{{ $field['name'] }}[]"
        @include('admin::panel.inc.field_attributes')
    	multiple>

    	<option value="">-</option>

    	@if (isset($field['model']))
    		@foreach ($field['model']::all() as $connected_entity_entry)
    			<option value="{{ $connected_entity_entry->getKey() }}"
					@if ( (isset($field['value']) && in_array($connected_entity_entry->getKey(), $field['value']->pluck($connected_entity_entry->getKeyName(), $connected_entity_entry->getKeyName())->toArray())) || ( old( $field["name"] ) && in_array($connected_entity_entry->getKey(), old( $field["name"])) ) )
                         selected
					@endif
    			>{{ $connected_entity_entry->{$field['attribute']} }}</option>
    		@endforeach
    	@endif

	</select>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <small class="form-control-feedback">{!! $field['hint'] !!}</small>
    @endif
</div>