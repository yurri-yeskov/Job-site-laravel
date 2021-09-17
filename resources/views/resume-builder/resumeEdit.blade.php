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
					</div>
					<div class="col-lg-9 col-sm-9">						
						 <div class="progress progress_third">
							 <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100">Step 4</div></li>													 							 
                         </div>
						 <div class="arrow_fourth">
							<div class="arrow_fourth_txt">
							  <p>You are here</p>
							</div>
							<div class="arrow_fourth_img">
							 <img src="{{ url()->asset('public/images/builder/images/arrow.png') }}" class="img-fluid"></div>													 							 
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
        <section class="resume_builder">              
			<div class="container-fluid xl-5 pl-xl-5">
				<div class="row">
					<div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
					<div class="row row-pad">
						<div class="col-md-7">
							<div class="gain_form">								
								<h2>Gain References</h2>								
																						
									<form id="references_form">
									<input type="hidden" name="template_id" value="{{$data['template'][0]->id}}">
										<div class="row append_form">
											
												<div class="col-lg-6 col-sm-6">	
													  <div class="form-group">
														<label>First Name</label>								  
														<input type="text" class="form-control" placeholder="" name="first_name[0]">
													  </div>
												  </div>
												  <div class="col-lg-6 col-sm-6">	
													   <div class="form-group">
														<label>Last Name</label>									   
														<input type="text" class="form-control" placeholder="" name="last_name[0]">
													   </div>
												  </div>
												  <div class="col-lg-6 col-sm-6">	
													  <div class="form-group">
														<label>Company</label>								  
														<input type="text" class="form-control" placeholder="" name="company[0]">
													  </div>
												  </div>
												  <div class="col-lg-6 col-sm-6">	
													   <div class="form-group">
														<label>Email address</label>									   
														<input type="email" class="form-control" placeholder="" name="email[0]">
													   </div>
												  </div>
												
											</div>
										 <div class="add_cont">
											 <a href="javascript:void(0);" class="add_reference_section"><h5><span><svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M3.5 0H4.5V8H3.5V0Z" fill="#D93025"/>
		<path d="M4.37103e-08 4.5L0 3.5L8 3.5V4.5L4.37103e-08 4.5Z" fill="#D93025"/>
		</svg></span>Add More Contacts</h5></a>
										  </div>
								  
								  
									<div class="reference_sec">
										<button type="submit">Send Reference Requests</button>
									</div>
									<span class="col-lg-12 col-sm-12  response_message" style="margin-top:18px;"></span>
								</form>
								<a href="{{ route('resume-admin') }}" style="display:none" class="next-page-reference">next</a>
								
									 <div class="skip">
										<a href="{{ route('resume-admin') }}">
											Skip
										</a>
										
									</div>
								 </div>  
							</div>
							<div class="col-md-5 resume_section">
								<div class="sc-saving-number">
									<div class="sc-saving">
										<div class="sc-saving-section"><i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span></div>
									</div>
									<div class="sc-number-section">
										<div class="sc-cGCqpu sc-bpKEQf foLlA">
											<i class="fas fa-less-than"></i>
											<span> 1 / 1</span>
											<i class="fas fa-greater-than"></i>
										</div>
									</div>
								</div>
								<div class="resume_pic">
									<?php echo $data['template_html']; ?>
									<!--<img src="{{ url()->asset('public/images/builder') }}/{{$data['template'][0]->image}}" class="img-fluid">
									<div class="nxt_sec">
										
									</div>-->
								</div>
						   </div>
						</div>						
					</div>
					
				</div>
			</div>               
        </section>
        <!--END RESUME-->
@endsection