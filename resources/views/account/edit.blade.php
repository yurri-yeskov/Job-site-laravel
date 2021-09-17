@extends('layouts.workers-master')
@section('content')
<style>
.card.shadow.mb-4 {
    margin-bottom: 79% !important;
}
</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-md-3 col-sm-12">
                    <h1 class="h3 mb-0 page-title">Administration</h1>
                </div>
                <div class="offset-md-6 col-md-3 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administration</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Heading -->
            @include('flash::message')

            @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><strong>{{ t('oops_an_error_has_occurred') }}</strong></h5>
                <ul class="list list-check">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow account-detail-form">
                        <div class="card-header py-3 align-items-center justify-content-between">
                            <h6 class="page-sub-title account-detail"> {{ t('Account Details') }}</h6>
                            <p class="last-login-detail">
                                {{ t('You last logged in at') }}:
                                {{ \App\Helpers\Date::format($user->last_login_at, 'datetime') }}
                            </p>
                        </div>
                        <form name="details" class="form-horizontal" role="form" method="POST"
                            action="{{ url('account') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="PUT">
                            <input name="panel" type="hidden" value="user">
                            {{-- user_type_id --}}
                            <?php $userTypeIdError = (isset($errors) && $errors->has('user_type_id')) ? ' is-invalid' : ''; ?>
                            <div class="card-body">
                                {{-- name --}}
                                <?php $nameError = (isset($errors) && $errors->has('name')) ? ' is-invalid' : ''; ?>
                                <div class="form-group row required">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ t('Name') }}</label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" class="form-control{{ $nameError }}"
                                            placeholder="" value="{{ old('name', $user->name) }}">
                                    </div>
                                </div>
                                {{-- username --}}
                                <?php $usernameError = (isset($errors) && $errors->has('username')) ? ' is-invalid' : ''; ?>
                                <div class="form-group row required">
                                    <label for="inputPassword"
                                        class="col-sm-2 col-form-label">{{ t('Username') }}</label>
                                    <div class="col-sm-9">
                                        <input id="username" name="username" type="text"
                                            class="form-control{{ $usernameError }}" placeholder="{{ t('Username') }}"
                                            value="{{ old('username', $user->email) }}" readonly>
                                    </div>
                                </div>
                                {{-- email --}}
                                <?php $emailError = (isset($errors) && $errors->has('email')) ? ' is-invalid' : ''; ?>
                                <div class="form-group row required">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ t('email') }}
                                        <label class="label label-danger" style="color: red;">*</label>
                                    </label>
                                    <div class="col-sm-9">
                                        <input id="email" name="email" type="email"
                                            class="form-control{{ $emailError }}" placeholder="{{ t('email') }}"
                                            value="{{ old('email', $user->email) }}" readonly>
                                    </div>
                                </div>
                                {{-- phone --}}
                                <?php $phoneError = (isset($errors) && $errors->has('phone')) ? ' is-invalid' : ''; ?>
                                <div class="form-group row required">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ t('phone') }}</label>
                                    <div class="col-sm-9">
                                        <input id="phone" name="phone" type="text" class="form-control{{ $phoneError }}"
                                            placeholder="{{ (!isEnabledField('email')) ? t('Mobile Phone Number') : t('phone_number') }}"
                                            value="{{ phoneFormat(old('phone', $user->phone), old('country_code', $user->country_code)) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-2 terminate-link-section">
                                        <a class="terminate-account-link" href="#" data-toggle="modal"
                                            data-target="#terminateModal"
                                            href="javascript:;">{{ t('Terminate Account') }}</a>
                                    </div>
                                    <div class="col-sm-5 btn-section update-btn-section">
                                        <button type="submit" class="profile-update-btn">{{ t('Update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow update-password-form">
                        <div class="card-header py-3 align-items-center justify-content-between">
                            <h6 class="page-sub-title account-detail">Update Password</h6>
                        </div>
                        <form name="settings" class="form-horizontal" role="form" method="POST"
                            action="{{ url('account/settings') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="PUT">
                            <input name="panel" type="hidden" value="settings">
                            <input name="gender_id" type="hidden" value="{{ $user->gender_id }}">
                            <input name="name" type="hidden" value="{{ $user->name }}">
                            <input name="phone" type="hidden" value="{{ $user->phone }}">
                            <input name="email" type="hidden" value="{{ $user->email }}">
                            <div class="card-body">
                                {{--old password --}}
                                <?php $passwordError = (isset($errors) && $errors->has('old_password')) ? ' is-invalid' : ''; ?>
                                <div class="form-group row required">
                                    <label for="inputPassword"
                                        class="col-sm-3 col-form-label">{{ t('Old Password') }}</label>
                                    <div class="col-sm-8">
                                        <input name="old_password" type="password"
                                            class="form-control{{ $passwordError }}" id="old_password"
                                            placeholder="{{ t('Old Password') }}">
                                    </div>
                                </div>
                                {{-- password --}}
                                <?php $passwordError = (isset($errors) && $errors->has('password')) ? ' is-invalid' : ''; ?>
                                <div class="form-group row required">
                                    <label for="inputPassword"
                                        class="col-sm-3 col-form-label">{{ t('New Password') }}</label>
                                    <div class="col-sm-8">
                                        <input id="password" name="password" type="password"
                                            class="form-control{{ $passwordError }}"
                                            placeholder="{{ t('New Password') }}">
                                    </div>
                                </div>
                                {{-- password_confirmation --}}
                                <?php $passwordError = (isset($errors) && $errors->has('password_confirmation')) ? ' is-invalid' : ''; ?>
                                <div
                                    class="form-group row <?php echo (isset($errors) && $errors->has('password_confirmation')) ? ' is-invalid' : ''; ?>">
                                    <label for="inputPassword"
                                        class="col-sm-3 col-form-label">{{ t('Confirm Password') }}</label>
                                    <div class="col-sm-8">
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                            class="form-control{{ $passwordError }}"
                                            placeholder="{{ t('Confirm Password') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 offset-sm-3 lost-password-section">
                                        <!-- <a class="terminate-account-link" data-toggle="modal"
                                            data-target="#lostPassModal"
                                            href="javascript:;">{{ t('Lost Password') }}</a> -->
                                        <a class="terminate-account-link"
                                            href="{{url('password/reset')}}">{{ t('Lost Password') }}</a>
                                    </div>
                                    <div class="col-sm-5 btn-section update-btn-section">
                                        <button type="submit" class="profile-update-btn">{{ t('Update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Terminate Account Modal-->
    <div class="modal fade" id="terminateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog terminated-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="terminate-account-text mt-4">
                        Please confirm you would like to terminate your account.
                    </p>
                    <div class="row mb-4">
                        <div class="col-md-7 text-right cancel-termination">
                            <button class="cancel-termination-btn" data-dismiss="modal">Cancel Termination</button>
                        </div>
                        <div class="col-md-5 text-left popup-terminate ">
                            <form action="{{ url('account/close') }}" method="post">
                                {!! csrf_field() !!}
                                <button class="terminate-account-link" type="submit">
                                    {{ t('Terminate Account') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Update password Modal-->
    <div class="modal fade" id="lostPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="" id="forgot-password" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Registered Email address</label>
                            <input type="email" class="form-control" name="login" id="forgotpassword_email"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <button class="forgot-password-btn" id="submit-forgotpassword" type="button"> Send</button>
                        <button type="button" class="profile-update-btn" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection