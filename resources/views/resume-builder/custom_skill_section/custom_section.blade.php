@if(isset($custom_section[0]))
	@foreach($custom_section as $custom)
	<div class="remove_custom_section">
		<div class="cross-custom-icon-main-heading">
			<h2 class="custom_head_{{$custom->id}}">@if(empty($custom->title))Custom Section @else{{$custom->title}}@endif</h2>
			<span class="cross-custom-main-edit"><a href="javascript:void(0);" attr_id="{{$custom->id}}" class="custom_edit_title"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></span>
			<span class="cross-custom-main" ><a href="javascript:void(0);" attr_id="{{$custom->id}}" class="custom_delete"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
			<input type="text" class="custom_head_input_{{$custom->id}} custom_heading" style="display:none;" attr_id="{{$custom->id}}" value="@if(empty($custom->title))Custom Section @else{{$custom->title}}@endif">
		</div>
		
		<div class="accordion accordian_all" id="accordionExample">
			@if(!empty($custom->sub_section_id))
				@foreach($custom->custom_sub_section as $custom_sub)
			  <div class="card">
				<div class="card-header" id="headingThree">
				  <h2 class="mb-0">
					<a href="javascript:void(0)" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree{{$custom_sub->id}}" aria-expanded="false" aria-controls="collapseThree{{$custom_sub->id}}">
					{{$custom_sub->title}} at {{$custom_sub->city}}
					</br>
					{{$custom_sub->start_date}} - {{$custom_sub->end_date}}
					</a>
					<span class="cross-custom-icon" ><a href="javascript:void(0);" attr_id="{{$custom_sub->id}}" class="custom_delete_sub_section"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
				  </h2>
				</div>
				<div id="collapseThree{{$custom_sub->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				  <div class="card-body">
						<form id="custom_section_form_{{$custom_sub->id}}" class="custom_section_edit">
							{!! csrf_field() !!}
							
							<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
							<input type="hidden" class="form-control"  name="custom_id" value="{{$custom_sub->id}}">
							<div class="form-group required">
								<label for="ex-course" class="col-form-label">Activity name, job title, book title etc.<sup>*</sup></label>
								<input type="text" class="form-control" id="ex-course" name="title" value="{{$custom_sub->title}}">
							</div>	
							<div class="form-group required">
								<label for="ex-course" class="col-form-label">City<sup>*</sup></label>
								<input type="text" class="form-control" id="ex-course" name="city" value="{{$custom_sub->city}}">
							</div>
							<div class="row">
								<div class="col-md-12 form-group required">
								   <label for="recipient-dates" class="col-form-label">Dates<sup>*</sup></label>
								</div>
								<div class="col-md-4">
															<div class="form-group required">								
										<input type="text" class="form-control text-center dtpiker" id="recipient-dates" placeholder="Start Date" name="start_date" value="{{$custom_sub->start_date}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group required">								
									<input type="text" class="form-control text-center dtpiker" id="recipient-name" placeholder="End Date" name="end_date" value="{{$custom_sub->end_date}}">
								</div>
								</div>
							</div>
							<div class="form-group required">
								<label for="ex-description" class="col-form-label">Description<sup>*</sup></label>
								<textarea class="form-control" rows="4" name="description">{{$custom_sub->description}}</textarea>
							</div>
							<div class="add_sec">
								<button type="submit"  class="btn_sve" attr="{{$custom_sub->id}}">Save</button>
								<button type="reset" class="btn_cnc">Cancel</button>	
								</div>
							 </form>
				  </div>
				</div>
			  </div>
				@endforeach
			@endif
	
		 
		</div>

		<div class="cus_forms_section" style="display:none;">
			<form id="custom_section_form_main_{{$custom->id}}" class="custom_section_forms">
			{!! csrf_field() !!}
			<input type="hidden" class="form-control"  name="section_id" value="{{$custom->id}}">
			<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">Activity name, job title, book title etc.<sup>*</sup></label>
				<input type="text" class="form-control" id="ex-course" name="title" value="">
			</div>	
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">City<sup>*</sup></label>
				<input type="text" class="form-control" id="ex-course" name="city" value="">
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
				<label for="ex-description" class="col-form-label">Description<sup>*</sup></label>
				<textarea class="form-control" rows="4" name="description"></textarea>
			</div>
			<button type="submit" style="display:none;" class="trigger-click-custom-section"></button>
			<div class="add_sec custom_btn_submit">
					<a href="javascript:void(0);" class="add_custom_section_form_anchor btn_sve">Save</a>
				</div>
			 </form>
		</div>
		<div class="add_sec click_show_btn">
			<a href="javascript:void(0);" class=""><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Item</h5></a>
		</div>
	</div>

	<script>

	$('.dtpiker').datepicker({
			format: 'mm/dd/yyyy'
			
		});
	</script>
	 @endforeach
@endif
