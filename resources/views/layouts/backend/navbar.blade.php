<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-dark navbar-static">
	<div class="d-flex flex-1 d-lg-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-paragraph-justify3"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-transmission"></i>
		</button>
	</div>

	<div class="navbar-brand text-center text-lg-left">
		<a href="{{ route('backend') }}" class="d-inline-block">
			<img src="{{ asset('assets/images/lta-logo-text.png') }}" class="d-none d-sm-block" alt="Logo">
			<img src="{{ asset('assets/images/lta-logo-text.png') }}" class="d-sm-none" alt="Logo">
		</a>
	</div>

	<div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
		<ul class="navbar-nav">
			
		</ul>

		<span class="badge badge-success my-3 my-lg-0 ml-lg-3">Online</span>

		<ul class="navbar-nav ml-lg-auto">
		</ul>
	</div>

	<ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
		<li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
			<a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100" data-toggle="dropdown">
				<img src="{{ asset('assets/images/user.png') }}" class="rounded-pill mr-lg-2" height="34" alt="">
				<span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
			</a>

			<div class="dropdown-menu dropdown-menu-right">
				<a href="{{ route('backend.password') }}" class="dropdown-item">
					<i class="icon-lock"></i> Update Password
				</a>
				@if (auth()->user()->role_id==1)
				<a href="{{ route('backend.users') }}" class="dropdown-item">
					<i class="icon-user-plus"></i> Users Management
				</a>
				<a href="{{ route('backend.approval_hrd') }}" class="dropdown-item">
					<i class="icon-user"></i> Approval HRD
				</a>
				@endif
				@if (auth()->user()->role_id==1 || auth()->user()->role_id==2)
				<a href="{{ route('backend.history') }}" class="dropdown-item">
					<i class="icon-history"></i> History
				</a>
				@endif
				<a href="{{ route('backend.logout') }}" class="dropdown-item">
					<i class="icon-switch2"></i> Logout
				</a>
			</div>
		</li>
	</ul>
</div>
<!-- /main navbar -->