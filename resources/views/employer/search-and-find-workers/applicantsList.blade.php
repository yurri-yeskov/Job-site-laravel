@extends('layouts.employer-master')
@section('content')

<div class="main-container">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-12">
                <h1 class="h3 mb-0 page-title">All Applicants </h1>
            </div>
            <div class="offset-md-6 col-md-3 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/company/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- search form -->

        <!--  form end -->

        <div class="row">
            <div class="col-lg-12 col-md-12" style="margin-top: 26px;">


              
            </div>
        </div>
    </div>
</div>

@endsection

@section('after_styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">

<link href="/css/map_style.css" rel="stylesheet" />
<link href="/css/employer_dashboard.css" rel="stylesheet" />

@endsection



@section('after_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA_J5AWTo2q7FPPKNdeQr1-ZEG_5Cg1FD8&libraries=places"></script>
<script type="text/javascript" src="/js/richmarker-compiled.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

@endsection