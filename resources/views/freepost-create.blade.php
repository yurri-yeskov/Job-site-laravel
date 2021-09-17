{{-- * JobClass - Job Board Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard --}}
@extends('layouts.master')

@section('content')
{{-- @includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer']) --}}
<?php
// echo "<pre>";
// print_r($teamSizeTypes);
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            @includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification',
            'post.inc.notification'])
            <!-- /.page-content -->
            <div class="col-md-12 pt-5 px-0">
                <div class="row" id="testfrom">
                    <form class="w-100" id="freePostForm" method="POST" action="{{  route('postFreePostStep-v2')  }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}" />
                        <div class="col-md-12 text-center px-0">
                            <h4><b>Please complete the below to post a job.</b></h4>
                        </div>
                        <div class="col-md-12 form-group px-0">
                            <h5><b>Job Details</b></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="job_title">Job Title</label>
                                    <input id="job_title" class="form-control" name="job_title" value="{{ old('job_title') }}" type="text" />
                                </div>
                                <div class="col-md-3">
                                    <label for="email">Contact Email</label>
                                    <input id="email" class="form-control" name="email" value="{{$email}}" type="text" <?php echo $email ? 'readonly' : '';  ?> />
                                </div>
                                <div class="col-md-3">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" class="form-control" name="first_name" value="{{$first_name}}" type="text" <?php echo $first_name ? 'readonly' : '';  ?> />
                                </div>
                                <div class="col-md-3">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" class="form-control" name="last_name" value="{{$last_name}}" type="text" <?php echo $last_name ? 'readonly' : '';  ?> />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="job_desc">Job Description</label>
                                    <input type="hidden" name="job_desc_hidden" id="job_desc_hidden" />
                                    <textarea id="job_desc" class="form-control ckeditors" name="job_desc" value="{{ old('job_desc') }}"></textarea>
                                    <h5 id="vl_job_desc" class="post-form-val" style="color: red;">
                                        *Job Description is required
                                    </h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="key_resp">Key Responsibilities</label>
                                    <textarea id="key_resp" class="form-control ckeditors" name="key_resp" type="text" value="{{ old('key_resp') }}"></textarea>
                                    <h5 id="vl_key_resp" class="post-form-val" class="post-form-val" style="color: red;">
                                        *Key Responsibilities is required
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="company_name">Company Name</label>
                                    <input id="company_name" class="form-control" name="company_name" type="text" value="{{ old('company_name') }}" />
                                </div>
                                <div class="col-md-3">
                                    <label for="team_size">Team Size</label>
                                    <select class="form-control" id="team_size" name="team_size">
                                        @foreach ($teamSizeTypes as $size)
                                        <option value="{{ $size->id }}">{{ $size->from_num }} - {{ $size->to_num }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="team_size" class="form-control" name="team_size" type="text" value="{{ old('team_size', data_get($postInput, 'team_size')) }}" /> --}}
                                </div>
                                <div class="col-md-3">
                                    <label for="founded_year">Founded Year</label>
                                    <input id="founded_year" class="form-control" name="founded_year" type="text" value="{{ old('founded_year') }}" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="industry">Industry (Start typing to select a industry, or add your
                                        own)</label>
                                    <select id="industry" class="form-control select2" name="industry[]" multiple>
                                        @foreach ($categoriesTypes as $category)
                                        <option value="{{ $category->id }}" @if (old('salary_type_id')==$category->id)
                                            selected="selected"
                                            @endif
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <h5 id="vl_industry" class="post-form-val" style="color: red;">
                                        *Industry is required
                                    </h5>
                                </div>
                                <div class="col-md-3">
                                    <label for="edu_level">Education Levels</label>
                                    {{-- <input id="edu_level" class="form-control" name="edu_level" type="text" value="{{ old('edu_level', data_get($postInput, 'edu_level')) }}" /> --}}
                                    <select class="form-control" id="edu_level" name="edu_level">
                                        @foreach ($educationLevels as $levels)
                                        <?php
                                        $type = json_decode($levels->name, true);
                                        ?>
                                        <option value="{{ $levels->id }}">{{ $type['en'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="langs">Languages</label>
                                    {{-- <input id="langs" class="form-control" name="langs" type="text" value="{{ old('langs', data_get($postInput, 'langs')) }}" /> --}}
                                    <select class="form-control select2" id="langs" name="langs[]" multiple>
                                        @foreach ($languagesList as $lang)
                                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="job_type">Job Type</label>
                                    <select id="job_type" class="form-control" name="job_type">
                                        @foreach ($postTypes as $postType)
                                        <option value="{{ $postType->id }}" @if (old('post_type_id')==$postType->id)
                                            selected="selected"
                                            @endif
                                            >{{ $postType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="experience">Experience</label>
                                    <select id="experience" class="form-control" name="experience">
                                        @foreach ($experienceList as $item)
                                        <?php
                                        $type = json_decode($item->name, true);
                                        ?>
                                        <option value="{{ $item->id }}">{{$type['en'] }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label for="skills">Skills (Start typing to select a skill, or add your own)</label>
                                    <select id="skills" class="form-control select2" name="skills[]" multiple>
                                        @foreach ($SkillsTypes as $skill)
                                        <?php
                                        $type = json_decode($skill->name, true);
                                        ?>
                                        <option value="{{ $skill->id }}">{{ $type['en'] }}</option>
                                        @endforeach
                                    </select>
                                    <h5 id="vl_skills" class="post-form-val" style="color: red;">
                                        *Skills is required
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="last_name">From Salary($)</label>
                                            <select name="from_salary" id="from_salary" class="form-control">
                                                @foreach ($minsalaryList as $item)

                                                <option value="{{ $item->name }}">{{ $item->name }} k</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="last_name">To Salary($)</label>
                                            <select name="to_salary" id="to_salary" class="form-control">
                                                @foreach ($maxsalaryList as $item)

                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="last_name">Rate</label>
                                            <select name="rate" id="rate" class="form-control">
                                                @foreach ($salaryTypes as $salaryType)
                                                <option value="{{ $salaryType->id }}" @if (old('salary_type_id')==$salaryType->id)
                                                    selected="selected"
                                                    @endif
                                                    >{{ t('per') . ' ' . $salaryType->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="last_name">Negotiable</label>
                                            <select name="negotiable" id="negotiable" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="address">Address</label>
                                    {{-- <input id="address" class="form-control" name="address" type="text" placeholder="Start typing address" /> --}}
                                    <!-- google map section -->
                                    <div class="free-post-google-map">
                                        <main id="main">
                                            <form onSubmit="return false;">
                                                <!--BEGIN Google Maps-->
                                                <div class="">
                                                    <input type="text" class="form-control" id="address" class="form-control map-search-input" name="address" value="{{ old('address') }}" placeholder="Search for an address" class="autocomplete">
                                                    <div class="map height-350px" id="map-submit"></div>
                                                    <!-- map ettributes vlaues inputs -->
                                                    <input type="hidden" name="map_lat" id="map_lat" value="{{ old('map_lat') }}" />
                                                    <input type="hidden" name="map_lng" id="map_lng" value="{{ old('map_lng') }}" />
                                                    <input type="hidden" name="map_place_id" id="map_place_id" value="{{ old('map_place_id') }}" />
                                                    <!-- end -->
                                                </div>
                                                <!--End Google Maps-->
                                            </form>
                                        </main>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="company_logo">Company Logo</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="text-logo-preview">Preview</p>
                                                    <img src="" alt="company logo" class="company-logo-preview" />
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="company_logo" class="upload-logo-label">Upload Photo</label>
                                                    <p class="upload-logo-ins">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</p>
                                                    <input type="file" name="company_logo" id="company_logo" onchange="handleLogoChange(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-md-12">
                                            <label for="company_desc">Company Description</label>
                                            <textarea class="form-control ckeditors" name="company_desc" id="company_desc" value="{{ old('company_desc') }}" placeholder="Provide a short sumary of your business"></textarea>
                                            <h5 id="vl_company_desc" class="post-form-val" style="color: red;">
                                                *Company Description is required
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-lg px-4 btn-warning" type="submit" name="freePostsubmit" id="freePostsubmit"><b>POST JOB NOW!!</b></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('after_styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="/css/map_style.css" rel="stylesheet" />
<style>
    .text-logo-preview {
        text-align: center;
        border: 1px solid #ccc;
        padding: 13px;
        /* border-radius: 8px; */
    }

    .company-logo-preview {
        display: none;
        border: 1px solid #ccc;
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
    var _latitude = 37.468319;
    var _longitude = -122.143936;
    var element = "map-submit";
    CreateMap(_latitude, _longitude, element, true);

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
            tags: true
        });


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

    // handle form submition...
    $('#freePostForm').submit((e) => {

        var validats = true;
        var user_id = e.target.user_id.value;

        $('.is-invalid').removeClass('is-invalid');
        $('.post-form-val').css({
            display: 'none'
        });
        // # input validations ...
        e.target.email.value == "" ? validation(e.target.email.id) : ''; // email
        e.target.job_title.value == "" ? validation(e.target.job_title.id) : ''; // job_title
        e.target.first_name.value == "" ? validation(e.target.first_name.id) : ''; // first_name
        e.target.last_name.value == "" ? validation(e.target.last_name.id) : ''; // last_name
        e.target.company_name.value == "" ? validation(e.target.company_name.id) : ''; // company_name
        e.target.team_size.value == "" ? validation(e.target.team_size.id) : ''; // team_size
        e.target.founded_year.value == "" ? validation(e.target.founded_year.id) : ''; // founded_year
        e.target.edu_level.value == "" ? validation(e.target.edu_level.id) : ''; // edu_level
        e.target.langs.value == "" ? validation(e.target.langs.id) : ''; // founded_year
        e.target.job_type.value == "" ? validation(e.target.job_type.id) : ''; // founded_year
        e.target.experience.value == "" ? validation(e.target.experience.id) : ''; // experience
        e.target.address.value == "" ? validation(e.target.address.id) : ''; // address

        // external component validations...
        if ($('#industry').select2('data').length === 0) {
            validats = false;
            $("#vl_industry").show()
        }
        if ($('#skills').select2('data').length === 0) {
            validats = false;
            $("#vl_skills").show()
        }
        if (CKEDITOR.instances.job_desc.getData() === '') {
            validats = false;
            $("#vl_job_desc").show()
        }
        if (CKEDITOR.instances.key_resp.getData() === '') {
            validats = false;
            $("#vl_key_resp").show()
        }
        if (CKEDITOR.instances.company_desc.getData() === '') {
            validats = false;
            $("#vl_company_desc").show()
        }

        function validation(id) {
            validats = false;
            $('#' + id).addClass('is-invalid');
        }
        if (e.target.from_salary.value > e.target.to_salary.value) {
            validats = false;
            alert('"From salary" must be less then "To salary."');
        }

        var job_desc_hidden = CKEDITOR.instances.job_desc.getData() + "";
        $('#job_desc_hidden').val(job_desc_hidden);
        // e.preventDefault();

        //# if user not loggedin then open signup modal
        if (validats && !user_id) {
            $('#quickEmployerSignup').modal('show');
            $('#empQuickSingupEmail').val(e.target.email.value);
            $('#emp_first_name_w').val(e.target.first_name.value);
            $('#emp_last_name_w').val(e.target.last_name.value);
            e.preventDefault();
        }
        if (!validats) {
            window.scrollTo(0, 0); // scrall to top if validation exist.
            e.preventDefault();
        }



    })
</script>
@endsection