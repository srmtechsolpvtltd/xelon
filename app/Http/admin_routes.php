<?php
use App\Models\Channel;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {	
	Route::get('user/index', 'Admin\UserController@index');  
	Route::group(['middleware' => array('auth','admin')], function()
	{
		Route::get('user/dashboard', array('as'=>'dashboard', function()
		{
		return View('admin.users.dashboard');
		}));
	});
	//Admin Page Start
	Route::get('pages/index', array('as' => 'pages.pages', 'uses' => 'Admin\PageController@index')); 
	Route::get('pages/create', array('as' => 'page.create', 'uses' => 'Admin\PageController@create'));
	Route::post('pages/store', array('as' => 'page.store', 'uses' => 'Admin\PageController@store'));
	Route::get('pages/edit/{id}', array('as' => 'page.edit', 'uses' => 'Admin\PageController@edit'));
	Route::patch('pages/update/{id}', array('as' => 'page.update', 'uses' => 'Admin\PageController@update'));
	Route::DELETE('pages/delete/{id}', array('as' => 'page.delete', 'uses' => 'Admin\PageController@delete'));
	Route::post('image_upload_tinymce', 'Admin\ImageController@tinymce_img');
	//Admin Page End
	
	Route::get('channel/index', array('as' => 'channel.index', 'uses' => 'Admin\ChannelController@index')); 
	
 
	
	Route::get('channel/edit/{id}',['as' => 'channel.edit',function($id){
	                                 $data=Channel::with('channels')->where('id','=',$id)->first();
	                                 return view('admin.channels.editchannel',['data'=>$data]);	                          
	                                 }]);
	                                 
	Route::get('channel/view/{id}',['as' => 'channel.view',function($id){
	                                 $data=Channel::with('channels')->where('id','=',$id)->first();
	                                 return view('admin.channels.view',['data'=>$data]);	                          
	                                 }]);
	                                 
	Route::get('channel/addLogo/{id}',['as' => 'channel.addlogo',function($id){
	                                 return view('admin.channels.addLogo',['channel_id'=>$id]);	                          
	                                 }]);
	                                 
	Route::get('channel/logo/{id}',array('as' => 'channel.logo','uses'=>'Admin\ChannelController@getLogo'));
	                                 
	Route::get('channel/delete/{id}',['as' => 'channel.delete',function($id){
	                                  $data=DB::table('channels')->where('id','=',$id)->update(['is_deleted'=>1]);
									  Session::put('msg', 'Channel deleted successfully!');    
	                                  return Redirect::to('admin/channel/index');	                          
	                                 }]);
	                                 
	Route::get('channel/logoInactive/{id}',['as' => 'channel.logoInactive',function($id){
	                                 DB::table('channel_logos')->where('id','=',$id)->update(['is_inactive'=>1]);
	                                 $data=DB::table('channel_logos')->where('id','=',$id)->first();
	                                  Session::put('msg', 'Logo inactivated successfully!');  
	                                  return Redirect::to('admin/channel/logo/'.$data->channel_id);	 
	                                   }]);
	                                                           
	Route::get('channel/logoActive/{id}',['as' => 'channel.logoInactive',function($id){
	                                 $data=DB::table('channel_logos')->where('id','=',$id)->first();
	                                  DB::table('channel_logos')->where('channel_id','=',$data->channel_id)->update(['is_inactive'=>1]);
	                                  DB::table('channel_logos')->where('id','=',$id)->update(['is_inactive'=>0]);
	                                  Session::put('msg', 'Logo activated successfully!'); 
	                                  return Redirect::to('admin/channel/logo/'.$data->channel_id);	                          
	                                 }]);
	                                 
   
	Route::get('userchannel/index',array('as' => 'userchannel.index', 'uses' => 'Admin\UserChannelController@index'));
	Route::get('userchannel/Approve/{id}',['as'=>'userchannel.approve',function($id){
		
		                               DB::transaction(function ($id) use ($id){
											
										DB::table('channelbyusers')->where('id','=',$id)->update(['is_approve'=>1]);
										$data=DB::table('channelbyusers')->where('id','=',$id)->first();
										$id=DB::table('channels')->insertGetId(['channel_name'=>$data->channel_name,'channel_url'=>$data->channel_url,'user_id'=>$data->user_id,'username'=>$data->username,'password'=>$data->password,'created_at'=>date('Y-m-d h:i:s')]);
										DB::table('channel_logos')->insert(['logo_path'=>$data->logo_path,'channel_id'=>$id,'is_inactive'=>0,'created_at'=>date('Y-m-d h:i:s')]);
										DB::table('user_channels')->insert(['user_id'=>$data->user_id,'channel_id'=>$id,'created_at'=>date('Y-m-d h:i:s')]);
									    Session::put('msg', 'Channel approved successfully!');      
									          });
										return Redirect::to('admin/userchannel/index');	
										
	                                  }]);
	                                 
	
	Route::get('channel/create',['as'=>'channel.create',function(){
	                                                  return view('admin.channels.create');
	                                                  }]);    
	                                                  
	Route::post('channel/createChannel',array('as'=>'channel.create','uses'=>'Admin\ChannelController@createChannel')); 
	                                                                              
	Route::post('channel/AddLogo',array('as'=>'channel.AddLogo','uses'=>'Admin\ChannelController@addlogo'));                                                                               
	                                 
	                                 
	                                 
	Route::patch('channel/updateChannel',array('as'=>'channel.update','uses'=>'Admin\ChannelController@update'));                                 
								 
								 

	Route::get('user/{id}', array('as' => 'user.show', 'uses' => 'Admin\UserController@show'));  
	Route::DELETE('user/delete/{id}', array('as' => 'user.delete', 'uses' => 'Admin\UserController@delete'));
	Route::get('user/edit/{id}', array('as' => 'user.edit', 'uses' => 'Admin\UserController@edit'));
	Route::get('addnewuser', array('as' => 'user.addnewuser', 'uses' => 'Admin\UserController@addnewuser'));
	Route::post('addnewuser', array('as' => 'user.addnewuser', 'uses' => 'Admin\UserController@postnewuser'));
	Route::patch('user/update/{id}', array('as' => 'user.update', 'uses' => 'Admin\UserController@update'));
	Route::get('user/userchangepassword/{id}', 'Admin\UserController@getuserChange_password');
	Route::post('user/userchangepassword', 'Admin\UserController@postuserChange_password');
	Route::get('changeadminpassword', 'Admin\UserController@getChange_password');
	Route::post('changeadminpassword', 'Admin\UserController@postChange_password');
	
	//Hemant Start
	Route::get('managetemplate/index', array('as' => 'managetemplate.index', 'uses' => 'Admin\ManageTemplateController@index'));
	Route::get('managetemplate/changestatus/{id}', array('as' => 'managetemplate.changestatus', 'uses' => 'Admin\ManageTemplateController@changestatus'));
	Route::get('managetemplate/add', array('as' => 'managetemplate.add', 'uses' => 'Admin\ManageTemplateController@add'));
	Route::post('managetemplate/add', array('as' => 'managetemplate.add', 'uses' => 'Admin\ManageTemplateController@insert'));
	
	Route::get('reports/user', array('as' => 'reports.user', 'uses' => 'Admin\UserReportController@index'));
	Route::get('reports/userExcel/{from}/{to}',array('as'=>'reports.user.excel','uses'=>'Admin\UserReportController@ExcelReport'));
	Route::get('reports/userExcel',array('as'=>'reports.user.excel.nofilter','uses'=>'Admin\UserReportController@ExcelReportNofiter'));
	Route::get('reports/videos',array('as'=>'reports.videos','uses'=>'Admin\VideoReportController@index'));
	Route::get('reports/videoExcel/{status}/{from}/{to}',array('as'=>'reports.video.excel','uses'=>'Admin\VideoReportController@ExcelReport'));
	Route::get('reports/videoExcel',array('as'=>'reports.video.excel.nofilter','uses'=>'Admin\VideoReportController@ExcelReportNofiter'));
	Route::get('reports/channel',array('as'=>'reports.channel','uses'=>'Admin\ChannelReportController@index'));
	Route::get('reports/channelExcel/{from}/{to}',array('as'=>'reports.channel.excel','uses'=>'Admin\ChannelReportController@ExcelReport'));
	Route::get('reports/channelExcel',array('as'=>'reports.channel.excel.nofilter','uses'=>'Admin\ChannelReportController@ExcelReportNofiter'));
	Route::get('reports/channelPdf',array('as'=>'reports.channel.pdf.nofilter','uses'=>'Admin\ChannelReportController@PdfNofiter'));
	Route::get('reports/channelPdf/{from}/{to}',array('as'=>'reports.channel.pdf.nofilter','uses'=>'Admin\ChannelReportController@Pdf'));
	Route::get('reports/videoPdf',array('as'=>'reports.video.pdf.nofilter','uses'=>'Admin\VideoReportController@PdfNofiter'));
	Route::get('reports/videoPdf/{status}/{from}/{to}',array('as'=>'reports.video.pdf.nofilter','uses'=>'Admin\VideoReportController@Pdf'));
	
	Route::get('reports/userPdf/{from}/{to}',array('as'=>'reports.user.pdf','uses'=>'Admin\UserReportController@Pdf'));
	Route::get('reports/userPdf',array('as'=>'reports.user.pdf.nofilter','uses'=>'Admin\UserReportController@PdfNofiter'));
	
	
	//Hemant End
	
});
