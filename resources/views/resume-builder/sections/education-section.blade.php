@if(isset($education_history[0]))
@foreach($education_history as $education)
<div class="product_sec">
    <ul>
        <li>{{$education->achievement}}</li>
        <li><span class="year red">{{date('Y',strtotime($education->date))}}</span></li>
        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#education_modal_{{$education->id}}"><img
                    src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
        <li><a href="javascript:void(0);" class="delete_education" attr_id="{{$education->id}}"><img
                    src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
    </ul>
</div>
<h6 class="red">{{$education->school}}</h6>
<div class="skills">
    <ul>
		@if(!empty($education->subject1))
			<li>– {{$education->subject1}}</li>
		@endif	
		@if(!empty($education->subject2))
			<li>– {{$education->subject2}}</li>
		@endif	
		@if(!empty($education->subject3))
			<li>– {{$education->subject3}}</li>
		@endif	
		

    </ul>
</div>
<!-- Modal-->
<div class="modal fade educate_edit" id="education_modal_{{$education->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" class="form-horizontal education_edit" id="education_response_form_{{$education->id}}">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <span class="education_response" style="margin-top: 12px;"></span>

                    <input type="hidden" name="educationModalForm" value="1">
                    <input type="hidden" name="education_id" value="{{$education->id}}">
					<input type="hidden" name="template_id" value="{{$education->template_id}}">

                    <div class="form-group required">
                        <label for="recipient-name" class="col-form-label">Achievement<sup>*</sup></label>
                        <input type="text" class="form-control education_change_check" id="recipient-name" name="achievement" value="{{$education->achievement}}">
                    </div>

                    <div class="form-group required">
                        <label for="recipient-name"
                            class="col-form-label">School/University/Institute<sup>*</sup></label>
                        <input type="text" class="form-control education_change_check" id="recipient-name" name="school_university_institute" value="{{$education->school}}">
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group required">
                            <label for="recipient-name" class="col-form-label ">Dates<sup>*</sup></label>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group required">
                                <input type="text" class="form-control text-center dtpiker education_change_check" id="recipient-name"
                                    placeholder="Completion Date" name="date" value="{{$education->date}}">
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Subjects</label>
                       <input type="text" class="form-control education_change_check" id="recipient-name" name="subject1"
                            value="{{$education->subject1}}">
                    </div>
					
                    <div class="form-group">
                        <input type="text" class="form-control education_change_check" id="recipient-name" name="subject2"
                            value="{{$education->subject2}}">
                    </div>
					<div class="form-group">
                        <input type="text" class="form-control education_change_check" id="recipient-name" name="subject3"
                            value="{{$education->subject3}}">
                    </div>
					
                   
              
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_sve"  attr_id="{{$education->id}}">Save Changes</button>
                    <button  data-dismiss="modal" aria-label="Close"  class="btn_cnc">Cancel</button>
                </div>
            </form>
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