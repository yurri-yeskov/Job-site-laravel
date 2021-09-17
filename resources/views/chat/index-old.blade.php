@extends('layouts.workers-master')
@section('content')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-md-3 col-sm-12">
                    <h1 class="h3 mb-0 page-title">Chat</h1>
                </div>
                <div class="offset-md-6 col-md-3 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-3 p-3">
                    <table class="table">
                        <tr>
                            <td>
                                <img class="chat-user-image" src="{{asset('img/user-image.png')}}" alt="">
                            </td>
                            <td>
                                <span>Lord Dudly</span>
                                <p class="dashboard-chat-text m-0">
                                    <span class="dashboard-chat-status mr-1"></span>Active now
                                </p>
                            </td>
                            <td>
                                <a class="nav-link" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="{{asset('icons/bell.png')}}" alt="">
                                    <span class="badge badge-danger badge-counter">1</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback chat-search"></span>
                                    <input type="text" class="form-control chat-input rounded-input bg-white"
                                        placeholder="Search...">
                                </div>
                            </td>
                        </tr>
                    </table>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Group</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#references" role="tab" data-toggle="tab">Contacts</a>
                        </li>
                    </ul>

                    <p class="recent-list">Recent</p>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                            <table class="table receipent-listing">
                                <tr class="active">
                                    <td>
                                        <span class="dashboard-chat-status"></span>
                                    </td>
                                    <td>
                                        <img class="chat-user-image" src="{{asset('img/user-image.png')}}" alt="">
                                    </td>
                                    <td>
                                        <p class="receipent-name">Steven Franklin</p>
                                        <p class="receipent-designation">Your Network</p>
                                    </td>
                                    <td style="width: 21%;">
                                        <span class="active-time">05 min</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="dashboard-chat-status"></span>
                                    </td>
                                    <td>
                                        <img class="chat-user-image" src="{{asset('img/user1.png')}}" alt="">
                                    </td>
                                    <td>
                                        <p class="receipent-name">Adam Miller</p>
                                        <p class="receipent-designation">Google LTT</p>
                                    </td>
                                    <td style="width: 21%;">
                                        <span class="active-time">12 min</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="dashboard-chat-status"></span>
                                    </td>
                                    <td>
                                        <img class="chat-user-image" src="{{asset('img/user2.png')}}" alt="">
                                    </td>
                                    <td>
                                        <p class="receipent-name">Keith Gonzales</p>
                                        <p class="receipent-designation">OTA PTY LTD</p>
                                    </td>
                                    <td style="width: 21%;">
                                        <span class="active-time">24 min</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="dashboard-chat-status"></span>
                                    </td>
                                    <td>
                                        <img class="chat-user-image" src="{{asset('img/user3.png')}}" alt="">
                                    </td>
                                    <td>
                                        <p class="receipent-name">Steven Franklin</p>
                                        <p class="receipent-designation">Your Network</p>
                                    </td>
                                    <td style="width: 21%;">
                                        <span class="active-time">01 hr</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="dashboard-chat-status"></span>
                                    </td>
                                    <td>
                                        <img class="chat-user-image" src="{{asset('img/user1.png')}}" alt="">
                                    </td>
                                    <td>
                                        <p class="receipent-name">Adam Miller</p>
                                        <p class="receipent-designation">Google LTT</p>
                                    </td>
                                    <td style="width: 21%;">
                                        <span class="active-time">12 min</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="dashboard-chat-status"></span>
                                    </td>
                                    <td>
                                        <img class="chat-user-image" src="{{asset('img/user2.png')}}" alt="">
                                    </td>
                                    <td>
                                        <p class="receipent-name">Keith Gonzales</p>
                                        <p class="receipent-designation">OTA PTY LTD</p>
                                    </td>
                                    <td style="width: 21%;">
                                        <span class="active-time">24 min</span>
                                    </td>
                                </tr>


                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="buzz">bbb</div>
                        <div role="tabpanel" class="tab-pane fade" id="references">ccc</div>
                    </div>


                </div>
                <div class="col-md-9">
                    <div class="card shadow mb-4 bg-white">
                        <div class="card-header py-3 chat-bottom-border">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="social-source chat-title">Steven Franklin</h6>
                                    <p class="dashboard-chat-text m-0"><span
                                            class="dashboard-chat-status mr-1"></span>Active
                                        now</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <i class="search chat-header-icons" aria-hidden="true"></i>
                                    <i class="gear chat-header-icons" aria-hidden="true"></i>
                                    <i class="dots chat-header-icons" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
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
                                    <div class="col-md-10">
                                        <input type="text" name="send_message"
                                            class="form-control chat-input rounded-input"
                                            placeholder="Enter Message...">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <button class="chat-send-btn rounded-button">Send<img class="pl-2"
                                                src="{{asset('icons/chat-send.png')}}" alt=""></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->
        <div class="container">
            <div class="row">
                <div class="card-body" id="app" style="margin-bottom: 40px;">
                    <template>
                        <chat-app :user="{{ auth()->user() }}"></chat-app>
                    </template>
                </div>
            </div>
        </div>
        @endsection