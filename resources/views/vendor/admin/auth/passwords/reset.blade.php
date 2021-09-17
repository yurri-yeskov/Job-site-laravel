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
    
    <div id="recoverform">
        <div class="logo">
            <h3 class="font-weight-medium mb-3">{{ trans('admin.reset_password') }}</h3>
        </div>
        
        <div class="row">
            <div class="col-12">
                <form class="form-horizontal mt-3" action="{{ url('password/reset') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    {{-- email --}}
                    <div class="form-group mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="">
                            <input class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                                   type="text"
                                   name="email"
                                   value="{{ $email ?? old('email') }}"
                                   placeholder="{{ trans('admin.email_address') }}"
                            >
                        </div>
                        
                        @if ($errors->has('email'))
                            <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    
                    {{-- password --}}
                    <div class="form-group mb-4{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="">
                            <input class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}"
                                   type="password"
                                   name="password"
                                   placeholder="{{ trans('admin.password') }}"
                            >
                        </div>
                        
                        @if ($errors->has('password'))
                            <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    
                    {{-- confirm_password --}}
                    <div class="form-group mb-4{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                        <div class="">
                            <input class="form-control{{ $errors->has('password_confirmation') ? ' form-control-danger' : '' }}"
                                   type="password"
                                   name="confirm_password"
                                   placeholder="{{ trans('admin.confirm_password') }}"
                            >
                        </div>
                        
                        @if ($errors->has('password_confirmation'))
                            <small class="form-control-feedback">{{ $errors->first('password_confirmation') }}</small>
                        @endif
                    </div>
                    
                    {{-- captcha --}}
                    @include('layouts.inc.tools.captcha')
                    
                    {{-- remember me & password recover --}}
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="ml-auto">
                                <a href="{{ admin_url('login') }}" id="to-login" class="text-muted float-right">
                                    <i class="fas fa-sign-in-alt mr-1"></i> {{ trans('admin.login') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- button --}}
                    <div class="form-group text-center mt-4">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block waves-effect waves-light" type="submit">{{ trans('admin.reset_password') }}</button>
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
        
    </div>
    
@endsection
