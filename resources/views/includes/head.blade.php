<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Youtube Video <?php echo @$page[0]->title ==''?'':' - '.@$page[0]->title; ?></title>
<meta name="keywords" content=" " />
<link href="/images/favicon.ico" type="image/x-icon" rel="icon" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,800italic,700italic,700,600,400italic,300,300italic' rel='stylesheet' type='text/css'>

@if(!empty($meta['title']))
<meta property="og:title" content="{{$meta['title']}}" /> 
@endif
@if(!empty($meta['type']))
<meta property="og:type" content="blog" />
@endif
@if(!empty($meta['image']))
<meta property="og:image" content="{{ $meta['image']}}" />
@endif
@if(!empty($meta['url']))
<meta property="og:url" content="{{$meta['url']}}" />
@endif
@if(!empty($meta['site_name']))
<meta property="og:site_name" content="{{$meta['site_name']}}" />
@endif




{!! Html::style('css/bootstrap.css') !!}
{!! Html::style('css/jquery.smartmenus.bootstrap.css') !!}
<!-- Custom Theme files -->
<!--theme-style-->
{!! Html::style('css/style.css?v=123') !!}
{!! Html::style('css/media.css?v=123') !!}
<!--//theme-style-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


{!! Html::script('js/jquery.min.js') !!} 
{!! Html::script('js/jmpress.min.js') !!} 
{!! Html::script('js/jquery.jmslideshow.js') !!} 

{!! Html::script('/js/jquery.blockUI.js') !!}

{!! Html::script('js/bootstrap.js') !!} 
{!! Html::script('js/main.js') !!} 
{!! Html::script('js/jquery.smartmenus.js') !!} 
{!! Html::script('js/jquery.smartmenus.bootstrap.min.js') !!} 

<!-- Gallery -->
<?php if(Request::path() == 'gallery' || Request::path() == 'videos' || Request::path() == 'floor-plans') { ?>
{!! Html::style('css/bootstrap-image-gallery.css') !!}
{!! Html::style('css/blueimp-gallery.min.css') !!}
{!! Html::script('js/jquery.blueimp-gallery.min.js') !!} 
{!! Html::script('js/bootstrap-image-gallery.js') !!} 

{!! Html::script('js/jquery.masonry.min.js') !!} 
<script>
	$(window).on("load", function() {
  $('.galThumb').masonry({
    itemSelector: '.col-md-4',
    columnWidth: 10
  });
 
});
</script>

	<?php } ?>
<!-- Gallery end -->
	


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--
{!! Html::script('/js/tinymce/tinymce.min.js') !!}	
{!! Html::script('/js/tinymce.js') !!}
-->
