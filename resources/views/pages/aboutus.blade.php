{{--
* JobClass - Job Board Web Application
* Copyright (c) BedigitCom. All Rights Reserved
*
* Website: https://bedigit.com
*
* LICENSE
* -------
* This software is furnished under a license and may be used and copied
* only in accordance with the terms of such license and with the inclusion
* of the above copyright notice. If you Purchased from CodeCanyon,
* Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')

@section('search')
@parent
@include('pages.inc.contact-intro')
@endsection
@section('content')
<div class="main-containers">
   <div class="about_page">
      <div class="bg_img" style="background-image:url('{{ url()->asset('public/images/newdesign/ab_bg.png') . getPictureVersion() }}');mix-blend-mode: darken;">
         <div class="container-fluid container-max">
            <h1>Who are We?</h1>
            <button class="btn next_btn" type="button">
               <svg width="96" height="96" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M45.2151 74.5273L45.2774 74.4913L45.3359 74.4496L76.0935 52.5028C79.5014 50.4744 79.5021 45.5265 76.0979 43.4975L45.3399 21.5504L45.2814 21.5087L45.2191 21.4727C41.7215 19.4516 37.3489 21.9777 37.3489 26.0142V29.6489H26.2587C23.3059 29.6489 20.9107 32.0441 20.9107 34.9969V61.0071C20.9107 63.9599 23.3059 66.3551 26.2587 66.3551H37.3449V69.9858C37.3449 74.0223 41.7175 76.5484 45.2151 74.5273ZM1.5 48C1.5 22.3172 22.3172 1.5 48 1.5C73.6828 1.5 94.5 22.3172 94.5 48C94.5 73.6828 73.6828 94.5 48 94.5C22.3172 94.5 1.5 73.6828 1.5 48Z" fill="#6CD481" stroke="#0B7C30" stroke-width="3"/>
               </svg>
            </button>
         </div>
      </div>
      <section class="section section-community">
         <div class="container-fluid container-max">
            <div class="section-title">
               <h2> Virtual Workers is a Virtual Work Agency Dedicated to the Filipino Community. </h2>
            </div>
         </div>
         <div class="section-tumbnail">
            <img src="{{ url()->asset('public/images/newdesign/New-Logo-Main-Index-(Updated) 3.png') . getPictureVersion() }}">
         </div>
         <div class="section-body">
            <div class="container container-2">
               <div class="row">
                  <div class="col-lg-12">
                     <p>Work from home jobs are more abundant than ever before; however, finding safe, legitimate online home-based jobs isn’t always easy, especially for the Filipino community. That’s why having the assistance of a quality virtual work agency is crucial in today’s age.</p>
                  </div>
                  <div class="col-lg-6">
                     <p class="mb-lg-0">
                        Who are We?
                        <br><br>
                        We Help Businesses with Virtual Assistant Services and Job Seekers with Free Virtual Assistant Portfolios.
                        <br><br>
                        Virtual Workers is more than a simple virtual work agency helping businesses find suitable candidates to provide virtual assistant services. We are a community of like-minded individuals dedicated to finding businesses the right candidates to fill their remote positions. We also help those in the Filipino community find legit work from home jobs in the Philippines, U.S., U.K., Europe, Australia, and across the globe.
                     </p>
                  </div>
                  <div class="col-lg-6 mb-lg-0">
                     <p class="mb-lg-0">
                        How We Can Help You
                        <br><br>
                        Our platform caters to both recruiters and job seekers alike find reliable remote workers and jobs, allowing companies to tap into an outstanding workforce that is often left untapped.
                        <br><br>
                        Recruiters
                        <br><br>
                        Company recruiters already understand the many benefits of outsourcing work to virtual assistants when it comes to common work from home jobs, such as telecommunication or data encoding. Here at Virtual Workers, we know that your brand is likely looking for candidates to complete particular tasks that go well beyond the “usual” work from home position. That’s why we let you post detailed job descriptions and help you filter through only the most qualified candidates
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section about_business">
         <div class="section-body">
            <div class="improve-business">
               <div class="container-fluid container-max">
                  <div class="row">
                     <div class="col-sm-12 col-md-6">
                        <div class="book_wrap">
                           <img src="{{ url()->asset('public/images/newdesign/AdobeStock_210940773-[Converted] 1.png') . getPictureVersion() }}" alt="Book Image">
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                        <div class="title">
                           <h2>5 Ways To IMPROVE YOUR BUSINESS USING VIRTUAL WORKERS</h2>
                        </div>
                        <div class="free-info">Free Report</div>
                        <p>We have generated over $1.33 billion in sales with the 5 unbelievably powerful strategies outlined in this free report. Download it now before this page comes down or your competitors get their hands on it.</p>
                        <form action="">
                           <div class="row">
                              <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>

                  </div>
                  
               </div>
            </div>   
         </div>
      </section>
      <section class="section online-home jobs">
         <div class="container">
            <div class="section-title">
               <h2>Job Seekers</h2>
            </div>
            <div class="section-body">
               <p>If you’re in the market for a safe, reliable, fully remote position, then our virtual work agency is the partner for you! We do not give you a list of job openings to sift through. Instead, we allow you to set up an account, create a free virtual assistant portfolio, and help you find a position that will allow you to put your skillset to work. Our listed online home-based jobs come from every industry, ensuring you’ll find something you are excited to do.</p>
            </div>
         </div>
      </section>
      <section class="section virtual_workers">
         <div class="container container-3">
            <div class="section-title">
               <h2>Virtual Workers: We’re Ready, Are You?</h2>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="text-content">
                     <p>
                        Trying to find a work from home job that you’re passionate about can be challenging. From having a well-written curriculum vitae to putting together a suitable portfolio worth sharing – it can be intimidating.
                        <br><br>
                        Finding trustworthy, reliable workers who can keep their schedules and get their work done can also feel daunting.
                        <br><br>
                        That’s why we cater to both recruiters and job seekers – to ensure both find the best fit for them.
                     </p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="image">
                     <img src="{{ url()->asset('public/images/newdesign/virtual_ready.png') . getPictureVersion() }}">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section">
         <div class="container container-3">
            <div class="section-body">
               <div class="funnel">
                  <h2>ready to get started?</h2>
                  <button>Set up your personal or brand account today!l</button>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection

@section('after_scripts')
<script src="{{ url('assets/js/form-validation.js') }}"></script>
@endsection
