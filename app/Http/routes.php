<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/','HomeController@dashboard');
	
Route::get('user/viewVideoTemplate/{id}',['as'=>'user.viewVideoTemplate', function($id){
	
	                                        $data=DB::table('overlaytemplate')->where('id','=',$id)->where('is_approve','=','1')->first();
	                                        return view('video.viewTemplate',['data'=>$data]);
	                                                                                                                                     	                                                                      
	                                                                      }]);

Route::get('user/viewVideo/{id}',['as'=>'user.viewVideo', function($id){
	
	$data=DB::table('videos')
            ->join('channels', function ($join){
				
				$join->on('videos.channel_id', '=', 'channels.id');
				
			})->where('videos.id','=',$id)
           
            ->select('videos.meta_title','videos.type','videos.video_path','videos.video_screenshot', 'channels.channel_name','videos.created_at','videos.release_date','videos.id','videos.video_status','channels.username','channels.password')
            ->first();	
           
	                                                           
	        return view('video.viewVideo',['data'=>$data]);                                                                	                                                                      
	                                                                      }]);

Route::get('user/viewMore/{id}/{type}',['as'=>'user.viewMore', function($id,$type){
	                                        
                                            $data=DB::table('videos')->where('user_id','=',$id)->where('video_status','=',$type)->orderBy('created_at','desc')->paginate(12);
											return view('video.viewMore',['data'=>$data,'type'=>$type]);                                                                	                                                                      
														}]);

Route::get('user/uploadVideo/{id}',['as'=>'user.uploadVideo','uses'=>'VideoController@CheckGoogleAuth']);														
Route::get('user/uploadVideoOnYoutube',['as'=>'user.uploadVideoOnYoutube','uses'=>'VideoController@UploadOnYoutube']);

Route::post('user/getChannelCredentials',['as'=>'user.channelCredentials','uses'=>'VideoController@getChannelCredentials']);
														

});

Route::group(['middleware' => 'guest'], function () {
Route::get('/', function () {
    return view('home');
});
});

Route::get("user/search",array('as'=>'user.search',"uses"=>"HomeController@serach"));

Route::get('home', ['as'=>'user.home','uses'=>'HomeController@dashboard']);

Route::get('dashboard', 'HomeController@dashboard');
//Route::get('user/login', 'UserController@login');
/*
Route::get('user/register', 'UserController@register');
//Route::resource('user/login', 'UserController@login');
*/

//Page Start
Route::get('page/home', array('as' => 'page.home', 'uses' => 'PageController@home'));
Route::get('page/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));  
//Page End

/* User Authentication Start*/
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('user/register', 'Auth\AuthController@getRegister');
Route::post('user/register', 'Auth\AuthController@postRegister');
/* User Authentication end*/

Route::get('channel/create',['as'=>'channel.create',function(){
	                                                  return view('channels.create');
	                                                  }]);    
	                                                  
Route::post('channel/createChannel',array('as'=>'channel.create','uses'=>'ChannelController@createChannel')); 

//Hemant Start
Route::get('channel/manageChannel',array('as'=>'channel.manageChannel','uses'=>'ChannelController@manageChannel')); 
Route::get('channel/delete/{id}',['as' => 'channel.delete',function($id){
  $data=DB::table('user_channels')->where('id','=',$id)->where('user_id','=',Auth::id())->first();
  if($data){
	  Session::put('msg', 'Channel deleted successfully!'); 
	  DB::table('user_channels')->where('id', '=', $id)->where('user_id', '=', Auth::id())->delete();
  }	  
  /*
  $data=DB::table('channels')->where('id','=',$id)->where('user_id','=',Auth::id())->first();
  if($data){
	$channel=DB::table('channels')->where('id','=',$id)->update(['is_deleted'=>1,'user_id'=>Auth::id()]);
  }else{
	  $data2=DB::table('channelbyusers')->where('id','=',$id)->where('user_id','=',Auth::id())->first();
	  if($data2){
		$channel2=DB::table('channelbyusers')->where('id','=',$id)->update(['is_deleted'=>1,'user_id'=>Auth::id()]);
	  }
  }	*/  
  return Redirect::to('channel/manageChannel');	                          
}]);
//Hemant End

Route::get('user/videoRelease',array('as'=>'user.videoRelease','uses'=>'VideoController@index'));

Route::post('user/videoRelease',array('as'=>'user.videoRelease','uses'=>'VideoController@preview'));

Route::post('user/videoReleaseSave',array('as'=>'user.videoReleaseSave','uses'=>'VideoController@SaveVideoRelease'));

Route::get('user/videoPackshot',array('as'=>'user.videoPackshot', 'uses'=>'VideoController@VideoPackshot'));

Route::post('user/videoPackshot',array('as'=>'user.videoPackshot', 'uses'=>'VideoController@VideoPackshotPreview'));

Route::post('user/videoPackshotSave',array('as'=>'user.videoPackshotSave', 'uses'=>'VideoController@SaveVideoPackshot'));



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

if (Request::is('admin/*'))
{
    require __DIR__.'/admin_routes.php';
}

//Hemant Start
Route::get('changepassword', 'UserController@getChange_password');
Route::post('changepassword', 'UserController@postChange_password');
Route::get('profile', 'UserController@get_profile');
Route::post('profile', 'UserController@post_profile');
//Hemant End
