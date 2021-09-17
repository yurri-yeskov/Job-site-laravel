@if(isset($experience_history[0]))
@foreach($experience_history as $experience)
<div class="product_sec">
    <ul>
        <li>{{$experience->position_head}}</li>
        <li><span
                class="year">{{date('Y',strtotime($experience->start_date))}}-{{date('Y',strtotime($experience->end_date))}}</span>
        </li>
        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#employ_modal_{{$experience->id}}"><img
                    src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="pencil"></a></li>
        <li><a href="javascript:void(0);" class="delete_experience" attr_id="{{$experience->id}}"><img
                    src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
    </ul>
</div>
<h6>{{$experience->company}}</h6>
<div class="skills">
    <ul>
        @if(!empty($experience->duty1))
			<li>– {{$experience->duty1}}</li>
		@endif	
		@if(!empty($experience->duty2))
			<li>– {{$experience->duty2}}</li>
		@endif	
		@if(!empty($experience->duty3))
			<li>– {{$experience->duty3}}</li>
		@endif	
		@if(!empty($experience->duty4))
			<li>– {{$experience->duty4}}</li>
		@endif	
       
    </ul>
</div>



<!--END COPYRIGHT-->
<div class="modal fade emp_modal" id="employ_modal_{{$experience->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Experience History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" class="form-horizontal employ_edit" id="experience_history_form_{{$experience->id}}">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <span class="experience_history_response" style="margin-top: 12px;"></span>
                    <input type="hidden" name="historyModalForm" value="1">
                    <input type="hidden" name="experience_id" value="{{$experience->id}}">
					<input type="hidden" name="template_id" value="{{$experience->template_id}}" class="exp_templateid">

                    <div class="form-group required">
                        <label for="recipient-name" class="col-form-label">Position Held<sup>*</sup></label>
                        <input type="text" class="form-control experience_change_check" id="recipient-name" name="position_head"
                            value="{{$experience->position_head}}" >
                    </div>

                    <div class="form-group required">
                        <label for="recipient-name" class="col-form-label">Company<sup>*</sup></label>
                        <input type="text" class="form-control experience_change_check" id="recipient-name" name="company"
                            value="{{$experience->company}}">
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group required">
                            <label for="recipient-name" class="col-form-label ">Dates<sup>*</sup></label>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group required">
                                <input type="text" class="form-control text-center dtpiker experience_change_check" id="recipient-name"
                                    placeholder="Start Date" name="start_date" value="{{$experience->start_date}}">
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group required">
                                <input type="text" class="form-control text-center dtpiker experience_change_check" id="recipient-name"
                                    placeholder="End Date" name="end_date" value="{{$experience->end_date}}">
                            </div>
                        </div>
                    </div>
					 <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Duties/Tasks</label>
                        <input type="text" class="form-control experience_change_check" id="recipient-name" name="duties1"
                            value="{{$experience->duty1}}">
                   
                    </div>
					<div class="form-group">
                       
                        <input type="text" class="form-control experience_change_check" id="recipient-name" name="duties2"
                            value="{{$experience->duty2}}">
                   
                    </div>
					<div class="form-group">
                     
                        <input type="text" class="form-control experience_change_check" id="recipient-name" name="duties3"
                            value="{{$experience->duty3}}">
                   
                    </div>
					<div class="form-group">
                 
                        <input type="text" class="form-control experience_change_check" id="recipient-name" name="duties4"
                            value="{{$experience->duty4}}">
                   
                    </div> 
            </form>

            <div class="modal-footer">
                <button type="submit" class="btn_sve" attr_id="{{$experience->id}}">Save Changes</button>
                <button  data-dismiss="modal" aria-label="Close"  class="btn_cnc">Cancel</button>
            </div>
        </div>
    </div>
</div>
</div>


@endforeach
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
$('.dtpiker').datepicker({
    	format: 'mm/dd/yyyy'
    	
    });
</script>