<div class="remove_custom_section">
	<h2>Languages
		@if(isset($languages_section[0]))
		<span class="cross-custom-icon-main" ><a href="javascript:void(0);" attr_id="{{$languages_section[0]->id}}" class="languages_delete_full_section"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
		@endif
	</h2>	

	@if(isset($languages_section[0]))
	
	<div class="accordion accordian_all" id="accordionExample">
		@foreach($languages_section as $languages)
		  <div class="card">
			<div class="card-header" id="headingThree">
			  <h2 class="mb-0">
				<a href="javascript:void(0)" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree{{$languages->id}}" aria-expanded="false" aria-controls="collapseThree{{$languages->id}}">
				{{$languages->language}}<br>{{$languages->level}}
				</a>
				
			  </h2>
			</div>
			<div id="collapseThree{{$languages->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			  <div class="card-body">
					<form id="languages_custom_form_{{$languages->id}}" class="languages_edit">
						{!! csrf_field() !!}
						
						<input type="hidden" class="form-control"  name="language_id" value="{{$languages->id}}">
						<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Language<sup>*</sup></label>
							<input type="text" class="form-control"  name="language" value="{{$languages->language}}">
						</div>	
						<div class="form-group required">
							<label for="ex-institution" class="col-form-label">Level<sup>*</sup></label>
							<input type="text" class="form-control"  name="level" value="{{$languages->level}}">
						</div>
						<div class="add_sec">
							<button type="submit"  class="btn_sve" attr="{{$languages->id}}">Save</button>
							<button type="reset" class="btn_cnc">Cancel</button>	
						</div>
					</form>
			  </div>
			</div>
		  </div>
		  @endforeach
		</div>
	@endif
	
	<div class="cus_forms_section" style="display:none;">
		<form id="languages_custom_form">
		{!! csrf_field() !!}
		
		<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
		<div class="form-group required">
			<label for="ex-course" class="col-form-label">Language<sup>*</sup></label>
			<input type="text" class="form-control"  name="language" value="">
		</div>	
		<div class="form-group required">
			<label for="ex-institution" class="col-form-label">Level<sup>*</sup></label>
			<input type="text" class="form-control"  name="level" value="">
		</div>
		<button type="submit" style="display:none;" class="trigger-click-language-section"></button>
		<div class="add_sec custom_btn_submit">
			<a href="javascript:void(0);" class="add_language_form_anchor btn_sve">Save</a>
		</div>
		
		 </form>
	</div>
	<div class="add_sec click_show_btn">
		<a href="javascript:void(0);" class=""><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add reference</h5></a>
	</div>
</div>
<script>
</script>

