@extends('admin::layouts.master')

@section('header')
<div class="row page-titles">
    <div class="col-md-6 col-12 align-self-center">
        <h2 class="mb-0">
            <span class="text-capitalize"></span>
            <small id="tableInfo">{{ trans('admin.all') }}</small>
        </h2>
    </div>
    <div class="col-md-6 col-12 align-self-center d-none d-md-block">
        <ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
            <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('employerSetting')}}" class="text-capitalize">{{ trans('Team Size') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('create') }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="flex-row d-flex justify-content-center">
    <?php
    $colMd = config('settings.style.admin_boxed_layout') == '1' ? ' col-md-12' : ' col-md-9';
    ?>
    <div class="col-sm-12{{ $colMd }}">

        <!-- Default box -->

        <a href="{{route('employerSetting')}}" class="btn btn-primary shadow">
            <i class="fa fa-angle-double-left"></i> {{ trans('admin.back_to_all') }}
            <span class="text-lowercase"></span>
        </a>
        <br><br>

        <form method="POST" action="/admin/teamSize">
            <div class="card border-top border-primary">

                <div class="card-header">
                    <h3 class="mb-0">Add a new Team Size</h3>
                </div>
                <div class="card-body">
                    @includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification',
                    'post.inc.notification'])
                    <!-- load the view from the application if it exists, otherwise load the one in the package -->
                    <div class="card mb-0">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Min</label>
                                <input type="text" name="min_num" value="" placeholder="Min value" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Max</label>
                                <input type="text" name="max_num" value="" placeholder="Max value" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div id="saveActions" class="form-group">
                        <input type="hidden" name="save_action" value="save_and_back">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary shadow">
                                <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
                                <span data-value="save_and_back">Save and back</span>
                            </button>

                            <button type="button" class="btn btn-primary shadow dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Save Dropdown</span>
                            </button>
                        </div>
                        <a href="{{route('employerSetting')}}" class="btn btn-secondary shadow"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('after_scripts')
<script>
    $('form').submit((e) => {
        validats = true;
        if (e.target.min_num.value > e.target.max_num.value) {
            validats = false;
            alert('"Minimum Value" must be less then "Maximum Value".');
        }
        if (!validats) e.preventDefault();
    })
</script>
@endsection