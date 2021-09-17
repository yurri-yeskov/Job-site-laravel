<header class="topbar">
	<?php
	$navbarTheme = (config('settings.style.admin_navbar_bg') == 'skin6') ? 'navbar-light' : 'navbar-dark';
	?>
	<nav class="navbar top-navbar navbar-expand-md {{ $navbarTheme }}">
		
		<div class="navbar-header">
			
			{{-- This is for the sidebar toggle which is visible on mobile only --}}
			<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
				<i class="ti-menu ti-close"></i>
			</a>
			
			{{-- Logo --}}
			<a class="navbar-brand" href="{{ url('/') }}" target="_blank">
				{{-- Logo text --}}
				<span class="logo-text">
					<img src="{{ imgUrl(config('settings.app.logo_dark'), 'adminLogo') }}" alt="{{ strtolower(config('settings.app.app_name')) }}" class="dark-logo img-fluid"/>
					<img src="{{ imgUrl(config('settings.app.logo_light'), 'adminLogo') }}" alt="{{ strtolower(config('settings.app.app_name')) }}" class="light-logo img-fluid"/>
				</span>
			</a>
			
			{{-- Toggle which is visible on mobile only --}}
			<a class="topbartoggler d-block d-md-none waves-effect waves-light"
			   href="javascript:void(0)"
			   data-toggle="collapse"
			   data-target="#navbarSupportedContent"
			   aria-controls="navbarSupportedContent"
			   aria-expanded="false"
			   aria-label="Toggle navigation"
			>
				<i class="ti-more"></i>
			</a>
			
		</div>
		
		<div class="navbar-collapse collapse" id="navbarSupportedContent">
			{{-- Toggle and nav items --}}
			<ul class="navbar-nav mr-auto float-left">
				<li class="nav-item">
					<a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)">
						<i class="ti-menu"></i>
					</a>
				</li>
			</ul>
			
			{{-- Right side toggle and nav items --}}
			<ul class="navbar-nav float-right">
				{{-- Profile --}}
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-dark"
					   href=""
					   data-toggle="dropdown"
					   aria-haspopup="true"
					   aria-expanded="false"
					>
						<img src="{{ auth()->user()->photo_url }}"
							 alt="user"
							 width="30"
							 class="profile-pic rounded-circle"
						/>
					</a>
					<div class="dropdown-menu mailbox dropdown-menu-right">
						<ul class="dropdown-user list-style-none">
							<li>
								<div class="dw-user-box p-3 d-flex">
									<div class="u-img">
										<img src="{{ auth()->user()->photo_url }}"
											 alt="user"
											 class="rounded"
											 width="80"
										>
									</div>
									<div class="u-text ml-2">
										<h4 class="mb-0">{{ auth()->user()->name }}</h4>
										<p class="text-muted mb-1 font-14">{{ auth()->user()->email }}</p>
										<a href="{{ admin_url('account') }}" class="btn btn-rounded btn-danger btn-sm text-white d-inline-block">
											{{ trans('admin.my_account') }}
										</a>
									</div>
								</div>
							</li>
							<li role="separator" class="dropdown-divider"></li>
							<li class="user-list">
								<a class="px-3 py-2" href="{{ admin_url('account') }}">
									<i class="ti-settings"></i> {{ trans('admin.my_account') }}
								</a>
							</li>
							<li role="separator" class="dropdown-divider"></li>
							<li class="user-list">
								<a class="px-3 py-2" href="{{ \App\Helpers\UrlGen::logout() }}">
									<i class="fa fa-power-off"></i> {{ trans('admin.logout') }}
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		
	</nav>
</header>
