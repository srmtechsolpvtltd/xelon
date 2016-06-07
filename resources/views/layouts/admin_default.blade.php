<!DOCTYPE html>
<html>
    <head>
	  @include('includes.admin_head')			
<script>
  tinymce.init({
  selector: 'textarea',
  valid_elements : '*[*]', // allow all tag such as <i>, <span> etc.... 
  height: 250,

  force_br_newlines : true,
	
  relative_urls : false,
  remove_script_host : false,
  convert_urls : true,	
  imageupload_url: '<?php echo Request::root(); ?>/admin/image_upload_tinymce', // This is the path in route to controller method

  plugins: ["imageupload", "image", "link",
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image | imageupload',
	
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
	{!! Html::script('js/bootstrap.min.js') !!}	
    </head>
   
	

  	<!--{!! Html::script('js/jquery_1_11_3.min.js') !!}
{!! Html::script('js/tinymce.js') !!}
-->



	
	
	<body class="skin-blue sidebar-mini">
<div id="loading" style='display:none;position:fixed;border: 1px solid #000;  z-index:10;left:48%;background-color:#ff943f;margin-top:-10px;padding:10px;color:#FFF;font-weight:bold'>Loading...</div>
<div class="wrapper">
 @include('includes.admin_header') 	
	
@if (Auth::check())
	 @include('includes.admin_leftmenu')		
@endif
	
@if (Auth::check())
<div class="content-wrapper">	
@endif	
	
 @yield('content')  
	
@if (Auth::check())
</div>
@endif

		<div class="clear"></div>
	@if (Auth::check())
		<footer class="main-footer">© 2016 Xelon Entertainment Express - All Rights Reserved</footer>
	@endif

</div>
<!-- ./wrapper --> 

</body>
	
</html>
