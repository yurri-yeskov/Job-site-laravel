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
            <li class="breadcrumb-item"><a href="/admin/community" class="text-capitalize">{{ trans('Chat') }}</a></li>
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
        
        <a href="/admin/community/" class="btn btn-primary shadow">
            <i class="fa fa-angle-double-left"></i> {{ trans('admin.back_to_all') }}
            <span class="text-lowercase"></span>
        </a>
        <br><br>

        <form method="POST" action="/admin/community">
            <div class="card border-top border-primary">

                <div class="card-header">
                    <h3 class="mb-0">Add a new Chatter Category</h3>
                </div>
                <div class="card-body">
                    @includeFirst([config('larapen.core.customizedViewPath') . 'post.inc.notification',
                    'post.inc.notification'])
                    <!-- load the view from the application if it exists, otherwise load the one in the package -->
                    <div class="card mb-0">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Order</label>
                                <input type="number" name="order" value="" placeholder="Category order" class="form-control" min='1'>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" value="" placeholder="Category name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Slug</label>
                                <input type="text" name="slug" value="" placeholder="Category slug" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label>Color</label>
                                <input type="color" name="color" value="" placeholder="Category color" class="form-control">
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