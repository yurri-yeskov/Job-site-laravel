<!DOCTYPE html>
<html dir="ltr" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="{{ config('app.name') }}">
    {{-- Favicon icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ imgUrl(config('settings.app.favicon'), 'favicon') }}">
    
    <title>{!! isset($title) ? strip_tags($title) . ' :: ' . config('app.name') . ' Admin' : config('app.name') . ' Admin' !!}</title>
    
    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    @yield('before_styles')
    
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/pace/pace.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/pnotify/pnotify.custom.min.css') }}">
    
    <link rel="canonical" href="{{ url()->current() }}" />
    
    {{-- Custom CSS --}}
    <link href="{{ asset('vendor/admin-theme/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/admin-theme/css/style-main.css') }}" rel="stylesheet">

    @yield('after_styles')
    
    <style>
        /* Fix for "datatables/css/jquery.dataTables.css" */
        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc_disabled {
            background-image: inherit;
        }
    </style>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
{{-- Main wrapper - style you can find in pages.scss --}}
<div id="main-wrapper">
    
    {{-- Topbar header - style you can find in pages.scss --}}
    @include('admin::layouts.inc.header')
    
    {{-- Left Sidebar - style you can find in sidebar.scss  --}}
    @include('admin::layouts.inc.sidebar')
    
    {{-- Page wrapper  --}}
    <div class="page-wrapper">
        {{-- Container fluid  --}}
        <div class="container-fluid">
            {{-- Bread crumb and right sidebar toggle --}}
            @yield('header')
            
            {{-- Start Page Content --}}
            @yield('content')
        </div>
        
        {{-- Footer --}}
        <footer class="footer">
            <div class="row">
                <div class="col-md-6 text-left">
                    {{ trans('admin.Version') }} {{ env('APP_VERSION', config('app.appVersion')) }}
                </div>
                @if (config('settings.footer.hide_powered_by') != '1')
                    <div class="col-md-6 text-right">
                        @if (config('settings.footer.powered_by_info'))
                            {{ trans('admin.powered_by') }} {!! config('settings.footer.powered_by_info') !!}
                        @else
                            {{ trans('admin.powered_by') }} <a target="_blank" href="http://bedigit.com">Bedigit</a>
                        @endif
                    </div>
                @endif
            </div>
        </footer>
    </div>
</div>

@yield('before_scripts')

<script>
    var siteUrl = '<?php echo url('/'); ?>';
</script>

{{-- All Jquery --}}
<script src="{{ asset('vendor/admin-theme/plugins/jquery/jquery.min.js') }}"></script>
{{-- Bootstrap tether Core JavaScript --}}
<script src="{{ asset('vendor/admin-theme/plugins/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('vendor/admin-theme/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
{{-- apps --}}
<script src="{{ asset('vendor/admin-theme/js/app.min.js') }}"></script>
{{-- slimscrollbar scrollbar JavaScript --}}
<script src="{{ asset('vendor/admin-theme/plugins/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('vendor/admin-theme/plugins/sparkline/sparkline.js') }}"></script>
{{-- Wave Effects --}}
<script src="{{ asset('vendor/admin-theme/js/waves.js') }}"></script>
{{-- Menu sidebar --}}
<script src="{{ asset('vendor/admin-theme/js/sidebarmenu.js') }}"></script>
{{-- Custom JavaScript --}}
<script src="{{ asset('vendor/admin-theme/js/feather.min.js') }}"></script>
<script src="{{ asset('vendor/admin-theme/js/custom.js') }}"></script>

<script src="{{ asset('vendor/admin/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('vendor/admin/script.js') }}"></script>

<script>
    $(function () {
        "use strict";
        $("#main-wrapper").AdminSettings({
            Theme: {{ config('settings.style.admin_dark_theme') == '1' ? 'true' : 'false' }},
            Layout: 'vertical',
            LogoBg: '{{ config('settings.style.admin_logo_bg') }}',
            NavbarBg: '{{ config('settings.style.admin_navbar_bg') }}',
            SidebarType: '{{ config('settings.style.admin_sidebar_type') }}',
            SidebarColor: '{{ config('settings.style.admin_sidebar_bg') }}',
            SidebarPosition: {{ config('settings.style.admin_sidebar_position') == '1' ? 'true' : 'false' }},
            HeaderPosition: {{ config('settings.style.admin_header_position') == '1' ? 'true' : 'false' }},
            BoxedLayout: {{ config('settings.style.admin_boxed_layout') == '1' ? 'true' : 'false' }},
        });
    });
</script>

{{-- Page Script --}}
<script type="text/javascript">
    /* To make Pace works on Ajax calls */
    $(document).ajaxStart(function() { Pace.restart(); });
    
    /* Ajax calls should always have the CSRF token attached to them, otherwise they won't work */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    /* Set active state on menu element */
    var currentUrl = "{{ url(Route::current()->uri()) }}";
    $("#sidebarnav li a").each(function() {
        if ($(this).attr('href').startsWith(currentUrl) || currentUrl.startsWith($(this).attr('href')))
        {
            $(this).parents('li').addClass('selected');
        }
    });
</script>
<script>
    $(document).ready(function()
    {
        /* Send an ajax update request */
        $(document).on('click', '.ajax-request', function(e)
        {
            e.preventDefault(); /* prevents the submit or reload */
            var confirmation = confirm("<?php echo trans('admin.confirm_this_action'); ?>");
            
            if (confirmation) {
                saveAjaxRequest(siteUrl, this);
            }
        });
    });
    
    function saveAjaxRequest(siteUrl, el)
    {
        if (isDemoDomainJs()) {
            return false;
        }
        
        var $self = $(this); /* magic here! */
        
        /* Get database info */
        var _token = $('input[name=_token]').val();
        var dataTable = $(el).data('table');
        var dataField = $(el).data('field');
        var dataId = $(el).data('id');
        var dataLineId = $(el).data('line-id');
        var dataValue = $(el).data('value');
        
        /* Remove dot (.) from var (referring to the PHP var) */
        dataLineId = dataLineId.split('.').join("");
        
        
        $.ajax({
            method: 'POST',
            url: siteUrl + '/<?php echo admin_uri(); ?>/ajax/' + dataTable + '/' + dataField + '',
            context: this,
            data: {
                'primaryKey': dataId,
                '_token': _token
            }
        }).done(function(data) {
            /* Check 'status' */
            if (data.status != 1) {
                return false;
            }
            
            /* Decoration */
            if (data.table == 'countries' && dataField == 'active')
            {
                if (!data.resImport) {
                    new PNotify({
                        text: "{{ trans('admin.Error - You can not install this country') }}",
                        type: "error"
                    });
                    
                    return false;
                }
                
                if (data.isDefaultCountry == 1) {
                    new PNotify({
                        text: "{{ trans('admin.You can not disable the default country') }}",
                        type: "warning"
                    });
                    
                    return false;
                }
                
                /* Country case */
                if (data.fieldValue == 1) {
                    $('#' + dataLineId).removeClass('fa fa-toggle-off').addClass('fa fa-toggle-on');
                    $('#install' + dataId).removeClass('btn-light')
                            .addClass('btn-success')
                            .addClass('text-white')
                            .empty()
                            .html('<i class="fas fa-download"></i> <?php echo trans('admin.Installed'); ?>');
                } else {
                    $('#' + dataLineId).removeClass('fa fa-toggle-on').addClass('fa fa-toggle-off');
                    $('#install' + dataId).removeClass('btn-success')
                            .removeClass('text-white')
                            .addClass('btn-light')
                            .empty()
                            .html('<i class="fas fa-download"></i> <?php echo trans('admin.Install'); ?>');
                }
            }
            else
            {
                /* All others cases */
                if (data.fieldValue == 1) {
                    $('#' + dataLineId).removeClass('fa fa-toggle-off').addClass('fa fa-toggle-on').blur();
                } else {
                    $('#' + dataLineId).removeClass('fa fa-toggle-on').addClass('fa fa-toggle-off').blur();
                }
            }
            
            return false;
        }).fail(function(xhr, textStatus, errorThrown) {
            /*
			console.log('FAILURE: ' + textStatus);
			console.log(xhr);
			*/
            
            /* Show an alert with the result */
            /* console.log(xhr.responseText); */
            if (typeof xhr.responseText !== 'undefined') {
                if (xhr.responseText.indexOf("{{ trans('admin.unauthorized') }}") >= 0) {
                    new PNotify({
                        text: xhr.responseText,
                        type: "error"
                    });
                    
                    return false;
                }
            }
            
            /* Show an alert with the standard message */
            if (typeof xhr.responseJSON !== 'undefined' && typeof xhr.responseJSON.message !== 'undefined') {
                new PNotify({
                    text: xhr.responseJSON.message,
                    type: "error"
                });
            } else {
                new PNotify({
                    text: xhr.responseText,
                    type: "error"
                });
            }
            
            return false;
        });
        
        return false;
    }
    
    function isDemoDomainJs()
    {
        <?php
            $varJs = isDemoDomain() ? 'var demoMode = true;' : 'var demoMode = false;';
            echo $varJs . "\n";
        ?>
        var msg = '{{ addcslashes(t('demo_mode_message'), "'") }}';
        
        if (demoMode) {
            new PNotify({title: 'Information', text: msg, type: "info"});
            return true;
        }
        
        return false;
    }
</script>

@include('admin::layouts.inc.alerts')

<script>
    $(document).ready(function () {
        /* Maintenance Mode Confirmation */
        $(document).on('click', '.maintenance-mode', function(e)
        {
            e.preventDefault(); /* prevents the submit or reload */
            var confirmation = confirm("<?php echo trans('admin.confirm_this_action'); ?>");
        
            if (confirmation) {
                if (isDemoDomainJs()) {
                    return false;
                }
                var maintenanceUrl = $(this).attr('href');
                redirect(maintenanceUrl);
            }
        });
    });
</script>

@yield('after_scripts')
</body>
</html>