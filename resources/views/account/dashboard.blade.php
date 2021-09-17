@extends('layouts.workers-master')
@section('content')
<!-- Begin emoji-picker Stylesheets -->
<link href="{{asset('workers_dashboard/lib/css/emoji.css')}}" rel="stylesheet" />

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid py-4">

            <!-- Page Heading -->
            <h1 class="dashboard-title">DASHBOARD</h1>
            <div class="d-sm-flex align-items-center justify-content-between mb-2"></div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-4 welcome-back-section">
                    <div class="row dashboard-img-card">
                        <div class="col-md-6">
                            <h1 class="welcome-title">Welcome Back !</h1>
                            <p class="welcome-sub-title">Workers Dashboard</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <img src="{{asset('img/dashboard-user.png')}}" alt="">
                        </div>
                    </div>
                    <div class="row welcome-back-info mb-4">
                        <div class="col-md-4">
                            <div class="user-image"></div>
                            <img class="user-image" src="{{asset('img/user-image.png')}}" alt="">
                            <p class="user-name">Henry Price</p>
                            <p class="designation">UI / UX Designer</p>
                        </div>
                        <div class="col-md-4">
                            <p class="pt-3 project-counts">125</p>
                            <p class="project-titles">Projects</p>
                            <button class="btn btn-view-profile">View Profile <i class="fas fa-fw"><img class=""
                                        src="{{asset('icons/right-arrow.png')}}" alt=""></i></button>
                        </div>
                        <div class="col-md-4">
                            <p class="pt-3 revenue-count">$1245</p>
                            <p class="revenue-title">Revenue</p>
                        </div>
                    </div>
                    <div class="profile-progress-bar mb-4">
                        <div class="profile-cpmpleted-section">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="profile-title">Profile Completed</p>
                                    <p class="profile-description">Complete your profile.</p>
                                    <p class="profile-description">This will give a better chances are attracting the
                                        job you deserve. </p>
                                    <p><button class="btn btn-view-profile mt-4">Complete Profile <i
                                                class="fas fa-fw"><img class="" src="{{asset('icons/right-arrow.png')}}"
                                                    alt=""></i></button></p>

                                </div>
                                <div class="col-md-6 progress-bar-section text-center mb-2">
                                    <img class="progress-bar-img" src="{{asset('icons/progress-bar.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 count-section">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="dashboard-cards">
                                <div class="card count-card h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-8 text-left">
                                                <div class="text-xs card-title">Your Network</div>
                                                <div class="count-number">1,693</div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="helper"></div>
                                                <div class="card-circle-background">
                                                    <img class="counter-img" src="{{asset('icons/network.png')}}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-cards">
                                <div class="card count-card h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-8 text-left">
                                                <div class="text-xs card-title">Shortlisted Jobs</div>
                                                <div class="count-number">1,693</div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-circle-background">
                                                    <span class="helper"></span>
                                                    <img class="counter-img"
                                                        src="{{asset('icons/short-list-white.png')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-cards">
                                <div class="card count-card h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-8 text-left">
                                                <div class="text-xs card-title">Applied Jobs</div>
                                                <div class="count-number">1,693</div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-circle-background">
                                                    <span class="helper"></span>
                                                    <img class="counter-img"
                                                        src="{{asset('icons/applied-jobs-white.png')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashboard-cards">
                                <div class="card count-card h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-8 text-left">
                                                <div class="text-xs card-title">Job Alerts</div>
                                                <div class="count-number">1,693</div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-circle-background">
                                                    <span class="helper"></span>
                                                    <img class="counter-img" src="{{asset('icons/alerts.png')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="dashboard-cards">
                                <div class="card count-card h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-8 text-left">
                                                <div class="text-xs card-title">Messages</div>
                                                <div class="count-number">1,693</div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-circle-background">
                                                    <span class="helper"></span>
                                                    <img class="counter-img" src="{{asset('icons/messages-white.png')}}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 map-section p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="map-content">
                                    <p class="profile-views">Profile Views</p>
                                    <p class="this-month">This month</p>
                                    <p class="month-count">1453</p>
                                    <p class="last-month">Last Month</p>
                                    <p class="last-month-count">2281</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="map-view">
                                    <div id="chartContainer" style="height: 275px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="social-source">Social Source</h6>
                        </div>
                        <div class="px-3 text-center">
                            <img class="facebook-icon " src="{{asset('icons/facebook.png')}}" alt="">
                        </div>
                        <div class="p-3 text-center">
                            <span class="facebook-icon-text">Facebook -</span><span class="facebook-icon-count">125
                                sales</span>
                        </div>
                        <p class="px-3 social-source-description">Maecenas nec odio et ante tincidunt tempus. Donec
                            vitae sapien ut libero
                            venenatis faucibus tincidunt.</p>
                        <p class="text-center"><a class="learn-more-link " href="">Learn More <i
                                    class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                        <div class="row p-2">
                            <div class="col-md-4">
                                <div class="p-2 text-center">
                                    <img class="facebook-white-icon" src="{{asset('icons/facebook-white.png')}}" alt="">
                                    <p class="social-labels">Facebook</p>
                                    <span class="social-sales">125 sales</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2 text-center">
                                    <img class="twitter-white-icon" src="{{asset('icons/twitter-white.png')}}" alt="">
                                    <p class="social-labels">Twitter</p>
                                    <span class="social-sales">112 sales</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2 text-center">
                                    <img class="insta-white-icon" src="{{asset('icons/instagram-white.png')}}" alt="">
                                    <p class="social-labels">Instagram</p>
                                    <span class="social-sales">104 sales</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="notification-header">
                            <h6 class="social-source">Notifications</h6>
                            <p class="w-50 float-left activity-text m-0">Activity</p>
                            <p class="w-50 float-right text-right m-0"><i class="fa fa-ellipsis-h"
                                    aria-hidden="true"></i>
                            </p>
                        </div>
                        <div class="px-3">
                            <table class="notification-table">
                                <tr>
                                    <td class="vertically-top">
                                        <img class="notification-arrow" src="{{asset('icons/blue-arrow.png')}}" alt="">
                                    </td>
                                    <td class="vertically-top noti-date">
                                        <span class="notification-date">10 Nov</span>
                                    </td>
                                    <td class="vertically-top">
                                        <img class="content-arrow mr-2" src="{{asset('icons/blue-right-arrow.png')}}"
                                            alt="">
                                    </td>
                                    <td>
                                        <span class="notification-detail">Posted <strong>Beautiful Day with
                                                Friends</strong>
                                            blog... </span><a class="notification-link" href="">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vertically-top">
                                        <i class="fa fa-arrow-circle-o-right notification-arrow" aria-hidden="true"></i>
                                    </td>
                                    <td class="vertically-top noti-date">
                                        <span class="notification-date">08 Nov</span>
                                    </td>
                                    <td class="vertically-top">
                                        <img class="content-arrow mr-2" src="{{asset('icons/blue-right-arrow.png')}}"
                                            alt="">
                                    </td>
                                    <td>
                                        <span class="notification-detail">If several languages coalesce, the grammar
                                            of
                                            the
                                            resulting...</span><a class="notification-link" href="">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vertically-top">
                                        <i class="fa fa-arrow-circle-o-right notification-arrow" aria-hidden="true"></i>
                                    </td>
                                    <td class="vertically-top noti-date">
                                        <span class="notification-date">02 Nov</span>
                                    </td>
                                    <td class="vertically-top">
                                        <img class="content-arrow mr-2" src="{{asset('icons/blue-right-arrow.png')}}"
                                            alt="">
                                    </td>
                                    <td>
                                        <span class="notification-detail">Create <strong> Drawing a sketch
                                                blog</strong></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vertically-top">
                                        <i class="fa fa-arrow-circle-o-right notification-arrow" aria-hidden="true"></i>
                                    </td>
                                    <td class="vertically-top noti-date">
                                        <span class="notification-date">24 Oct</span>
                                    </td>
                                    <td class="vertically-top">
                                        <img class="content-arrow mr-2" src="{{asset('icons/blue-right-arrow.png')}}"
                                            alt="">
                                    </td>
                                    <td>
                                        <span class="notification-detail">In enim justo, rhoncus ut, imperdiet a
                                            venenatis vitae</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="text-center mt-5">
                            <button class="btn view-more">View More <i class="fas fa-fw"><img class=""
                                        src="{{asset('icons/right-arrow.png')}}" alt=""></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4 chat-section">
                        <div class="card-header py-3 chat-bottom-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="social-source chat-title">Steven Franklin</h6>
                                    <p class="dashboard-chat-text m-0"><span class="dashboard-chat-status"></span>Active
                                        now</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <i class="search chat-header-icons" aria-hidden="true"></i>
                                    <i class="gear chat-header-icons" aria-hidden="true"></i>
                                    <i class="dots chat-header-icons" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-2 messages-section">
                            <table style="width: 100%;">
                                <tr>
                                    <td class="chat-border-line">
                                        <p class="border-bottom"></p>
                                    </td>
                                    <td>
                                        <p class="text-center">Today</p>
                                    </td>
                                    <td class="chat-border-line">
                                        <p class="border-bottom"></p>
                                    </td>
                                </tr>
                            </table>
                            <div class="col-md-12 incoming-section">
                                <div class="w-75 incoming-msg">
                                    <p class="dashboard-username">Steven Franklin</p>
                                    <p class="msg-text">Hello!</p>
                                    <p class="msg-datetime"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>10:00
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 outgoing-section text-right">
                                <div class="w-75 outgoing-msg">
                                    <p class="dashboard-username">Henry Wells</p>
                                    <p class="msg-text">Hi, How are you? What about our next meeting?</p>
                                    <p class="msg-datetime"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>10:02
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-header py-3 chat-top-border">
                            <form class="w-100 m-0" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" id="send_messages" name="send_message"
                                            class="form-control chat-input" placeholder="Enter Message..."
                                            data-emojiable="true">
                                        <i class="fa fa-file-image-o file-uploader" aria-hidden="true"></i>
                                        <i class="fa fa-file-text-o file-uploader" aria-hidden="true"></i>
                                        <input type="file" id="imgupload" style="display:none" />
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button class="chat-send-btn">Send<img class="pl-2"
                                                src="{{asset('icons/chat-send.png')}}" alt=""></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <h6 class="m-0 text-light-black font-18">Job Applied Recently</h6>
                                </div>
                                <div class="col-md-7">
                                    <i id="show-hidden-menu" class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3 hidden-menu">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box dark-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Recruiting Coordinator
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>Catalyst</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill font-13 badge-primary">Full Time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3 hidden-menu">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box light-green-box"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Senior Product Designer
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Upwork</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill font-13 badge-primary">Part Time</span>
                                        <span class="badge badge-pill font-13 badge-success">Private</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3 hidden-menu">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box navy-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Software Engineer (Android), Libraries
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Segment</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill font-13 badge-primary">Full Time</span>
                                        <span class="badge badge-pill font-13 badge-success">Private</span>
                                        <span class="badge badge-pill font-13 badge-warning">Urgent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-6">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 text-black font-18">Your Refrees</h6>
                        </div>
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box dark-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Recruiting Coordinator
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Catalyst</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill font-13 badge-primary">Full Time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box light-green-box"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Senior Product Designer
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Upwork</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill font-13 badge-primary">Part Time</span>
                                        <span class="badge badge-pill font-13 badge-success">Private</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box navy-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Software Engineer (Android), Libraries
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Segment</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Full Time</span>
                                        <span class="badge badge-pill badge-success font-13">Private</span>
                                        <span class="badge badge-pill badge-warning font-13">Urgent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="m-0 text-black font-18">Your Job Referals Received</h6>
                                </div>
                                <div class="col-md-6">
                                    <i id="show-hidden-menu1" class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card m-3 hidden-menu1">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box dark-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Recruiting Coordinator
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Catalyst</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Full Time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3 hidden-menu1">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box light-green-box"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Senior Product Designer
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Upwork</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Part Time</span>
                                        <span class="badge badge-pill badge-success font-13">Private</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3 hidden-menu1">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box navy-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Software Engineer (Android), Libraries
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Segment</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Full Time</span>
                                        <span class="badge badge-pill badge-success font-13">Private</span>
                                        <span class="badge badge-pill badge-warning font-13">Urgent</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 text-black font-18">Job Referals Sent</h6>
                        </div>
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box dark-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Recruiting Coordinator
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Catalyst</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Full Time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box light-green-box"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Senior Product Designer
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Upwork</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Part Time</span>
                                        <span class="badge badge-pill badge-success font-13">Private</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 col-md-2">
                                    <p class="color-card-box navy-blue"></p>
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10 mb-4 card-detail">
                                    <div class="mt-4 font-18 text-black">
                                        Software Engineer (Android), Libraries
                                    </div>
                                    <div id="div_top_hypers">
                                        <ul id="ul_top_hypers">
                                            <li class="mr-2"><svg class="mr-2" width="18" height="16"
                                                    viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.4727 3.23584H12.7046V2.1879C12.7046 1.01379 11.7494 0.0585938 10.5753 0.0585938H7.42475C6.25068 0.0585938 5.29545 1.01379 5.29545 2.1879V3.23584H0.527344C0.236109 3.23584 0 3.47195 0 3.76318V13.3433C0 14.7754 1.16511 15.9404 2.59717 15.9404H15.4028C16.8349 15.9404 18 14.7754 18 13.3433V3.76318C18 3.47195 17.7639 3.23584 17.4727 3.23584ZM10.1965 10.1177C10.1965 10.7775 9.65974 11.3142 9 11.3142C8.34026 11.3142 7.80346 10.7775 7.80346 10.1177V8.92113H10.1965V10.1177ZM10.7239 7.86645H7.27611C6.98488 7.86645 6.74877 8.10255 6.74877 8.39379V9.35169C3.68216 8.68611 1.38333 6.69704 1.08756 4.29053H16.9124C16.6166 6.69704 14.3178 8.68611 11.2512 9.35173V8.39382C11.2512 8.10256 11.0151 7.86645 10.7239 7.86645ZM6.3501 2.1879C6.3501 1.59534 6.8322 1.11328 7.42472 1.11328H10.5752C11.1678 1.11328 11.6499 1.59534 11.6499 2.1879V3.23584H6.35006V2.1879H6.3501ZM16.9453 13.3433C16.9453 14.1938 16.2533 14.8857 15.4028 14.8857H2.59717C1.74667 14.8857 1.05469 14.1938 1.05469 13.3433V7.01C1.48043 7.6188 2.02936 8.18099 2.69251 8.67834C3.84166 9.5402 5.24457 10.1386 6.77141 10.4338C6.92561 11.5259 7.86596 12.3689 9 12.3689C10.134 12.3689 11.0744 11.5259 11.2286 10.4338C12.7554 10.1386 14.1583 9.5402 15.3075 8.67834C15.9706 8.18099 16.5196 7.61877 16.9453 7.01V13.3433Z"
                                                        fill="#696969" />
                                                </svg>
                                                Segment</li>
                                            <li class="mr-2"><svg class="mr-2" width="14" height="17"
                                                    viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z"
                                                        fill="#696969"></path>
                                                </svg> London, UK</li>
                                            <li class="mr-2"><i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                                11
                                                hours
                                                ago</li>
                                            <li class="mr-2"><svg class="mr-2" width="20" height="18"
                                                    viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z"
                                                        fill="#696969"></path>
                                                    <path
                                                        d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z"
                                                        fill="#696969"></path>
                                                </svg> $35k - $45k</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-primary font-13">Full Time</span>
                                        <span class="badge badge-pill badge-success font-13">Private</span>
                                        <span class="badge badge-pill badge-warning font-13">Urgent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-5">
                                    <h6 class="m-0 text-black font-18">View Heatmaps</h6>
                                </div>
                                <div class="col-md-7">
                                    <i id="show-hidden-menu2" class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <span class="hidden-menu2">
                            <div class="m-3">
                                <p class="font-18 text-blue">Check where employers have been paying attention to
                                    your
                                    resume profile
                                    online</p>
                                <div class="row">
                                    <div class="col-12 text-center mb-3">
                                        <button type="button" class="heat-maps-btn">Click Here for
                                            Heat Maps</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <img class="img-responsive w-100"
                                            src="{{asset('img/Eyetracking_heat_map.png')}}" alt="heat-maps">
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    @endsection
    <?php

$dataPoints = array(
   array("x" => 1 , "y" => 30),
   array("x" => 2 , "y" => 40),
   array("x" => 3 , "y" => 35),
   array("x" => 4 , "y" => 50),
   array("x" => 5 , "y" => 48),
   array("x" => 6 , "y" => 70),
   array("x" => 7 , "y" => 68),
   array("x" => 8 , "y" => 56),
   array("x" => 9 , "y" => 59),
   array("x" => 10 , "y" => 68),
   array("x" => 11 , "y" => 80),
   array("x" => 12 , "y" => 65),
   array("x" => 13 , "y" => 70),
   array("x" => 14 , "y" => 75)
);

?>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            // theme: "light2",
            title: {
                text: ""
            },
            axisX: {
                valueFormatString: ""
            },
            axisY: {
                title: "",
                includeZero: true,
                maximum: 100
            },
            data: [{
                type: "splineArea",
                color: "#6599FF",
                xValueType: "text",
                xValueFormatString: "",
                yValueFormatString: "#,##0 Visits",
                dataPoints: <?php echo json_encode($dataPoints); ?>
            }]
        });
        chart.render();
    }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>