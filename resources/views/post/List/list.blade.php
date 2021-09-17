@extends('layouts.employer-master')
@section('content')
<!-- Begin emoji-picker Stylesheets -->
<?php
// echo "<pre>";
// print_r($allPosts);
// die;
$isForm = (isset($_GET['c'])) ? $_GET['c'] : '';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column ">

    <!-- Main Content -->
    <div id="content" class="emplyoer-dash-content">

        <!-- Begin Page Content -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-md-3 col-sm-12">
                    <!-- <h1 class="h3 mb-0 page-title">MANAGE JOBS</h1> -->
                </div>
                <div class="offset-md-6 col-md-3 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/company/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">manage</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Heading -->

            <!-- <h1 class="dashboard-title">MANAGE JOBS</h1>
            <div class="d-sm-flex align-items-center justify-content-between mb-2"></div> -->

            <!-- HEADER SECTION -->
            <div class="row">
                <!-- post job section -->
                <div class="w-100" id="post_free_job_form_section" @if($isForm) style="display: block;" @else style="display: none;" @endif>
                    <div class="col-sm-12">
                        <h1 class="h3 mb-0 page-title">POST A NEW JOB</h1>
                    </div>
                    <div class="col-12 py-4">
                        @include('post.List.component.createForm')
                    </div>
                </div>
                <!--  -->
                <div class="col-12">
                    <h1 class="h3 mb-0 page-title">MANAGE JOBS</h1>
                </div>
                <div class="col-lg-8 col-md-12 py-4">

                    <div class="post-list-row">

                        <!-- <div class="col-lg-8 col-md-12"> -->
                        <!-- top bar of table -->

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
                                <div class="col">
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" class="form-control header-search" id="myInputTextField" placeholder="Search...">
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="#" onclick="handlePostnewJob()"> <button class="post-list-post-button">Post a <b>FREE</b> Job!</button></a>
                                </div>
                            </div>
                        </div>

                        <!-- end -->
                        <table id="example" class="display table-post-management">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th>Appliccations</th>
                                    <th>Created & Expired</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPosts as $item)
                                <tr>
                                    <td><span class="post-list-u-name"><i class="fa fa-user" aria-hidden="true"></i></span></td>
                                    <td>{{$item->title}}</td>
                                    <td>4 Applied</td>
                                    <td>
                                        <?php
                                        $date = strtotime($item->created_at);
                                        ?>
                                        {{ date('d M Y h:i:s', $date)}}
                                    </td>
                                    <td class="action-buttons">
                                        <span>
                                            <a href="/company/post/view/{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </span>
                                        <span><a href="/company/post/edit/{{$item->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                                        <span><a href="#" onclick="deletePost({{$item->id}})"><i class="fa fa-trash" aria-hidden="true"></i></a></span>
                                    </td>
                                </tr>
                                @endforeach
                                </tfoot>
                        </table>
                        <!-- </div> -->
                        <!-- <div class="col-lg-4 col-md-12"> -->

                        <!-- </div> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 py-4">
                    <div class="card card-post-menagement">
                        <h5 class="card-title">Manage Applicants</h5>
                        <div class="card-body">
                            Manage your job posting applicants
                        </div>
                        <div style="padding: 8px 8px;    margin-top: 30px;">
                            <a href="#" class="btn btn-primary">Manage Applicants</a>

                        </div>
                    </div>

                    <div class="card card-post-menagement" style="margin-top: 30px;">
                        <div class="card-title">
                            Contact Summary
                        </div>
                        <table class="table">

                            <tbody>
                                <tr>
                                    <td scope="row">Number of posted jobs :
                                    </td>
                                    <td>108</td>

                                </tr>
                                <tr>
                                    <td scope="row">Number of applicants:</td>
                                    <td>157</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- HEADER  END -->

            <!-- BODY SECTION -->
            <!-- <div class="row"> -->

            <!-- </div> -->
            <!-- BODY END -->
        </div>

        <!-- Modal -->

        <!-- <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        ...
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    @endsection
    @section('after_styles')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/css/employer_dashboard.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" />
    <style>
        /* form styles */
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

        .select2-container--classic .select2-selection--multiple {
            padding: 3px 3px 8px 3px !important;
            border: 1px solid #ddd !important;
        }

        /* form styles end */
        .dataTables_wrapper .dataTables_paginate {
            text-align: center !important;
            float: none !important;
            font-size: 13px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0;
            border-radius: 50% !important;
            width: 33px;
            height: 33px;
            line-height: 33px;
            text-align: center;
        }

        .dataTables_wrapper .dataTables_paginate .current {
            background: #556EE6 !important;
            border: 1px solid #556EE6 !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .current:hover span i,
        .paginate_button:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !IMPORTANT;
        }

        .paginate_button:hover span i {
            color: #fff;
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
    </style>
    @endsection
    @section('after_scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>
        var click = false;
        var isForm = '<?php echo $isForm; ?>';
        function handlePostnewJob() {

            $("#post_free_job_form_section").toggle();
            if (click) return null;
            if (!isForm) {
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
                });
                $('.select2-lang').select2({
                    theme: "classic"
                });
            }
            click = true;
        }
        // form script 
        $('.ckeditors').each(function(i, area) {
            CKEDITOR.replace(area, {
                toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Underline', 'BulletedList', 'NumberedList', 'JustifyLeft']
                }]
            })
        })
        $(document).ready(function() {
           
            if (isForm) {
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
            }
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
            e.target.job_title.value == "" ? validation(e.target.job_title.id) : ''; // job_title
            e.target.edu_level.value == "" ? validation(e.target.edu_level.id) : ''; // edu_level
            e.target.langs.value == "" ? validation(e.target.langs.id) : ''; // founded_year
            e.target.job_type.value == "" ? validation(e.target.job_type.id) : ''; // founded_year
            e.target.experience.value == "" ? validation(e.target.experience.id) : ''; // experience

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
        // form script end
        $(document).ready(function() {
            var oTable = $('#example').DataTable({
                "paging": true,
                "ordering": false,
                "pageLength": 5,
                "info": false,
                'sDom': 'tp',
                searching: true,
                oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                        sPrevious: '<span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                    }
                }

            });
            $('#myInputTextField').keyup(function() {
                oTable.search($(this).val()).draw();
            })

        });


        function deletePost(id) {
            var base_url = window.location.origin;
            var retVal = confirm("Are you sure, Want to delete this item?");
            if (retVal == true) {
                console.log('base_url', base_url)
                window.location = `${base_url}/company/post/delete/${id}`
                return true;
            } else {
                return false;
            }
        }
    </script>
    @endsection