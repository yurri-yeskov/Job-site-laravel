@extends('admin::layouts.auth')

@section('content')
	
	@if (isset($errors) and $errors->any())
        <div class="alert alert-danger ml-0 mr-0 mb-5">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
	@endif
    
    @if (session('status'))
        <div class="alert alert-success ml-0 mr-0 mb-5">
            {{ session('status') }}
        </div>
    @endif
    
    <div id="loginform">
        
        <div class="logo">
            <h3 class="box-title mb-3">{{ trans('admin.login') }}</h3>
        </div>
        
        {{-- Form --}}
        <div class="row">
            <div class="col-12">
                
                <form class="form-horizontal mt-3" id="loginform" action="{{ \App\Helpers\UrlGen::login() }}" method="post">
                    {!! csrf_field() !!}

                    {{-- login/email --}}
                    <div class="form-group mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="">
                            <input class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                                   type="text"
                                   name="login"
                                   value="{{ old('email') }}"
                                   placeholder="{{ trans('admin.email_address') }}"
                            >
                        </div>
        
                        @if ($errors->has('login'))
                            <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    
                    {{-- password --}}
                    <div class="form-group mb-4{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="">
                            <input class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                                   type="password"
                                   name="password"
                                   placeholder="{{ trans('admin.password') }}"
                            >
                        </div>
    
                        @if ($errors->has('password'))
                            <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    
                    {{-- captcha --}}
                    @include('layouts.inc.tools.captcha')
                    
                    {{-- remember me & password recover --}}
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="checkbox checkbox-info pt-0">
                                <input id="checkbox-signup" name="remember" type="checkbox" class="material-inputs chk-col-indigo">
                                <label for="checkbox-signup"> {{ trans('admin.remember_me') }} </label>
                            </div>
                            <div class="ml-auto">
                                <a href="javascript:void(0)" id="to-recover" class="text-muted float-right">
                                    <i class="fa fa-lock mr-1"></i> {{ trans('admin.forgot_your_password') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- button --}}
                    <div class="form-group text-center mt-4">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block waves-effect waves-light" type="submit">{{ trans('admin.login') }}</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        
    </div>
    
    @include('admin::auth.passwords.inc.recover-form')
    
@endsection
