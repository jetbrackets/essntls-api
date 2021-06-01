			<!-- Main Header-->
			<div class="main-header side-header sticky">
				<div class="container-fluid">
					<div class="main-header-left">
						<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="{{url('index')}}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="mobile-logo" alt="logo"></a>
							<a href="{{url('index')}}"><img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="mobile-logo-dark" alt="logo"></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="">
								<span class="main-img-user" ><img alt="avatar" src="{{URL::asset('assets/img/users/1.jpg')}}"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title">Sonia Taylor</h6>
									<p class="main-notification-text">Web Designer</p>
								</div>
								<a class="dropdown-item border-top" href="{{url('profile')}}">
									<i class="fe fe-user"></i> My Profile
								</a>
								<a class="dropdown-item" href="{{url('profile')}}">
									<i class="fe fe-edit"></i> Edit Profile
								</a>
								<a class="dropdown-item" href="{{url('profile')}}">
									<i class="fe fe-settings"></i> Account Settings
								</a>
								<a class="dropdown-item" href="{{url('profile')}}">
									<i class="fe fe-settings"></i> Support
								</a>
								<a class="dropdown-item" href="{{url('profile')}}">
									<i class="fe fe-compass"></i> Activity
								</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
									<i class="fe fe-power"></i> Sign Out
								</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Main Header-->
