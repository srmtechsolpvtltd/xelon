@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">
<section class="content-header">

	{!! Form::open(array('url' => 'user/register','class'=>'form-horizontal','role'=>'form' )) !!}
  <div class="BodyContLogin" style="position:relative">
    <h2>Sign Up</h2>
    <!--<p>Please enter a valid  Username and Password to gain access to the administration console.</p>-->
     
	  <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))
					<span class="Error"><?php echo 'Please enter valid username and password!' ?></span>
                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                @endforeach
        </div>
	  
	  
	  
	  
    <div class="login-box_Admin">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" class="posrel"><div class="UN_icon"></div>
              {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'User Name')) !!}
				 @if ($errors->has('name')) <span class="error-message">{{ $errors->first('name') }}</span> @endif
			  </td>
        </tr>
		  
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="posrel"><div class="email_icon"></div>
           {!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'Email Id')) !!}
			@if ($errors->has('email')) <span class="error-message">{{ $errors->first('email') }}</span> @endif
			</td>
        </tr>
		  
		  <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="posrel"><div class="pass_icon"></div>
           {!! Form::password('password', array('class' => 'form-control','placeholder' => 'Password')) !!}
				 @if ($errors->has('password')) <span class="error-message">{{ $errors->first('password') }}</span> @endif
			</td>
        </tr>
		  
		  
		   <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="posrel"><div class="pass_icon"></div>
          {!! Form::password('password_confirmation', array('class' => 'form-control','placeholder' => 'Confirm Password')) !!}
				 @if ($errors->has('password_confirmation')) <span class="error-message">{{ $errors->first('password_confirmation') }}</span> @endif
			</td>
        </tr>
		  
		  
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="middle">
			   {!! Form::submit('Sign Up' , array('class' => 'btn btn-primary', 'width' => '30')) !!}
			  
			<!--  <input name="signup" type="image" src="<?php //echo IMAGES_PATH;?>logon_btn.png" alt="" style="border:0px; width:90px; height:29px; padding: 0px;"  />-->
</td>
        </tr>
      </table>
    </div>
	
  </div>
	
	
{!! Form::close() !!}
	
	
</section>	
</div>
		
		
		
		
		
		<!--
		{!! Html::ul($errors->all(), array('class'=>'errors')) !!}

        {!! Form::open(array('url' => 'users/register','class'=>'form')) !!}
        
        <br>{!! Form::label('name', 'Username') !!}
        {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'kenny')) !!}
        <br>{!! Form::label('email', 'E-Mail Address') !!}
        {!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'example@gmail.com')) !!}
        <br>{!! Form::label('password', 'Password') !!}
        {!! Form::password('password', array('class' => 'form-control')) !!}
        <br>
        {!! Form::label('password_confirmation','Confirm Password',['class'=>'control-label']) !!}
        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        <br>
        {!! Form::submit('Sign Up' , array('class' => 'btn btn-primary')) !!}
        
        {!! Form::close() !!}
		-->
		


@endsection
