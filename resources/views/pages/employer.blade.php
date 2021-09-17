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
<div class="employers_page virtual_toplogo">
    <div class="container container-1">
        <div class="virtual_logo">
            <img src="{{ url()->asset('public/images/newdesign/New-Logo-Main-Index-(Updated) 3.png') . getPictureVersion() }}">
        </div>
        <div class="row">
            <div class="col-md-7 virtual_assistant common-parastyle">
                <p><b><i>Virtual Assistant Pricing: A Recruiters Guide to Creating a Job Posting on Virtual Workers</i></b></p>
                <p><i>Need to Post a New Job Opening? It is Simple with Virtual Workers.</i></p>
                <p> While it is true that remote working has seen a significant boom in 2020 due to the global pandemic, millions of employees were working from home at least a day or two a week. However, according to a recent Gallop poll, remote workdays for these employees have doubled since this time last year. With the increase in partially and full-remote positions, can employers expect to see an increase in remote worker or virtual assistant pricing?
                </p>
            </div>
            <div class="col-md-5 virtual_image p-0">
                <img src="{{ url()->asset('public/images/newdesign/thinking.png') . getPictureVersion() }}">
            </div>
        </div>
        <div class="determine-text common-parastyle">
            <p><b>How to Determine Virtual Assistant Pricing?</b> </p>
            <p>Not sure about today's virtual assistant pricing? Here is what you need to know.<br>
                One of the most common questions when looking for virtual assistant jobs is what the pay will be. For those looking for positions on virtual assistant websites, they will be paying careful attention to the listing's pay rates or salaries. For recruiters, however, it is not as simple as posting a random number. </p>
            <p>If you do not already have a price set by your company for the position, then you will want to consider researching virtual assistant rates. 2020 has seen a massively increased need for remote workers, so you will want to be prepared to be a bit competitive with your pricing standards. <br>
                According to sites such as PayScale, the average virtual assistant hourly pay is $15.74. The range can go from $10.00 to $27.00 per hour, depending on the applicant's virtual assistant services performed, skill level, experience, and more.
            </p>
        </div>
    </div>
    <div class="common-funnel">
        <div class="container container-3">
            <div class="funnel want_job">
                <button>Do You Want Your Dream Job?.......click here!!</button>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="recent-candidates common-recent">
            <div class="container-fluid container-max">
                <div class="section-title">
                    <h2>Recent Candidates</h2>
                    <p>Leading Employers already using job and talent.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <img src=" {{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
                            </div>
                            <div class="card-body">
                                <h3>Networking Engineer</h3>
                                <p>GUXOFT</p>
                            </div>
                            <div class="card-footer">
                                <div class="action"><span class="label-text">Ukraine</span><button type="button" class="border-green color-green">Full Time</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
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
                                <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
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
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
                            </div>
                            <div class="card-body">
                                <h3>JEB Product Sales Specialist, Russia &amp; CIS</h3>
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
                                <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
                            </div>
                            <div class="card-body">
                                <h3>Technical Support Specialist</h3>
                                <p>Man Power Group</p>
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
                                <img src="{{ url()->asset('public/images/newdesign/avatar.png') . getPictureVersion() }}" class="mx-auto" alt="Icon">
                            </div>
                            <div class="card-body">
                                <h3>Networking Engineer</h3>
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
                    <button type="button" class="btn btn-pink btn-lg">Load more listings</button>
                </div>
            </div>
        </div>
    </section>
    <section class="section virtual-price">
        <div class="container">
            <div class="assistant-agency pricing_comp">
                <h2>REMOTE WORKER VS VIRTUAL<br> ASSISTANT PRICING</h2>
                <div class="virtual_logo">
                    <img src="{{ url()->asset('public/images/newdesign/New-Logo-Main-Index-(Updated) 3.png') . getPictureVersion() }}">
                </div>
                <div class="container container-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p class="mb-0">
                                Is there a difference? This will depend largely on how your team classifies the open position. That's why many HR teams choose to create virtual assistant pricing packages that will have varying pay rates for specific job duties. Things you will want to consider when building your pricing packages will include:</p>
                            <ul>
                                <li><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="12" height="12" fill="#2B8572" /></svg><span>Skills required</span>
                                </li>
                                <li>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="12" height="12" fill="#2B8572" /></svg><span>Education level</span>
                                </li>
                                <li>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="12" height="12" fill="#2B8572" /></svg><span>Previous experience</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p>Each of these factors will play a crucial role in determining your remote worker/virtual assistant pricing. Other things worth considering include the cost of additional equipment (like a supplies stipend for additional equipment the worker needs), both the company's and worker’s physical location as the standard pay rates can differ significantly, current market trends, among others. </p>
                        </div>
                    </div>
                </div>
                <div class="container container-3">
                    <p><b>How to Determine Virtual Assistant Pricing? </b></p>
                    <p>Once you have your virtual assistant pricing down, it is time to post your job opening. Virtual Workers makes it simple for recruiters to list their job openings. </p>
                    <p class="mb-0"> The first step in the process is to register for your recruiter account. Once you have done that, you will be able to set up your job listing. Things to include in your listing will include:</p>
                    <ul>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Your company information, including contact information and website</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>The job category</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Job/Position title</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Job Type – full-time, part-time, internship, etc.</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Required knowledge/skills</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Additional abilities</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Education</span>
                        </li>
                        <li>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="12" height="12" fill="#2B8572" /></svg><span>Expected experience required</span>
                        </li>
                    </ul>
                    <p>Once you have filled out the entire form, you will be able to post, and your job opening will go live on the Virtual Workers job board. This will make it searchable for those looking for remote work in your company’s industry.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="whats-happens">
        <div class="container">
            <h2>What Happens Next?</h2>
            <div class="assistant-agency">
                <button>Ready to post your company's job opportunity? <br>Then register today to get started!</button>
            </div>
        </div>
    </div>
    <div class="benefit find_assistant commonsec-abovefooter">
        <div class="container container-3">
            <h2>Find Your Ideal Virtual Assistant or Remote Worker Today</h2>
            <p>When looking for your ideal candidate for any given position, there are multitudes of factors worth considering. However, things start to look slightly different once you go from hiring an in-office worker to hiring a remote worker.<br>
                Before posting any job listing online, you should take adequate time to talk with both your management and HR teams and determine what type of worker is ideal for the position, what skill sets they require, and what experience and/or education is required. Only then can you make a proper salary offer. </p>
        </div>
    </div>
    @endsection