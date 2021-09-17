
<form class="form-comapny-post-create w-100" id="freePostForm" method="POST" action="{{ route('createEmpFreePost') }}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}" />
    <div class="col-md-12 text-center px-0">
        <h4><b>Please complete the below to post a job.</b></h4>
    </div>
    <div class="col-md-12 form-group px-0">
        <h5><b>Job Details</b></h5>
        <div class="row">
            <div class="col-md-3">
                <label for="job_title">Job Title</label>
                <input id="job_title" class="form-control" name="job_title" value="{{ old('job_title', data_get($postInput, 'job_title')) }}" type="text" />
            </div>
            <div class="col-md-3">
                <label for="job_type">Job Type</label>
                <select id="job_type" class="form-control" name="job_type">
                    @foreach ($postTypes as $postType)
                    <?php
                    $type = json_decode($postType->name, true);
                    ?>
                    <option value="{{ $postType->id }}" @if (old('post_type_id', data_get($postInput, 'post_type_id' ))==$postType->id)
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

                            <option value="{{ $item->name }}">{{ $item->name }}k</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="last_name">To Salary($)</label>
                        <select name="to_salary" id="to_salary" class="form-control">
                            @foreach ($maxsalaryList as $item)

                            <option value="{{ $item->name }}">{{ $item->name }}k</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="last_name">Rate</label>
                        <select name="rate" id="rate" class="form-control">
                            @foreach ($salaryTypes as $salaryType)
                            <?php
                            $type = json_decode($salaryType->name);
                            ?>
                            <option value="{{ $salaryType->id }}" @if (old('salary_type_id', data_get($postInput, 'salary_type_id' ))==$salaryType->id)
                                selected="selected"
                                @endif
                                >{{ t('per') . ' ' . $type->en }}</option>
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

        </div>
        <br />
        <div class="row">
            <div class="col-md-6">
                <label for="job_desc">Job Description</label>
                <textarea id="job_desc" class="form-control ckeditors" name="job_desc" value="{{ old('job_desc', data_get($postInput, 'job_desc')) }}"></textarea>
                <h5 id="vl_job_desc" class="post-form-val" style="color: red;">
                    *Job Description is required
                </h5>
            </div>
            <div class="col-md-6">
                <label for="key_resp">Key Responsibilities</label>
                <textarea id="key_resp" class="form-control ckeditors" name="key_resp" type="text" value="{{ old('key_resp', data_get($postInput, 'key_resp')) }}"></textarea>
                <h5 id="vl_key_resp" class="post-form-val" class="post-form-val" style="color: red;">
                    *Key Responsibilities is required
                </h5>
            </div>
        </div>
        <br>

        <div class="row">
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
            <div class="col-md-3">
                <label for="edu_level">Education Levels</label>
                <!-- <input id="edu_level" class="form-control" name="edu_level" type="text" value="{{ old('edu_level', data_get($postInput, 'edu_level')) }}" /> -->
                <select class="form-control" id="edu_level" name="edu_level">
                    @foreach ($educationLevels as $levels)
                    <?php
                    $type = json_decode($levels->name, true);
                    ?>
                    <option value="{{ $levels->id }}">{{ $type['en'] }}</option>
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
            <div class="col-md-3">
                <label for="langs">Languages</label>
                <!-- <input id="langs" class="form-control" name="langs" type="text" value="{{ old('langs', data_get($postInput, 'langs')) }}" /> -->
                <select class="form-control select2-lang" id="langs" name="langs[]" multiple>
                    @foreach ($languagesList as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
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
                <button class="btn post-now-button" type="submit" name="freePostsubmit" id="freePostsubmit">Post a Job NOW!!</button>
            </div>
        </div>
    </div>
</form>


