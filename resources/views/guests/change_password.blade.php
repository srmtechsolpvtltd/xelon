@extends('layouts.admin_default')
@section('content')
<script type="text/javascript">	 
$(document).ready(function(){  
$('#submit').click(function(){ 
   $('#password_error').empty(); 
   $('#password_confirmation_error').empty();	  
   var password=$('#password').val(); 
   var password_confirmation=$('#password_confirmation').val(); 
     
   var flag=0;
	  if(password=='') {
		  $('#password_error').html('The password is required.');	
		  $('#password_error').addClass('error-message');		   
		  flag=1;
	  }
	  
	   if(password_confirmation=='') {
		  $('#password_confirmation_error').html('The password confirmation field is required.');	
		  $('#password_confirmation_error').addClass('error-message');		   
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
<section class="content-header">
  <h1>Change Password</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo Request::root().'/admins/dashboard'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active"><a href="#">Change Password</a></li>
  </ol>
</section>
<section class="content">
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
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_border" >
      
      <tr>
        <td colspan="3">
            <?php  //echo $this->Session->flash();?>
      <div id="validationError" class="error-message"></div>
            
		
			
			
			
			{!! Form::open(array('url' => 'admins/change_password','class'=>'form-horizontal','role'=>'form' )) !!}		
		 <!--genrelinfo content table-->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td align="left" valign="top" id="genrelinfo"><!--genrelinfo-->
                  <!--genrelinfo closed-->                </td>
              </tr>
              <tr>
                <td align="left" valign="top" ><!--genrelinfo content table-->
                  <div class="marketingtitle-area">
                    <div style="float:left; width:100%">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">                        
                        <tr>
                          <td width="76%" align="left" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                             <tr>
                                <td align="left" valign="top" ><table width="60%" border="0" cellspacing="2" cellpadding="2" style="margin-left:20px;">
                                 
                                    
                            <tr>
                            <td class="black-text" align="left" width="30%">Password<span class="required">*</span></td>
                            <td align="center" width="5%">:</td>
                            <td  width="65%" align="left">
						<?php //echo $this->Form->input('UserAdvertiser.first_name', array('type'=>'text', 'value'=>$user['UserAdvertiser']['first_name'],'size'=>'55', 'id'=>'first_name', 'label'=>false, 'div'=>false)) ?>
								{!! Form::password('password', array('class' => 'form-control','id' => 'password','placeholder' => '********')) !!}
				 @if ($errors->has('password')) <span class="error-message">{{ $errors->first('password') }}</span> @endif
				  <span id ="password_error"></span>
								</td>
                            </tr>
                                    
                            <tr>
                            <td class="black-text" align="left" width="10%">Confirm Password<span class="required">*</span></td>
                            <td align="center" width="5%">:</td>
                            <td align="left">
				<?php //echo $this->Form->input('UserAdvertiser.last_name', array('type'=>'text', 'value'=>$user['UserAdvertiser']['last_name'], 'size'=>'55', 'id'=>'last_name', 'label'=>false, 'div'=>false)) ?>
								{!! Form::password('password_confirmation', array('class' => 'form-control','id' => 'password_confirmation', 'placeholder' => '********')) !!}
				 @if ($errors->has('password_confirmation')) <span class="error-message">{{ $errors->first('password_confirmation') }}</span> @endif
				  <span id ="password_confirmation_error"></span>
								</td>
                            </tr>
                       <tr  class="footer-botton" >                      
                      <td colspan="3" align="center" >
						  <input class="btn btn-primary" name="edit_user" type="submit" id="submit" value="Submit" /></td>
                      
                    </tr>       
                                    
                                    
                            </table></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!--genrelinfo content table closed-->                </td>
              </tr>
              
			  
            </table>
            <!--genrelinfo content table closed-->
			<!--</form>	-->	
		  {!! Form::close() !!}
		  
		  
		  
		  
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
  <tr>
    <td style="background:url(<?php //echo IMAGES_PATH;?>/sp_bottomage_sml.gif) no-repeat; height:10px"></td>
  </tr>
 
</table>


        </div>
      </div>
    </div>
  </div>
</section> 
@endsection
