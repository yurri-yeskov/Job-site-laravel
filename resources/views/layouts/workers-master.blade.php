<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Workers </title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Custom fonts for this template-->
    <link href="{{asset('workers_dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet"
        type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Varela+Round" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link rel="stylesheet" href="{{asset('workers_dashboard/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{asset('workers_dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('workers_dashboard/css/select2.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this page only-->
    <link href="{{ asset('workers_dashboard/css/custom.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('workers_dashboard/css/bootstrap-slider.css') }}" /> -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3"><img src="{{asset('logo/Logo-white.png')}}"
                        class="img img-responsive img-logo d-xs-none" alt=""></div>
            </a>

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <i class="fas fa-fw">
                        <img style="margin-bottom: -32px;" src="{{asset('icons/dashboard-2.png')}}" alt="">
                        <img src="{{asset('icons/dashboard.png')}}" alt="">
                    </i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw"><img src="{{asset('icons/my-profile.png')}}" alt=""></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNetwork"
                    aria-expanded="true" aria-controls="collapseNetwork">
                    <i class="fas fa-fw"><img src="{{asset('icons/my-network.png')}}" alt=""></i>
                    <span>My Network</span>
                </a>
                <div id="collapseNetwork" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">All Connections</a>
                        <a class="collapse-item" href="#">Connection Requests</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResume"
                    aria-expanded="true" aria-controls="collapseResume">
                    <i class="fas fa-fw"><img src="{{asset('icons/resume.png')}}" alt=""></i>
                    <span>Resume Manager</span>
                </a>
                <div id="collapseResume" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Resume Sent Outs</a>
                        <a class="collapse-item" href="#">Referal Manager</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJob"
                    aria-expanded="true" aria-controls="collapseJob">
                    <i class="fas fa-fw"><img src="{{asset('icons/job.png')}}" alt=""></i>
                    <span>Jobs Management</span>
                </a>
                <div id="collapseJob" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Search Jobs</a>
                        <a class="collapse-item" href="#">My Applied Jobs</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('message-chat') }}">
                    <i class="fas fa-fw">
                        <img src="{{asset('icons/message-2.png')}}" style="margin-bottom: -15px;margin-left: 6px;"
                            alt="">
                        <img src="{{asset('icons/chat-message.png')}}" alt="">
                    </i>
                    <span>Messages and Chat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw"><img src="{{asset('icons/rewards.png')}}" alt=""></i>
                    <span>Your Rewards</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw"><img src="{{asset('icons/tech-spcs.png')}}" alt=""></i>
                    <span>Your Tech Specs</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw"><img src="{{asset('icons/billing.png')}}" alt=""></i>
                    <span>Billing</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw"><img src="{{asset('icons/administration.png')}}" alt=""></i>
                    <span>Administration</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">
                    <i class="fas fa-fw"><img src="{{asset('icons/setting.png')}}" alt=""></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="text-center d-none d-md-inline ml-3">
                        <i class="fa fa-bars" id="sidebarToggle"></i>
                        <!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
                    </div>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control header-search" placeholder="Search...">
                            <!-- <span class="ml-md-3 mega-menu">Mega Menu</span> <i class="fas fa-fw"><img
                                    src="{{asset('icons/down-arrow.png')}}" alt=""></i> -->
                        </div>
                        <!-- <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div> -->
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('icons/flag.png')}}" alt="">
                            </a>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="fas fa-bell fa-fw"></i> -->
                                <img src="{{asset('icons/boxes.png')}}" alt="">
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="fas fa-bell fa-fw"></i> -->
                                <img src="{{asset('icons/box.png')}}" alt="">
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('icons/bell.png')}}" alt="">
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">3</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle mr-2" src="{{asset('img/user-bg.png')}}">
                                <span class="d-none d-lg-inline text-gray-600 small mr-1">Henry</span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <i class="fas fa-fw ml-3"><img src="{{asset('icons/setting.png')}}" alt=""></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                @yield('content')
                <!-- Footer -->
                <footer class="sticky-footer">
                    <div class="row">
                        <div class="col-md-6 my-auto copy-right-section">
                            <div class="copyright ml-4">
                                <span>© {{date('Y')}} VirtualWorkers.pH</span>
                            </div>
                        </div>
                        <div class="col-md-6 copy-right-content">
                            <div class="copyright developed-by text-right mr-4">
                                <span class="footer-text">Design & Develop by virtualworkers.ph</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up mt-2"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('workers_dashboard/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('workers_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{asset('workers_dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset('workers_dashboard/js/sb-admin-2.min.js')}}"></script>
        <!-- Page level plugins -->
        <!-- <script src="{{asset('workers_dashboard/vendor/chart.js/Chart.min.js')}}"></script> -->
        <!-- input mask -->
        <!-- <script src="{{asset('workers_dashboard/js/jquery.mask.min.js')}}"></script> -->
        <!-- Page level custom scripts -->
        <!-- <script src="{{asset('workers_dashboard/js/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('workers_dashboard/js/demo/chart-pie-demo.js')}}"></script> -->
        <script src="{{asset('workers_dashboard/js/select2.min.js')}}"></script>
        <!-- <script src="{{asset('workers_dashboard/js/bootstrap-slider.js')}}"></script> -->
        <script>
        $(document).ready(function() {
            $('.auth_username').html("{{auth()->user()->name}}");
            // $('#phone-number').mask('0-000-000-0000');
            $('.js-example-basic-multiple').select2();
            /* $('#ex1').slider({
                formatter: function(value) {
                    return '₱ ' + value;
                }
            }); */

            // hide dashboard div
            $('#show-hidden-menu').click(function() {
                $('.hidden-menu').slideToggle("slow");
            });
            $('#show-hidden-menu1').click(function() {
                $('.hidden-menu1').slideToggle("slow");
            });
            $('#show-hidden-menu2').click(function() {
                $('.hidden-menu2').slideToggle("slow");
            });
        });
        </script>
        <!-- Begin emoji-picker JavaScript -->
        <script src="{{ asset('workers_dashboard/lib/js/config.js') }}"></script>
        <script src="{{ asset('workers_dashboard/lib/js/util.js') }}"></script>
        <script src="{{ asset('workers_dashboard/lib/js/jquery.emojiarea.js') }}"></script>
        <script src="{{ asset('workers_dashboard/lib/js/emoji-picker.js') }}"></script>
		<script src="{{ asset('/js/admin-resume.js') }}"></script>
        <!-- End emoji-picker JavaScript -->

        <script>
        $(function() {
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '../workers_dashboard/lib/img/',
                popupButtonClasses: 'fa fa-smile-o'
            });
            window.emojiPicker.discover();
        });
        $('.file-uploader').click(function() {
            $('#imgupload').trigger('click');
        });

        // forgot password ajax
        $("#submit-forgotpassword").on('click', function() {
            var email = $("#forgotpassword_email").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{url("account/password/email")}}',
                data: {
                    email: email
                },
                success: function(data) {
                    alert('success');
                    // $("#msg").html(data.msg);
                }
            });
        });
        // end forgot password
        </script>
</body>

</html>