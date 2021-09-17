

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



@section('content')





<div class="employers_page virtual_toplogo worker_page">

  <div class="container container-1">

    <div class="virtual_logo">

      <img src="{{ url()->asset('public/images/newdesign/New-Logo-Main-Index-(Updated) 3.png') . getPictureVersion() }}">

    </div>

    <div class="row">

      <div class="col-md-7 worker_pg common-parastyle">

        <p><b><i>Create a Free Virtual Assistant Portfolio</i></b></p>



        <p>Creating a free virtual assistant portfolio or other online portfolio is easier than you think.</p>



        <p>Working from home is becoming more than a dream for some. In fact, for many, it's becoming a necessity. No matter what the reason is behind needed a work from home position, it's important to remember that applying for a remote job is just like any other. This means you need to have all the necessary job qualifications, references, and proof of previous work. 

        </p>

      </div>

      <div class="col-md-5 p-0 worker-image">

        <img src="{{ url()->asset('public/images/newdesign/worker_img.png') . getPictureVersion() }}">

      </div>

    </div>

    <div class="worker_description common-parastyle">

      <p>

        Having all of this in one convenient location makes the application process simple, which is why more and more people are looking for tips on how to create a free virtual assistant portfolio. 

        A virtual assistant portfolio, also referred to as an online, digital, or freelance portfolio, is a portfolio built online to share easily when interviewing for a new position. Don't yet have one? Then it's time to consider building one, especially if you are currently in the market for a new position. 

      </p>

    </div>

  </div>
  <div class="common-funnel">
    <div class="container container-3">
      <div class="funnel want_job">
       <button>Do You Want a FREE RESUME?.......click here!!</button>
     </div>
   </div>
 </div>



 <section class="section">
  <div class="recent-jobs common-recent">
   <div class="container-fluid container-max">
     <div class="section-title">
       <h2>Recent Listed Jobs</h2>
       <p>Leading Employers already using job and talent.</p>
     </div>   

     <div class="row">

      <div class="col-lg-4 col-md-4 col-sm-6">

        <div class="card">
          <div class="card-header">
            <img src="{{ url()->asset('public/images/newdesign/icon-tv.png') . getPictureVersion() }}" class="mx-auto" alt="Icon" >
          </div>
          <div class="card-body">
            <h3>Networking Engineer</h3>
            <p>GUXOFT</p>
          </div>
          <div class="card-footer">
            <div class="action">
              <span>Ukraine</span>
              <button type="button" class="border-green color-green">Full Time</button>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-6">

        <div class="card">
          <div class="card-header">
            <img src="{{ url()->asset('public/images/newdesign/icon-line.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
          </div>
          <div class="card-body">
            <h3>Front End Developer</h3>
            <p>Norson</p>
          </div>
          <div class="card-footer">
            <div class="action">
              <span>Ukraine</span>
              <button type="button" class="border-red color-red">Temporary</button>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-6">

        <div class="card">
         <div class="card-header">
          <img src=" {{ url()->asset('public/images/newdesign/icon-cube.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
        </div>
        <div class="card-body">
          <h3 class="color-dark">Senior UX Designer</h3>
          <p>NetSuite</p>
        </div>
        <div class="card-footer">
          <div class="action"> <span>Ukraine</span>
            <button type="button" class="border-red color-red">Temporary</button>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="row">

    <div class="col-lg-4 col-md-4 col-sm-6">

      <div class="card">
        <div class="card-header">
          <img src=" {{ url()->asset('public/images/newdesign/icon-flusk.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
        </div>
        <div class="card-body">
          <h3>JEB Product Sales Specialist, Russia &amp; CIS</h3>
          <p>General Electric</p>
        </div>
        <div class="card-footer">
          <div class="action">
            <span>Ukraine</span>
            <button type="button" class="border-blue color-blue">Part Time</button>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">

      <div class="card">
        <div class="card-header">
         <img src="{{ url()->asset('public/images/newdesign/icon-circle.png') . getPictureVersion() }}" class="mx-auto" alt="Icon" >
       </div>
       <div class="card-body">
        <h3>Technical Support Specialist</h3>
        <p>Man Power Group</p>
      </div>
      <div class="card-footer">
       <div class="action"><span>Ukraine</span><button type="button" class="border-blue color-blue">Freelance</button>
       </div>
     </div>
   </div>

 </div>

 <div class="col-lg-4 col-md-4 col-sm-6">

  <div class="card">
   <div class="card-header">
    <img src="{{ url()->asset('public/images/newdesign/icon-tv.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
  </div>
  <div class="card-body">
   <h3 class="color-dark">Networking Engineer</h3>
   <p>GUXOFT</p>
 </div>
 <div class="card-footer">
  <div class="action">
    <span>Ukraine</span>
    <button type="button" class="border-red color-red">Full Time</button>
  </div>
</div>
</div>

</div>

</div>
<div class="section-footer">
 <button type="button" class="btn btn-pink btn-lg">Load more listings</button>
</div>

</div>



</div>
</section>

<section class="section virtual-price">
  <div class="container">
    <div class="pricing_comp">
     <h2>What Belongs in an Online Virtual Assistant's Portfolio?</h2>

     <p>Not sure what belongs in an online portfolio? Here are some things to consider.</p>

     <p>What goes into your digital portfolio can and will vary by the individual, the type of position they seek, and so much more. The good news – if you've written a standard resume or completed a job application in the past, then you're already familiar with most of the things you'll want to include in your digital portfolio.</p>

     <p><b>Curriculum Vitae</b></p>

     <ul>
      <li>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="12" height="12" fill="#2B8572"/></svg>
        <span>Your curriculum vitae (CV) is an essential piece of your virtual assistant or freelancer portfolio. Your CV contains all your previous work experience, a list of your skills, and a running list of any degrees, research, awards, or other achievements.</span>
      </li>
      <li>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="12" height="12" fill="#2B8572"/></svg>
        <span>This will be your most extensive portion of your digital portfolio, so make sure you take adequate time to include all relevant pieces of information for potential employers to review.</span>
      </li>
    </ul>

  </div>
</div>
</section>



<div class="assistant-agency create_vita">
  <div class="container container-3">
   <div class="row">
     <div class="col-md-12 col-sm-12">
      <h2>Create a Free Curriculum Vitae with Virtual Workers Today!</h2>
      <div class="virtual_logo">
        <img src="{{ url()->asset('public/images/newdesign/Logo-Main-Index-(white) 3@2x.png') . getPictureVersion() }}">
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-sm-12 col-md-6 virtual_workers">

      <p>At Virtual Workers, we pride ourselves in giving the Filipino community the tools they need to find the remote jobs that suit their time, skills, and schedule. With a virtual assistant portfolio at the ready, you'll easily stand out from those who are lacking in the necessary presentation materials required to secure.</p>

    </div>

    <div class="col-sm-12 col-md-6 online_position">

      <p>Your online position.<br> If you're ready to start your journey to a new online home-based position, then start by creating a free Curriculum Vitae today!</p>

    </div>

  </div>

  <h2 class="single_pay">Single Payment of <span>$27</span>  </h2>

  <button class="single-paybtn">Ridiculous?Definitely...Short-Sighted? we'll see </button>



</div>

</div>
<section class="carrer-goals">
  <div class="container">


   <div class="carrer-box">
    <p><b>Career Goals</b></p>
    <ul>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>This section isn't necessarily a requirement; however, it can help you stand apart from the crowd. Explaining your career goals shows potential employers how you'll put your skills to work for them and how they can benefit from hiring you.</span></li>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>Remember – they want to find someone that will suit their needs, so make sure to write your goals to address how they will benefit the needs of the prospective company.</span></li>
    </ul>
  </div>

  <div class="carrer-box">
    <p><b>Work Samples</b></p>
    <ul>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>Don't forget to include any relevant samples of your work for potential employers to review.</span></li>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>This can be anything from writing samples, links to other sites you've worked on, or projects you've completed in the past.</span></li>
    </ul>
  </div>

  <div class="carrer-box">
    <p><b>References</b></p>
    <ul>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>If you have previous work references that are willing to speak on your behalf, then make sure you include them in your reference section of your portfolio.</span></li>
    </ul>
  </div>

  <div class="carrer-box">
    <p><b>Contact Information</b></p>
    <ul>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>While this may seem like a no-brainer, it's important to point out that you need to include your contact information in your online portfolio. Unfortunately, many people tend to skip over this step, especially if they're building their portfolio using a pre-made virtual assistant WordPress theme. </span></li>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>That's because they assume that the prefilled contact forms will be sufficient. However, most recruiters or HR teams will prefer to contact you directly via your email or phone if they are interested in your skills.  </span></li>
      <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="12" height="12" fill="#2B8572"/>
      </svg><span>So – make sure you are including relevant contact information in several places of your online portfolio.</span></li>
    </ul>
  </div>
  
  <div class="carrer-box">
   <p><b>How to Make a Portfolio for Freelance Work</b></p>
   <ul>
    <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="12" height="12" fill="#2B8572"/>
    </svg><span>Now that you know what goes into a digital portfolio, it's time to build one.</span></li>
    <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="12" height="12" fill="#2B8572"/>
    </svg><span>Thanks to the abundance of technology available to us, there are countless ways to make a free online portfolio.</span></li>
    <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="12" height="12" fill="#2B8572"/>
    </svg><span>There are entire websites dedicated to building online portfolios and sharing freelancer portfolio samples, including:WordPress, Wix, Weebly, Adobe Portfolio and more however none of them have the powerful tools of VirtualWorker.</span></li>
    <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="12" height="12" fill="#2B8572"/>
    </svg><span>In most cases, these portfolios are entirely free and utilize a drag-and-drop editor to help you quickly and easily design a portfolio worth sharing.</span></li>
  </ul>
</div>

</div>

</section>
<section class="section">
 <div class="container container-3">
   <div class="funnel review_order">
      <button>
        <span>Yes - I'm Ready For Better Clients</span>
        You’ll have plenty of time to review your order on the next page
      </button>
  </div>
</div>
</section>
<div class="job-footer d-flex justify-content-between">

  <img src="{{ url()->asset('public/images/newdesign/Logo-Main-Index-(white) 3.png') . getPictureVersion() }}" alt="Logo">

  <div class="d-flex job-count">

    <div class="job-countbox">

      <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

      <div class="job-title-box">

        <h3>1124</h3>

        <p>Job Listings</p>

      </div>

    </div>

    <div class="job-countbox">

      <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

      <div class="job-title-box">

        <h3>421</h3>

        <p>Resumes Posted</p>

      </div>

    </div>

  </div>

</div>
@endsection