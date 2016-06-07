@extends('layouts.admin_default') 
@section('title', 'Rocksolid - Login')
@section('content')
<div class="wrapper">	

	{!! Form::open(array('url' => 'admin/login', 'role'=>'form' )) !!}
  <div class="BodyContLogin" style="position:relative">
    <h2>Welcome to Administration Suite!</h2>
    <p>Please enter a valid  Email and Password to gain access to the administration console.</p>
    
	  <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))
					<span class="Error"><?php echo 'Please enter valid username and password!' ?></span>
                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                @endforeach
        </div>
	  
	  
	  
	  
    <div class="login-box_Admin">
		<div>@if ($errors->has('LoginFailedError')) <span class="error-message">{{ $errors->first('LoginFailedError') }}</span> @endif</div>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left"><div class="login-area">Login Area </div></td>
        </tr>
        <tr>
          <td align="left" class="posrel"><div class="UN_icon"></div>
            <?php //echo $this->Form->input('Admin.AdminUserName', array('type'=>'text','id'=>'AdminUserName', 'label'=>false, 'placeholder'=>'User Name', 'div'=>false, 'style'=>'', 'maxlength'=>'50')) ?> 
			  
           {!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'example@gmail.com','maxlength'=>'50')) !!}
				 @if ($errors->has('email')) <span class="error-message">{{ $errors->first('email') }}</span> @endif
			  
			  </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" class="posrel"><div class="pass_icon"></div>
            <?php //echo $this->Form->input('Admin.AdminPassword', array('type'=>'password','id'=>'AdminPassword','label'=>false, 'placeholder'=>'Password', 'div'=>false, 'style'=>'', 'maxlength'=>'50')) ?> 
           {!! Form::password('password', array('class' => 'form-control','placeholder' => '********')) !!}
				 @if ($errors->has('password')) <span class="error-message">{{ $errors->first('password') }}</span> @endif
			</td>
        </tr>
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="middle">
			   {!! Form::submit('Sign In' , array('class' => 'btn btn-primary')) !!}
			  
			 <!-- <input name="signup" type="image" src="<?php //echo IMAGES_PATH;?>logon_btn.png" alt="" style="border:0px; width:90px; height:29px; padding: 0px;"  /> -->
			</td>
        </tr>
      </table>
    </div>
	
  </div>
	
	
{!! Form::close() !!}
	
	
	
</div>





<!--
<div class="row">
	<div class="col-md-6">
		<h2>Log in</h2>
		<p>Hi, here you can login to your account. Just fill in the form and press Sign In button.</p>
		
		
		 {!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
        
		
		 <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))

                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                @endforeach
        </div>
		{!! Form::open(array('url' => 'users/login','class'=>'form-horizontal','role'=>'form' )) !!}
		<div class="form-group">
			{!! Form::label('email', 'E-Mail Address', array('class' => 'col-md-4 control-label') ) !!}
            <div class="col-md-6">
				{!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'example@gmail.com')) !!}
				 @if ($errors->has('email')) <span class="error-message">{{ $errors->first('email') }}</span> @endif
				</div>
              </div>
		
		
		<div class="form-group">
			{!! Form::label('password', 'Password', array('class' => 'col-md-4 control-label') ) !!}
            <div class="col-md-6">
				{!! Form::password('password', array('class' => 'form-control','placeholder' => '********')) !!}
				 @if ($errors->has('password')) <span class="error-message">{{ $errors->first('password') }}</span> @endif
				</div>
           </div>
		
		<div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                 {!! Form::submit('Sign In' , array('class' => 'btn btn-primary')) !!}
                </div>
              </div>
		{!! Form::close() !!}
		
	</div>
</div>
-->






@endsection
