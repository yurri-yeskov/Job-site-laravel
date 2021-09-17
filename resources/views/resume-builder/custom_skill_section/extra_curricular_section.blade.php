<div class="remove_custom_section">
	<h2>Extra-curricular Activities
		@if(isset($curricular_activities_section[0]))
		<span class="cross-custom-icon-main-extra" ><a href="javascript:void(0);" attr_id="{{$curricular_activities_section[0]->id}}" class="extra_ativity_delete_full_section"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
		@endif
	
	</h2>	
	
	@if(isset($curricular_activities_section[0]))
	
	<div class="accordion accordian_all" id="accordionExample">
		@foreach($curricular_activities_section as $activity)
		  <div class="card">
			<div class="card-header" id="headingThree">
			  <h2 class="mb-0">
				<a href="javascript:void(0)" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree{{$activity->id}}" aria-expanded="false" aria-controls="collapseThree{{$activity->id}}">
				{{$activity->title}} at {{$activity->city}}
				</br>
				{{$activity->start_date}} - {{$activity->end_date}}
				</a>
				<span class="cross-custom-icon" ><a href="javascript:void(0);" attr_id="{{$activity->id}}" class="activity_delete"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
			  </h2>
			</div>
			<div id="collapseThree{{$activity->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			  <div class="card-body">
					<form id="extra_actitity_custom_form_{{$activity->id}}" class="extra_actitity_edit">
						{!! csrf_field() !!}
						
						<input type="hidden" class="form-control"  name="activity_id" value="{{$activity->id}}">
						<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Title<sup>*</sup></label>
							<input type="text" class="form-control" id="ex-course" name="title" value="{{$activity->title}}">
						</div>	
						<div class="form-group required">
							<label for="ex-institution" class="col-form-label">Employer<sup>*</sup></label>
							<input type="text" class="form-control" id="ex-institution" name="employer" value="{{$activity->employer}}">
						</div>	
						<div class="row">
							<div class="col-md-12 form-group required">
							   <label for="recipient-dates" class="col-form-label">Dates<sup>*</sup></label>
							</div>
							<div class="col-md-4">
														<div class="form-group required">								
									<input type="text" class="form-control text-center dtpiker" id="recipient-dates" placeholder="Start Date" name="start_date" value="{{$activity->start_date}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group required">								
								<input type="text" class="form-control text-center dtpiker" id="recipient-name" placeholder="End Date" name="end_date" value="{{$activity->end_date}}">
							</div>
							</div>
						</div>
						<div class="form-group required">
							<label for="ex-city" class="col-form-label">City<sup>*</sup></label>
							<input type="text" class="form-control" id="ex-city" name="city" value="{{$activity->city}}">
						</div>
						<div class="form-group required">
							<label for="ex-description" class="col-form-label">Description<sup>*</sup></label>
							<textarea class="form-control" rows="4" name="description">{{$activity->description}}</textarea>
						</div>
						
						<div class="add_sec">
							<button type="submit"  class="btn_sve" attr="{{$activity->id}}">Save</button>
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
		<form id="extra_actitity_custom_forms">
		{!! csrf_field() !!}
		
			<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">Title<sup>*</sup></label>
				<input type="text" class="form-control" id="ex-course" name="title" value="">
			</div>	
			<div class="form-group required">
				<label for="ex-institution" class="col-form-label">Employer<sup>*</sup></label>
				<input type="text" class="form-control" id="ex-institution" name="employer" value="">
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
			<div class="form-group required">
				<label for="ex-city" class="col-form-label">City<sup>*</sup></label>
				<input type="text" class="form-control" id="ex-city" name="city" value="">
			</div>
			<div class="form-group required">
				<label for="ex-description" class="col-form-label">Description<sup>*</sup></label>
				<textarea class="form-control" rows="4" name="description"></textarea>
			</div>
			<button type="submit" style="display:none;" class="trigger-click-extra-cirrcular-sections"></button>
			<div class="add_sec custom_btn_submit">
				<a href="javascript:void(0);" class="add_extra_cirrcular_form_anchor btn_sve">Save</a>
			</div>
			
		 </form>
	</div>
	<div class="add_sec click_show_btn">
				<a href="javascript:void(0);" class=""><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Activity</h5></a>
			</div>
	
</div>
<script>

$('.dtpiker').datepicker({
    	format: 'mm/dd/yyyy'
    	
    });
</script>
