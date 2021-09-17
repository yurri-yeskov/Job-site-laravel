@extends('layouts.employer-master')
@section('content')
<?php
$options = array("Option 1", "Option 2", "Option 3", "Option 4", "Option 5");
$selectedIndustry = explode(",", $postData->industries);
$selectedSkills = explode(",", $postData->skills);
$selectedLang = explode(",", $postData->languages);
?>
<div class="content-wrapper emplyoer-dash-content">
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-12">
                <h1 class="h3 mb-0 page-title">UPDATE POST</h1>
            </div>
            <div class="offset-md-6 col-md-3 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/company/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/company/post/manage">manage post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <!-- <h1 class="dashboard-title">POST NEW JOB</h1> -->
                @includeFirst([config('larapen.core.customizedViewPath') . 'freePost.inc.notification',
                'freePost.inc.notification'])
                <!-- /.page-content -->
                <div class="col-md-12  px-0">

                    <div class="row" id="testfrom">
                        <form class="form-comapny-update-post w-100" id="freePostForm" method="POST" action="{{ request()->fullUrl() }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                            @endif
                            <div class="col-md-12 text-center px-0">
                                <h4>Please complete the below to post a job.</h4>
                            </div>
                            <div class="col-md-12 form-group px-0">
                                <h5>Job Details</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="job_title">Job Title</label>
                                        <input id="job_title" class="form-control" name="job_title" value="{{$postData->title  }}" type="text" />
                                    </div>

                                    <div class="col-md-3">
                                        <label for="job_type">Job Type</label>
                                        <select id="job_type" class="form-control" name="job_type">
                                            @foreach ($postTypes as $postType)
                                            <?php
                                            $type = json_decode($postType->name, true);
                                            ?>
                                            <option value="{{ $postType->id }}" @if ( $postData->post_type_id ==$postType->id)
                                                selected="selected"
                                                @endif
                                                >{{ $type['en'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="last_name">From Salary($)</label>
                                                <select name="from_salary" id="from_salary" class="form-control">
                                                    @foreach ($minsalaryList as $item)

                                                    <option value="{{ $item->name }}" @if ($item->name == (int)$postData->salary_min) selected="selected" @endif>{{ $item->name }} k</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="last_name">To Salary($)</label>
                                                <select name="to_salary" id="to_salary" class="form-control">
                                                    @foreach ($maxsalaryList as $item)

                                                    <option value="{{ $item->name }}" @if ($item->name == (int)$postData->salary_max) selected="selected" @endif>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="last_name">Rate</label>
                                                <select name="rate" id="rate" class="form-control">
                                                    @foreach ($salaryTypes as $salaryType)
                                                    <?php

                                                    $type = json_decode($salaryType->name, true);
                                                    // print_r($salaryType);
                                                    ?>
                                                    <option value="{{ $salaryType->id }}" @if ($salaryType->id ==$postData->rate)
                                                        selected="selected"
                                                        @endif
                                                        >{{ t('per') . ' ' . $type['en'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="last_name">Negotiable</label>
                                                <select name="negotiable" id="negotiable" class="form-control" defaultvalue="{{$postData->negotiable }}">
                                                    <option value="1" @if ($postData->negotiable == 1) selected="selected" @endif>Yes</option>
                                                    <option value="0" @if ($postData->negotiable == 0) selected="selected" @endif>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="job_desc">Job Description</label>
                                        <textarea id="job_desc" class="form-control ckeditors" name="job_desc">{{$postData->description }}</textarea>
                                        <h5 id="vl_job_desc" class="post-form-val" style="color: red;">
                                            *Job Description is required
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="key_resp">Key Responsibilities</label>
                                        <textarea id="key_resp" class="form-control ckeditors" name="key_resp" type="text">{{$postData->key_responsibilities }}</textarea>
                                        <h5 id="vl_key_resp" class="post-form-val" class="post-form-val" style="color: red;">
                                            *Key Responsibilities is required
                                        </h5>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="experience">Experience</label>
                                        <select id="experience" class="form-control" name="experience">
                                            @foreach ($experienceList as $item)
                                            <?php
                                            $type = json_decode($item->name, true);
                                            ?>
                                            <option value="{{ $item->id }}" @if ($item->id == $postData->experience) selected="selected" @endif>{{$type['en'] }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="edu_level">Education Levels</label>
                                        <!-- <input id="edu_level" class="form-control" name="edu_level" type="text" value="{{$postData->education_levels }}" /> -->
                                        <select class="form-control" id="edu_level" name="edu_level">
                                            @foreach ($educationLevels as $levels)
                                            <?php
                                            $type = json_decode($levels->name, true);
                                            ?>
                                            <option value="{{ $levels->id }}" @if ($levels->id == $postData->education_levels) selected="selected" @endif>{{ $type['en'] }}</option>
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
                                            <option value="{{ $skill->id }}" @if (in_array($skill->id, $selectedSkills)) selected="selected" @endif>{{ $type['en'] }}</option>
                                            @endforeach
                                        </select>
                                        <h5 id="vl_skills" class="post-form-val" style="color: red;">
                                            *Skills is required
                                        </h5>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="langs">Languages</label>
                                        <!-- <input id="langs" class="form-control" name="langs" type="text" value="{{$postData->languages }}" /> -->
                                        <select class="form-control select2-lang" id="langs" name="langs[]" multiple>
                                            @foreach($languagesList as $lang)
                                            @if(in_array($lang->id, $selectedLang))
                                            <option value="{{$lang->id}}" selected="selected">{{$lang->name}}</option>
                                            @else
                                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                                            @endif
                                            @endforeach

                                        </select>
                                        <h5 id="lang_err" class="post-form-val" style="color: red;">
                                            *Lanuages is required
                                        </h5>
                                    </div>


                                </div>

                                <br><br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn post-now-button" type="submit" name="freePostsubmit" id="freePostsubmit"><b>UPDATE JOB </b></button>
                                    </div>
                                </div>
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
    .post-now-button {
        font-size: 20px;
        color: #000;
        font-weight: 700;
        text-align: center;
        background: #E1AA12;
        border: 4px solid #000000;
        box-sizing: border-box;
        border-radius: 0px;
    }

    .post-now-button:hover {
        background: #000000;
        color: #fff;
    }

    .text-logo-preview {
        text-align: center;
        border: 1px solid #ccc;
        padding: 13px;
        /* border-radius: 8px; */
    }

    .company-logo-preview {
        /* display: none; */
        width: 100%;
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

    .dashboard-title {
        width: 100% !important;
        text-align: center !important;
    }

    .select2-container--classic .select2-selection--multiple {
        padding: 1px ​6px 6px 4px !important;
        border: 1px solid #ddd !important;
    }
</style>
@endsection



@section('after_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
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
        $('.select2-lang').select2({
            theme: "classic"
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

    // handle form submition...
    $('#freePostForm').submit((e) => {
        var validats = true;
        // var user_id = e.target.user_id.value;
        
        $('.is-invalid').removeClass('is-invalid');
        $('.post-form-val').css({
            display: 'none'
        });
        // # input validations ...
        e.target.job_title.value == "" ? validation(e.target.job_title.id) : ''; // job_title
        e.target.edu_level.value == "" ? validation(e.target.edu_level.id) : ''; // edu_level
        e.target.langs.value == "" ? validation(e.target.langs.id) : ''; // founded_year
        e.target.job_type.value == "" ? validation(e.target.job_type.id) : ''; // founded_year
        e.target.experience.value == "" ? validation(e.target.experience.id) : ''; // experience
        console.log('e.target.job_title.value ',e.target.job_title.value )
        // external component validations...

        if ($('#skills').select2('data').length === 0) {
            validats = false;
            $("#vl_skills").show()
        }
        if ($('#langs').select2('data').length === 0) {
            validats = false;
            $("#lang_err").show()
        }
        if (CKEDITOR.instances.job_desc.getData() === '') {
            validats = false;
            $("#vl_job_desc").show()
        }
        if (CKEDITOR.instances.key_resp.getData() === '') {
            validats = false;
            $("#vl_key_resp").show()
        }
        if (e.target.from_salary.value > e.target.to_salary.value) {
            validats = false;
            alert('"From salary" must be less then "To salary."');
        }

        function validation(id) {
            validats = false;
            $('#' + id).addClass('is-invalid');
        }
        
        if (!validats) {
            window.scrollTo(0, 0); // scrall to top if validation exist.
            e.preventDefault();
        }



    })
</script>
@endsection