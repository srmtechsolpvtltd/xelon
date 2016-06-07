<?php 
$path=Request::path();
?>
<?php if($path=='/') { ?>
<script>	
$(document).ready(function(){
	  $(window).bind('scroll', function() { 
	    var navHeight = 100; // custom nav height 
	    ($(window).scrollTop() > navHeight) ? $('.header').addClass('goToTop') : $('.header').removeClass('goToTop'); 
	  });
	  
	  
	  
	 $('#searchBtn').click(function(){
 var search=$('#search').val();
  var flag=0;
	  if(search=='') {
		  $('#search_error').html('The Search field is required.');	
		  $('#search_error').addClass('error-message');		   
		  flag=1;
	  }
 if(flag==1)
		  {
			  return false;
		  }
		  else{
			 return true; 
		  }
  
  	}); 
	  
	  
	  
	  
	  
	  
	});
</script>
<?php } ?>
<!--header-->

@if (Request::path() == '/')
    <div class="header">
	  @else 
	<div class="header header_in">
	 @endif
  <div class="header-top">
    <div class="container">
		
		<?php /*?>
		<div class="top-menu">
        <div class="topLeftNav">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="{!!Request::root()!!}">Home</a></li>            
            <li><a href="{!!Request::root()!!}/blogs">Blog</a></li>
          </ul>
        </div>
      </div>
      <?php */?>
      
      <?php /*?>
		{!! Form::open(['method'=>'get','url'=>'properties','class'=>'','role'=>'search'])  !!}	
      <div class="search-box">
       {!! Form::text('search', @$query, array('required','id'=>'search','placeholder'=>'Search Properties...')) !!}
        <button id="searchBtn" class="icon glyphicon glyphicon-search search-btn1" type="submit"></button>
		<span id="search_error"></span>
        
        <span class="socialLink">
		  <a href="https://www.facebook.com/pages/Rock-Solid-Builders-New-Homes-in-Southern-Utah/152572581481563" target="_blank">
			  <img src="{!!Request::root().'/images/fb.png'!!}" alt=""/></a>
		  <img src="{!!Request::root().'/images/tweet.png'!!}" alt=""/> 
		  <img src="{!!Request::root().'/images/googlePlus.png'!!}" alt=""/></span> 
		</div>
		{!! Form::close() !!}
	  <?php */?>
		
	<!--- New Navigation------------->
	  <nav class="navbar navbar-default clear" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
         <a class="navbar-brand" href="{!!Request::root()!!}"><img  src="{!!Request::root().'/images/logo.png'!!}" alt="logo" title="HOME"></a>
        <div class="navbar-collapse collapse" style='background:blue;'>

          <?php /*?>
          <!-- Left nav -->
          <ul class="nav navbar-nav navbar-left">
            <li><a href="{!!Request::root()!!}/page/about-us">About Us <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{!!Request::root()!!}/page/our-story">Our Story</a> </li>
				<li><a href="{!!Request::root()!!}/our-team">Our Team</a> </li>
                <li><a href="{!!Request::root()!!}/page/customer-appreciation">Customer Appreciation</a> </li>
                <li><a href="{!!Request::root()!!}/page/employee-appreciation">Employee Appreciation</a> </li> 
                <li><a href="{!!Request::root()!!}/press-releases">Press Release</a> </li>               
              </ul>
            </li>
          </ul>
          <?php */?>

          <!-- Right nav -->
          <ul class="nav navbar-nav navbar-right">
			 <?php /*?> 
			 <li><a href="{!!Request::root()!!}/page/about-us">About Us <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{!!Request::root()!!}/page/our-story">Our Story</a> </li>
				<li><a href="{!!Request::root()!!}/our-team">Our Team</a> </li>
                <li><a href="{!!Request::root()!!}/page/customer-appreciation">Customer Appreciation</a> </li>
                <li><a href="{!!Request::root()!!}/page/employee-appreciation">Employee Appreciation</a> </li> 
                <li><a href="{!!Request::root()!!}/press-releases">Press Release</a> </li>               
              </ul>
            </li>  
			  
            <li><a href="#">PORTFOLIO <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Gallery<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{!!Request::root()!!}/gallery">Photos</a> </li>
					<li><a href="{!!Request::root()!!}/videos">Videos</a> </li>
                  </ul>
                </li>
              </ul>
            </li>
            <?php */?>
             <li><a href="{!!Request::root().'/'!!}">Home</a></li>
             <li><a href="{!!Request::root().'/page/about-us'!!}">About us</a></li>
             <li><a href="{!!Request::root().'/page/contact-us'!!}">Contact us</a></li>
             <li><a href="{!!Request::root().'/page/privacy'!!}">Privacy</a></li>  
             @if (Auth::guest())
				<li><a href="{!!Request::root().'/user/login'!!}">Login</a></li> 
             @else
                <li><a href="{!!Request::root().'/channel/create'!!}">Create New Channel</a></li>  
				<li><a href="{!!Request::root().'/channel/manageChannel'!!}">Associated Channels</a></li> 
				<li><a href="{!!Request::root().'/logout'!!}">Logout</a></li> 
             @endif
          </ul>

        </div><!--/.nav-collapse -->
      </nav>
	<!--- New Navigation------------->
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
