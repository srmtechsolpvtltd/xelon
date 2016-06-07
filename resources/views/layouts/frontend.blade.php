<!DOCTYPE html>
<html>
    <head>
	@include('includes.frontendhead')	
    </head>    
    <body class="hold-transition skin-blue sidebar-mini"  onload="doOnLoad();">
		<div class="wrapper">		
			 @include('includes.frontendheader')	
			 <!-- Content Wrapper. Contains page content -->
			 @yield('content')
			<!-- /.content-wrapper -->						
			 @include('includes.frontendfooter')		 
		</div>
		<!-- jQuery 2.1.4 -->
		<script src="{!!Request::root().'/js/jQuery-2.1.4.min.js'!!}"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="{!!Request::root().'/js/bootstrap.min.js'!!}"></script>
		<!-- AdminLTE App -->
		<script src="{!!Request::root().'/js/app.min.js'!!}"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="{!!Request::root().'/js/jquery.slimscroll.min.js'!!}"></script>
		<script src="{!!Request::root().'/js/jquery.ezdz.min.js'!!}"></script>
		<script src="{!!Request::root().'/js/dhtmlxcalendar.js'!!}"></script>
		<script src="{!!Request::root().'/js/main.js'!!}"></script>
		<script src="{!!Request::root().'/js/jquery.blockUI.js'!!}"></script>
	</body>
</html>
