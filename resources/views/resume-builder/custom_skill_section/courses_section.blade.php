<div class="remove_custom_section">
	<h2>Courses
	@if(isset($course[0]))
		<span class="cross-custom-icon-main" ><a href="javascript:void(0);" attr_id="{{$course[0]->id}}" class="course_delete_full_section"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
	@endif
	</h2>	
@if(isset($course[0]))

	<div class="accordion accordian_all" id="accordionExample">
	@foreach($course as $cours)
	  <div class="card">
		<div class="card-header" id="headingThree">
		  <h2 class="mb-0">
			<a href="javascript:void(0)" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree{{$cours->id}}" aria-expanded="false" aria-controls="collapseThree{{$cours->id}}">
			{{$cours->course_name}} at {{$cours->institution}}
			</br>
			{{$cours->start_date}} - {{$cours->end_date}}
			</a>
			<span class="cross-custom-icon" ><a href="javascript:void(0);" attr_id="{{$cours->id}}" class="course_delete"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
		  </h2>
		</div>
		<div id="collapseThree{{$cours->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
		  <div class="card-body">
				<form id="course_custom_form_{{$cours->id}}" class="course_section_edit">
					{!! csrf_field() !!}
					
					<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
					<input type="hidden" class="form-control"  name="course_id" value="{{$cours->id}}">
					<div class="form-group required">
						<label for="sec-course" class="col-form-label">Course<sup>*</sup></label>
						<input type="text" class="form-control" id="sec-course" name="courses" value="{{$cours->course_name}}">
					</div>	
					<div class="form-group required">
						<label for="sec-institution" class="col-form-label">Institution<sup>*</sup></label>
						<input type="text" class="form-control" id="sec-institution" name="institution" value="{{$cours->institution}}">
					</div>	
					<div class="row">
						<div class="col-md-12 form-group required">
						   <label for="recipient-dates" class="col-form-label">Dates<sup>*</sup></label>
						</div>
						<div class="col-md-4">
													<div class="form-group required">								
								<input type="text" class="form-control text-center dtpiker" id="recipient-dates" placeholder="Start Date" name="start_date" value="{{$cours->start_date}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group required">								
							<input type="text" class="form-control text-center dtpiker" id="recipient-name" placeholder="End Date" name="end_date"  value="{{$cours->end_date}}">
						</div>
						</div>
					</div>
					
					<div class="add_sec">
					<button type="submit"  class="btn_sve" attr="{{$cours->id}}">Save</button>
					<button type="reset" class="btn_cnc">Cancel</button>
						
				</div>
			</form>
		  </div>
		</div>
	  </div>
	  <!--<div><a href="javascript:void(0);" class="delete_achievement" attr_id=""><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></div>
	  -->
	  @endforeach
	</div>
@endif
	<div class="cus_forms_section" style="display:none;">
		<form id="course_custom_form">
		{!! csrf_field() !!}
		
		<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
		<div class="form-group required">
			<label for="sec-course" class="col-form-label">Course<sup>*</sup></label>
			<input type="text" class="form-control" id="sec-course" name="courses" value="">
		</div>	
		<div class="form-group required">
			<label for="sec-institution" class="col-form-label">Institution<sup>*</sup></label>
			<input type="text" class="form-control" id="sec-institution" name="institution" value="">
		</div>	
		<div class="row">
			<div class="col-md-12 form-group required">
			   <label for="recipient-dates" class="col-form-label">Dates<sup>*</sup></label>
			</div>
			<div class="col-md-4">
										<div class="form-group required">								
					<input type="text" class="form-control text-center dtpiker" id="recipient-dates" placeholder="Start Date" name="start_date">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group required">								
				<input type="text" class="form-control text-center dtpiker" id="recipient-name" placeholder="End Date" name="end_date">
			</div>
			</div>
		</div>
		<button type="submit" style="display:none;" class="trigger-click"></button>
		<div class="add_sec custom_btn_submit">
				<a href="javascript:void(0);" class="add_course_form_anchor btn_sve">Save</a>
			</div>
		
		 </form>
	</div>
	<div class="add_sec click_show_btn">
		<a href="javascript:void(0);" class=""><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Courses</h5>
		</a>
	</div>
	
</div>
<script>

</script>


<script>



$('.dtpiker').datepicker({
    	format: 'mm/dd/yyyy'
    	
    });
</script>
