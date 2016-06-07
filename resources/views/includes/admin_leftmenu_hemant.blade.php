 <?php 
         $controller=Route::getCurrentRoute()->getActionName();
         @list($controller, $function) = explode('@', $controller);         
?>
<?php /*?>
@if (Auth::check())
<?php */?>

<aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- sidebar menu: : style can be found in sidebar.less -->      
      <ul class="sidebar-menu">
		  
        <li  <?php if(Request::path() == 'admin/user/dashboard')
		{ ?>class="active"<?php }?>> <a href="<?php echo Request::root().'/admin/user/dashboard'; ?>"> <i class="fa fa-dashboard"></i><span>Dashboard</span>  </a></li>
			  
       	  
        <li class="treeview" id='Manage_Pages'> <a href="#"> <i class="fa fa-edit"></i> <span>Manage Pages</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">
            <?php /*?><li <?php if(Request::path() == 'admin/pages/create'){?>class="active"<?php }?>><a href="<?php echo Request::root().'/pages/create'; ?>"><i class="fa fa-circle-o"></i>Create Page</a></li><?php */?>
              
            <li <?php if(Request::path() == 'admin/pages/index'){?>class="active"<?php }?>><a href="<?php echo Request::root().'/admin/pages/index'; ?>"><i class="fa fa-circle-o"></i>View Pages</a></li>
             
          </ul>
        </li>
          
         
		  
        <li class="treeview" id='Manage_Users'> <a href="#"> <i class="fa fa-edit"></i> <span>Manage Users</span><i class="fa fa-angle-left pull-right"></i> </a>
           <ul class="treeview-menu">
            <li <?php if(Request::path() == 'admin/user/index'){?>class="active"<?php }?>>
                <a href="<?php echo Request::root().'/admin/user/index'; ?>"><i class="fa fa-circle-o"></i>View Users</a></li>             
          </ul>
        </li>
        
        <li class="treeview" id='Manage_Channels'> <a href="#"> <i class="fa fa-edit"></i> <span>Manage Channels</span><i class="fa fa-angle-left pull-right"></i> </a>
           <ul class="treeview-menu">
            <li <?php if(Request::path() == 'admin/channel/index'){?>class="active"<?php }?>>
                <a href="<?php echo Request::root().'/admin/channel/index'; ?>"><i class="fa fa-circle-o"></i>View Channels</a></li>             
          </ul>
        </li>
		 
        
        
		<li class="treeview" id='mngusermenu'> <a href="#"> <i class="fa fa-laptop"></i><span>Settings</span> <i class="fa fa-angle-left pull-right"></i> </a>
          <ul class="treeview-menu">         
            <li <?php if(Request::path() == 'admin/changeadminpassword'){?>class="active"<?php }?>><a href="<?php echo Request::root().'/admin/changeadminpassword'; ?>"><i class="fa fa-circle-o"></i>Change Password</a></li>
           </ul>
        </li>
		
		
		 <li><?php // echo $controller.'<br>';          echo $function; ?></li>
      </ul>
    </section>
    <!-- /.sidebar --> 
 </aside>
<?php /*?> 
@endif
<?php */?>
<?php //} ?>




<?php  if(Request::path() == 'admin/changeadminpassword'){?>
	<script> $("#mngusermenu").addClass( "menu-open active" );</script>
<?php }?>


<?php  if($controller == 'App\Http\Controllers\Admin\PageController'){?>
	<script> $("#Manage_Pages").addClass( "menu-open active" ); </script>
<?php }?>

<?php  if($controller == 'App\Http\Controllers\Admin\UserController'){ ?>
	<script> $("#Manage_Users").addClass( "menu-open active" ); </script>
<?php }?>

<?php  if($controller == 'App\Http\Controllers\Admin\ChannelController'){ ?>
	<script> $("#Manage_Channels").addClass( "menu-open active" ); </script>
<?php }?>



		
