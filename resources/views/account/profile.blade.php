@extends('layouts.employer-master')
@section('content')
<!-- Begin emoji-picker Stylesheets -->
<link href="{{asset('workers_dashboard/lib/css/emoji.css')}}" rel="stylesheet" />
<?php
$industries = '';
$specialities_seleceted = '';
$compnyname = '';
$team_size = '';
$founded_year = '';
$map_lat = '';
$map_lng = '';
$map_place_id = '';
$logo = '';
$description = '';
$address = '';
$totalFiled = 8;
$totalFilled = 0;
$isCompanyExist = "no";
if ($companyProfile != null && $companyProfile != '') {
    $isCompanyExist = "yes";
    $industries = $companyProfile->industries;
    $totalFilled = $industries ? $totalFilled + 1 : $totalFilled; // check field

    $specialities_seleceted = $companyProfile->specialities;
    $totalFilled = $specialities_seleceted ? $totalFilled + 1 : $totalFilled; // check field

    $compnyname = $companyProfile->name;
    $totalFilled = $compnyname ? $totalFilled + 1 : $totalFilled; // check field

    $team_size = $companyProfile->team_size;
    $totalFilled = $team_size ? $totalFilled + 1 : $totalFilled; // check field

    $founded_year = $companyProfile->founded_year;
    $totalFilled = $founded_year ? $totalFilled + 1 : $totalFilled; // check field

    $map_lat = $companyProfile->map_lat;
    $map_lng = $companyProfile->map_lng;
    $map_place_id = $companyProfile->map_place_id;
    $logo = $companyProfile->logo;
    $totalFilled = $logo ? $totalFilled + 1 : $totalFilled; // check field

    $description = $companyProfile->description;
    $totalFilled = $description ? $totalFilled + 1 : $totalFilled; // check field

    $address  = $companyProfile->address;
    $totalFilled = $address ? $totalFilled + 1 : $totalFilled; // check field

}

$selectedIndustry = explode(",", $industries);
$selectedSpecialities = explode(",", $specialities_seleceted);

// $selectedIndustry = explode(",", $companyProfile->industries);
// $selectedSpecialities = explode(",", $companyProfile->specialities);

/** profile completed calculation */

// $totalFilled = $selectedSpecialities[0]  ? 7  : 6;
// $totalFilled  = $companyProfile->logo ? $totalFilled + 1 : $totalFilled;
$totalPercent = $totalFilled * 100 / $totalFiled;

// print_r($selectedSpecialities);


// end...
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column ">

    <!-- Main Content -->
    <div id="content ">

        <!-- Begin Page Content -->
        <div class="container-fluid py-4 emplyoer-dash-content">

            <!-- Page Heading -->
            <h1 class="dashboard-title">COMPANY PROFILE</h1>
            <div class="d-sm-flex align-items-center justify-content-between mb-2"></div>

            <!-- HEADER SECTION -->
            <div class="row">
                <div class="col-12">
                    <h5 class="text-center cmo-prfoile-h5">Your job is waiting for approval, we will send you an email when it is live. </h5>
                </div>
                <!-- sub header -->
                <div class="col-12 cmp-heading-2">
                    <h5 class="text-center cmo-prfoile-h5">Complete your profile</h5>
                </div>
                <div class="col-12 cmp-progress-bar">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$totalPercent}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">You are here {{$totalPercent }}%</div>
                    </div>
                </div>
            </div>
            <!-- HEADER  END -->

            <!-- BODY SECTION -->
            <!-- <div class="row"> -->
            <form class="form-comapny-profile" method="POST" action="{{ request()->fullUrl() }}" enctype="multipart/form-data">
                @includeFirst([config('larapen.core.customizedViewPath') . 'freePost.inc.notification',
                'freePost.inc.notification'])
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="company_name">Company Name</label>
                        <input type="hidden" name="isCompanyExist" id="isCompanyExist" value="{{$isCompanyExist}}">
                        <input type="text" class="form-control" id="company_name" value="{{$compnyname}}" name="company_name" placeholder="Company name">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="team_size">Team Size</label>
                                <select class="form-control" id="team_size" name="team_size" value="{{$team_size}}">
                                    @foreach($teamSizes as $size)
                                    <option value="{{$size->id}}" @if ($size->id == $team_size) selected="selected" @endif> {{$size->from_num}} - {{$size->to_num}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="founded_year">Funded Year </label>
                                <input type="text" class="form-control" id="founded_year" name="founded_year" value="{{$founded_year}}" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="industry">Industry (Start typing to select a industry, or add your own)</label>
                        <!-- <input type="text" id="inputAddress"> -->
                        <select id="industry" class="form-control select2" name="industry[]" multiple>
                            @foreach($industeries as $industery)
                            <?php
                            $type = json_decode($industery->name);
                            ?>
                            @if(in_array($industery->id, $selectedIndustry))
                            <option value="{{$industery->id}}" selected="selected">{{$type->en}}</option>
                            @else
                            <option value="{{$industery->id}}">{{$type->en}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="specialities">Specialities (Start typing, or add your own)</label>
                        <select id="specialities" class="form-control select2" name="specialities[]" multiple>
                            @foreach($specialities as $specility)
                            @if(in_array($specility->id,$selectedSpecialities))
                            <option value="{{$specility->id}}" selected="selected">{{$specility->name}}</option>
                            @else
                            <option value="{{$specility->id}}">{{$specility->name}}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <!-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> -->
                        <!--BEGIN Google Maps-->
                        <form onSubmit="return false;">
                            <div class="">
                                <input type="text" class="form-control" id="address" class="form-control map-search-input" name="address" placeholder="Search for an address" class="autocomplete" value="{{$address}}">
                                <div class="map height-350px" id="map-submit"></div>
                                <!-- map ettributes vlaues inputs -->
                                <input type="hidden" name="map_lat" id="map_lat" value="{{$map_lat}}" />
                                <input type="hidden" name="map_lng" id="map_lng" value="{{$map_lng}}" />
                                <input type="hidden" name="map_place_id" id="map_place_id" value="{{$map_place_id}}" />
                                <!-- end -->
                            </div>
                        </form>

                        <!--End Google Maps-->
                    </div>
                    <div class="form-group col-md-6">
                        <label for="company_logo">Company logo</label>
                        <div class="row">
                            <div class="col-md-4">
                                @if(empty($logo))
                                <p class="text-logo-preview">Preview</p>
                                @endif
                                <?php $ishidden = $logo ? "" : 'image-hide' ?>
                                <img src="/images/posts_logo/{{$logo}}" alt="company logo" class="company-logo-preview {{$ishidden}}" />
                            </div>
                            <div class="col-md-8">
                                <label for="company_logo" class="upload-logo-label">Upload Photo</label>
                                <p class="upload-logo-ins">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
                                <input type="file" name="company_logo" id="company_logo" onchange="handleLogoChange(this)">
                                <input type="hidden" value="{{$logo}}" name="old_logo" id="old_logo" />
                            </div>
                            <!-- company discription -->
                            <div class="col-md-12">
                                <label for="company_desc">Company Description</label>
                                <textarea class="form-control ckeditors" name="company_desc" id="company_desc" value="" placeholder="Provide a short sumary of your business">{{$description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12  text-right">
                        <button type="submit" class="btn btn-primary submit-button">Save Details</button>
                    </div>
                </div>


            </form>
            <!-- </div> -->
            <!-- BODY END -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    @endsection
    @section('after_styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/css/map_style.css" rel="stylesheet" />
    <link href="/css/employer_dashboard.css" rel="stylesheet" />
    <style>
        .select2-container--classic .select2-selection--multiple {
            padding: 3px 3px 8px 3px !important;
            border: 1px solid #ddd !important;
        }
    </style>
    @endsection

    @section('after_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <!-- google scirpts -->
    <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA_J5AWTo2q7FPPKNdeQr1-ZEG_5Cg1FD8&libraries=places"></script>
    <script type="text/javascript" src="/js/richmarker-compiled.js"></script>
    <script type="text/javascript" src="/js/maps.js"></script>
    <!-- end -->
    <script type="text/javascript">
        // #map inittionlization
        var _latitude = "{{$map_lat }}";
        var _longitude = "{{$map_lng}}";
        if (_latitude == "") {
            var _latitude = 37.468319;
            var _longitude = -122.143936;
        }
        var element = "map-submit";
        CreateMap(_latitude, _longitude, element, true);

        //...
        $('.ckeditors').each(function(i, area) {
            CKEDITOR.replace(area, {
                toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Underline', 'BulletedList', 'NumberedList', 'JustifyLeft']
                }]
            })
        })

        $(document).ready(function() {
            $('.select2').select2({
                theme: "classic",
                tags: true,
                insertTag: function(data, tag) {
                    // console.log('data', tag)
                    var newtag = {
                        id: tag.id,
                        newTag: tag.newTag,
                        selected: tag.selected,
                        text: tag.text + ' (Click here to add)'
                    };

                    data.push(newtag);
                }
            })


        });
        // handle logo change ...
        function handleLogoChange(input) {
            var file = $("#company_logo").get(0).files[0];

            console.log('file', file.size)
            if (file.size > 3000000) return alert('File size must be below 3MB.')
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $(".company-logo-preview").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }

            $('.text-logo-preview').hide();
            $('.company-logo-preview').show();
            // console.log('file change',input)
        }
    </script>
    @endsection