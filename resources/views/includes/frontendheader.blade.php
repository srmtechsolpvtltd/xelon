<header class="main-header">
	<!-- Logo -->

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="{!!Request::root()!!}" class="logo"> <img src="{!!Request::root().'/images/logo.png'!!}" alt="" /> </a>
		<!-- Navbar Right Menu -->
		@if (Auth::user())
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Messages: style can be found in dropdown.less-->
					<?php /*?>
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o fs-20 mt-18"></i> <span class="label label-warning">10</span> </a>
						<ul class="dropdown-menu">
							<li class="header">You have 10 notifications</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li>
										<a href="#"> <i class="fa fa-users text-aqua"></i> 5 new members joined today </a>
									</li>
									<li>
										<a href="#"> <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems </a>
									</li>
									<li>
										<a href="#"> <i class="fa fa-users text-red"></i> 5 new members joined </a>
									</li>
									<li>
										<a href="#"> <i class="fa fa-shopping-cart text-green"></i> 25 sales made </a>
									</li>
									<li>
										<a href="#"> <i class="fa fa-user text-red"></i> You changed your username </a>
									</li>
								</ul>
							</li>
							<li class="footer"><a href="#">View all</a>
							</li>
						</ul>
					</li>
					<?php */?>
					<!-- Tasks: style can be found in dropdown.less -->

					<!-- User Account: style can be found in dropdown.less -->
					<?php
					$photo = 'user-pic.png';
					if(!empty(Auth::user()->photo)){
						$photo = '/profile/'.Auth::user()->photo;
					}	
					?>
					<li class="dropdown user user-menu">
						<a href="#" class="ripplelink dropdown-toggle" data-toggle="dropdown"><span class="ink animate" style="height: 165px; width: 165px; top: -2.5px; left: 42.5px;"></span> <img src="{!!Request::root().'/images/'.$photo!!}" class="user-image" alt="User Image"> <span class="hidden-xs user_name">{!!Auth::user()->name!!}<i class="fa fa-chevron-down"></i></span> </a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header"> <img src="{!!Request::root().'/images/'.$photo!!}" alt="User Image">
								<p> {!!Auth::user()->name!!} <small>Member since {!!Auth::user()->created_at!!}</small> </p>
							</li>

							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left"> <a href="{{ url('/profile') }}" class="btn btn_gray text-uppercase text-white btn-flat">Profile</a> </div>
								<div class="pull-right"> <a href="{{ url('/logout') }}" class="btn btn_red text-uppercase text-white btn-flat">Sign out</a> </div>
							</li>
						</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
					<li class="setting"> <a href="#"  class="ripplelink dropdown-toggle" data-toggle="dropdown"><span class="ink animate" style="height: 90px; width: 90px; top: -19px; left: -24px;"></span><i class=" setting_icon"><img src="{!!Request::root().'/images/setting.png'!!}" alt=""/></i></a> 
					
					<ul class="dropdown-menu">
							<li>
							   <a href="{{ url('/changepassword') }}">Change Password</a>
							</li>
							<!--<li><a href="{!!Request::root().'/channel/create'!!}">Create New Channel</a></li> --> 
							<li><a href="{!!Request::root().'/channel/manageChannel'!!}">Associated Channels</a></li> 
						</ul>
					</li>
				</ul>
			</div>
		@endif
	</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			@if (Auth::user())
			<li class="treeview <?php if(class_basename(Route::currentRouteAction()) == 'HomeController@dashboard'){?>active<?php }?>">
				<a class="ripplelink" href="{!!Request::root().'/dashboard'!!}"> <i class="fa fa-dashboard"></i>
					<div class="clearfix"></div>
					<span>Dashboard</span> </a>
			</li>
			<li class="treeview <?php if(class_basename(Route::currentRouteAction()) == 'VideoController@index' || class_basename(Route::currentRouteAction()) == 'VideoController@preview'){?>active<?php }?>">
				<a class="ripplelink" href="{!!Request::root().'/user/videoRelease'!!}"> <i class="new_video_icon"></i>
					<div class="clearfix"></div>
					<span>Upload Video</span> </a>
			</li>
			<li class="treeview <?php if(class_basename(Route::currentRouteAction()) == 'VideoController@VideoPackshot' || class_basename(Route::currentRouteAction()) == 'VideoController@VideoPackshotPreview'){?>active<?php }?>">
				<a class="ripplelink" href="{!!Request::root().'/user/videoPackshot'!!}"> <i class="packshot_icon"></i>
					<div class="clearfix"></div>
					<span>Create/Upload Packshot</span> </a>
			</li>
			@endif
			@if (!Auth::user())	
				<li class="treeview"><a href="{{ url('/user/login') }}">Login</a></li>			 				 
			@endif	
			<?php /*?>			
			<li class="treeview"><a href="{!!Request::root().'/page/about-us'!!}">About us</a></li>
			<li class="treeview"><a href="{!!Request::root().'/page/contact-us'!!}">Contact us</a></li>
			<li class="treeview"><a href="{!!Request::root().'/page/privacy'!!}">Privacy</a></li>  				
			<?php */?>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
