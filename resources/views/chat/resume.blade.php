@extends('layouts.workers-master')

<!-- Custom styles for this page only-->

<!-- <link href="{{ asset('public/workers_dashboard/css/chat_message.css') }}" rel="stylesheet"> -->

@section('content')

<!-- Content Wrapper -->



<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->

    <div id="content">

        <!-- Begin Page Content -->
         <section class="resume_types">              
			<div class="container-fluid pr-xl-4 pl-xl-4">
				<div class="row">
				   <div class="col-lg-12 col-sm-12">
					   <h2 class="pad_sec">My NETWORK</h2>
					</div>
					<span class="response_message col-xl-12"></span>
				</div>
				<div class="row row_cstm">				   
					<div class="col-lg-8 col-sm-8">
						<div class="row resume_cv_html">
							
							
							<?php echo $experience_html; ?>
							
						</div>
					</div>
					<div class="col-lg-12 col-sm-12">
						<div class="create_res_btn">
							<a href="{{route('resume.home')}}">Create Resumes</a>
						</div>
					</div>
				</div>
			</div>
		 </section>
		 
         <!--START RESUME-->
        <section class="resume_builder" style="display:none;">              
			<div class="container-fluid pr-xl-4 pl-xl-4">							
					<div class="row row_cstm">
						<div class="col-lg-7 col-sm-7">
							<div class="resume_form">
								<div class="prefill">
									<div class="media">
									  <img src="{{ url()->asset('public/images/builder/images/copy.png') }}" alt="copy">
									  <div class="media-body">
										<h5 class="mt-0">Prefill This Resume</h5>
										<p>Choose a nice example to start with</p>
									  </div>
									 <span class="cross"><a href="#"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}"></a></span>
									</div>								
								</div>
								<div class="upload">
									<div class="media">
									  <img src="{{ url()->asset('public/images/builder/images/profile.png') }}" alt="profile">
									  <div class="media-body">
										<div class="upload_photo">
											<h5>Upload photo</h5>
										</div>
										<p>Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
									  </div>								  
									</div>								
								</div>
								<h2>Basic Information</h2>
								<p>Fill information below</p>
									
														
									<form>
										<div class="row">
										 <div class="col-lg-6 col-sm-6">	
											  <div class="form-group">
												<label>Name</label>								  
												<input type="email" class="form-control" placeholder="">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">	
											   <div class="form-group">
												<label>Last Name</label>									   
												<input type="email" class="form-control" placeholder="">
											   </div>
										  </div>
										 <div class="col-lg-6 col-sm-6">	
											  <div class="form-group">
												<label>Job Title</label>								  
												<input type="email" class="form-control" placeholder="">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">	
											   <div class="form-group">
												<label>Email address</label>									   
												<input type="email" class="form-control" placeholder="">
											   </div>
										  </div>
										 <div class="col-lg-6 col-sm-6">	
											  <div class="form-group">
												<label>Phone</label>								  
												<input type="email" class="form-control" placeholder="">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">
												 <div class="row">
													<div class="col-lg-6 col-sm-6">
													   <div class="form-group">
														<label for="exampleFormControlInput1">Current Salary($)</label>									   
														<select class="form-control" id="exampleFormControlSelect1">
														  <option>40-70k</option>
														  <option>2</option>
														  <option>3</option>
														  <option>4</option>
														  <option>5</option>
														</select>
													   </div>
												   </div>
												   <div class="col-lg-6 col-sm-6">
													   <div class="form-group">
															<label for="exampleFormControlInput1">Expected Salary($)</label>									   
															<select class="form-control" id="exampleFormControlSelect1">
															  <option>120-150k</option>
															  <option>2</option>
															  <option>3</option>
															  <option>4</option>
															  <option>5</option>
															</select>
													   </div>
												   </div>
												 </div>
										  </div>
										   <div class="col-lg-6 col-sm-6">	
											  <div class="form-group">
												<label>Experience</label>								  
												<input type="email" class="form-control" placeholder="40-70k">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">	
											   <div class="form-group">
												<label>Age</label>									   
												<input type="email" class="form-control" placeholder="27">
											   </div>
										  </div>
										   <div class="col-lg-6 col-sm-6">	
											  <div class="form-group">
												<label>Education Levels</label>								  
												<input type="email" class="form-control" placeholder="Certificate">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">	
											   <div class="form-group">
												<label>Languages</label>									   
												<input type="email" class="form-control" placeholder="English,Turkish">
											   </div>
										  </div>
										  <div class="col-lg-12 col-sm-12">	
											  <div class="form-group">
												<label>Work Industries</label>								  
												<input type="email" class="form-control">
											  </div>
										  </div>
										  <div class="col-lg-12 col-sm-12">	
											  <div class="form-group">
												<label>Example textarea</label>
												<textarea class="form-control" rows="4"></textarea>
											  </div>
										  </div>
										   <div class="col-lg-12 col-sm-12 text-right">	
											  <button type="button" class="btn_sve">Save Changes</button>
											  <button type="button" class="btn_cnc">Cancel</button>
										   </div>
								   </form>
								   
								 </div>  
							</div>
						</div>
						<div class="col-lg-5 col-sm-5">
							<div class="resume_pic">
								<img src="https://myvirtual.mydemoservers.com/public/images/builder/img_initials.png" class="img-fluid">
								<div class="save_sec">
									<ul>
									   <li><a href="#">send resume</a></li>
									   <li><a href="#">save resume</a></li>
									</ul>
								</div>
							</div>
						</div>						
					</div>
								
			</div>               
        </section>
        <!--END RESUME-->
		
		
		<!--START SKILLS-->
        <section class="employment" style="display:none;">              
			<div class="container-fluid pr-xl-4 pl-xl-4">
				<div class="row row_cstm">
				    <div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
                </div>
                <div class="row row-pad">				
					<div class="col-sm-6">
						<div class="experience">
							<h3>Experience History</h3>
							<p>Provide a summary of your employement history including dates</p>
							<div class="add_sec">
								<h5><span><a href="#" data-toggle="modal" data-target="#employ_modal"><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></a></span>Add Employment</h5>
							</div>
							<div class="product_sec">
								<ul>
									<li>Product Designer</li>
									<li><span class="year">2012-2014</span></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="pencil"></a></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
								</ul>
							</div>
							<h6>Spotify Inc.</h6>
							<div class="skills">
								<ul>
									<li>– Started and scaled design team to 6 product designers</li>
									<li>– Created a web application design system</li>
									<li>– Scaled business to $120m in ARR</li>
									<li>– Built internal leveling system and career ladder</li>
								</ul>
							</div>
							<div class="product_sec">
								<ul>
									<li>Sr UX Enginner</li>
									<li><span class="year">2008-2012</span></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="pencil"></a></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
								</ul>
							</div>
							<h6>Dropbox Inc.</h6>
							<div class="skills">
								<ul>
									<li>– Started and scaled design team to 6 product designers</li>
									<li>– Created a web application design system</li>
									<li>– Scaled business to $120m in ARR</li>
									<li>– Built internal leveling system and career ladder</li>
								</ul>
							</div>
							 <div class="skill_btn">	
								  <button type="button" class="btn_sve">Save Changes</button>
								  <button type="button" class="btn_cnc">Cancel</button>
							</div>
						</div>						
					</div>					
					<div class="col-sm-6">
						<div class="experience">
							<h3>Education History</h3>
							<p>Provide a summary of your education history including dates</p>
							<div class="add_sec">
								<h5><span><a href="#" data-toggle="modal" data-target="#employ_modal1"><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></a></span>Add Education</h5>
							</div>
							<div class="product_sec">
								<ul>
									<li>Bachelor in fine arts</li>
									<li><span class="year red">2012-2014</span></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
								</ul>
							</div>
							<h6 class="red">Modern College</h6>
							<div class="skills">
								<ul>
									<li>- Computer Science – Software Design</li>									
								</ul>
							</div>
							<div class="product_sec">
								<ul>
									<li>Computer Science</li>
									<li><span class="year red">2008-2012</span></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
									<li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
								</ul>
							</div>
							<h6 class="red">Harvard University</h6>
							<div class="skills">
								<ul>
									<li>- Design Graphic Communications</li>									
								</ul>
							</div>
							
							 <div class="skill_btn">	
								  <button type="button" class="btn_sve">Save Changes</button>
								  <button type="button" class="btn_cnc">Cancel</button>
							</div>
						</div>						
					</div>
                </div>
                <div class="row">					
					 <div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
			    </div>
				<div class="row row_cstm">
					<div class="col-sm-6">
						<div class="experience">
							<h3>Add Skills</h3>
							<p>Provide a summary of your skills including dates</p>
							<div class="add_sec">
								<h5><span><a href="#"><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></a></span>Add Skills</h5>
							</div>
							<div class="skill_detail">
								<div class="form-group">									
									<textarea class="form-control" rows="3"></textarea>
								</div>
							</div>
							<div class="add_sec">
								<h5><span><a href="#"><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></a></span>Add Section</h5>
							</div>
							<div class="courses">
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<ul>
											<li>Custom Section</li>
											<li>Extra-curricular Activities</li>
											<li>Hobbies</li>
											<li>References</li>
										</ul>
									</div>
									<div class="col-lg-6 col-sm-6">
										<ul>
											<li>Courses</li>
											<li>Internships</li>
											<li>Languages</li>										
										</ul>
									</div>
								</div>
							</div>
							 <div class="skill_btn">	
								  <button type="button" class="btn_sve">Save Changes</button>
								  <button type="button" class="btn_cnc">Cancel</button>
							</div>
						</div>						
					</div>
					<div class="col-lg-6 col-sm-6 col-6">
						<div class="experience">
							<h3>Add Awards or Professional Achievements</h3>
							<p>Provide a summary of your Awards or Professional Achievements</p>
							<div class="add_sec">
								<h5><span><a href="#" data-toggle="modal" data-target="#employ_modal2"><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></a></span>Add Awards</h5>
							</div>
							<div class="hj">
							<ul>
							  <li>3x Awwwards SOTD</li>
							  <li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
							  <li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
							</ul>
							</div>
							<h3 class="hunt">#1 for June 7th, 2015 on Product Hunt</h3>							
						</div>						
					</div>
					<div class="col-lg-12 col-sm-12">
							<div class="save_sec">
									<ul>
									   <li><a href="#">send resume</a></li>
									   <li><a href="#">save resume</a></li>
									</ul>
								</div>
						</div>
				</div>					
				</div>
			</div>
        			
        </section>
        <!--END COPYRIGHT-->
		 <div class="modal fade" id="employ_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Experience History</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form>
					  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Position Held</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					   <div class="form-group">
						<label for="recipient-name" class="col-form-label">Company</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="row">
					    <div class="col-md-12">
						   <label for="recipient-name" class="col-form-label">Dates</label>
						</div>
						<div class="col-md-4">
							<div class="form-group">								
								<input type="text" class="form-control text-center" id="recipient-name" placeholder="Start Date">
					        </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">								
								<input type="text" class="form-control text-center" id="recipient-name" placeholder="End Date">
					        </div>
						</div>
					  </div>
					   <div class="form-group">
						<label for="recipient-name" class="col-form-label">Duties/Tasks</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>					  
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					</form>
				  </div>
				  <div class="modal-footer">
					 <button type="button" class="btn_sve">Save Changes</button>
					 <button type="button" class="btn_cnc">Cancel</button>
				  </div>
				</div>
			  </div>
        </div>
		
         <div class="modal fade" id="employ_modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Education</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form>
					  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Achievement</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					   <div class="form-group">
						<label for="recipient-name" class="col-form-label">School/University/Institute</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="row">
					    <div class="col-md-12">
						   <label for="recipient-name" class="col-form-label">Dates</label>
						</div>
						<div class="col-md-5">
							<div class="form-group">								
								<input type="text" class="form-control text-center" id="recipient-name" placeholder="Completion Date">
					        </div>
						</div>
						<div class="col-md-4">
							
						</div>
					  </div>
					   <div class="form-group">
						<label for="recipient-name" class="col-form-label">Subjects</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>					  
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name">
					  </div>					  
					</form>
				  </div>
				  <div class="modal-footer">
					 <button type="button" class="btn_sve">Save Changes</button>
					 <button type="button" class="btn_cnc">Cancel</button>
				  </div>
				</div>
			  </div>
        </div>

        <div class="modal fade" id="employ_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Awards or Professional Achievements</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form>
					  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Award or Achievement</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Award or Achievement</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>
					  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Award or Achievement</label>
						<input type="text" class="form-control" id="recipient-name">
					  </div>					   					 					   					  
					</form>
				  </div>
				  <div class="modal-footer">
					 <button type="button" class="btn_sve">Save Changes</button>
					 <button type="button" class="btn_cnc">Cancel</button>
				  </div>
				</div>
			  </div>
        </div>

@endsection

        <!-- /.container-fluid -->

        <!-- End of Main Content -->

      