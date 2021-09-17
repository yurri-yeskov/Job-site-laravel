<!-- text input -->
<div @include('admin::panel.inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
	@include('admin::panel.fields.inc.translatable_icon')
	
	@if (isset($field['prefix']) || isset($field['suffix'])) <div class="input-group"> @endif
	@if (isset($field['prefix'])) <div class="input-group-prepend">{!! $field['prefix'] !!}</div> @endif
    <input
    	type="email"
    	name="{{ $field['name'] }}"
        value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        @include('admin::panel.inc.field_attributes')
	>
	@if (isset($field['suffix'])) <div class="input-group-append">{!! $field['suffix'] !!}</div> @endif
	@if (isset($field['prefix']) || isset($field['suffix'])) </div> @endif
	
    {{-- HINT --}}
    @if (isset($field['hint']))
        <small class="form-control-feedback">{!! $field['hint'] !!}</small>
    @endif
</div>