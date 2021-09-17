<!-- html5 date input -->

<?php
    // if the column has been cast to Carbon or Date (using attribute casting)
    // get the value as a date string
    if (isset($field['value']) && ( $field['value'] instanceof \Carbon\Carbon ))
    {
        $field['value'] = $field['value']->toDateString();
    }
?>

<div @include('admin::panel.inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('admin::panel.fields.inc.translatable_icon')
    <input
        type="date"
        name="{{ $field['name'] }}"
        value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        @include('admin::panel.inc.field_attributes')
        >

    {{-- HINT --}}
    @if (isset($field['hint']))
        <small class="form-control-feedback">{!! $field['hint'] !!}</small>
    @endif
</div>
