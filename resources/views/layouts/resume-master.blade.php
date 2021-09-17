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

	<link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" />
	
   
	

    <!-- Custom styles for this page only-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
	
    

    <link href="{{ asset('css/builder-style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('workers_dashboard/css/bootstrap-slider.css') }}" />

	<link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
	 <link href="{{asset('/css/select2.min.css')}}" rel="stylesheet" />
	 
	  <script src="{{asset('workers_dashboard/vendor/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('workers_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->

        <script src="{{asset('workers_dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->

        <script src="{{asset('workers_dashboard/js/sb-admin-2.min.js')}}"></script>
		
		   <!-- Bootstrap core JavaScript-->		
		  <script src="{{asset('js/bootstrap.min.js')}}"></script>
		  
		  <script src="{{asset('js/jquery.validate.js')}}"></script> 
<script src="{{asset('workers_dashboard/js/select2.min.js')}}"></script>		  
		  
	
	
</head>



<body>	
			<!--START HEADER-->
			<!--<section class="top_header">              
				<div class="container pr-5 pl-5">
					<div class="row">
						<div class="col-lg-12">
							 <div class="logo">
								 <img src="{{ url()->asset('public/images/builder/logo.png') }}" class="img-fluid">
							 </div>
							 
						</div>
						<div class="col-lg-1">
							 
						</div>
						<div class="col-lg-9">
							 <p>Create a FREE Resume and give yourself the best possible chance of employment</p>
						</div>
						<div class="col-lg-2">
							
						</div>
						<div class="col-lg-1 col-sm-1">						
							 <div class="arrow">
								<div class="arrow_txt">
								  <p>You are here</p>
								</div>
								<div class="arrow_img">
								 <img src="{{ url()->asset('public/images/builder/arrow.png') }}" class="img-fluid"></div>													 							 
							 </div>
						</div>
						<div class="col-lg-9 col-sm-9">						
							 <div class="progress">
								 <div class="progress-bar bg-success" role="progressbar" style="width: 75px" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100">Step 1</div></li>													 							 
							 </div>
						</div>
						<div class="col-lg-2 col-sm-2 offer">
							 <h5>Receive job offers</h5>
						</div>
						<div class="col-lg-12">
							 <div class="process">
								<ul>
									<li><a href="#">Choose a Template</a></li>
									<li><a href="#">Enter Details</a></li>
									<li><a href="#">Edit Your Template</a></li>
									<li><a href="#">Edit Your Template</a></li>
								</ul>
							 </div>
						</div>
					</div>
				</div>               
			</section>-->
        <!--END HEADER-->
		  <!--START HEADER-->
        <section class="header">              
			<div class="container-fluid pr-xl-5 pl-xl-5">
				<div class="row">
					<div class="col-lg-12">
						 <div class="logo">
							 <img src="{{ url()->asset('public/images/builder/logo.png') }}" class="img-fluid">
					     </div>
						 
					</div>					
				</div>
			</div>               
        </section>

                @yield('content')

                <!-- Footer -->
				<!--START COPYRIGHT-->
				<section class="copyright">              
					<div class="container-fluid pr-xl-5 pl-xl-5">
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="copy_left">
									<p>2021 © virtualworkers.ph</p>
								</div>						
							</div>					
							<div class="col-lg-6 col-sm-6 col-12">						
								<div class="copy_right">
									<p>Design & Develop by virtualworkers.ph</p>
								</div>
							</div>
						</div>
					</div>               
				</section>
				 
         


     

       
        <!-- Page level plugins -->

        <!-- <script src="{{asset('workers_dashboard/vendor/chart.js/Chart.min.js')}}"></script> -->

        <!-- input mask -->

        <script src="{{asset('workers_dashboard/js/jquery.mask.min.js')}}"></script>

        <!-- Page level custom scripts -->

        <!-- <script src="{{asset('workers_dashboard/js/demo/chart-area-demo.js')}}"></script>

        <script src="{{asset('workers_dashboard/js/demo/chart-pie-demo.js')}}"></script> -->

        

        <script src="{{asset('workers_dashboard/js/bootstrap-slider.js')}}"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script>

        $(document).ready(function() {

            $('#phone-number').mask('0-000-000-0000');

            $('.js-example-basic-multiple').select2();

            $('#ex1').slider({

                formatter: function(value) {

                    return '₱ ' + value;

                }

            });



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
		
		<script src="{{ asset('/js/resume-builder.js') }}"></script>
		
		

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
		<script>
		$('.profile-image').on('click', function() {
			$('.profile-image-upload').click();
		});
		
		@if (isset($errors) and $errors->any())
			@if ($errors->any() and old('historyModalForm')=='1')
				$('#employ_modal').modal('show');
			@endif
		@endif
		
		@if (isset($errors) and $errors->any())
			@if ($errors->any() and old('educationModalForm')=='1')
				$('#employ_modal1').modal('show');
			@endif
		@endif
		 $('.dtpiker').datepicker({
    	format: 'mm/dd/yyyy'
    	
    });
		</script>
 @stack('scripts')
</body>



</html>