@extends('layouts.frontend')
@section('content') 
<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1 class="pull-left"> Dashboard </h1>
		<div class="pull-right">
			<div class="inline-blc search_field mr-10 pull-left">
				 {!! Form::open(['route' => 'user.search','method'=>'GET','id'=>"searchform"]) !!} 
				<input type="text" class="form-control" id="exampleInputEmail1" name="search" placeholder="SEARCH VideoS" value="" maxlength="20">
				<span onclick="formSubmit();"><i class="fa fa-search"></i></span></div>
             {!! Form::close() !!} 
			  {!! Html::linkRoute('user.videoRelease','Upload Video',array(),['class'=>'btn btn_red text-white text-uppercase pull-left mr-10'])  !!}
			  {!! Html::linkRoute('user.videoPackshot','Create/Upload Packshot',array(),['class'=>'btn btn_orange text-white text-uppercase pull-left'])  !!}
			<div class="clearfix"></div>
			{!! $errors->first('search','<span style="color:red;">:message</span>') !!}
		</div>
		<div class="clearfix"></div>
	</section>
	<section class="content">
	@if( Session::get('msg')!='')
		<div class="alert alert-white">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><img src="{!!Request::root().'/images/close.png'!!}" alt="" />
			</a> {{ Session::get('msg') }}
			
			<div class="clearfix"></div>
		</div>
			<?php  Session::forget('msg'); ?>
		@endif	
		<div class="clearfix"></div>
		<div class="content_bg">
			<h1 class="content_heading">Saved Videos</h1>
			<div class="row">
			<?php if(count($saved)<=0){ ?>
				<div class="col-md-3 mt-40">
					<div class="video_thumb"> <span>No Videos</span>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-0">
							<h1 class="video_heading">
		  <div class="clearfix"></div>
		  <span></span> </h1>
						</div>
						<!--<div class="col-md-6 pl-0">
							<button class="btn btn_red pull-right video_btn">CONTINUE EDITING</button>
						</div>-->
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php } else{
				$i=1;
				foreach($saved as $row):
				?>	
				<div class="col-md-3 mt-40">
 <div class="video_thumb"> <a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" >
 <img src="<?php echo ($row->type==0)? Request::root().'/video/previewVideo/'.$row->video_screenshot:Request::root().'/packshot/video/'.$row->video_screenshot ?>" alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h1 class="video_heading">{!! $row->meta_title !!}
		  <div class="clearfix"></div>
		  <span><?php echo date_diff(date_create($row->created_at),date_create(date("Y-m-d h:i:s")))->format("%a Day(s)"); ?> ago</span> </h1>
						</div>
						<div class="col-md-6 pl-0">
						<a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" class="pull-right video_btn"><img src="<?php echo Request::root() ?>/images/view-icon.png" alt=""/></a> 
						
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				
			<?php  if($i==4){ $i=0; echo '<div class="clearfix"></div>'; } $i++; endforeach; } ?>		
			<?php if($savedTotal>8){ ?>
			<div class="col-md-12 pl-0 pull-right clearfix">
		    {!! Html::linkRoute('user.viewMore','VIEW MORE',array('id'=>$row->user_id,'type'=>0),['class'=>'btn btn_red pull-right video_btn','style'=>'min-width:75px;'])  !!}
		   </div>
			<?php } ?>		
				<!--<div class="clearfix"></div>-->
			</div>
			<div class="clearfix"></div>
		</div>
			
		<div class="content_bg">
			<h1 class="content_heading">Delivered Videos</h1>
			<div class="row">
			<?php if(count($uploaded)<=0){ ?>
				<div class="col-md-3 mt-40">
					<div class="video_thumb"> <span>No Videos</span>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-0">
							<h1 class="video_heading">
		  <div class="clearfix"></div>
		  <span></span> </h1>
						</div>
						<!--<div class="col-md-6 pl-0">
							<button class="btn btn_red pull-right video_btn">CONTINUE EDITING</button>
						</div>-->
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php } else{
				$i=1;
				foreach($uploaded as $row):
				?>	
				<div class="col-md-3 mt-40">
					 <div class="video_thumb">   <a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" ><img src="<?php echo ($row->type==0)? Request::root().'/video/previewVideo/'.$row->video_screenshot:Request::root().'/packshot/video/'.$row->video_screenshot ?>" alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h1 class="video_heading">{!! $row->meta_title !!}
		  <div class="clearfix"></div>
		   <span><?php echo date_diff(date_create($row->created_at),date_create(date("Y-m-d h:i:s")))->format("%a Days"); ?> ago</span> </h1>
						</div>
							<div class="col-md-6 pl-0">
						<a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" class="pull-right video_btn"><img src="<?php echo Request::root() ?>/images/view-icon.png" alt=""/></a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				
			<?php  if($i==4){ $i=0; echo '<div class="clearfix"></div>'; } $i++; endforeach; } ?>		
			<?php if($uploadedTotal>8){ ?>
			<div class="col-md-12 pl-0 pull-right clearfix">
			{!! Html::linkRoute('user.viewMore','VIEW MORE',array('id'=>$row->user_id,'type'=>1),['class'=>'btn btn_red pull-right video_btn','style'=>'min-width:75px;'])  !!}
						</div>
			<?php } ?>	
					
				<!--<div class="clearfix"></div>-->
			</div>
			<div class="clearfix"></div>
		</div>
			
		<div class="content_bg">
			<h1 class="content_heading">Failed Videos</h1>
			<div class="row">
			<?php if(count($failed)<=0){ ?>
				<div class="col-md-3 mt-40">
					<div class="video_thumb"> <span>No Videos</span>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-6 pr-0">
							<h1 class="video_heading">
		  <div class="clearfix"></div>
		  <span></span> </h1>
						</div>
						<!--<div class="col-md-6 pl-0">
							<button class="btn btn_red pull-right video_btn">CONTINUE EDITING</button>
						</div>-->
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php } else{
				$i=1;
				foreach($failed as $row):
				?>	
				<div class="col-md-3 mt-40">
          <div class="video_thumb">  <a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" ><img src="<?php echo ($row->type==0)? Request::root().'/video/previewVideo/'.$row->video_screenshot:Request::root().'/packshot/video/'.$row->video_screenshot ?>" alt="" /></a>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<h1 class="video_heading">{!! $row->meta_title !!}
		  <div class="clearfix"></div>
		   <span><?php echo date_diff(date_create($row->created_at),date_create(date("Y-m-d h:i:s")))->format("%a Days"); ?> ago</span>  </h1>
						</div>
							<div class="col-md-6 pl-0">
					<a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" class="pull-right video_btn"><img src="<?php echo Request::root() ?>/images/view-icon.png" alt=""/></a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				
			<?php  if($i==4){ $i=0; echo '<div class="clearfix"></div>'; } $i++; endforeach; } ?>		
			
			 <?php if($failedTotal>8){ ?>
			<div class="col-md-12 pl-0 pull-right clearfix">
		 {!! Html::linkRoute('user.viewMore','VIEW MORE',array('id'=>$row->user_id,'type'=>2),['class'=>'btn btn_red pull-right video_btn','style'=>'min-width:75px;'])  !!}
						</div>
			<?php } ?>	
				<!--<div class="clearfix"></div>-->
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
</div>


	
	
	
<script type="text/javascript">
function formSubmit() {
    //code
	$("#searchform").submit();
}
</script>
@endsection
