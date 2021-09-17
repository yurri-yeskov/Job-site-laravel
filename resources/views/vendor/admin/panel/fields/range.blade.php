<!-- html5 range input -->
<div @include('admin::panel.inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('admin::panel.fields.inc.translatable_icon')
    <input
        type="range"
        name="{{ $field['name'] }}"
        value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        @include('admin::panel.inc.field_attributes')
        >

    {{-- HINT --}}
    @if (isset($field['hint']))
        <small class="form-control-feedback">{!! $field['hint'] !!}</small>
    @endif
</div>