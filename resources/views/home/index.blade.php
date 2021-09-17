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
@endsection
@section('content')
<div id="home_page">
    <div class="main-containers" id="homepage">
        @if (session()->has('flash_notification'))
        @includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
        <?php $paddingTopExists = true; ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    @include('flash::message')
                </div>
            </div>
        </div>
        @endif
        <div class="main">
            <section class="hero-banner">
                <div class="banner" style="background-image: url('{{asset('img/banner/AdobeStock_172331101.png')}}'); background-size: cover;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <button type="button" class="banner-btn" data-toggle="modal" data-target="#quickEmployerHomeSignup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="36" viewBox="0 0 25 36" fill="none">
                                        <path d="M0 35.5622H25C25 24.5138 22.7253 18.7084 15.0933 17.0633C18.6473 15.9924 21.227 12.7784 21.227 8.97843C21.227 4.30389 17.3197 0.51416 12.5 0.51416C7.68034 0.51416 3.77145 4.30389 3.77145 8.97843C3.77145 12.777 6.35271 15.9924 9.90515 17.0633C2.27465 18.7084 0 24.5138 0 35.5622ZM11.1316 21.4434C11.1316 21.2383 11.3038 21.0713 11.5152 21.0713H13.4878C13.6993 21.0713 13.8714 21.2383 13.8714 21.4434V22.3341C13.8714 22.5377 13.8503 22.7179 13.8246 22.7325C13.7974 22.7472 13.6283 22.8438 13.447 22.9479L12.8308 23.3024C12.6495 23.4064 12.3535 23.4064 12.1722 23.3024L11.556 22.9479C11.3748 22.8438 11.2056 22.7457 11.1799 22.7325C11.1527 22.7179 11.1331 22.5391 11.1331 22.3341V21.4434H11.1316ZM11.1709 23.8605C11.2011 23.6583 11.3748 23.5778 11.556 23.6832L12.1722 24.0377C12.3535 24.1432 12.6495 24.1432 12.8308 24.0377L13.447 23.6832C13.6283 23.5792 13.802 23.6583 13.8307 23.8605L14.5677 28.765C14.5994 28.9672 14.4907 29.2397 14.3291 29.37L12.7945 30.6152C12.6329 30.7456 12.3686 30.7456 12.207 30.6152L10.6724 29.37C10.5123 29.2397 10.4036 28.9672 10.4338 28.765L11.1709 23.8605Z" fill="white" />
                                    </svg>
                                    <span> I AM LOOKING FOR GREAT OFFSHORE STAFF</span>
                                </button>
                            </div>
                            <div class="col-md-auto">
                                <button type="button" class="banner-btn" data-toggle="modal" data-target="#quickSignup">
                                   <!--  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="34" viewBox="0 0 50 34" fill="none">
                                        <path d="M48.509 5.95605H47.0181V16.9274C47.0181 19.0316 45.2923 20.7427 43.17 20.7427H42.1089L44.0827 21.4917C44.8293 21.775 45.3787 22.4142 45.5449 23.1874C45.6224 23.5498 45.6091 23.9188 45.5161 24.2658H48.5068C49.3286 24.2658 49.9977 23.6047 49.9977 22.7898V7.43428C49.9999 6.61939 49.3331 5.95605 48.509 5.95605Z" fill="white" />
                                        <path d="M5.33887 20.7427V22.7898C5.33887 23.6047 6.00568 24.2658 6.82757 24.2658H28.5622L27.202 20.7427H5.33887Z" fill="white" />
                                        <path d="M26.3912 18.4056C26.3203 17.7181 26.5574 17.0196 27.0669 16.5166C27.5166 16.0707 28.1192 15.8313 28.7351 15.8313C29.0186 15.8313 29.3044 15.8818 29.5769 15.9851L35.9526 18.4056H43.1724C43.9943 18.4056 44.6611 17.7444 44.6611 16.9295V1.57394C44.6611 0.759041 43.9943 0.0957031 43.1724 0.0957031H1.4887C0.666815 0.0957031 0 0.756844 0 1.57394V16.9295C0 17.7444 0.666815 18.4056 1.4887 18.4056H26.3912Z" fill="white" />
                                        <path d="M43.2409 23.675L28.7327 18.1685L34.2865 32.5532L37.8953 28.9752L42.1531 33.1968L43.89 31.4748L39.6321 27.2531L43.2409 23.675Z" fill="white" />
                                    </svg> -->
                                    <img src="{{asset('assets/img/job.png')}}" alt="job">
                                    <span>I AM LOOKING FOR GREAT JOB</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="popular-categories">
                    <div class="section-title">
                        <h2>Popular Categories</h2>
                    </div>
                    <div class="container-fluid container-max">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="item">
                                    <h3>Design, Art & Multimedia</h3>
                                    <p>(22 open positions)</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="item">
                                    <h3>Education Training</h3>
                                    <p>(6 open positions)</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="item">
                                    <h3>Accounting / Finance</h3>
                                    <p>(3 open positions)</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="item">
                                    <h3>Human Resource</h3>
                                    <p>(3 open positions)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="banner-secondary" style="background-image:url('{{ url()->asset('public/images/newdesign/AdobeStock_345291349 1@3x.png') . getPictureVersion() }}')">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <h2>Helping the Filipino Community Find Safe, Reliable Work from Home Positions</h2>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p class="text-sm-center">We live in an uncertain time – one that is changing by the day and
                                    requiring more individuals to think outside the box when seeking
                                    employment. "Business as usual" doesn't hold the same meaning as
                                    it did a year ago, requiring companies to outsource more positions
                                    than ever before.
                                    <br>
                                    <br>
                                    So, how do you find the right job or fill a
                                    position requiring outsourcing? By seeking out the help of a
                                    virtual assistant agency.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section funnel-section">
                <div class="container container-3">
                    <div class="section-body">
                        <div class="funnel">
                            <h2>ready to get started?</h2>
                            <button>Set up your personal or brand account today!l</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="recent-jobs">
                    <div class="container-fluid container-max">
                        <div class="section-title">
                            <h2>Recent Jobs</h2>
                            <p>Leading Employers already using job and talent.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ url()->asset('public/images/newdesign/icon-tv.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                    </div>
                                    <div class="card-body">
                                        <h3>Networking Engineer</h3>
                                        <p>GUXOFT</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="action">
                                            <span class="label-text">Ukraine</span>
                                            <button type="button" class="border-green color-green">Full Time</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ url()->asset('public/images/newdesign/icon-line.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                    </div>
                                    <div class="card-body">
                                        <h3>Front End Developer</h3>
                                        <p>Norson</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="action">
                                            <span class="label-text">Ukraine</span>
                                            <button type="button" class="border-red color-red">Temporary</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ url()->asset('public/images/newdesign/icon-cube.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                    </div>
                                    <div class="card-body">
                                        <h3 class="color-dark">Senior UX Designer</h3>
                                        <p>NetSuite</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="action">
                                            <span class="label-text">Ukraine</span>
                                            <button type="button" class="border-red color-red">Temporary</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ url()->asset('public/images/newdesign/icon-flusk.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                    </div>
                                    <div class="card-body">
                                        <h3>JEB Product Sales Specialist, Russia & CIS</h3>
                                        <p>General Electric</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="action">
                                            <span class="label-text">Ukraine</span>
                                            <button type="button" class="border-blue color-blue">Part Time</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ url()->asset('public/images/newdesign/icon-circle.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                    </div>
                                    <div class="card-body">
                                        <h3>Technical Support Specialist</h3>
                                        <p>General Electric</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="action">
                                            <span class="label-text">Ukraine</span>
                                            <button type="button" class="border-blue color-blue">Freelance</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{ url()->asset('public/images/newdesign/icon-tv.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                    </div>
                                    <div class="card-body">
                                        <h3 class="color-dark">Networking Engineer</h3>
                                        <p>GUXOFT</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="action">
                                            <span class="label-text">Ukraine</span>
                                            <button type="button" class="border-red color-red">Full Time</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-footer">
                            <a href="{{ url('/all-jobs') }}" class="btn btn-pink btn-lg">Load more listings</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="about_page">
                    <div class="assistant-agency">
                        <div class="section-title">
                            <h2>More Than Your Average Virtual Assistant Agency</h2>
                        </div>
                        <div class="section-tumbnail">
                            <img src="{{ url()->asset('public/images/newdesign/New-Logo-Main-Index-(Updated) 1.png') . getPictureVersion() }}" alt="" />
                        </div>
                        <div class="section-body">
                            <div class="container container-2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            Whether you are looking for a virtual assistant or a skilled writer – we've got solutions across all industries.
                                            <br /><br />
                                            With virtual work becoming the new norm, job recruiters must have a place to find qualified candidates, whether it be someone to handle back-office work or a new web designer for your website.
                                            <br><br>
                                            Those searching for work also need a place to find jobs. There are many benefits of being a virtual assistant or seeking other remote employment, such as setting your hours and working from the comfort of your home.
                                        </p>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <p>
                                            However, it's not as simple as going online, filling out an application, and waiting for a phone call. Now, you must sift through the overwhelming number of online listings, trying to
                                            figure out what is a legitimate position and what is not.
                                            <br /><br />
                                            <u>The key for both recruiters and job seekers: knowing where to go.</u>
                                            <br /><br />
                                            Recruiters need to know they can sift through committed individuals with the necessary skills to get the job done.
                                            <br /><br />
                                            Job seekers need to know that they can check the job board with confidence that the postings are real jobs that can provide reliable work.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-footer">
                            <h2>Single Payment of $27</h2>
                            <button>Ridiculous? Definitely... Short-sighted? We'll see.</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="benefit">
                    <div class="container-fluid container-max">
                        <div class="section-title">
                            <h2>Who Can Benefit from Our Services?</h2>
                        </div>
                        <div class="section-body">
                            <p>
                                Virtual Workers' mission is to help the Filipino community find safe and
                                reliable work from home positions and help recruiters find serious
                                candidates that are ready to work. That said, both recruiters and job
                                seekers could benefit from our services.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="recent-candidates">
                    <div class="section-title text-center">
                        <h2>Recent Candaites</h2>
                        <p>Leading Employers already using job and talent.</p>
                    </div>
                    <div class="section-body">
                        <div class="container-fluid container-max">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                        </div>
                                        <div class="card-body">
                                            <h3>Networking Engineer</h3>
                                            <p>GUXOFT</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="action">
                                                <span class="label-text">Ukraine</span>
                                                <button type="button" class="border-green color-green">Full Time</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                        </div>
                                        <div class="card-body">
                                            <h3>Front End Developer</h3>
                                            <p>Norson</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="action">
                                                <span class="label-text">Ukraine</span>
                                                <button type="button" class="border-red color-red">Temporary</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                        </div>
                                        <div class="card-body">
                                            <h3 class="color-dark">Senior UX Designer</h3>
                                            <p>NetSuite</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="action">
                                                <span class="label-text">Ukraine</span>
                                                <button type="button" class="border-red color-red">Temporary</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                        </div>
                                        <div class="card-body">
                                            <h3>JEB Product Sales Specialist, Russia & CIS</h3>
                                            <p>General Electric</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="action">
                                                <span class="label-text">Ukraine</span>
                                                <button type="button" class="border-blue color-blue">Part Time</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                        </div>
                                        <div class="card-body">
                                            <h3>Technical Support Specialist</h3>
                                            <p>Man Power Group</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="action">
                                                <span class="label-text">Ukraine</span>
                                                <button type="button" class="border-blue color-blue">Part Time</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto icon" alt="Icon" />
                                        </div>
                                        <div class="card-body">
                                            <h3 class="color-dark">Networking Engineer</h3>
                                            <p>GUXOFT</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="action">
                                                <span class="label-text">Ukraine</span>
                                                <button type="button" class="border-red color-red">Full Time</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-footer">
                        <a href="{{url('/all-worker')}}">
                            <button type="button" class="border-pink color-pink">Load more listings</button>
                        </a>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="seekers-recruiters">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <img src="{{ url()->asset('public/images/newdesign/seekers.png') . getPictureVersion() }}" alt="" />
                                <div class="seekers">
                                    <h2>Job Seekers!</h2>
                                    <p>
                                        Looking for a new opportunity to work from home? Whatever the
                                        situation, Virtual Workers is the best place to get started. Our
                                        job boards include open positions across all industries,
                                        ensuring that you'll find the best position for your skills.
                                        <br>
                                        Need help building your curriculum vitae? We offer free CV
                                        templates to help you build a resume that will allow you to
                                        stand out.
                                    </p>
                                    <button>Job Seekers Start Here</button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <img src="{{ url()->asset('public/images/newdesign/seek-right.png') . getPictureVersion() }}" alt="" />
                                <div class="seekers">
                                    <h2>Recruiters!</h2>
                                    <p>
                                        As a brand recruiter, you already know the many benefits of
                                        outsourcing a virtual assistant for data entry or
                                        telecommunication tasks. More jobs have become remote, meaning
                                        that your brand can reach out and select the most qualified
                                        candidates, no matter where they are.
                                        <br>
                                        By posting your open jobs
                                        on Virtual Workers, you are sure to find the most qualified
                                        candidates who are eager to get to work.
                                    </p>
                                    <button>Recruiters Start Here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="works-how">
                    <div class="container container-3">
                        <div class="section-title">
                            <h2>How It Works</h2>
                            <p>At Virtual Workers, we provide a safe space for both recruiters and job seekers. We understand that navigating the job market is difficult, which is why we are building an all-inclusive community that benefits everyone.
                            </p>
                        </div>
                        <div class="section-thumbnail">
                            <img src="{{ url()->asset('public/images/newdesign/New-Logo-Main-Index-(Updated) 1.png') . getPictureVersion() }}" alt="Logo" />
                        </div>
                        <div class="section-body">
                            <div class="container container-2">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="job-info">
                                            <img src="{{ url()->asset('public/images/newdesign/Rectangle.png') . getPictureVersion() }}" class="mx-auto" alt="Avatar" />
                                            <p>Recruiters register their account and then post their open positions on our job board and list all the necessary information, such as:
                                            </p>
                                            <ul>
                                                <li>Job Title</li>
                                                <li>Description of the Position</li>
                                                <li>Experience/Skills Required</li>
                                                <li>Pay/Salary</li>
                                                <li>Contact Information and more</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="job-info">
                                            <img src="{{ url()->asset('public/images/newdesign/Rectangle.png') . getPictureVersion() }}" class="mx-auto" alt="Avatar" />
                                            <p>For job seekers, you will register your account and build your curriculum vitae. From there, you can start browsing the jobs currently posted. When searching the Virtual Worker's job board, you can search by:
                                            </p>
                                            <ul>
                                                <li>Recently Posted Jobs</li>
                                                <li>Job Type.</li>
                                                <li>Offered Salary</li>
                                                <li>Job Category</li>
                                                <li>Industry and more</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="about_business">
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
                </div>
            </section>

            <section class="section">
                <div class="benefit">
                    <div class="container container-3">
                        <div class="section-title">
                            <h2>Online Home-Based Jobs for 2020 and Beyond</h2>
                        </div>
                        <div class="section-body">
                            <p> Whether you are looking for an online home-based job or to hire new talent for your company, our virtual assistant agency is here to help.
                                <br>
                            Virtual Workers is a community filled with like-minded individuals who understand times are changing, and the job market is unlikely to return to "business as usual." Let us help you find the right candidate for your open position or the right work from home job that suits your skill set.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('after_scripts')
@endsection