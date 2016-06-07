<!DOCTYPE html>
<html>
    <head>
	@include('includes.head')	
    </head>    
    <body>			
		 @include('includes.header')		
         @yield('content') 			
		 @include('includes.footer')		 
		 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript">
var addthis_config = {
services_exclude: 'print'
}
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-569dcc7b30aa3e41" async="async"></script>
<!-- AddThis Smart Layers END -->
    </body>
</html>
