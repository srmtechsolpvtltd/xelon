<style>
/* ---------- Content notification ---------- */
.notification {
	margin: 5px;
	position: relative;
}
.notification .messages {
	color: #2b2b2b;
	padding: 6px 0px 6px 50px;
	font-size: 12px;
	font-weight: bold;
	position: relative;
}
.notification .messages .close {
	position: absolute;
	top: 5px;
	right: 10px;
	cursor: pointer;
}
.warning {
	border: 1px solid #e6d260;
	width: 90%;
}
.warning .messages {
	background-color: yellow;
	color: red;
	font-size: 14px;
}
</style>

{!! Html::script('js/livevalidation_standalone.compressed.js') !!} 
{!! Html::style('css/consolidated_common.css') !!} 


<style>
	.wrapper{
    background-color: #fff !important;
}
</style>

  <header class="main-header"> 
    <!-- Logo --> 
    <a href="{!!Request::root().'/admin/user/dashboard'!!}" class="logo"> 
    <!-- mini logo for sidebar mini 50x51 pixels --> 
    @if (Auth::check())
    <span class="logo-mini"><img src="<?php echo Request::root().'/images/'; ?>logo.png"  height="30" ></span> 
    @endif
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="<?php echo Request::root().'/images/'; ?>logo.png" height="50"  >		
		</span> </a> 
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation"> 
      <!-- Sidebar toggle button--> 
       @if (Auth::check())
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a> 
      @endif
     @if (Auth::check())
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu"> <a href="#"> <i class="fa fa-sign-in"></i> <span class="/*hidden-xs*/">Hi Admin</span> </a></li>
          <li class="dropdown user user-menu"> <a href="{{ URL::to('/logout') }}"> <i class="fa fa-sign-out"></i><span class="<?php /*hidden-xs*/?>">Log Out</span> </a></li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
     @endif
    </nav>
  </header>


