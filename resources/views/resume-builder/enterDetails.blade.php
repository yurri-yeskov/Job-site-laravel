@extends('layouts.resume-master')
@section('content')
<style>
.accordion .card:first-of-type {
    border-bottom: 1px solid rgba(0,0,0,.125);
   
}
.cus_forms_section {
    border: 1px solid rgba(0,0,0,.125);
    padding: 1.25rem;
	margin-top: 2rem;
}
</style>
											
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
							 <div class="progress-bar bg-success" role="progressbar" style="width: 600px" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100">Step 3</div></li>													 							 
                         </div>
						 <div class="arrow_third">
							<div class="arrow_third_txt">
							  <p>You are here</p>
							</div>
							<div class="arrow_third_img">
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
			<div class="container-fluid pr-xl-5 pl-xl-5">
		
				<div class="row">
					<div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
					<div class="row row-pad">
					<span  class="basic_information_response col-xl-12"> </span>
					
						<div class="col-lg-7">
							<div class="resume_form">
								<div class="prefill">
									<div class="media">
									  <img src="{{ url()->asset('public/images/builder/images/copy.png') }}" alt="copy">
									  <div class="media-body">
										<h5 class="mt-0">Prefill This Resume</h5>
										<p>Choose a nice example to start with</p>
									  </div>
									  
									 <span class="cross"><a href="javascript:void(0);"><img src="{{ url()->asset('public/images/builder/images/cross.png') }}"></a></span>
									</div>								
								</div>
								<form enctype="multipart/form-data" id="resume_basic_image_upload_form">
									<div class="upload">
										<input type="hidden" name="basic_form_id" value="@if(!empty($data['basic_information'][0]->id)){{$data['basic_information'][0]->id}}@endif">
										<input type="hidden" name="template_id" value="{{$data['template'][0]->id}}">
										<button type="submit" style="display:none;" class="trigger-click-image-submit"></button>
										<div class="media">
										<div class="img_profile">
										 @if(!empty($data['basic_information'][0]->image))
											@if(!empty($data['basic_information'][0]->image))
												<img src="{{ asset('public/images/profile_image')}}/{{$data['basic_information'][0]->image}}" class="img-responsive" id="image-avatar">
											@else
												<img src="{{ url()->asset('public/images/builder/images/profile.png') }}" alt="profile" id="image-avatar">
												
											@endif
										@else
											 <img src="{{ url()->asset('public/images/builder/images/profile.png') }}" alt="profile" id="image-avatar">
											
										@endif
										  
										 </div>
										 <input type="file" name="file" class="profile-image-upload" style="display:none"  accept="image/*"  onchange="imageuploadfunction(this)">
										  <div class="media-body">
											<div class="upload_photo">
												<h5><a href="javascript:void(0);" class="profile-image">Upload photo</a></h5>
											</div>
											<p>Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
										  </div>								  
										</div>								
									</div>
								</form>
								<form action="" method="post" class="form-horizontal" enctype="multipart/form-data" id="resume_basic_information_form">
								<h2>Basic Information</h2>
								<p>Fill information below</p>
									
									{!! csrf_field() !!}
									
									<input type="hidden" name="template_id" value="{{$data['template'][0]->id}}" id="temp_id">
									<input type="hidden" name="basic_form_id" value="@if(!empty($data['basic_information'][0]->id)){{$data['basic_information'][0]->id}}@endif" id="basic_form">
										<div class="row">
										 <div class="col-lg-12 col-sm-12">	
											
											  <div class="form-group required">
												<label>Resume Name<sup>*</sup></label>								  
												<input type="text" class="form-control basicinfo_change_check" placeholder="" name="resume_name" value="@if(!empty($data['basic_information'][0]->resume_name)){{$data['basic_information'][0]->resume_name}}@endif" >
											  </div>
										  </div>
										 <div class="col-lg-6 col-sm-6">
											<!-- onblurBasicInfo(field_name,type, table, table_id,template_id)	-->									 
											  <div class="form-group required">
												<label>First Name<sup>*</sup></label>								  
												<input type="text" class="form-control basicinfo_change_check" placeholder="" name="first_name" value="@if(!empty($data['basic_information'][0]->first_name)){{$data['basic_information'][0]->first_name}}@endif" >
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">
											<?php $LastNameError = (isset($errors) and $errors->has('last_name')) ? ' is-invalid' : ''; ?>										  
											   <div class="form-group required">
												<label>Last Name<sup>*</sup></label>									   
												<input type="text" class="form-control{{ $LastNameError }} basicinfo_change_check" placeholder="" name="last_name" value="@if(!empty($data['basic_information'][0]->last_name)){{$data['basic_information'][0]->last_name}}@endif" onblur="onblurBasicInfo('last_name',this, 'basic_informations', $('#basic_form').val(), $('#temp_id').val())">
											   </div>
										  </div>
										 <div class="col-lg-6 col-sm-6">
											<?php $jobError = (isset($errors) and $errors->has('job_title')) ? ' is-invalid' : ''; ?>
											  <div class="form-group required">
												<label>Job Title<sup>*</sup></label>								  
												<input type="text" class="form-control{{ $jobError }} basicinfo_change_check" placeholder="" name="job_title" value="@if(!empty($data['basic_information'][0]->job_title)){{$data['basic_information'][0]->job_title}}@endif">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">
											<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>										  
											   <div class="form-group required">
												<label>Email address<sup>*</sup></label>									   
												<input type="email" class="form-control{{ $emailError }} basicinfo_change_check" placeholder="" name="email" value="@if(!empty($data['basic_information'][0]->email)){{$data['basic_information'][0]->email}}@endif">
											   </div>
										  </div>
										 <div class="col-lg-6 col-sm-6">
											<?php $phoneError = (isset($errors) and $errors->has('phone')) ? ' is-invalid' : ''; ?>
											  <div class="form-group required">
												<label>Phone<sup>*</sup></label>								  
												<input type="number" class="form-control{{ $phoneError }} basicinfo_change_check" placeholder="" name="phone" value="@if(!empty($data['basic_information'][0]->phone)){{$data['basic_information'][0]->phone}}@endif" maxlength="10">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">
												 <div class="row">
													<div class="col-lg-6 col-sm-6">
														@php
															$current_salary_val = '';
														@endphp
													  @if(!empty($data['basic_information'][0]->current_salary))
														@php
															$current_salary_val = $data['basic_information'][0]->current_salary;
														@endphp
													@endif
													   <div class="form-group required">
														<label for="exampleFormControlInput1">Current Salary($)<sup>*</sup></label>									   
														<select class="form-control basicinfo_change_check" id="exampleFormControlSelect1" name="current_salary">
														@if(!empty($data['current_salary']))
															@foreach($data['current_salary'] as $current_salary)
														<?php 
													$current_salary_list = $current_salary['min'].'-'.$current_salary['max'];
													
												?>
														
																<option value="{{$current_salary['min']}}-{{$current_salary['max']}}" @if($current_salary_list == $current_salary_val) selected @endif>{{$current_salary['min']}}-{{$current_salary['max']}}</option>
															@endforeach
														@endif
														
														</select>
													   </div>
												   </div>
												   <div class="col-lg-6 col-sm-6">
													@php
															$expected_salary_val = '';
														@endphp
												  @if(!empty($data['basic_information'][0]->expected_salary))
													@php
														$expected_salary_val = $data['basic_information'][0]->expected_salary;
													@endphp
												@endif
													   <div class="form-group required">
															<label for="exampleFormControlInput1">Expected Salary($)<sup>*</sup></label>									   
															<select class="form-control basicinfo_change_check" id="exampleFormControlSelect1" name="expected_salary">
																@if(!empty($data['expected_salary']))
																	@foreach($data['expected_salary'] as $expected_salary)
																
												<?php 
													$expected_salary_list = $expected_salary['min'].'-'.$expected_salary['max'];
													
												?>
																		<option value="{{$expected_salary['min']}}-{{$expected_salary['max']}}" @if($expected_salary_list == $expected_salary_val) selected @endif>{{$expected_salary['min']}}-{{$expected_salary['max']}}</option>
																	@endforeach
																@endif
															</select>
													   </div>
												   </div>
												 </div>
										  </div>
										   <div class="col-lg-6 col-sm-6">	
										    <?php $experienceError = (isset($errors) and $errors->has('experience')) ? ' is-invalid' : ''; ?>
											  <div class="form-group required">
												<label>Experience<sup>*</sup></label>								  
												<input type="text" class="form-control{{ $experienceError }} basicinfo_change_check" placeholder="" name="experience" value="@if(!empty($data['basic_information'][0]->experience)){{$data['basic_information'][0]->experience}}@endif">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">
											<?php $ageError = (isset($errors) and $errors->has('age')) ? ' is-invalid' : ''; ?>										  
											   <div class="form-group required">
												<label>Age<sup>*</sup></label>									   
												<input type="number" class="form-control{{ $ageError }}" placeholder="" name="age" value="@if(!empty($data['basic_information'][0]->age)){{$data['basic_information'][0]->age}}@endif">
											   </div>
										  </div>
										  
										 <!-- <div class="col-lg-12 col-sm-12">	
											
											   <div class="form-group required">
												<label>Languages<sup>*</sup></label>									   
												<input type="text" class="form-control" placeholder="" name="languages" value="@if(!empty($data['basic_information'][0]->languages)){{$data['basic_information'][0]->languages}}@endif">
											   </div>
										  </div>-->

										<div class="col-lg-12 col-sm-12">	
											   <div class="form-group required">
												<label>Languages<sup>*</sup></label>									   
												
												<select class="form-control select_language_multiple basicinfo_change_check" id="exampleFormControlSelect_language" name="languages[]" multiple="multiple">
													@php
														$explanguage = array();
														
													@endphp
												@if(!empty($data['basic_information'][0]->languages))
													
													@php
														$explanguage = explode(', ',$data['basic_information'][0]->languages);
													@endphp
													
												@endif
												
													@foreach($data['resume_languages'] as $re_languages)
														<option value="{{$re_languages}}"  selcted="selected">{{$re_languages}}</option>
													@endforeach
													
												</select>
							
											   </div>
										  </div>

										  <div class="col-lg-12 col-sm-12">	
										   
											  <div class="form-group required">
												<label>Work Industries<sup>*</sup></label>	
												<select class="form-control select_industry_multiple basicinfo_change_check" id="exampleFormControlSelect1" name="work_industries[]" multiple="multiple">
													@php
														$expwork = array();
														
													@endphp
												@if(!empty($data['basic_information'][0]->work_industry))
													
													@php
														$expwork = explode(', ',$data['basic_information'][0]->work_industry);
													@endphp
													
												@endif
												
													@foreach($data['work_industry'] as $wkindustry)
													
													<option value="{{$wkindustry}}"  selcted="selected">{{$wkindustry}}</option>
													@endforeach
													
												</select>
												<!--<input type="text" class="form-control" name="work_industries" value="@if(!empty($data['basic_information'][0]->work_industries)){{$data['basic_information'][0]->work_industries}}@endif">-->
											  </div>
										  </div>
										  <div class="col-lg-12 col-sm-12">
											<?php $descriptionError = (isset($errors) and $errors->has('description')) ? ' is-invalid' : ''; ?>										  
											  <div class="form-group required">
												<label>Description<sup>*</sup></label>
												<textarea class="form-control{{ $descriptionError }} basicinfo_change_check" rows="4" name="description" >@if(!empty($data['basic_information'][0]->description)){{$data['basic_information'][0]->description}}@endif</textarea>
											  </div>
										  </div>
										   <div class="col-lg-12 col-sm-12 text-right">	
											  <button type="submit" class="btn_sve">Save Changes</button>
											  <button type="reset" class="btn_cnc">Cancel</button>
										   </div>
										    <span  class="basic_information_response_message col-xl-12" style="margin-top:20px;"> </span>
								   </form>
								   
								 </div>  
							</div>
						</div>
						<div class="col-lg-5 resume_section ">
							<div class="sc-saving-number">
								<div class="sc-saving">
									<div class="sc-saving-section">
										<i class="fa fa-check" aria-hidden="true"></i>
										<span class="save_span">Saved</span>
									</div>
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
								<!--<img src="{{ url()->asset('public/images/builder') }}/{{$data['template'][0]->image}}" class="img-fluid">-->
								
							</div>
							<div class="nxt_sec">
								<a href="javascript:void(0);" class="fields_check" attr_id="@if(!empty($data['basic_information'][0]->id)){{$data['basic_information'][0]->id}}@endif">next</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>               
        </section>
        <!--END RESUME-->
		
		
		<!--START SKILLS-->
        <section class="employment">              
			<div class="container-fluid pr-xl-5 pl-xl-5">
				<div class="row">
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
								<a href="#" data-toggle="modal" data-target="#employ_modal"><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Employment</h5></a>
							</div>
							<div class="experience_summary">
							<?php echo $data['experience_html']; ?>
							</div>
							
							 <!--<div class="skill_btn">	
								  <button type="button" class="btn_sve">Save Changes</button>
								  <button type="button" class="btn_cnc">Cancel</button>
							</div>-->
						</div>						
					</div>					
					<div class="col-sm-6">
						<div class="experience">
							<h3>Education History</h3>
							<p>Provide a summary of your education history including dates</p>
							<div class="add_sec">
								<a href="#" data-toggle="modal" data-target="#employ_modal1"><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Education</h5></a>
							</div>
						<div class="education_summary">
							<?php echo $data['education_html']; ?>
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
				<div class="row row-pad">
					<div class="col-sm-6">
						<div class="experience">
							<h3>Add Skills</h3>
							<p>Provide a summary of your skills including dates</p>
							<div class="add_sec">
								<a data-toggle="modal" data-target="#skills_modal"><h5><span><img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus"></span>Add Skills</h5></a>
							</div>
							
							<div class="skilldata">
								<?php echo $data['skills_html']; ?>
							</div>
							
							
							<div class="add_sec">
								<h5></h5>
							</div>
							@if($data['custom_section_html'] !='')<div class="custom_section">{!!$data['custom_section_html']!!}</div>@endif
							@if($data['course_html'] !='')<div class="courses_section">{!!$data['course_html']!!}</div>@endif
		
							@if($data['curricular_activities_section_html'] !='')<div class="extra_curricular_section">{!!$data['curricular_activities_section_html']!!}</div>@endif
							@if($data['internships_section_html'] !='')<div class="internships_section">{!!$data['internships_section_html']!!}</div>@endif
							@if($data['hobby_section_html'] !='')<div class="hobbies_section">{!!$data['hobby_section_html']!!}</div>@endif
							
							
							
							@if($data['languages_section_html'] !='')<div class="languages_section">{!!$data['languages_section_html']!!}</div>@endif
							<div class="add_section_dynamic"></div>
							<div class="courses">
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<ul>
											<li><a href="javascript:void(0)" class="select_custom_multiple_sections" attr="custom_section" attr_template_id="{{$data['template'][0]->id}}">Custom Section</a></li>
											<li><a href="javascript:void(0)" class="select_custom_skill  @if($data['curricular_activities_section_html'] !='') pointevent @endif" attr="extra_curricular_section" attr_template_id="{{$data['template'][0]->id}}">Extra-curricular Activities</a></li>
											<li><a href="javascript:void(0)" class="select_custom_skill @if($data['hobby_section_html'] !='') pointevent @endif" attr="hobbies_section" attr_template_id="{{$data['template'][0]->id}}">Hobbies</a></li>
											
										</ul>
									</div>
									<div class="col-lg-6 col-sm-6">
										<ul>
											<li><a href="javascript:void(0)" class="select_custom_skill @if($data['course_html'] !='') pointevent @endif" attr="courses_section" attr_template_id="{{$data['template'][0]->id}}">Courses</a></li>
											<li><a href="javascript:void(0)" class="select_custom_skill @if($data['internships_section_html'] !='') pointevent @endif" attr="internships_section" attr_template_id="{{$data['template'][0]->id}}">Internships</a></li>
											<li><a href="javascript:void(0)" class="select_custom_skill @if($data['languages_section_html'] !='') pointevent @endif" attr="languages_section" attr_template_id="{{$data['template'][0]->id}}">Languages</a></li>										
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
							   <a href="#" data-toggle="modal" data-target="#employ_modal2">
								<h5>
									<span style="margin-right: 11px;">										
											<img src="{{ url()->asset('public/images/builder/images/plus.png') }}" alt="plus">										
									</span>Add Awards
								</h5>
								</a>
							</div>
							<div class="achievement_summary">
								<?php echo $data['achievement_html']; ?>
							</div>
							<div class="hj">
							<!--
							<ul>
							  <li>3x Awwwards SOTD</li>
							  <li><a href="#"><img src="{{ url()->asset('public/images/builder/images/pencil.png') }}" alt="plus"></a></li>
							  <li><a href="#"><img src="{{ url()->asset('public/images/builder/images/dust.png') }}" alt="plus"></a></li>
							</ul>
							</div>
							<h3 class="hunt">#1 for June 7th, 2015 on Product Hunt</h3>		
-->							
						</div>						
					</div>
				</div>
					 <div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
					<a href="{{ route('resume.edit',$data['template'][0]->slug) }}" style="display:none" class="next-page">next</a>
					 <div class="col-lg-12">
						<div class="last_sec">
							
							<a href="javascript:void(0);" class="fields_check" attr_id="@if(!empty($data['basic_information'][0]->id)){{$data['basic_information'][0]->id}}@endif">next</a>
						</div>
					</div>
				</div>
			</div>
        			
        </section>
        <!--END COPYRIGHT-->
		 <div class="modal fade" id="employ_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Experience History</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <form  method="post" class="form-horizontal" id="experience_history_form" >
				  {!! csrf_field() !!}
				  <div class="modal-body">
					<span class="experience_history_response" style="margin-top: 12px;"></span>
						<input type="hidden" name="historyModalForm" value="1">
					  <input type="hidden" name="template_id" value="{{$data['template'][0]->id}}">
					  <?php $positionHeadError = (isset($errors) and $errors->has('position_head')) ? ' is-invalid' : ''; ?>
					  <div class="form-group required">
						<label for="recipient-name" class="col-form-label">Position Held<sup>*</sup></label>
						<input type="text" class="form-control{{ $positionHeadError }}" id="recipient-name" name="position_head">
					  </div>
					   <?php $companyError = (isset($errors) and $errors->has('company')) ? ' is-invalid' : ''; ?>
					   <div class="form-group required">
						<label for="recipient-name" class="col-form-label">Company<sup>*</sup></label>
						<input type="text" class="form-control{{ $companyError }}" id="recipient-name" name="company">
					  </div>
					  
					  <div class="row">
					    <div class="col-md-12 form-group required">
						   <label for="recipient-name" class="col-form-label">Dates<sup>*</sup></label>
						</div>
						<div class="col-md-4">
						  <?php $startDateError = (isset($errors) and $errors->has('start_date')) ? ' is-invalid' : ''; ?>
							<div class="form-group required">								
								<input type="text" class="form-control text-center{{ $startDateError }} dtpiker" id="recipient-name" placeholder="Start Date" name="start_date">
					        </div>
						</div>
						<div class="col-md-4">
							<?php $endDateError = (isset($errors) and $errors->has('end_date')) ? ' is-invalid' : ''; ?>
							<div class="form-group required">								
								<input type="text" class="form-control text-center{{ $endDateError }} dtpiker" id="recipient-name" placeholder="End Date" name="end_date">
					        </div>
						</div>
					  </div>
					
					   <div class="form-group">
						<label for="recipient-name" class="col-form-label">Duties/Tasks</label>
						<input type="text" class="form-control" id="recipient-name" name="duties1">
					  </div>					  
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name" name="duties2">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name" name="duties3">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name" name="duties4">
					  </div>
					  
					</form>
				 
				  <div class="modal-footer">
					 <button type="submit" class="btn_sve">Save Changes</button>
					 <button data-dismiss="modal" aria-label="Close" class="btn_cnc">Cancel</button>
				  </div>
				   </div>
				</div>
			  </div>
        </div>
		
         <div class="modal fade" id="employ_modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Education</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <form method="post" class="form-horizontal" id="education_response_form">
				   {!! csrf_field() !!}
				  <div class="modal-body">
				  <span class="education_response" style="margin-top: 12px;"></span>
					
					  <input type="hidden" name="educationModalForm" value="1">
					  <input type="hidden" name="template_id" value="{{$data['template'][0]->id}}">
					  <?php $achievementError = (isset($errors) and $errors->has('achievement')) ? ' is-invalid' : ''; ?>
					  <div class="form-group required">
						<label for="recipient-name" class="col-form-label">Achievement<sup>*</sup></label>
						<input type="text" class="form-control{{ $achievementError }}" id="recipient-name" name="achievement">
					  </div>
					   <?php $scuiError = (isset($errors) and $errors->has('school_university_institute')) ? ' is-invalid' : ''; ?>
					   <div class="form-group required">
						<label for="recipient-name" class="col-form-label">School/University/Institute<sup>*</sup></label>
						<input type="text" class="form-control{{ $scuiError }}" id="recipient-name" name="school_university_institute">
					  </div>
					  <div class="row">
					  
					    <div class="col-md-12 form-group required">
						   <label for="recipient-name" class="col-form-label ">Dates<sup>*</sup></label>
						</div>
						<div class="col-md-5">
						 <?php $dateError = (isset($errors) and $errors->has('school_university_institute')) ? ' is-invalid' : ''; ?>
							<div class="form-group required">								
								<input type="text" class="form-control text-center{{ $dateError }} dtpiker" id="recipient-name" placeholder="Completion Date" name="date">
					        </div>
						</div>
						<div class="col-md-4">
							
						</div>
					  </div>
					   <div class="form-group">
						<label for="recipient-name" class="col-form-label">Subjects</label>
						<input type="text" class="form-control" id="recipient-name" name="subject1">
					  </div>					  
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name" name="subject2">
					  </div>
					  <div class="form-group">						
						<input type="text" class="form-control" id="recipient-name" name="subject3">
					  </div>					  
					
				  </div>
				  <div class="modal-footer">
					 <button type="submit" class="btn_sve">Save Changes</button>
					 <button data-dismiss="modal" aria-label="Close" class="btn_cnc">Cancel</button>
				  </div>
				  </form>
				</div>
			  </div>
        </div>

        <div class="modal fade" id="employ_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Awards or Professional Achievements</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <form id="achievementForm">
					  <div class="modal-body">
						<span class="achievment_response" style="margin-top: 12px;"></span>
						 {!! csrf_field() !!}
						 <input type="hidden" name="template_id" value="{{$data['template'][0]->id}}">
						  <div class="form-group required">
							<label for="recipient-name" class="col-form-label">Award or Achievement<sup>*</sup></label>
							<input type="text" class="form-control" id="" name="achievement1">
						  </div>
						  <div class="form-group required">
							<label for="recipient-name" class="col-form-label">Field<sup>*</sup></label>
							<input type="text" class="form-control" name="achievement2">
						  </div>
						  <div class="form-group required">
							<label for="recipient-name" class="col-form-label" >Date<sup>*</sup></label>
							<input type="text" class="form-control dtpiker" 
                                     name="date" value="">
						  </div>
					  
					  </div>
					  <div class="modal-footer">
						 <button type="submit" class="btn_sve">Save Changes</button>
						 <button data-dismiss="modal" aria-label="Close" class="btn_cnc">Cancel</button>
					  </div>
				  </form>
				</div>
			  </div>
        </div>
		
		<!-- Add Skills -->
		 <div class="modal fade" id="skills_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabels">Add Skills</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <form id="skillForm">
					<input type="hidden" name="template_id" value="{{$data['template'][0]->id}}">
					  <div class="modal-body">
						<span class="skill_response" style="margin-top: 12px;"></span>
						 {!! csrf_field() !!}

						  <div class="form-group option_skill required">
								<label for="recipient-name" class="col-form-label" >Skill</label>
								<!--<input type="text" class="form-control" id="" name="skill">-->
								<select class="form-control select_skills_multiple" id="exampleFormControlSelect1two" name="skill[]" multiple="multiple">
								
									@foreach($data['skills_all'] as $wkskill)
									<option value="{{$wkskill->type}}"  selcted="selected">{{$wkskill->type}}</option>
									@endforeach
								</select>
						  </div>
						  
					  </div>
					  <div class="modal-footer">
						 <button type="submit" class="btn_sve">Save Changes</button>
						 <button data-dismiss="modal" aria-label="Close" class="btn_cnc">Cancel</button>
					  </div>
				  </form>
				</div>
			  </div>
        </div>
<?php 
if(!empty($data['basic_information'][0]->work_industries)){
	$expwork = explode(', ',$data['basic_information'][0]->work_industries);
	
	
}

	
?>
@endsection
@push('scripts')
<script>
$('.select_industry_multiple').val(<?php echo json_encode($expwork); ?>);
$('.select_industry_multiple').trigger('change');

$('.select_language_multiple').val(<?php echo json_encode($explanguage); ?>);
$('.select_language_multiple').trigger('change');
 	
</script>
@endpush

