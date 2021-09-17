

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

<div class="resumes container blog-list">

  <div class="d-flex flex-row">

    <div class="content blog_page purethemes">

      <div class="row blog-box">

       <img src="{{ url()->asset('public/images/newdesign/specs.png') . getPictureVersion() }}">

       <h1>11 Tips to Help You Get New Clients Through <br>Cold Calling</h1>

       <p class="author-publising">By <span>purethemes</span> | october 25,2015 | Career counseling</p>
       <p>Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible testing procedures for reliable supply chains. Dramatically engage top-line web services vis-a-vis cutting-edge deliverables. Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly visualize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed base portals after maintainable products.</p><p>Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric “outside the box” thinking. Completely pursue scalable customer service through sustainable potentialities.</p><p>Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources.</p><p>Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas with optimal networks. </p>



     </div>

     <div class="know_info">

      <ul>

        <li>How to “Woo” a Recruiter and Land Your Dream Job</li>

      </ul>

    </div>
    <div class="post-comment">
       <p>You must be <a href="#">logged in</a> to post a comment.</p>
    </div>

  </div>

  <div class="blog_bar">

    <div class="searchbox">    
        <div class="search-feild">
          <input type="search" placeholder="To search type and hit enter">
            <div class="icon">

               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 30 31" fill="none">

                  <path d="M17.7949 17.2215L13.4021 12.9193C14.494 11.6333 15.1518 9.98197 15.1518 8.18266C15.1518 4.09127 11.7533 0.762695 7.57596 0.762695C3.39855 0.762695 0 4.09127 0 8.18266C0 12.2738 3.39855 15.6021 7.57596 15.6021C9.41306 15.6021 11.0993 14.9579 12.4123 13.8885L16.8053 18.1908C16.9419 18.3247 17.1211 18.3916 17.3001 18.3916C17.4792 18.3916 17.6583 18.3247 17.795 18.1908C18.0683 17.9231 18.0683 17.4892 17.7949 17.2215ZM1.39966 8.18266C1.39966 4.84713 4.17032 2.1335 7.57596 2.1335C10.9815 2.1335 13.7521 4.84713 13.7521 8.18266C13.7521 11.5179 10.9815 14.2313 7.57596 14.2313C4.17032 14.2313 1.39966 11.5179 1.39966 8.18266Z" fill="#696969"/></svg>

               </div>
        </div>
    </div>  





    <div class="question_0">

      <h2>Do you have any questions?</h2>

    </div>

    <div class="question_1">

      <p>If you are having any questions, please feel free to ask.</p>

      <button type="button" class="btn btn-green btn-md">Contact Us</button>

    </div>

    <div class="info_head">

      <h2>informations</h2>

    </div>

    <div class="contact_info">

      <p>Morbi eros bibendum lorem ipsum dolor pellentesque pellentesque bibendum.</p>

      <div class="address">

        <p>45 Park Avenue, Apt. 303<br> <span>New York, NY 10016</span></p>

      </div>

      <div class="info_cont">

        <ul>

          <li><i class="fa fa-phone" aria-hidden="true"></i> +48 880 440 110</li>

          <li> <i class="fa fa-envelope" aria-hidden="true"></i> mail@example.com</li>

          <li><i class="fa fa-globe" aria-hidden="true"></i> www.example.com</li>

        </ul>

      </div>



    </div>  



   

    <div class="candidate_list">
       <h2>For Candidates</h2>
      <ul>

        <li>Browse Jobs</li>

        <li>Browse Categories</li>

        <li>Candidate Dashboard</li>

        <li>My Bookmarks</li>

        <li>My Bookmarks</li>

      </ul>

    </div>

  </div>

</div>

</div>

</div>

@endsection