@extends('layouts.frontend')
@section('content') 
<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1 class="pull-left"> Search </h1>
		<div class="pull-right">
			<div class="inline-blc search_field mr-10 pull-left">
             {!! Form::open(['route' => 'user.search','method'=>'GET','id'=>"searchform"]) !!}
             <input type="text" class="form-control" id="exampleInputEmail1" name="search" placeholder="SEARCH VideoS" value="<?php if(isset($searchedtxt)){ echo $searchedtxt;} ?>" maxlength="20">
				<span  onclick="formSubmit();"><i class="fa fa-search"></i></span> </div>
             {!! Form::close() !!}
			 <?php if(isset($searchedtxt)){ ?>
			  {!! Html::linkRoute('user.home','View All',array(),['class'=>'btn btn_red text-white text-uppercase pull-left mr-10'])  !!}
			 <?php } ?>
			  {!! Html::linkRoute('user.videoRelease','Create New Video',array(),['class'=>'btn btn_red text-white text-uppercase pull-left mr-10'])  !!}
			  {!! Html::linkRoute('user.videoPackshot','Create Packshot video',array(),['class'=>'btn btn_orange text-white text-uppercase pull-left'])  !!}
			<div class="clearfix"></div>
                {!! $errors->first('search','<span style="color:red;">:message</span>') !!}
		</div>
		<div class="clearfix"></div>
	</section>
	<section class="content">
		<!--<div class="alert alert-white">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><img src="{!!Request::root().'/images/close.png'!!}" alt="" />
			</a> <img src="{!!Request::root().'/images/question_mark.png'!!}" class="mr-10" alt="" />For tips, check out our Beginner's Guide
			<button class="btn btn_dark_gray text-white text-uppercase ml-10">See Guide</button>
			<div class="clearfix"></div>
		</div>-->
		<div class="clearfix"></div>
		<div class="content_bg">
			<h1 class="content_heading">Searched Videos</h1>
			<div class="row">
			<?php if(count($searched)<=0){ ?>
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
				foreach($searched as $row):
				?>	
				<div class="col-md-3 mt-40">
 <div class="video_thumb">
 <a href="{{ URL::route('user.viewVideo', ['id' => $row->id]) }}" >
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
			
					
				<!--<div class="clearfix"></div>-->
			</div>
			<div class="clearfix"></div>
		</div>
			
		{!! $searched->render() !!}
		
	</section>
</div>
<script type="text/javascript">
function formSubmit() {
    //code
	$("#searchform").submit();
}
</script>
@endsection
