<!-- textarea -->
<div @include('admin::panel.inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
	@include('admin::panel.fields.inc.translatable_icon')
    <textarea
    	name="{{ $field['name'] }}"
        @include('admin::panel.inc.field_attributes')

    	>{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}</textarea>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <small class="form-control-feedback">{!! $field['hint'] !!}</small>
    @endif
</div>