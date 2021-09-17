@extends('layouts.workers-master')

<!-- Custom styles for this page only-->

<!-- <link href="{{ asset('public/workers_dashboard/css/chat_message.css') }}" rel="stylesheet"> -->

@section('content')

<!-- Content Wrapper -->

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->

    <div id="content">

        <!-- Begin Page Content -->
         <section class="sent_reference">              
			<div class="container-fluid pr-xl-4 pl-xl-4">
				<div class="row">
				   <div class="col-lg-12 col-sm-12">
					   <h2 class="pad_sec">MANAGE REFERENCES</h2>
					</div>
				</div>
				
			</div>
		 </section>
		 
         <!--START RESUME-->
        <section class="resume_builder resume_cstm">              
			<div class="container-fluid pr-xl-4 pl-xl-4">							
					<div class="row row_cstm">
						<div class="col-lg-7 col-sm-12">
							<div class="resume_form">																
								<h2>Sent References</h2>								
									
														
									<form>
										<div class="row">
										 <div class="col-lg-6 col-sm-6">	
											  <div class="form-group">
												<label>Name of Employer</label>								  
												<input type="email" class="form-control" placeholder="">
											  </div>
										  </div>
										  <div class="col-lg-6 col-sm-6">	
											   <div class="form-group">
												<label>Email of Employer</label>									   
												<input type="email" class="form-control" placeholder="">
											   </div>
										  </div>																				 
										  <div class="col-lg-6 col-sm-6">
											   <div class="form-group">
												<label for="exampleFormControlInput1">Resume</label>									   
												<select class="form-control" id="exampleFormControlSelect1">
												  <option></option>
												  <option>2</option>
												  <option>3</option>
												  <option>4</option>
												  <option>5</option>
												</select>
											   </div>
									      </div>
										  <div class="col-lg-6 col-sm-6">
											   <div class="form-group">
													<label for="exampleFormControlInput1">Position of Employer</label>									   
													<select class="form-control" id="exampleFormControlSelect1">
													  <option></option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
											   </div>
										   </div>
										   <div class="col-lg-12 col-sm-12">	
											  <div class="form-group">
												<label>Subject</label>								  
												<input type="email" class="form-control" placeholder="40-70k">
											  </div>
										  </div>										  
										  <div class="col-lg-12 col-sm-12">	
											  <div class="form-group">
												<label>Example textarea</label>
												<textarea class="form-control" rows="4"></textarea>
											  </div>
										  </div>										  
										   <div class="col-lg-12 col-sm-12 text-right">	
											 
											  <button type="button" class="btn_sve">Send Reference Request</button>
										   </div>
								   </form>
								   
								 </div>  
							</div>
						</div>
						<div class="col-lg-5 col-sm-12">
							
						</div>						
					</div>
								
			</div>               
        </section>
        <!--END RESUME-->
		
		
		<!--START SKILLS-->
        <section class="purchase">              
			<div class="container-fluid pr-xl-4 pl-xl-4">
				<div class="row row_cstm">
				    <div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
                </div>
                <div class="row row-pad">				
					<div class="col-lg-10 col-sm-12">
						<div class="pur_table">
						    <h3>Who has opened and viewed your refree email<span>Last 6 months</span></h3>
							<div class="table-responsive">
								<table class="table">
								  <thead>
									<tr>								 
									  <th scope="col">Title</th>
									  <th scope="col">Resume Name</th>
									  <th scope="col">Viewed</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>								
									  <td>Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									  <td>Lorem Ipsum</td>
									</tr>
									<tr>								
									  <td>Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									  <td>Lorem Ipsum</td>
									</tr>
									<tr>								
									  <td>Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									  <td>Lorem Ipsum</td>
									</tr>
									<tr>								
									  <td>Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									  <td>Lorem Ipsum</td>
									</tr>
								  </tbody>
								</table>
							</div>
							<div class="click_btn">
								<a href="#">Click HERE to VIEW who has opened your REFREES email</a>
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
				</div>
			</div>
        			
        </section>
		
		<section class="purchase purchase_bcksec">              
			<div class="container-fluid pr-xl-4 pl-xl-4">
				<div class="row row_cstm">
				    <div class="col-lg-12">
						<div class="brdr">
						</div>
					</div>
                </div>
                <div class="row row-pad">				
					<div class="col-lg-10 col-sm-12">
						<div class="pur_table">
						    <h3>Managed your references<span>Last 6 months</span></h3>
							<div class="table-responsive">
								<table class="table">
								  <thead>
									<tr>								 
									  <th scope="col">Title</th>
									  <th scope="col">Resume Name</th>
									  <th scope="col">Viewed</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>								
									  <td style="font-weight:bold; color:#495057;">Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									 <td>Lorem</td>
									</tr>
									<tr style="border-bottom:1px solid #eaeaea;">								
									  <td colspan="2"  style="padding-bottom: 20px !important;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a lorem suscipit, aliquam mauris id, sodales erat. In blandit suscipit risus sit amet pharetra. Aliquam consectetur, velit et malesuada maximus, ipsum lectus egestas erat, ac porttitor elit quam ut neque.</td>
                                    								  
									  <td colspan="2">
										  <ul>
											  <li>
											     <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											   </li>
											    <li>
												  <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											  </li>
										  </ul>
									  </td>
									</tr>
									<tr>								
									  <td style="font-weight:bold; color:#495057;">Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									 <td>Lorem</td>
									</tr>
									<tr style="border-bottom:1px solid #eaeaea;">								
									  <td colspan="2"  style="padding-bottom: 20px !important;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a lorem suscipit, aliquam mauris id, sodales erat. In blandit suscipit risus sit amet pharetra. Aliquam consectetur, velit et malesuada maximus, ipsum lectus egestas erat, ac porttitor elit quam ut neque.</td>
                                    								  
									  <td colspan="2">
										  <ul>
											  <li>
											     <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											   </li>
											    <li>
												  <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											  </li>
										  </ul>
									  </td>
									</tr>
									<tr>								
									  <td style="font-weight:bold; color:#495057;">Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									 <td>Lorem</td>
									</tr>
									<tr style="border-bottom:1px solid #eaeaea;">								
									  <td colspan="2"  style="padding-bottom: 20px !important;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a lorem suscipit, aliquam mauris id, sodales erat. In blandit suscipit risus sit amet pharetra. Aliquam consectetur, velit et malesuada maximus, ipsum lectus egestas erat, ac porttitor elit quam ut neque.</td>
                                    								  
									  <td colspan="2">
										  <ul>
											  <li>
											     <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											   </li>
											    <li>
												  <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											  </li>
										  </ul>
									  </td>
									</tr>
									<tr>								
									  <td style="font-weight:bold; color:#495057;">Lorem Ipsum Dolar</td>
									  <td>Lorem Ipsum</td>
									 <td>Lorem</td>
									</tr>
									<tr>								
									  <td colspan="2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a lorem suscipit, aliquam mauris id, sodales erat. In blandit suscipit risus sit amet pharetra. Aliquam consectetur, velit et malesuada maximus, ipsum lectus egestas erat, ac porttitor elit quam ut neque.</td>
                                    								  
									  <td colspan="2">
										  <ul>
											  <li>
											     <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											   </li>
											    <li>
												  <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											  </li>
										  </ul>
									  </td>
									</tr>
								  </tbody>
								</table>
							</div>
							<div class="click_btn">
								<a href="#">Click HERE to VIEW your MANAGE your REFREES</a>
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
				</div>
			</div>
        			
        </section>
		
		
		
			
@endsection

        <!-- /.container-fluid -->

        <!-- End of Main Content -->

      