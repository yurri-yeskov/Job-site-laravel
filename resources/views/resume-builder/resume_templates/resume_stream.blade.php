<div class="resume_first">
								<div class="row">
									<div class="col-md-8 mt-5">
										<div class="row">
											<div class="col-md-4">
												<div class="client_pic">
												@if(!empty($template_data['basic_information'][0]->image))
													<img src="{{ asset('public/images/profile_image')}}/{{$template_data['basic_information'][0]->image}}" class="img-fluid">
												
												@endif
													<!--<img src="{{ url()->asset('public/images/builder/images/clnt.png') }}" class="img-fluid">-->
												</div>
											</div>
											<div class="col-md-8 pr-2">
												<div class="client_info">
				@if(!empty($template_data['basic_information'][0]->first_name) || !empty($template_data['basic_information'][0]->last_name))
												<h1 class="pb-0 mb-0">
				<span>@if(!empty($template_data['basic_information'][0]->first_name)){{$template_data['basic_information'][0]->first_name}}@endif </span>@if(!empty($template_data['basic_information'][0]->last_name)){{$template_data['basic_information'][0]->last_name}}@endif</h1>
				@endif
                                                    @if(!empty($template_data['basic_information'][0]->job_title)) 
													  <p>{{$template_data['basic_information'][0]->job_title}}</p>
													@endif
													  <ul>
															<li class="d-flex"><span class="pr-2"><svg width="22" height="23" viewBox="0 0 36 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.53861 20L24.2155 20C24.5886 20 24.9501 19.8654 25.2309 19.6154L34.8617 11.1538C35.1925 10.8615 35.3848 10.4423 35.3848 10C35.3848 9.55769 35.1925 9.13461 34.8617 8.84615L25.2309 0.384614C24.9501 0.138461 24.5886 -7.15256e-07 24.2155 -7.15256e-07L1.53861 -7.15256e-07C0.688612 -7.15256e-07 0.000150882 0.688461 0.000150882 1.53846V18.4615C0.000150882 19.3115 0.688612 20 1.53861 20ZM3.07707 3.07692L23.6347 3.07692L31.5155 10L23.6347 16.9231L3.07707 16.9231V3.07692ZM24.9347 11.7692C24.4694 12.2308 23.8271 12.5 23.1694 12.5C22.5078 12.5 21.8655 12.2308 21.4002 11.7692C20.9348 11.3038 20.6694 10.6577 20.6694 10C20.6694 9.34231 20.9348 8.69616 21.4002 8.23078C21.8655 7.76539 22.5078 7.5 23.1694 7.5C23.8271 7.5 24.4694 7.76539 24.9347 8.23078C25.4001 8.69616 25.6655 9.34231 25.6655 10C25.6655 10.6577 25.4001 11.3038 24.9347 11.7692Z" fill="#666666"/>
</svg></span>virtualworkers.ph / Fredreic.Dunkley </li>
															<li class="d-flex"><span class="pr-2"><svg width="20" height="23" viewBox="0 0 20 33" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.1348 0.917603C4.74887 0.917603 0.384766 5.26415 0.384766 10.6481C0.384766 19.9574 10.1348 32.0981 10.1348 32.0981C10.1348 32.0981 19.8848 19.9555 19.8848 10.6481C19.8848 5.2661 15.5207 0.917603 10.1348 0.917603ZM10.1348 16.0321C8.7384 16.0321 7.39923 15.4774 6.41185 14.49C5.42447 13.5026 4.86977 12.1634 4.86977 10.7671C4.86977 9.37069 5.42447 8.03151 6.41185 7.04414C7.39923 6.05676 8.7384 5.50205 10.1348 5.50205C11.5311 5.50205 12.8703 6.05676 13.8577 7.04414C14.8451 8.03151 15.3998 9.37069 15.3998 10.7671C15.3998 12.1634 14.8451 13.5026 13.8577 14.49C12.8703 15.4774 11.5311 16.0321 10.1348 16.0321Z" fill="#666666"/>
</svg></span>Cebu, Philippines</li>
															<li class="d-flex"><span class="pr-2"><svg width="21" height="18" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.0355 16.5158C29.6952 16.5158 29.3549 16.3878 29.0955 16.1317L15.8849 3.23442L2.67423 16.1317C2.14189 16.6506 1.2895 16.6405 0.76727 16.1082C0.248413 15.5758 0.258523 14.7234 0.790857 14.2012L14.9415 0.384089C15.4637 -0.12803 16.3026 -0.12803 16.8249 0.384089L30.9755 14.2012C31.5078 14.72 31.5179 15.5758 30.9991 16.1082C30.7363 16.3811 30.3859 16.5158 30.0355 16.5158ZM27.0875 29.6523V16.4821C27.0875 15.7375 26.4844 15.1345 25.7398 15.1345C24.9952 15.1345 24.3921 15.7375 24.3921 16.4821V28.3046H20.1806V21.0979C20.1806 20.1107 19.3787 19.3089 18.3915 19.3089H13.3782C12.391 19.3089 11.5891 20.1107 11.5891 21.0979V28.3046H7.37764V16.4821C7.37764 15.7375 6.77455 15.1345 6.02996 15.1345C5.28536 15.1345 4.68228 15.7375 4.68228 16.4821V29.6523C4.68228 30.3969 5.28536 31 6.02996 31H12.9368C13.6814 31 14.2845 30.3969 14.2845 29.6523V22.0043H17.4852V29.6523C17.4852 30.3969 18.0883 31 18.8329 31H25.7398C26.4844 31 27.0875 30.3969 27.0875 29.6523Z" fill="#666666"/>
</svg>
</span>I am setup to work from home </li>
															<li class="d-flex"><span class="pr-2"><svg width="20" height="14" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.775 3.44968L23.6634 0.107805C23.6398 0.0976986 23.6398 0.0943273 23.6162 0.0842208C23.5691 0.0640078 23.532 0.0505275 23.4815 0.0370522C23.4343 0.0235769 23.3905 0.016854 23.3434 0.0101164C23.2928 0.0033787 23.249 0 23.1985 0C23.148 0 23.1008 0.0033787 23.0536 0.0101164C23.0065 0.016854 22.9593 0.0269457 22.9121 0.0370522C22.8616 0.0505275 22.8144 0.0640078 22.7673 0.0842208C22.7437 0.0943273 22.7201 0.0943298 22.6999 0.107805L16.0532 3.21386L9.40651 0.107805C9.38293 0.0976986 9.35932 0.0943273 9.33911 0.0842208C9.29194 0.0640078 9.2448 0.0505275 9.19427 0.0370522C9.14711 0.0235769 9.09993 0.016854 9.04939 0.0101164C9.00223 0.0033787 8.95172 0 8.90456 0C8.85402 0 8.80684 0.0033787 8.75631 0.0101164C8.70914 0.016854 8.662 0.0269457 8.61147 0.0370522C8.56094 0.0505275 8.51375 0.0640078 8.46659 0.0842208C8.44301 0.0943273 8.41944 0.0943298 8.39923 0.107805L1.15961 3.44968C0.738509 3.64507 0.384766 4.06618 0.384766 4.53108V26.4319C0.384766 26.8395 0.677859 27.2202 1.02148 27.4391C1.21687 27.5638 1.47965 27.6244 1.70536 27.6244C1.87717 27.6244 2.06918 27.5874 2.23088 27.5132L8.89107 24.4072L15.5445 27.5132C15.5479 27.5132 15.5513 27.5133 15.5546 27.5166C15.6254 27.5503 15.6995 27.5739 15.7736 27.5907C15.7905 27.5941 15.8106 27.5975 15.8275 27.6008C15.9016 27.6143 15.9791 27.6244 16.0566 27.6244C16.1341 27.6244 16.2082 27.6143 16.2823 27.6008C16.2991 27.5975 16.3193 27.5941 16.3362 27.5907C16.4103 27.5739 16.4844 27.5503 16.5552 27.5166C16.5585 27.5166 16.5585 27.5166 16.5619 27.5132L23.2086 24.4072L29.8587 27.5132C30.0204 27.5874 30.1922 27.6244 30.364 27.6244C30.5863 27.6244 30.7245 27.5604 30.9199 27.4391C31.2635 27.2202 31.3848 26.8395 31.3848 26.4319V4.53108C31.378 4.06618 31.1961 3.64507 30.775 3.44968ZM14.5339 24.5588L10.1544 22.332V3.06563L14.5339 5.29244V24.5588ZM2.74295 5.29244L7.45931 3.06563V22.332L2.74295 24.5588V5.29244ZM17.2289 5.29244L21.9453 3.06563V22.332L17.2289 24.5588V5.29244ZM29.0198 24.5588L24.3035 22.332V3.06563L29.0198 5.29244V24.5588Z" fill="#666666"/>
</svg>
</span>I am willing to relocate to another country if required and I am given the opportunity</li>
													  </ul>
													 
												</div>
											</div>
								
											<div class="col-md-12 mt-4 mb-xl-4">
											@if(!empty($template_data['experience_history'][0]))
												<div class="client_detail">
													 <h3><span class="mr-3"><img src="{{ url()->asset('public/images/builder/images/bucket.png') }}"></span>WORK EXPERIENCE</h3>
											    </div>
											@foreach($template_data['experience_history'] as $k=>$experience)	
												<div class="row info_detail mt-1 pl-2 pr-2">													
													<div class="col-md-2 p-0  mt-4">
														<p>@if(!empty($experience->start_date)){{date('Y',strtotime($experience->start_date))}}@endif</p>
													</div>
													<div class="col-md-1 p-0  mt-xl-4">
														<div class="icn_sec">
														</div>
													</div>
													<div class="col-md-9 p-0 mt-xl-4">
														<h4>@if(!empty($experience->position_head)){{$experience->position_head}}@endif</h4>													
														<ul>
														@if(!empty($experience->duty1))
															<li>-	{{$experience->duty1}}</li>
														@endif
														@if(!empty($experience->duty2))
															<li>-	{{$experience->duty2}}</li>
														@endif
														@if(!empty($experience->duty3))
															<li>-	{{$experience->duty3}}</li>
														@endif
														@if(!empty($experience->duty4))
															<li>-	{{$experience->duty4}}</li>
														@endif
														
														</ul>
													</div>
												</div>
											@endforeach
											@endif
											@if(!empty($template_data['education_history'][0]))
												<div class="client_detail mt-4  mb-xl-2">
													 <h3><span class="mr-3"><img src="{{ url()->asset('public/images/builder/images/bucket.png') }}"></span>EDUCATION</h3>
											    </div>
												@foreach($template_data['education_history'] as $k=>$education)
												<div class="row info_detail mt-4 pl-2 pr-2">													
													<div class="col-md-2 p-0">
														<p>@if(!empty($education->date)){{date('Y',strtotime($education->date))}}@endif</p>
													</div>
													<div class="col-md-1 p-0">
														<div class="icn_sec">
														</div>
													</div>
													<div class="col-md-9 p-0">
														<h4>@if(!empty($education->school)){{$education->school}}@endif</h4>
														
														<ul>
															<li>@if(!empty($education->subject1)){{$education->subject1}}@endif</li>
															<li>@if(!empty($education->subject2)){{$education->subject2}}@endif</li>
															<li>@if(!empty($education->subject3)){{$education->subject3}}@endif</li>												
														</ul>
													</div>
												</div>
												@endforeach
											@endif
											@if(!empty($template_data['hobby_section'][0]))
												<div class="client_detail mt-4">
													 <h3><span class="mr-3"><img src="{{ url()->asset('public/images/builder/images/bucket.png') }}"></span>HOBBIES AND INTERESTS</h3>
											    </div>
												
												<div class="row info_detail mt-4">	  
												    												
													<div class="col-md-12 p-xl-0">
														<ul class="er">
														<li>
														<?php 
														$hobby_names = '';
														$count_hobbies = count($template_data['hobby_section']);
														?>
														
														@foreach($template_data['hobby_section'] as $k=>$hobby)
															{{$hobby->description}}@if($k < $count_hobbies-1), @endif
														
														@endforeach
														</li>
														</ul>
													</div>
													
												</div>
												@endif
											</div>
											
										</div>
									</div>
									<div class="col-md-4 p-0">
										<div class="right_info">
										<div class="comma">
											<svg width="33" height="23" viewBox="0 0 63 53" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.97479 50C0.991597 41.3821 0 33.9024 0 27.561C0 18.4553 2.14846 11.626 6.44538 7.07317C10.7423 2.35772 17.0224 0 25.2857 0V9.7561C20.9888 9.7561 17.8487 10.8943 15.8655 13.1707C14.0476 15.4472 13.1387 18.8618 13.1387 23.4146H25.5336C25.5336 23.4146 33.4499 43.2827 25.5336 50C18.8163 55.6999 2.97479 50 2.97479 50ZM36.4412 50C34.458 41.3821 33.4664 33.9024 33.4664 27.561C33.4664 18.4553 35.6148 11.626 39.9118 7.07317C44.2087 2.35772 50.4888 0 58.7521 0V9.7561C54.4552 9.7561 51.3151 10.8943 49.3319 13.1707C47.514 15.4472 46.605 18.8618 46.605 23.4146H58.7521C58.7521 23.4146 66.8906 43.2517 59 50C52.3048 55.726 36.4412 50 36.4412 50Z" fill="white"/>
</svg>

										</div>
										@if(!empty($template_data['basic_information'][0]->description))
											<p>{{$template_data['basic_information'][0]->description}}</p>
										@endif
											
										@if(!empty($template_data['skills'][0]))
											<h3>SKILLS</h3>
											<ul>
											<?php
											$skill_type = explode(', ',$template_data['skills'][0]->type);
											?>
											@foreach($skill_type as $k=>$skt)
											    <li>{{$skt}}</li>
											
											@endforeach												
											</ul>
										@endif
										@if(!empty($template_data['basic_information'][0]->languages))
										
											<h3>LANGUAGES</h3>
											<ul class="none_sec asw">
											<?php
											$lang_type = explode(', ',$template_data['basic_information'][0]->languages);
											?>
											@foreach($lang_type as $k=>$lng)
											    <li>{{$lng}}</li>
											
											@endforeach	
											   									
											</ul>
										@endif
											<h3 class="mrgn-top">CONTACT ME</h3>
											<ul class="none_sec asw">
											    <li class="d-flex"><span><img src="{{ url()->asset('public/images/builder/images/ball.png') }}"></span>virtualworkers.ph / Fredreic.Dunkley </li>																								
											</ul>
											<h3>REFERENCES</h3>
											<div class="view_sec">
												<a href="#">View References</a>
											</div>
										</div>
									</div>
								</div>
							</div>