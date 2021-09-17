<?php
if(isset($skills_user[0])){
		$expskill = explode(', ',$skills_user[0]->type);
		
}

?>
<div class="row">
<div class="col-md-11">
<div class="form-group option_wrap ">
	
	<label for="option" class="sr-only">Select Option</label>
	<input type="text" class="form-control position-relative">
	<ul class="option-list">
		<?php  if(isset($expskill[0])){
				foreach($expskill as $sk){
			?>
				<li><?php echo $sk; ?></li>
		<?php
				}
		}	
		?>
	</ul>

</div>
</div>
<div class="col-md-1">
<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_skill_modal"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a>	
</div>
</div>




<div class="modal fade" id="edit_skill_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabels">Edit Skills</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <form id="skillFormEdit">
					<input type="hidden" name="template_id" value="{{$skills_user[0]->id}}">
					<input type="hidden" name="template_id" value="{{$attr_template_id}}">
					  <div class="modal-body">
						<span class="skill_response" style="margin-top: 12px;"></span>
						 {!! csrf_field() !!}

						  <div class="form-group option_skill required">
								<label for="recipient-name" class="col-form-label" >Skill</label>
								<!--<input type="text" class="form-control" id="" name="skill">-->
								<select class="form-control select_skills_multiple_update" id="exampleFormControlSelect1three" name="skill[]" multiple="multiple">
								
									
									@foreach($skills_merge as $wkskill)
									<option value="{{$wkskill}}"  selcted="selected">{{$wkskill}}</option>
									@endforeach
									
								</select>
						  </div>
						  
					  </div>
					  <div class="modal-footer">
						 <button type="submit" class="btn_sve">Save Changes</button>
						 <button type="reset" class="btn_cnc">Cancel</button>
					  </div>
				  </form>
				</div>
			  </div>
        </div>
<script>
$(".select_skills_multiple_update").select2({
	tags: true,
    tokenSeparators: [',', ' '],
	dropdownParent: $('#edit_skill_modal')
})
$('.select2-container').css("width","100%");

$('.select_skills_multiple_update').val(<?php echo json_encode($expskill); ?>);
$('.select_skills_multiple_update').trigger('change');

 	
</script>