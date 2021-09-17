@extends('layouts.workers-master')
@section('content')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<style>
.card-body {
    background: unset !important;
}

.feed {
    background: #fff !important;
}

.card-body {
    box-shadow: unset;
}
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- End of Main Content -->
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
            <div class="row">
                <div class="card-body" id="app" style="margin-bottom: 40px;">
                    <template>
                        <chat-app :user="{{ auth()->user() }}"></chat-app>
                    </template>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 p-3">

                </div>
                <div class="col-md-9">
                    <button type="submit" class="chat-employer-messages-btn">Click HERE to VIEW
                        EMPLOYERS
                        Messages to YOU</button>
                    <div class="card chat-box-shadow mb-4 bg-white blur-section">
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
        @endsection
        <script>

        </script>