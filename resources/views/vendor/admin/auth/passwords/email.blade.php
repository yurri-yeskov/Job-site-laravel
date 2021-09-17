@extends('admin::layouts.auth')

@section('content')
	
	@if (session('status'))
		<div class="alert alert-success ml-0 mr-0 mb-5">
			{{ session('status') }}
		</div>
	@endif
    
    @include('admin::auth.passwords.inc.recover-form')
    
@endsection
