@extends('layouts.frontend')
@section('title', 'Youtube Video - Create Channel')
@section('content')
<script type="text/javascript">	
	
function validateChannel()
	{
		$("#nameErr").html("");
		$("#urlErr").html("");
		$("#statusErr").html("");
		$("#logoErr").html("");
		$("#userErr").html("");
		$("#passErr").html("");
		var urlRegex=/^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
		var channel_name=$('input[name="channel_name"]').val();
		var channel_url=$('input[name="channel_url"]').val();
		var channel_status=$('input[name="is_inactive"]:radio').is(':checked');
		var username=$('input[name="username"]').val();
		var password=$('input[name="password"]').val();
		
		var file = $('input[type="file"][name="logo"]').val();
		
		if(channel_name=='' || channel_url=='' || (channel_url!='' && !urlRegex.test(channel_url)) || channel_status=='' || file=='' || (file!='' && !validateFileType(file)) || username=='' || password=='')
		{
			$(".Error").show();
			
		if(channel_name=='')
		{
			$("#nameErr").html("Please enter the channel name");
		}
		if(channel_url=='')
		{
			$("#urlErr").html("Please enter  channel url.");
		}
		if(channel_url!='' && !urlRegex.test(channel_url))
		{
			$("#urlErr").html("Please enter valid channel url.");
		}
		if(username=='')
		{
			$("#userErr").html("Please enter the username.");
		}
		if(password=='')
		{
			$("#passErr").html("Please enter the password.");
		}
		if(channel_status=='')
		{
			$("#statusErr").html("Please select status of channel.");
		}
		if(file=='')
		{
			$("#logoErr").html("Please upload a file.");
		}
		if(file!='' && !validateFileType(file))
		{
			$("#logoErr").html("Allowed file type ['jpg','png','gif','jpeg'].");
		}
		
		 return false;
	   }
	   else
	   {
		   $(".Error").hide();
		   return true;
	   }
		
	}

 function validateFileType(file)
{
		var exts = ['jpg','png','gif','jpeg'];
		if ( file ) {
		var get_ext = file.split('.');
		get_ext = get_ext.reverse();
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		return true;
		} else {
		return false;
		}
	    }
}
</script>
<div class="content-wrapper">
<section class="content-header">
  <h1>Create New Channel</h1>
	
<div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-body frmFld">
<div class="create_table_new_wrap">
{!! Form::open(['url' => 'channel/createChannel','method'=>'POST','files'=>'true','onsubmit'=>'return validateChannel()']) !!}
		<table border="0" cellpadding="4" cellspacing="4" width="100%" class="create_table_new">
      <tr>
        <td><strong>Channel Name :</strong></td>
 
        <td>{!! Form::text('channel_name', Input::old('channel_name') , [
			'placeholder' => 'Channel Name'
            
			]) !!}
			<br>
			<span style="color:red; display:none" id="nameErr" class="Error"></span>
		{!! $errors->first('channel_name','<span style="color:red;">:message</span>') !!}	
		</td>
         </tr>  
         <tr>
        <td><strong>Channel Url :</strong></td>
 
        <td>{!! Form::text('channel_url',  Input::old('channel_url') , [
            'placeholder'=> 'Channel Url',
            'size'=>70
            ]) !!}
			<br>
            <span style="color:red; display:none" id="urlErr" class="Error"></span>
            {!! $errors->first('channel_url','<span style="color:red;">:message</span>') !!}</td>
        </tr>
        <tr>
			
		<tr>
        <td><strong>User Name :</strong></td>
 
        <td>{!! Form::text('username',  Input::old('username') , [
            'placeholder'=> 'User Name',
            'size'=>70
            ]) !!}
			<br>
            <span style="color:red; display:none" id="userErr" class="Error"></span>
            {!! $errors->first('username','<span style="color:red;">:message</span>') !!}</td>
        </tr>
         <tr>
        <td><strong>Password :</strong></td>
 
        <td>{!! Form::password('password',  Input::old('password') , [
            'placeholder'=> 'password',
            'size'=>70
            ]) !!}
			<br>
            <span style="color:red; display:none" id="passErr" class="Error"></span>
            {!! $errors->first('password','<span style="color:red;">:message</span>') !!}</td>
        </tr>
        <td><strong>Status :</strong></td>
         <td>
 
       {!! Form::radio('is_inactive',0) !!} Active
       {!! Form::radio('is_inactive' ,1) !!} InActive  
   <br>
         <span style="color:red; display:none" id="statusErr" class="Error"></span>     
        {!! $errors->first('is_inactive','<span style="color:red;">:message</span>') !!}</td>
        </tr>
         <tr><td><strong>Active Channel Logo :</strong></td>
       
         <td>{!! Form::file('logo', ['class' => '']) !!}
         <span style="color:red; display:none" id="logoErr" class="Error"></span>     
        {!! $errors->first('logo','<span style="color:red;">:message</span>') !!}
		 </td> </tr>
        
        <tr>
		<td>&nbsp;</td>
        <td>{!! Form::submit('Submit',['class'=>'btn btn_red text-white text-uppercase'])!!}</td></tr>
      		  </table>
			{!! Form::close() !!}
</div>

        </div>
      </div>
    </div>
  </div>
</section> 
</div>
@endsection
