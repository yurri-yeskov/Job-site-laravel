@extends('admin::layouts.master')
{{-- @section('after_styles')
<link href="/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.css" rel="stylesheet">
<link href="/vendor/devdojo/chatter/assets/css/chatter.css" rel="stylesheet">
@endsection --}}
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
            <li class="breadcrumb-item"><a href="/admin/community/" class="text-capitalize">{{ trans('Chat') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('Update') }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    <link href="/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.css" rel="stylesheet">
	<link href="/vendor/devdojo/chatter/assets/css/chatter.css" rel="stylesheet">
<div class="flex-row d-flex justify-content-center">
    <?php
    $colMd = config('settings.style.admin_boxed_layout') == '1' ? ' col-md-12' : ' col-md-9';
   
    ?>
    <div class="col-sm-12{{ $colMd }}">

        <!-- Default box -->

        <a href="/admin/community/" class="btn btn-primary shadow">
            <i class="fa fa-angle-double-left"></i> {{ trans('admin.back_to_all') }}
            <span class="text-lowercase"></span>
        </a>
        <br><br>

        <form method="POST" action="{{ request()->fullUrl() }}">
            <div class="card border-top border-primary">

                <div class="card-header">
                    <h3 class="mb-0">Update Discussion</h3>
                </div>
                <div class="card-body">
                    @includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification',
                    'post.inc.notification'])
                    <!-- load the view from the application if it exists, otherwise load the one in the package -->
                    <div class="card mb-0">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- TITLE -->
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title of {{ Config::get('chatter.titles.discussion') }}" v-model="title"  value="{{$discussion['title']}}">
                                <input type="hidden" name="discussion_id"  value={{$discussion['id']}}>
                            </div>
    
                            <div class="col-md-4" style="line-height: 35px;">
                                <!-- CATEGORY -->
                                <select id="chatter_category_id" class="form-control" name="chatter_category_id" >
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $discussion['chatter_category_id']) selected @endif><i class="far fa-thumbs-up"></i>{{ $category->name }}</option>
                                    @endforeach
                                </select>
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
                        </div>
                        <a href="/admin/community" class="btn btn-secondary shadow"><span class="fa fa-ban"></span> &nbsp;Cancel</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
{{-- @section('after_scripts')
<script src="/vendor/devdojo/chatter/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/vendor/devdojo/chatter/assets/js/tinymce.js"></script>
<script src="/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.js"></script>
<script src="/vendor/devdojo/chatter/assets/js/chatter.js"></script>
@endsection --}}