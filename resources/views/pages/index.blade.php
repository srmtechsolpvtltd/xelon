@extends('layouts.frontend')
@section('content') 
<!--
<section class="breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div data-wow-offset="50" data-wow-delay="0.6s" class="wow bounceIn animated" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceIn;"> 
			<span><a href="{!!Request::root()!!}">Home</a></span>{{$page[0]->title}}</div>
      </div>
    </div>
  </div>
</section>
-->
 <div class="content-wrapper"> 
<section class="content">
       <div class="content_bg about_content">
        <h1 class="content_heading">{{$page[0]->title}}</h1>
        <div class="row">
          
          <div class="col-xs-12 mt-18">
          <?php echo $page[0]->page_content; ?>
          
          <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
  </div>
@endsection
