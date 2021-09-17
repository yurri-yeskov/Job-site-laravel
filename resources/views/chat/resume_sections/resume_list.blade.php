<div class="col-lg-12 col-sm-12">
	<h2>My RESUMES</h2>
</div>
@if(!empty($basic_information[0]))
	@foreach($basic_information as $basic_info)
	<div class="col-lg-4 col-sm-4">
		<div class="cv_resume">
			<p>@if(!empty($basic_info->resume_name)){{$basic_info->resume_name}}@endif</p>
			<ul>
				<li><img src="{{ url()->asset('public/images/builder/images/fire.png') }}" class="img-fluid"></li>
				<li><a href="{{url('resume-builder/enter-details')}}/{{$basic_info->slug}}"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" class="img-fluid"></li>
				<li><a href="javascript:void(0);" attr_id="{{$basic_info->id}}" class="delete_resume_cv"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" class="img-fluid "></a></li>
			</ul>
		</div>
	</div>
	@endforeach
@endif	
