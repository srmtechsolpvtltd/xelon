<div class="col-md-4 col-sm-4">  
<?php 
$controller=Route::getCurrentRoute()->getActionName();
@list($controller, $function) = explode('@', $controller); 
  if($function=='display_all_post' || $function=='show_post')
 { ?>
 <h3><strong>Recent Posts</strong></h3> 
  @foreach ($recent_posts as $recent_post) 
<li class="li_blog">
<?php if(!empty($recent_post->featured_image)){ ?>
<div class="blog-lt-cont col-md-3 col-lg-3 col-sm-3 col-xs-3"> 	
	<a href="{!!Request::root().'/blog/'.$recent_post->slug !!}">
	<img src="{!!Request::root()!!}/{!!$recent_post->featured_image!!}" style="max-width:100%;" alt="">
</a> 	
	</div>
	<div class="blog-rt-cont col-md-9 col-lg-9 col-sm-9 col-xs-9">
<h3><a href="{{Request::root().'/blog/'.$recent_post->slug }}">{{ $recent_post->title }}</a></h3>
<h6><em>{{ date('F d, Y', strtotime($recent_post->created_at)) }}</em></h6>
<h4><a href="{{Request::root().'/blog/'.$recent_post->slug }}">Read More</a></h4>
</div>
	
	<?php }  else { ?>
<div class="blog-rt-cont col-md-9 col-lg-9 col-sm-9 col-xs-9 no_left_space">
<h3><a href="{{Request::root().'/blog/'.$recent_post->slug }}">{{ $recent_post->title }}</a></h3>
<h6><em>{{ date('F d, Y', strtotime($recent_post->created_at)) }}</em></h6>
<h4><a href="{{Request::root().'/blog/'.$recent_post->slug }}">Read More</a></h4>
</div>
<?php } ?>
</li>  
  @endforeach
  
  <?php } 
  if($function=='display_all_press_release' || $function=='show_press_release')
 {  ?>
  
  <h3><strong>Recent Press Releases</strong></h3> 
   
  @foreach ($recent_press_release as $press_release) 
<li class="li_blog">
	<?php if(!empty($press_release->featured_image)){ ?>
<div class="blog-lt-cont col-md-3 col-lg-3 col-sm-3 col-xs-3">
	<a href="{!!Request::root().'/press-release/'.$press_release->slug !!}">
	<img src="{!!Request::root()!!}/{!!$press_release->featured_image!!}" style="max-width:100%;" alt="">
</a> 	
</div>

<div class="blog-rt-cont col-md-9 col-lg-9 col-sm-9 col-xs-9">
<h3><a href="{{Request::root().'/press-release/'.$press_release->slug }}">{{ $press_release->title }}</a></h3>
<h6><em>{{ date('F d, Y', strtotime($press_release->created_at)) }}</em></h6>
<h4><a href="{{Request::root().'/press-release/'.$press_release->slug }}">Read More</a></h4>
</div>


<?php }  else { ?>
<div class="blog-rt-cont col-md-9 col-lg-9 col-sm-9 col-xs-9 no_left_space">
<h3><a href="{{Request::root().'/press-release/'.$press_release->slug }}">{{ $press_release->title }}</a></h3>
<h6><em>{{ date('F d, Y', strtotime($press_release->created_at)) }}</em></h6>
<h4><a href="{{Request::root().'/press-release/'.$press_release->slug }}">Read More</a></h4>
</div>
<?php } ?>


</li>  
  @endforeach
  
  <?php } ?>
  
<li class="li_blog_cat"><h3><strong>Blog Categories</strong></h3></li>
  @foreach ($all_categories as $category) 
<li class="li_blog_cat">
<h4><a href="{{Request::root().'/category/'.$category->slug }}">{{ $category->category_name }}</a></h4>
</li> 
   @endforeach
 
  
</div>






