<div class="remove_custom_section">
	<h2>References</h2>	

	@if(isset($references_section[0]))
	
	<div class="accordion accordian_all" id="accordionExample">
		@foreach($references_section as $references)
		  <div class="card">
			<div class="card-header" id="headingThree">
			  <h2 class="mb-0">
				<a href="javascript:void(0)" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree{{$references->id}}" aria-expanded="false" aria-controls="collapseThree{{$references->id}}">
				{{$references->name}} at {{$references->company}}
				</a>
				<span class="cross-custom-icon" ><a href="javascript:void(0);" attr_id="{{$references->id}}" class="reference_delete"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}" ></a></span>
			  </h2>
			</div>
			<div id="collapseThree{{$references->id}}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			  <div class="card-body">
					<form id="reference_update_custom_form_{{$references->id}}" class="reference_update">
						{!! csrf_field() !!}
						
						<input type="hidden" class="form-control"  name="reference_id" value="{{$references->id}}">
						<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Referent's Full Name<sup>*</sup></label>
							<input type="text" class="form-control"  name="name" value="{{$references->name}}">
						</div>	
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Company<sup>*</sup></label>
							<input type="text" class="form-control"  name="company" value="{{$references->company}}">
						</div>
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Phone<sup>*</sup></label>
							<input type="number" class="form-control"  name="phone" value="{{$references->phone}}" maxlength="10">
						</div>
						<div class="form-group required">
							<label for="ex-course" class="col-form-label">Email<sup>*</sup></label>
							<input type="text" class="form-control"  name="email" value="{{$references->email}}">
						</div>
						<div class="add_sec">
							<button type="submit"  class="btn_sve" attr="{{$references->id}}">Save</button>
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
		<form id="references_custom_form">
			{!! csrf_field() !!}
			
			<input type="hidden" class="form-control"  name="template_id" value="<?php echo $attr_template_id; ?>">
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">Referent's Full Name<sup>*</sup></label>
				<input type="text" class="form-control"  name="name" value="">
			</div>	
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">Company<sup>*</sup></label>
				<input type="text" class="form-control"  name="company" value="">
			</div>
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">Phone<sup>*</sup></label>
				<input type="number" class="form-control" name="phone" value="" maxlength="10">
			</div>
			<div class="form-group required">
				<label for="ex-course" class="col-form-label">Email<sup>*</sup></label>
				<input type="text" class="form-control" name="email" value="">
			</div>
			<button type="submit" style="display:none;" class="trigger-click-references-section"></button>
			<div class="add_sec custom_btn_submit">
				<a href="javascript:void(0);" class="add_references_form_anchor btn_sve">Save</a>
			</div>
		 </form>
	</div>
	<div class="add_sec click_show_btn">
		<a href="javascript:void(0);" class=""><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add reference</h5></a>
	</div>

</div>
<script>

</script>

