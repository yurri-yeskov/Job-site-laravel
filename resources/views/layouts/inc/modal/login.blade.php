<div class="modal fade" id="quickLogin" tabindex="-1" role="dialog">
	<div class="modal-dialog  modal-sm">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">{{ t('Close') }}</span>
				</button>
			</div>
			<div class="signup-wrap">


				<div class="modal-body">
					<div class="signup-heading">
						<img src="{{ asset('/images/site_logo.png') }}" title="" />
					</div>
					
					<div class="signup-heading">{{ t('sign_in') }}</div>


					<form role="form" method="POST" id="loginform" action="{{ \App\Helpers\UrlGen::login() }}">
						{!! csrf_field() !!}
						<input type="hidden" name="language_code" value="{{ config('app.locale') }}">
						<?php
						$loginValue = (session()->has('login')) ? session('login') : old('login');
						$loginField = getLoginField($loginValue);
						if ($loginField == 'phone') {
							$loginValue = phoneFormat($loginValue, old('country', config('country.code')));
						}
						?>
						<!-- login -->
						<?php $loginError = (isset($errors) and $errors->has('login')) ? ' is-invalid' : ''; ?>
						<div class="form-group row required">
							<div class="col-md-12">
								<div class="input-group show-pwd-group">
									<input id="mLogin" name="login"  type="email" class="form-control{{ $loginError }}" placeholder="{{ t('email') }}" autocomplete="off" value="{{ $loginValue }}">
									
									<span class="icon-append show-pwd">
										<button type="button" class="email" >
											<img src="{{ asset('/images/email_icon.png') }}" class="input-img" />
										</button>
									</span>
								</div>
								<span id="slogin" style="display:none; color:#ff0000" >Please enter email</span>
							</div>
						</div>
					
						<!-- password -->
						<?php $passwordError = (isset($errors) and $errors->has('password')) ? ' is-invalid' : ''; ?>
						<div class="form-group row required">
							<div class="col-md-12">
								<div class="input-group show-pwd-group">
									<input id="mPassword" name="password" id="passwordid" type="password" class="form-control{{ $passwordError }}" placeholder="{{ t('password') }}" autocomplete="off" >
									<span class="icon-append show-pwd">
										<button type="button" class="lock">
											<img src="{{ asset('/images/p_lock.png') }}" class="input-imglock" />
										</button>
									</span>
								</div>
							<span style="display:none;color:#ff0000" id="spassword">Please  enter password</span>
							</div>
						</div>
					
						<!-- remember -->
						<?php $rememberError = (isset($errors) and $errors->has('remember')) ? ' is-invalid' : ''; ?>
						<div class="form-group">
						    <div class="custom-control custom-checkbox {{ $rememberError }} pull-left">
						        <input type="checkbox" class="custom-control-input" id="mRemember" name="remember" value="1">
						        <label class="custom-control-label" for="mRemember">{{t('remember_me')}}</label>
						    </div>
							<p class="pull-right f-pass">
								<a href="#" class="fpasswordModal">
									{{ t('forgot_password') }}
								</a> 
							</p>
							<div style=" clear:both"></div>
						</div>
						
						<input type="hidden" name="quickLoginForm" value="1">

						@if (isset($errors) and $errors->any() and old('quickLoginForm')=='1')
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<!-- Button  -->
						<div class="form-group row mb-5">
							<div class="col-md-12">
								<button type="button" onclick="validate(event)" class="btn btn-custom btn-lg "> {{ t('login') }} </button>
							</div>
						</div>
					</form>

					<div class="row d-flex justify-content-center signupOr mt-4 mb-4">
						<div class="col-xl-12 mb-1">
							<hr class="hrOr">
							<span class="spanOr rounded">{{ t('or') }} {{ t('login') }}</span>
						</div>
					</div>
					<div class="social-icon-main">
						<ul>
							<li class="btn-lkin"><a href="{{ url('auth/linkedin') }}" class="btn-lkin"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M50 43.7506C50 47.1875 47.1876 50 43.7491 50H6.25096C2.81247 50 0 47.1875 0 43.7506V6.24943C0 2.81094 2.81247 0 6.25096 0H43.7506C47.1876 0 50.0016 2.81094 50.0016 6.24943V43.7506H50Z" fill="#0076B4"/>
							<path d="M15.1942 42.6039H7.77058V18.7437H15.1942V42.6039ZM11.4839 15.4839C9.10047 15.4839 7.17969 13.557 7.17969 11.1827C7.17969 8.80696 9.102 6.88159 11.4839 6.88159C13.8566 6.88159 15.782 8.80849 15.782 11.1827C15.7835 13.557 13.8566 15.4839 11.4839 15.4839ZM42.9692 42.6039H35.5563V30.9998C35.5563 28.2332 35.5075 24.6741 31.701 24.6741C27.8427 24.6741 27.2533 27.6896 27.2533 30.8013V42.6024H19.8465V18.7437H26.9556V22.0051H27.0563C28.0473 20.1286 30.4658 18.1513 34.0738 18.1513C41.5829 18.1513 42.9692 23.0922 42.9692 29.5173V42.6039Z" fill="white"/>
							</svg>
							</a>
						</li>
							<li class="btn-tw">
								<a href="{{ url('auth/twitter') }}" class="btn-tw">
									<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M50 43.7506C50 47.1875 47.1875 50 43.749 50H6.24943C2.81247 50 0 47.1875 0 43.7506V6.24943C0 2.81094 2.81247 0 6.24943 0H43.749C47.186 0 50 2.81094 50 6.24943V43.7506Z" fill="#1DA1F2"/>
										<path d="M42.5773 14.7311C41.3131 15.2914 39.9542 15.6716 38.5266 15.8411C39.9832 14.9693 41.0993 13.5874 41.6276 11.9384C40.2657 12.7461 38.7541 13.334 37.1493 13.65C35.8622 12.2805 34.0315 11.4224 32.0023 11.4224C28.1073 11.4224 24.9498 14.5799 24.9498 18.4734C24.9498 19.0261 25.0124 19.5636 25.133 20.0812C19.2714 19.788 14.074 16.9786 10.5958 12.7141C9.98961 13.7539 9.64149 14.9677 9.64149 16.2594C9.64149 18.7055 10.8859 20.8644 12.7792 22.1287C11.6218 22.092 10.5332 21.7745 9.58347 21.2477C9.58347 21.2767 9.58347 21.3057 9.58347 21.3363C9.58347 24.7549 12.0142 27.6025 15.2389 28.2529C14.6481 28.4132 14.0236 28.5003 13.3808 28.5003C12.9273 28.5003 12.486 28.456 12.0539 28.372C12.9517 31.1738 15.5565 33.2152 18.6438 33.2717C16.2283 35.1619 13.1884 36.2903 9.88426 36.2903C9.31474 36.2903 8.75286 36.2582 8.20166 36.191C11.321 38.1928 15.0298 39.3593 19.0118 39.3593C31.984 39.3593 39.0778 28.6133 39.0778 19.2948C39.0778 18.9879 39.0701 18.6841 39.0564 18.3818C40.4382 17.3878 41.6322 16.1449 42.5773 14.7311Z" fill="white"/>
									</svg>
								</a>
							</li>
							<li class="btn-fb">
								<a href="{{ url('auth/facebook') }}" class="btn-fb"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M50 43.7506C50 47.1875 47.1876 50 43.7506 50H6.25096C2.81247 50 0 47.1875 0 43.7506V6.24943C0 2.81247 2.81247 0 6.25096 0H43.7521C47.1891 0 50.0016 2.81247 50.0016 6.24943V43.7506H50Z" fill="#3C579E"/>
									<path d="M26.9061 49.9999V30.5416H19.9604V23.6051H26.9061V17.1999C26.9061 10.7398 30.7202 6.93335 36.4841 6.93335C39.2462 6.93335 41.4968 7.22956 42.1885 7.31964V14.5753L37.5514 14.5737C34.4152 14.5737 33.8304 16.1281 33.8304 18.3115V23.6036H41.8602L40.7257 30.5416H33.832V49.9999H26.9061Z" fill="white"/>
									</svg>
								</a>
							</li>
							<li ><a href="{{ url('auth/google') }}">
								<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M50 39.7316C50 45.4018 45.4018 50.0037 39.7316 50.0037H10.272C4.59821 50 0 45.4018 0 39.7316V10.272C0 4.59821 4.59821 0 10.272 0H39.7316C45.4055 0 50 4.59821 50 10.2684V39.7316Z" fill="#DB4639"/>
									<path d="M29.0679 24.791C29.0679 25.7743 29.1308 26.7316 28.8794 27.6853C28.6761 28.4504 28.3915 29.1897 28.0293 29.8956C27.3159 31.2707 26.3105 32.4942 25.087 33.4441C23.8598 34.4015 22.422 35.0927 20.8991 35.4253C20.1487 35.5954 19.3799 35.6767 18.6111 35.6767C12.7413 35.6767 7.98047 30.8419 7.98047 24.8761C7.98047 18.9139 12.7413 14.0754 18.6111 14.0754C21.3648 14.0754 23.8709 15.1363 25.7597 16.8772L23.0208 19.6606H22.847C21.6975 18.6921 20.2227 18.1118 18.6111 18.1118C14.9332 18.1118 11.954 21.1428 11.954 24.8761C11.954 28.613 14.9332 31.644 18.6111 31.644C21.5274 31.644 24.0077 29.7367 24.9059 27.0828H18.6924V23.3754H25.1055H28.9607H29.0716C29.0679 23.8485 29.0679 24.3216 29.0679 24.791ZM41.8498 23.294H38.7523V20.1965H35.6363V23.294H32.5425V26.4063H35.6363V29.5038H38.7523V26.4063H41.8498V23.294Z" fill="url(#paint1_linear)"/>
									<defs>
									<linearGradient id="paint1_linear" x1="24.9166" y1="14.0802" x2="24.9166" y2="35.6807" gradientUnits="userSpaceOnUse">
									<stop stop-color="white"/>
									<stop offset="0.4131" stop-color="#F5F5F5"/>
									<stop offset="1" stop-color="#E0E0E0"/>
									</linearGradient>
									</defs>
									</svg>
								</a>
							</li>
							<li class="btn-yw"><a href="{{ url('auth/yahoo') }}" class="btn-yw">
								<svg width="50" height="48" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M16.5645 4.56297C16.4809 4.58971 16.3011 4.74569 16.0292 5.02646L15.0716 6.0916L13.8756 7.50436C13.4574 8.00796 13.081 8.51156 12.7297 9.0107C12.3826 9.50539 12.0731 9.94214 11.8097 10.3254C11.542 10.7042 11.3747 10.9939 11.2995 11.2034C11.2827 11.3103 11.2744 11.6089 11.2744 12.0992C11.2744 12.5983 11.2827 13.142 11.2869 13.7258C11.2953 14.3141 11.3036 14.8623 11.312 15.3926C11.3204 15.914 11.3329 16.2572 11.3496 16.431C11.4165 16.4578 11.588 16.4667 11.864 16.4667H12.7297C13.0433 16.4667 13.3361 16.4756 13.6121 16.489C13.8881 16.5023 14.0763 16.5246 14.1808 16.5603L14.1557 17.9507C14.0554 17.9507 13.8337 17.9463 13.4824 17.9285C13.1353 17.9195 12.7213 17.9106 12.2571 17.9106H9.49703C9.30884 17.9106 9.02447 17.9151 8.65646 17.9285C8.28844 17.9463 7.89117 17.9552 7.46879 17.9686C7.04642 17.9819 6.64495 17.9908 6.27276 17.9908H5.43218L5.58273 16.6672H6.10547C6.36057 16.6672 6.61566 16.6628 6.87912 16.6494C7.14259 16.6449 7.39352 16.6048 7.62771 16.538C7.86608 16.4711 8.03754 16.3463 8.15045 16.1725C8.20064 16.0968 8.23409 15.8249 8.24663 15.3659C8.26336 14.9068 8.27172 14.3765 8.27172 13.7882C8.27172 13.1955 8.28009 12.6295 8.28009 12.0902C8.28846 11.5555 8.29264 11.1945 8.30518 11.0117C8.32609 10.9003 8.22155 10.6374 7.99572 10.2095C7.7699 9.7817 7.49387 9.26028 7.16349 8.6408L6.0971 6.6264L4.9889 4.53623L3.97269 2.88281C3.66322 2.38813 3.42065 2.04942 3.245 1.87561H0.572754V0.115234H9.36739V0.248935H9.39248L9.36739 0.551991V1.87561H6.68258L7.69042 3.89448L8.72338 5.9579L9.63923 7.78513L10.3543 9.22017L13.9341 4.37579H11.7553L11.4751 2.61541H19.241L19.1783 2.73129H19.2159L18.6388 3.90785H18.6137L18.3837 4.37579H17.0287C16.9451 4.43372 16.8656 4.46938 16.7862 4.4872C16.7025 4.5184 16.6315 4.53623 16.5645 4.56297Z" fill="white"/>
									</svg>

								</a>
							</li>
						</ul>
					</div>

					<div class="form-group row mt-5">
						<div class="col-md-12 signupLogin">
							<a href="#" class="openSignup">{{ t('donot_have_account') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@push('scripts')
 <script type="text/javascript">
 function validate(event)
 {
 	 var test=true;
     var l=document.getElementById('mLogin');
     var p=document.getElementById('mPassword');
     var sl=document.getElementById('slogin');
     var sp=document.getElementById('spassword');

     if(l.value=='')
    {
      sl.style.display='block';
      test=false;
    }
    else
    {
      sl.style.display='none';
    }
    if(p.value=='')
    {
      sp.style.display='block';
      test=false;
    }
    else
    {
      sp.style.display='none';
    }
    if(test==true)
    {
       document.getElementById('loginform').submit();
    }
 }
 </script>
 @endpush
