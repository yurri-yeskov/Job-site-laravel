<!-- checkbox field -->
<div @include('admin::panel.inc.field_wrapper_attributes') >
	@include('admin::panel.fields.inc.translatable_icon')
    <div class="checkbox">
    	<label>
    	  <input type="hidden" name="{{ $field['name'] }}" value="0">
    	  <input type="checkbox" value="1"

          name="{{ $field['name'] }}"

          @if (isset($field['value']))
            @if( ((int) $field['value'] == 1 || old($field['name']) == 1) && old($field['name']) !== '0' )
             checked="checked"
            @endif
          @elseif (isset($field['default']) && $field['default'])
            checked="checked"
          @endif

          @if (isset($field['attributes']))
              @foreach ($field['attributes'] as $attribute => $value)
    			{{ $attribute }}="{{ $value }}"
        	  @endforeach
          @endif
          > {!! $field['label'] !!}
    	</label>

        {{-- HINT --}}
        @if (isset($field['hint']))
			<br>
			<small class="form-control-feedback">{!! $field['hint'] !!}</small>
        @endif
    </div>
</div>
