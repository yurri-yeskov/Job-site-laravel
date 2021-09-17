<div class="resume-second">
							<div class="container-fluid">
								<div class="row mb-100">
									<div class="col-md-7 p-0 pr-2">
								
									
									
										<h2 class="person-title">
	@if(!empty($template_data['basic_information'][0]->first_name) || !empty($template_data['basic_information'][0]->last_name))			@if(!empty($template_data['basic_information'][0]->first_name)){{$template_data['basic_information'][0]->first_name}}@endif @if(!empty($template_data['basic_information'][0]->last_name)){{$template_data['basic_information'][0]->last_name}}@endif
										@endif
										<br>
										@if(!empty($template_data['basic_information'][0]->job_title))
											<span>{{$template_data['basic_information'][0]->job_title}}</span></h2>											
										@endif
										
										@if(!empty($template_data['experience_history'][0]))
										<div class="experience-wrap">
											<span class="e-title mb-2 mt-4">EXPERIENCE</span>
										</div>
										@foreach($template_data['experience_history'] as $k=>$experience)	
											<div class="experience-wrap">
												<div class="e-data">
													<h3 class="e-name">@if(!empty($experience->position_head)){{$experience->position_head}}@endif</h3>
													<span class="e-area">@if(!empty($experience->company)){{$experience->company}}@endif</span>
													<span class="e-date mt-2 mb-1">
													@if(!empty($experience->start_date)){{date('M Y',strtotime($experience->start_date))}}@endif-@if(!empty($experience->end_date)){{date('M Y',strtotime($experience->end_date))}}@endif
													</span>
													@if(!empty($experience->duty1))
														<p class="e-detail">{{$experience->duty1}}</p>
													@endif
													@if(!empty($experience->duty2))
														<p class="e-detail">{{$experience->duty2}}</p>
													@endif
													@if(!empty($experience->duty3))
														<p class="e-detail">{{$experience->duty3}}</p>
													@endif
													@if(!empty($experience->duty4))
														<p class="e-detail">{{$experience->duty5}}</p>
													@endif
												</div>
											</div>
										@endforeach
										@endif
										@if(!empty($template_data['education_history'][0]))
										<div class="experience-wrap">
											<span class="e-title mb-2">EDUCATION</span>
										</div>
											@foreach($template_data['education_history'] as $k=>$education)
												<div class="experience-wrap">
													<div class="e-data">
														<h3 class="e-name">@if(!empty($education->achievement)){{$education->achievement}}@endif</h3>
														<span class="e-area">@if(!empty($education->school)){{$education->school}}@endif</span>
														<span class="e-date">@if(!empty($education->date)){{date('Y',strtotime($education->date))}}@endif</span>
													</div>
												</div>
											@endforeach
										@endif
									</div>
									<div class="col-md-5 p-0 pl-2">
										<div class="person-wrap">
											<div class="p-image mb-2">
											@if(!empty($template_data['basic_information'][0]->image))
													<img src="{{ asset('public/images/profile_image')}}/{{$template_data['basic_information'][0]->image}}" class="img-fluid">
												
												@endif
											<!--<img src="{{ url()->asset('public/images/builder/images/clnt.png') }}" class="img-fluid">-->
												<!--<img src="images/clnt.png" alt="person" class="img-fluid">-->
											</div>
											<div class="person-meta mb-3">
												<span class="d-block">@if(!empty($template_data['basic_information'][0]->email)){{$template_data['basic_information'][0]->email}}@endif </span>
												<span class="d-block">@if(!empty($template_data['basic_information'][0]->phone))+{{$template_data['basic_information'][0]->phone}}@endif</span>
												<span class="d-block">Vernouillet</span>
											</div>
										@if(!empty($template_data['basic_information'][0]->work_industries))
												
											<div class="person-meta mb-3">
												<h3>Industry Knowledge</h3>
												<ul class="list-unstyled mb-0">
												<?php
											$industry_type = explode(', ',$template_data['basic_information'][0]->work_industries);
											?>
											@foreach($industry_type as $k=>$skt)
											    <li>{{$skt}}</li>
											
											@endforeach			
													
												</ul>
											</div>
											@endif
											
											<div class="person-meta mb-3">
												<h3>Tools & Technologies</h3>
												<p>Figma, Sketch, Protopie, Framer, Invision, Abstract, Zeplin, Google Analytics, Amplitude, Fullstory...</p>
											</div>
											@if(!empty($template_data['skills'][0]))
											<div class="person-meta mb-3">
												<h3>Other Skills</h3>
												<p>
											
											{{$template_data['skills'][0]->type}}
											
												
												
												</p>
											</div>
											@endif
											
											@if(!empty($template_data['basic_information'][0]->languages))
												
											
											<div class="person-meta mb-3">
												<h3>Languages</h3>
												<ul class="list-unstyled mb-0">
												<?php
											$lang = explode(', ',$template_data['basic_information'][0]->languages);
											?>
											@foreach($lang as $k=>$lg)
											    <li>{{$lg}}</li>
											
											@endforeach			
													
												</ul>
											</div>
											@endif
											
											
											<div class="person-meta mb-3">
												<h3>Social</h3>
												<ul class="list-unstyled mb-0">
													<li>yoursite.com</li>
													<li>linkedin.com/in/yourname</li>
													<li>dribbble.com/yourname</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-5 offset-md-6 text-right">
										<a href="#" class="btn btn-primary btn-block r-reference">View References</a>
									</div>
								</div>
							</div>
						</div>