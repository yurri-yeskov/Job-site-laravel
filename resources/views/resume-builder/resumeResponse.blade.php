@extends('layouts.resume-master')
@section('content')
       <!--START RESUME-->
        <section class="resume_client">              
			<div class="container-fluid xl-5 pl-xl-5">
				<div class="row">										
					<div class="col-md-7">
						<div class="resume_inner">
							<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<p>Lorem ipsum dolor sit amet.</p>	
							<p>Lorem ipsum dolor sit amet.</p>								 
						</div>
					</div>
					<div class="col-md-5">
						<div class="pic_info">
							<img src="{{ url()->asset('public/images/builder/images/image-sec.jpg') }}" class="img-fluid">
							
						</div>
					</div>					
					<div class="col-md-6 mx-auto">
						<form id="workers_form">
							<input type="hidden" name="workers_id" value="@if(isset($data['send_request'][0])){{$data['send_request'][0]->id}}@endif">
							<div class="row">
							 <div class="col-lg-6 col-sm-6">	
								  <div class="form-group">
									<label>Worker's Name</label>								  
									<input type="text" class="form-control" placeholder="" value="@if(isset($data['send_request'][0])){{$data['send_request'][0]->first_name}}@endif" name="first_name">
								  </div>
							  </div>
							  <div class="col-lg-6 col-sm-6">	
								   
							  </div>
							 <div class="col-lg-6 col-sm-6">	
								  <div class="form-group">
									<label>Employer Name</label>								  
									<input type="text" class="form-control" placeholder="" value="@if(isset($data['send_request'][0])){{$data['send_request'][0]->employer_name}}@endif" name="employer_name">
								  </div>
							  </div>
							  <div class="col-lg-6 col-sm-6">	
								  <div class="form-group">
									<label>Company</label>								  
									<input type="text" class="form-control" placeholder="" value="@if(isset($data['send_request'][0])){{$data['send_request'][0]->company}}@endif" name="company">
								  </div>
							  </div>
							  <div class="col-lg-7 col-sm-7 col-6">	
								   <div class="form-group mrgn_btm">
									<label>Company Website</label>									   
									
								   </div>
							  </div>
							 <div class="col-lg-5 col-sm-5  col-6">	
								  <div class="form-group  mrgn_btm">
								   <label>Permission to display website link</label>										
								  </div>
							  </div>
							  <div class="col-lg-10 col-sm-10  col-8">	
								   <div class="form-group">
									<input  type="url" class="form-control" placeholder="" value="@if(isset($data['send_request'][0]->website)){{$data['send_request'][0]->website}}@endif" name="website"  formnovalidate="formnovalidate">									   
									
								   </div>
							  </div>
							  <div class="col-lg-2 col-sm-2  col-4">	
								   <label class="switch">													 
										  <input type="checkbox" checked name="permission">
										  <span class="slider round"></span>
									</label>
							  </div>																				 
							  <div class="col-lg-12 col-sm-12">	
								  <div class="form-group">
									<label>References</label>
									<textarea class="form-control" rows="4" name="description">@if(isset($data['send_request'][0]->description)){{$data['send_request'][0]->description}}@endif</textarea>
								  </div>
							  </div>
							   <div class="col-lg-12 col-sm-12 text-right">	
								  <button type="submit" class="btn_sve">Save Changes</button>											 
							   </div>
							
							   <span class="col-lg-12 col-sm-12  response_message" style="margin-top:18px;"></span>
							
							</div>
					   </form>
					   <a href="{{ route('reference.thankyou') }}" style="display:none" class="next-page-thanyou">next</a>
					</div>
				</div>
				<div class="reference_resume">
				<?php echo $data['template_html']; ?>
				</div>
			</div>  
		
        </section>
@endsection
