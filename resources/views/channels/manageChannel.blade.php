<?php
use App\Models\ChannelLogo;
?>
@extends('layouts.frontend')
@section('title', 'Youtube - Channels')
@section('content')
<script type="text/javascript">	
	$(document).ready(function(){ 		
		$('.requestupdate').click(function(){ 		
		 $('#search_id_error').empty(); 
			var search=$('#search_id').val(); 
			var flag=0;			
		if(search=='') {		  
		  $('#search_id_error').addClass('error-message errorNew');
		  $('#search_id_error').html('The Search field is required.');	 
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
	
	function myFunction(id)
	{
		 if(confirm("Do you want to delete?"))
		 {
			 location.href='<?php echo Request::root(); ?>/channel/delete/'+id;			
		 }
	}
</script> 
<div class="content-wrapper">
<section class="content-header">
  <h1>Associated Channels</h1>
<div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-body frmFld2">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  valign="top">
    
      <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td valign="top">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
     
      <tr>
        <td colspan="3">			
              <div class="flash-message">
                @if( Session::get('msg')!='')
                  <p class="alert alert-success">{{ Session::get('msg') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  <?php  Session::forget('msg'); ?>
                  @endif
        </div>
		<table>
		      <tr>
				<!-- <td><a href="{{URL::to('channel/create')}}" class="btn btn-primary"  >Create Channel</a></td>-->
				 <td>&nbsp;&nbsp;<p>&nbsp;</p></td>
			  				 
		<td>	
       <table>
		    {!! Form::open(array('method'=>'GET','url' => 'channel/manageChannel', 'class'=>'form navbar-form navbar-right searchform')) !!}
       <tr>		 
		 @if(!empty($query))
		 <td><a href="{{URL::to('channel/manageChannel')}}" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span> View All</a></td>
		 <td>&nbsp;&nbsp;</td>
		 @endif
	         <td>{!! Form::text('search', @$query, array('required', 'class'=>'form-control','id'=>'search_id','placeholder'=>'Search Page...')) !!}
           @if ($errors->has('search')) <span class="error-message">{{ $errors->first('search') }}</span> @endif
         <span id="search_id_error"></span></td>
         <td>{!! Form::submit('Search', array('class'=>'btn btn-default requestupdate')) !!}</td>
                  
       </tr>
       </table>
	{!! Form::close() !!}
	</td>
	</tr>
   </table>
	<?php 
		$i=1; 				
	?>
	@if(count($channel))
			<table class="table table-striped table-bordered table-hover associated_channels_tbl" width="100%" border="0" cellspacing="0" cellpadding="0">
     <thead>
     <tr class="bg-info"> 
		 <th>S.No</th>
         <th>Channel Name</th>
		 <th>Channel Url</th>
		 <th>UserName</th>
		 <th>Password</th>
		 <th>Channel Active Logo</th>
		 <th>Created <span>(mm-dd-yyyy)</span></th> 
        <!-- <th>Actions</th> -->        
     </tr>
     </thead>
     <tbody>	 
     @foreach ($channel as $channelVal)
        <?php  
        $logo ='undefined.jpg';	
         /*
         if(!empty($channelVal->channels)){
		 foreach ($channelVal->channels as $role)
			{
				$logo = $channelVal->pivot->logo_path;
			}
		 }
		 */	
		 $channelLogo = ChannelLogo::where('channel_id', '=' , $channelVal->channel_id)->where('is_inactive', '=' , 0)->first();
		 if($channelLogo){
			 $logo = $channelLogo->logo_path;
		 }	 
		?>
         <tr>
			 <td>{{ $i++ }}</td>
			 <td>{{ $channelVal->channel_name }}</td>
             <td>{{ $channelVal->channel_url }}</td>
             <td>{{ $channelVal->username }}</td> 
             <td>{{ $channelVal->password }}</td>    
             <td><img src="<?php echo Request::root().'/images/channellogo/thumb/'.$logo; ?>" style='width:50px;' /></td>  
             <td>{{date("m-d-Y", strtotime($channelVal->created_at))}}</td>         
            <!-- <td><a onclick="myFunction(<?php echo $channelVal->id; ?>)" class="btn btn-danger">Delete</a></td>-->
         </tr>
     @endforeach

     </tbody>

 </table>

	@else
       <table class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="0" cellpadding="0">    
       <tr class="bg-info"> <td>Record not found.  </td>  </tr>
       </table>
    @endif	
                  <?php 
                        if(!empty($query)){
                            $channel->appends(['search' => $query]);
                        }
                                               
                        ?>
    {!! $channel->render() !!}         
              
			
		  
		  
		  
		  </td>
        </tr>
      <tr>
        <td align="right" style="height:10px;"></td>
        <td></td>
        <td></td>
      </tr>
    </table>
	</td>
  </tr>
</table>
    </td>
  </tr>

</table>


        </div>
      </div>
    </div>
  </div>
</section> 
</div>
@endsection
