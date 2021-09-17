@extends('layouts.employer-master')
@section('content')

<?php
$selectedIndustry = explode(",", $postData->industries);
$selectedSkills = explode(",", $postData->skills);
$selectedLang = explode(",", $postData->languages);
$industeriesName = array();
$skillsName = array();
$languages = array();
foreach ($industeries as $industery) {
    if (in_array($industery->id, $selectedIndustry)) {
        $type = json_decode($industery->name);
        array_push($industeriesName, $type->en);
    }
}

foreach ($SkillsTypes as $skill) {

    if (in_array($skill->id, $selectedSkills)) {
        $type = json_decode($skill->name);
        array_push($skillsName, $type->en);
    }
}

foreach ($languagesList as $lang) {
    if (in_array($lang->id, $selectedLang)) {
        array_push($languages, $lang->name);
    }
}


?>
<div class="content-wrapper emplyoer-dash-content">
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-12">
                <h1 class="h3 mb-0 page-title">POST DETAILS</h1>
            </div>
            <div class="offset-md-6 col-md-3 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/company/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/company/post/manage">manage post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                @includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification',
                'post.inc.notification'])
                <!-- /.page-content -->
                <div class="col-md-12  px-0">

                    <div class="row" id="testfrom">
                        <form class="form-comapny-post-display" id="freePostForm" method="POST" action="{{ request()->fullUrl() }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}" />

                            <div class="col-md-12 form-group px-0">
                                <h5><b>Job Details</b></h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="job_title">Job Title</label>
                                        <span>{{$postData->title }}</span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="job_type">Job Type</label>

                                        @foreach ($postTypes as $postType)
                                        <?php
                                        $type = json_decode($postType->name, true);
                                        if ($postType->id == $postData->post_type_id) {
                                            echo "<span>" . $type['en'] . "</span>";
                                        }

                                        ?>
                                        @endforeach
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="last_name">From Salary($)</label>
                                                <span>{{$postData->salary_min }}k</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="last_name">To Salary($)</label>
                                                <span>{{$postData->salary_max }}k</span>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="last_name">Rate</label>

                                                @foreach ($salaryTypes as $salaryType)
                                                <?php
                                                $type = json_decode($salaryType->name, true);
                                                if ($salaryType->id == $postData->rate) {
                                                    echo "<span>per " . $type['en'] . "</span>";
                                                }
                                                ?>

                                                @endforeach

                                            </div>
                                            <div class="col-md-3">
                                                <label for="last_name">Negotiable</label>
                                                <?php
                                                if ($postData->negotiable == '1') {
                                                    echo "<span>Yes</span>";
                                                } else {
                                                    echo "<span>No</span>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="job_desc">Job Description</label>
                                        <div id="job_desc" class="ckeditor-html">
                                            <?php echo $postData->description; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="key_resp">Key Responsibilities</label>
                                        <div id="key_resp" class="ckeditor-html">
                                            <?php echo $postData->key_responsibilities; ?>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="experience">Experience</label>
                                        @foreach ($experienceList as $item)
                                        @if ($item->id == $postData->experience)
                                        <?php
                                        $type = json_decode($item->name, true);
                                        ?>
                                        <span>{{$type['en']}}</span>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edu_level">Education Levels</label>
                                        @foreach ($educationLevels as $levels)
                                        @if($levels->id == $postData->education_levels)
                                        <?php
                                        $type = json_decode($levels->name, true);
                                        echo "<span>" . $type['en'] . "</span>";
                                        ?>
                                        @endif
                                        @endforeach
                                    </div>

                                    <div class="col-md-6">
                                        <label for="skills">Skills </label>
                                        <span>{{implode(", ",$skillsName)}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="langs">Languages</label>
                                        <span>{{ implode(", ",$languages) }}</span>


                                    </div>


                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <br>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('after_styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="/css/map_style.css" rel="stylesheet" />
<link href="/css/employer_dashboard.css" rel="stylesheet" />
<style>
    .text-logo-preview {
        text-align: center;
        border: 1px solid #ccc;
        padding: 13px;
        /* border-radius: 8px; */
    }

    .company-logo-preview {
        /* display: none; */
        border: 1px solid #ccc;
        width: 100px;
        padding: 4px;
    }

    #company_logo {
        display: none;
    }

    .upload-logo-label {
        text-align: center;
        padding: 13px;
        background: #1967d221;
        border-radius: 8px;
        color: #1967D2;
        font-size: 15px;
        font-weight: 400;
        cursor: pointer;
    }

    .upload-logo-ins {
        font-size: 14px;
        line-height: 16px;
    }

    .post-form-val {
        display: none;
    }

    .pac-target-input {
        margin-bottom: 40px;
    }

    #map-submit {
        border-radius: 8px;
    }

    .form-comapny-post-display {
        width: 100%;
    }

    .ckeditor-html {
        width: 100%;
        border: 0.5px solid #ccc;
        padding: 8px;
        border-radius: 8px;
    }
</style>
@endsection



@section('after_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA_J5AWTo2q7FPPKNdeQr1-ZEG_5Cg1FD8&libraries=places"></script>
<script type="text/javascript" src="/js/richmarker-compiled.js"></script>
<script type="text/javascript" src="/js/maps.js"></script>
<script type="text/javascript">
    // #map inittionlization
    var _latitude = "{{$postData->map_lat }}";
    var _longitude = "{{$postData->map_lng}}";
    if (_latitude == "") {
        _latitude = 37.468319;
        _longitude = -122.143936;
    }
    var element = "map-submit";
    CreateMap(_latitude, _longitude, element, true);
</script>
@endsection