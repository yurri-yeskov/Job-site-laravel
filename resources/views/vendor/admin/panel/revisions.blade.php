@extends('admin::layouts.master')

@section('header')
  <section class="content-header">
    <h1>
      <span>{!! ucfirst($xPanel->entityName) !!}</span> {{ trans('admin.revisions') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
      <li><a href="{{ url($xPanel->route) }}" class="text-capitalize">{!! $xPanel->entityNamePlural !!}</a></li>
      <li class="active">{{ trans('admin.revisions') }}</li>
    </ol>
  </section>
@endsection

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <!-- Default box -->
    @if ($xPanel->hasAccess('list'))
      <a href="{{ url($xPanel->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('admin.back_to_all') }} <span class="text-lowercase">{{ $xPanel->entityNamePlural }}</span></a><br><br>
    @endif

    @if(!count($revisions))
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ trans('admin.no_revisions') }}</h3>
        </div>
      </div>
    @else
      @include('admin::panel.inc.revision_timeline')
    @endif
  </div>
</div>
@endsection
