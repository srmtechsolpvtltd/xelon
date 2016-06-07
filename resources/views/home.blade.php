<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login</title>

<!-- Tell the browser to be responsive to screen width -->
<link rel="icon" href="{!!Request::root().'/images/favicon.ico'!!}" type="image/gif" sizes="16x16">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="{!!Request::root().'/css/bootstrap.min.css'!!}">
<!-- Font Awesome -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{!!Request::root().'/css/style_main.css'!!}">
<link rel="stylesheet" type="text/css" href="{!!Request::root().'/css/dhtmlxcalendar.css'!!}"/>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper login_bg" style="min-width:100% !important;">
  <div class="login_box text-center"> <img src="{!!Request::root().'/images/logo_login.png'!!}" alt="" />
    <div class="login_strip">
      <div class="strip_1 col-xs-3"></div>
      <div class="strip_2 col-xs-3"></div>
      <div class="strip_3 col-xs-3"></div>
      <div class="strip_4 col-xs-3"></div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="login_inner">
	<form role="form" method="POST" action="{{ url('/auth/login') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <h1>Sign in
        <div class="clearfix"></div>
		@if (count($errors) > 0)
			
			@foreach ($errors->all() as $error)
   <span class="alert"> <i class="fa fa-info-circle"></i> {{ $error }} <i class="fa fa-times" data-dismiss="alert" aria-label="close" style="cursor:pointer; float:right;"></i></span>
			@endforeach
			
        @endif
        <div class="clearfix"></div>
      </h1>
      <div class="clearfix"></div>
      <div class="form-group pos_relative login_box_wrap <?php if ($errors->has('email')) { echo 'log-error wrong-entry';} ?>"> <span class="user_icon"></span>
        <input type="text" class="form-control" id="" placeholder="Email" name="email" value="{{Input::old('email')}}">
      </div>
      <div class="form-group pos_relative login_box_wrap  <?php if ($errors->has('password')) { echo 'log-error wrong-entry';} ?>"> <span class="password_icon"></span>
        <input type="password" class="form-control" id="" placeholder="Password" name="password">
      </div>
	 <input type="hidden" class="form-control" name="isuser" value="1">
      <button class="btn btn-block btn_sign text-uppercase text-white">Sign In</button>
      <div class="clearfix"></div>
	 </form>
      <!--<div class="row">
        <div class="col-xs-6 text-left">
          <input id="box1" class="check_box" type="checkbox" />
          <label for="box1" class="check_label">Remember me</label>
        </div>
       <div class="col-xs-6 forgot_pass text-right"><a href="#!">Forgot password?</a></div>
      </div>-->
    </div>
    <div class="login_footer text-center"> 8686 Brook Lane , Fairburn, GA 30213, USA.<br>
      Call: +1 123 1234 23421, Email: info @xelon.com<br>
      <br>
      2016 © XELON ENTERTAINMENT PTY LTD. </div>
  </div>
</div>

<!-- ./wrapper --> 

<!-- jQuery 2.1.4 --> 
<script src="{!! Request::root().'/js/jQuery-2.1.4.min.js' !!}"></script> 
<!-- Bootstrap 3.3.5 --> 
<script src="{!! Request::root().'/js/bootstrap.min.js' !!}"></script> 
<!-- AdminLTE App --> 
<script src="{!! Request::root().'/js/app.min.js' !!}"></script> 
<!-- SlimScroll 1.3.0 --> 
<script src="{!!  Request::root().'/js/jquery.slimscroll.min.js' !!}"></script> 
<script src="{!! Request::root().'/js/jquery.ezdz.min.js' !!}"></script> 
<script src="{!! Request::root().'/js/dhtmlxcalendar.js' !!}"></script> 
<script src="{!! Request::root().'/js/main.js' !!}"></script>
</body>
</html>