@extends('layouts.employer-master')
@section('content')
<?php
// echo "<pre>";
// print_r($categoriesTypes);
// foreach ($categoriesTypes as $category) {
//     print_r( $category->name);
//     $type = json_decode($category->name);
//     echo "<pre>";
//     print_r($type);
// }
// die;
?>
<div class="main-container">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 col-sm-12">
                <h1 class="h3 mb-0 page-title">Search and Find Workers</h1>
            </div>
            <div class="offset-md-6 col-md-3 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/company/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/company/post/manage">workers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">find</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- search form -->
       
        <!--  form end -->

        <div class="row">
            <div class="col-lg-12 col-md-12" style="margin-top: 26px;">
                <div class="post-list-row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('after_styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">

<link href="/css/map_style.css" rel="stylesheet" />
<link href="/css/employer_dashboard.css" rel="stylesheet" />
<style>
    .dataTables_wrapper .dataTables_paginate {
        display: none;
    }

    .serch-worker-btn-grp .btn-secondary {
        color: #696969;
        border-color: #b7b9cc;
        background-color: #fff;
    }

    .serch-worker-btn-grp .btn-secondary:focus {
        box-shadow: 0 0 0 0.2rem rgb(151 153 166 / 50%);
        background-color: #717384 !important;
        color: #fff !important;

    }

    .slider-selection {
        background: #1967D2 !important;
    }


    .slider.slider-horizontal {
        width: 100% !important;
        height: 20px;
    }

    .slider-handle {
        background-color: #fff !important;
        background-image: none !important;
        -webkit-box-shadow: 1px 1px 24px -2px rgba(0, 0, 0, 0.75) !important;
        -moz-box-shadow: 1px 1px 24px -2px rgba(0, 0, 0, 0.75) !important;
        box-shadow: 1px 1px 24px -2px rgba(0, 0, 0, 0.75) !important;
    }


    .tooltip-inner {
        max-width: 200px;
        padding: 3px 8px;
        color: #fff !important;
        text-align: center;
        background-color: transparent !important;
        border-radius: 4px;
    }

    .tooltip.top .tooltip-arrow {
        display: none !important;
    }

    .slider .tooltip.top {
        margin-top: 25px !important;
        opacity: 1 !important;
        background: #556EE6 !important;
        color: #f8f9fc !important;
        font-size: 13px !important;
        border-radius: 4px !important;
    }

    .screen-range .tooltip.top {
        opacity: 0 !important;
    }

    .slider.slider-horizontal .slider-track {
        height: 5px !important;
    }

    .slider-track-low,
    .slider-track-high {
        background: #D4E1F6 !important;
    }

    .slider-handle {
        width: 17px !important;
        height: 17px !important;
        box-shadow: none !important;
        border: 2px solid #1967D2 !important;
    }

    .btn-group .btn-group-sm {
        font-size: 13px !important;
        padding: 8px 3px !important;
    }

    /* table css */
    .dataTables_wrapper .dataTables_paginate {
        text-align: center !important;
        float: none !important;
        font-size: 13px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 5px 11px !important;
        border-radius: 50% !important;
    }

    .dataTables_wrapper .dataTables_paginate .current {
        background: #556EE6 !important;
        border: 1px solid #556EE6 !important;
        color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .current:hover {
        color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #3964e1b8 !important;
        border: 1px solid #556EE6 !important;
    }

    .action-buttons a {
        margin: 5px;
        font-weight: 400;
        color: #495057;
        font-size: 16px;
    }

    .card-post-menagement .card-body {
        box-shadow: none;
    }

    #example_wrapper table tbody td {
        font-size: 14px;
    }

    table.dataTable.no-footer {
        border: none;
    }

    .worker-list-footer {
        margin: 0 auto;
        margin-top: 25px;

    }

    .worker-list-footer .progress {
        height: 6px;
        background-color: #D4E1F6;
    }

    .worker-list-footer .progress-bar {
        background-color: #1967D2 !important;
    }

    .worker-list-footer label {
        font-size: 13px;
        color: #000;
    }

    .worker-list-footer span {
        font-size: 13px;
        color: #1967d2;
        text-decoration: underline;
    }

    .fa {
        color: #000;
    }
</style>
@endsection



@section('after_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA_J5AWTo2q7FPPKNdeQr1-ZEG_5Cg1FD8&libraries=places"></script>
<script type="text/javascript" src="/js/richmarker-compiled.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "classic",
            tags: true
        });

        // data table
        var oTable = $('#example').DataTable({
            "paging": true,
            "ordering": false,
            "info": false,
            'sDom': 'tp',
            "pageLength": 5,
            searching: true,
            destroy: true,
            oLanguage: {
                // oPaginate: {
                //     sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                //     sPrevious: '<span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                // }
            }

        });
        var oSettings = oTable.settings();
        $("#wrk-list-showing-head").text(`Showing 0-5 of ${oSettings[0].fnRecordsTotal()} workers`);
        $('#wrk-list-showing-foot').text(`Showing 5 of ${oSettings[0].fnRecordsTotal()} Jobs`);
        $('#showmorebutton').click(function() {
            oSettings[0]._iDisplayLength = oSettings[0].fnRecordsTotal();
            $("#wrk-list-showing-head").text(`Showing 0-${oSettings[0].fnRecordsTotal()} of ${oSettings[0].fnRecordsTotal()} workers`);
            $('#wrk-list-showing-foot').text(`Showing ${oSettings[0].fnRecordsTotal()} of ${oSettings[0].fnRecordsTotal()} Jobs`);
            oTable.draw();
        })

    });
    (function($) {
        $(document).ready(function() {
            $('.input-range').each(function() {
                var value = $(this).attr('data-slider-value');
                var separator = value.indexOf(',');
                if (separator !== -1) {
                    value = value.split(',');
                    value.forEach(function(item, i, arr) {
                        arr[i] = parseFloat(item);
                    });
                } else {
                    value = parseFloat(value);
                }
                $(this).slider({
                    formatter: function(value) {
                        console.log(value);
                        return 'HZ' + value;
                    },
                    min: parseFloat($(this).attr('data-slider-min')),
                    max: parseFloat($(this).attr('data-slider-max')),
                    range: $(this).attr('data-slider-range'),
                    value: value,
                    tooltip_split: $(this).attr('data-slider-tooltip_split'),
                    tooltip: $(this).attr('data-slider-tooltip')
                });
            });

        });
    })(jQuery);
</script>
@endsection