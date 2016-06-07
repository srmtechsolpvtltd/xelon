<?php $title="Dashboard"; if(Request::path() == '/'){
$title="Dashboard";
}
if(Request::path() == 'user/videoRelease' || Request::path() == 'user/videoReleaseSave' ){
$title="Upload Video";
}
if(Request::path() == 'user/videoPackshot' || Request::path() == 'user/videoPackshotSave' ){
$title="Create/Upload Packshot";
}
if(Request::path() == 'user/search' || Request::path() == 'user/search' ){
$title="Search Video";
}
if(Request::path() == 'profile'){
$title="User Profile";
}
if(Request::path() == 'changepassword'){
$title="Change Password";
}
if(Request::path() == 'channel/create'){
$title="Create Channel";
}
if(Request::path() == 'channel/manageChannel'){
$title="Associated Channels";
}
if(Request::path() == 'page/about-us'){
$title="About us";
}
if(Request::path() == 'page/contact-us'){
$title="Contact us";
}
if(Request::path() == 'page/privacy'){
$title="Privacy Policy";
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$title}}</title>
<meta name="_token" content="{{ csrf_token() }}">	
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="icon" href="{!!Request::root().'/images/favicon.ico'!!}" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="{!!Request::root().'/css/bootstrap.min.css'!!}">
<!-- Font Awesome -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{!!Request::root().'/css/style_main.css'!!}">
<link rel="stylesheet" type="text/css" href="{!!Request::root().'/css/dhtmlxcalendar.css'!!}" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
