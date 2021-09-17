<div class="remove_custom_section">
	<h2>Hobbies
	@if(isset($hobbies_section[0]))
		<span class="cross-custom-icon-main" ><a href="javascript:void(0);" attr_id="{{$hobbies_section[0]->id}}" class="hobby_delete_full_section"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
	@endif
	</h2>	
	@if(isset($hobbies_section[0]))
	
	<div class="accordion accordian_all" id="accordionExample">
		@foreach($hobbies_section as $hobby)
		  <div class="card">
			<div class="card-header" id="headingThree">
			  <h2 class="mb-0">
				<a href="javascript:void(0)" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree{{$hobby->id}}" aria-expanded="false" aria-controls="collapseThree{{$hobby->id}}">
				{{$hobby->title}}
				</a>
				<span class="cross-custom-icon" ><a href="javascript:void(0);" attr_id="{{$hobby->id}}" class="hobby_delete"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
			  </h2>
			</div>
			<div id="collapseThree{{$hobby->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			  <div class="card-body">
					<form id="hobbies_custom_form_{{$hobby->id}}" class="hobbies_edit">
						{!! csrf_field() !!}
						
						<input type="hidden" class="form-control"  name="language_id" value="{{$hobby->id}}">
						<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Title<sup>*</sup></label>
							<input type="text" class="form-control hobby_change_check" id="ex-course" name="title" value="{{$hobby->title}}" >
						</div>	
						<div class="form-group required">
							<label for="ex-description" class="col-form-label">What do you like?<sup>*</sup></label>
							<textarea class="form-control hobby_change_check" rows="4" name="description">{{$hobby->description}}</textarea>
						</div>
						
						<div class="add_sec">
							<button type="submit"  class="btn_sve" attr="{{$hobby->id}}">Save</button>
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
		<form id="hobby_custom_form">
		{!! csrf_field() !!}
		
		<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
		<div class="form-group required">
			<label for="ex-course" class="col-form-label">Title<sup>*</sup></label>
			<input type="text" class="form-control" id="ex-course" name="title" value="">
		</div>	
		<div class="form-group required">
			<label for="ex-description" class="col-form-label">What do you like?<sup>*</sup></label>
			<textarea class="form-control" rows="4" name="description"></textarea>
		</div>
		<button type="submit" style="display:none;" class="trigger-click-hobby-section"></button>
		<div class="add_sec custom_btn_submit">
				<a href="javascript:void(0);" class="add_hobby_form_anchor btn_sve">Save</a>
			</div>
		
		 </form>
	</div>
		<div class="add_sec click_show_btn">
			<a href="javascript:void(0);" class=""><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Hobby</h5></a>
		</div>
	
</div>
<script>

</script>

