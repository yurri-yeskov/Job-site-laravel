@if(isset($achievement[0]))
	@foreach($achievement as $k=>$achieve)
		<div class="hj">
		<ul>
			<li>{{$achieve->achievement1}}</li>
			<li><a href="javascript:void(0);" data-toggle="modal" data-target="#achievement_modal_{{$achieve->id}}"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
			<li><a href="javascript:void(0);" class="delete_achievement" attr_id="{{$achieve->id}}"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
		</ul>
		</div>
		<h3 class="hunt">#{{$k+1}} on {{date('F jS, Y',strtotime($achieve->date))}} for {{$achieve->achievement2}}</h3>
		
		
        <div class="modal fade achieveModal" id="achievement_modal_{{$achieve->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Awards or Professional Achievements</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <form id="achievementForm_{{$achieve->id}}">
					  <div class="modal-body">
						<span class="achievment_response" style="margin-top: 12px;"></span>
						 {!! csrf_field() !!}
						 <input type="hidden" name="achievement_id" value="{{$achieve->id}}">
						 <input type="hidden" name="template_id" value="{{$achieve->template_id}}">
						  <div class="form-group required">
							<label for="recipient-name" class="col-form-label">Award or Achievement<sup>*</sup></label>
							<input type="text" class="form-control" id="" name="achievement1" value="{{$achieve->achievement1}}">
						  </div>
						  <div class="form-group required">
							<label for="recipient-name" class="col-form-label">Field<sup>*</sup></label>
							<input type="text" class="form-control" name="achievement2" value="{{$achieve->achievement2}}">
						  </div>
						 <div class="form-group required">
							<label for="recipient-name" class="col-form-label" >Date<sup>*</sup></label>
							<input type="text" class="form-control dtpiker" id="" name="date" value="{{$achieve->date}}">
						  </div>
					  
					  </div>
					  <div class="modal-footer">
						 <button type="submit" class="btn_sve" attr_id="{{$achieve->id}}">Save Changes</button>
						 <button  data-dismiss="modal" aria-label="Close"  class="btn_cnc">Cancel</button>
					  </div>
				  </form>
				</div>
			  </div>
        </div>
		
		
	@endforeach
@endif

<script>
$('.dtpiker').datepicker({
    	format: 'mm/dd/yyyy'
    	
    });
</script>
<!--
<ul>
		<li>3x Awwwards SOTD</li>
		<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
		<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
	</ul>

<h3 class="hunt">#1 for June 7th, 2015 on Product Hunt</h3>
-->