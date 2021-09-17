@extends('layouts.resume-master')
@section('content')

		    <!--START RESUMESTEPS-->
        <section class="resume_steps">              
			<div class="container-fluid pr-xl-5 pl-xl-5">
				<div class="row">					
					<div class="col-lg-1">						
					</div>
					<div class="col-lg-9">
						 <p>Create a FREE Resume and give yourself the best possible chance of employment</p>
					</div>
					<div class="col-lg-2">						
					</div>
					
					<div class="col-lg-1 col-sm-1">						
							 <div class="arrow">
								<div class="arrow_txt">
								  <p>You are here</p>
								</div>
								<div class="arrow_img">
								 <img src="{{ url()->asset('public/images/builder/arrow.png') }}" class="img-fluid"></div>													 							 
							 </div>
						</div>
					<div class="col-lg-9 col-sm-9">						
						 <div class="progress progress_third">
							 <div class="progress-bar bg-success" role="progressbar" style="width: 75px" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100">Step 1</div></li>													 							 
                         </div>
						
					</div>
					<div class="col-lg-2 col-sm-2 offer">
						 <h5>Receive job offers</h5>
					</div>
					<div class="col-lg-12">
						 <div class="process">
							<ul>
								<li><a href="#">Choose a Template</a></li>
								<li><a href="#">Enter Details</a></li>
								<li><a href="#">Edit Your Template</a></li>
								<li><a href="#">Gain Preferences</a></li>
							</ul>
						 </div>
					</div>
				</div>
			</div>               
        </section>
        <!--END RESUMESTEPS-->
       <!--START RESUME-->
        <section class="resume">              
			<div class="container-fluid pr-xl-5 pl-xl-5">
				<div class="row">
					<div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
					@if(!empty($data['template']))
						@foreach($data['template'] as $temp_data)
					<div class="col-lg-4 col-sm-4">
						<div class="resume_content">
						   <a class="main_box" href="{{ route('resume.pages',$temp_data->slug) }}">
								<img src="{{ url()->asset('public/images/builder') }}/{{$temp_data->image}}" class="img-fluid">								
								<div class="btn_hover">
								    <div class="btnsec">Use This Template</div>
								</div>
								<h2>{{$temp_data->template_name}}</h2>
							    <p>{{$temp_data->description}}</p>
							
							</a>
							
						</div>
					</div>
						@endforeach
					@endif
				</div>
			</div>               
        </section>
        <!--END RESUME-->
@endsection