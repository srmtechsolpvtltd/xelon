<?php 
/**
 * Short description for file
 *
 * @FileName		UserController.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		View users in admin here
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Channel;
use App\Models\UserChannel;
use Illuminate\Support\Facades\Session;
use Datatables;
use Input;
use DB;
use Auth;
use Mail;
use App\Http\Requests\Auth\Admin\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserAddRequest;
class UserController extends AdminController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the admin user.
	 *
	 * @return Response
	 */
	
	
	public function index()
    { 
		$query=Input::get('search'); 
		if(!empty($query)){	
			$users = DB::table('users')->where('admin','=','0')->where('is_deleted','=','0')->where('name', 'LIKE', '%' . $query . '%')->paginate(10);
		} 
		else {
		   $users = User::where('admin','=','0')->where('is_deleted','=','0')->orderBy('created_at','desc')
			->paginate(10);  
			
		}
		$users->setPath('index');
		return view('admin.users.index', ['users' => $users, 'query'=>@$query]);    
    }
    
    // Show a user by id
    public function show($id)
    {		
        $user = User::with('userAssignedChannels')->where('id', $id)->where('is_deleted','=','0')->first(); 	        
		if($user =='[]'){			
		return view('errors.invalid_url');
		} else {
        return view('admin.users.show',compact('user'));
		}
		
    }
    
    public function edit( $id)
    {  
	   $userChannel = false;	
	   $userChannelData = UserChannel::where('user_id','=',$id)->lists('channel_id','channel_id');	
	   if($userChannelData && count($userChannelData)){
		   $userChannel = array();
		   foreach($userChannelData as $userChannelValue){
			   $userChannel[] = $userChannelValue;
		   }
	   }		   
	   $channel = Channel::whereRaw('user_id is null OR user_id="'.$id.'"')->where('is_deleted','=','0')->where('is_inactive','=','0')->lists('channel_name', 'id');	
       $user=User::where('is_deleted','=','0')->find($id);
       return view('admin.users.edit',compact('user','channel','userChannel'));
    }
    
    //Add new user
    public function addnewuser()
    {  
	   $channel = Channel::where('is_deleted','=','0')->where('is_inactive','=','0')->lists('channel_name', 'id');	
	   $user = new User;
       return view('admin.users.addnewuser',array('user' => $user,'channel' => $channel));
    }
    
    public function postnewuser(UserAddRequest $request)
    {  	
		$channels = false;	
		$password = $request->password;
		$user=$request->all();
		if(isset($user['channels'])){
			$channels = $user['channels'];
			unset($user['channels']);
		}
		$user['password'] = bcrypt($password);
		$userData = User::create($user);
		if($userData){
			$userId = $userData->id;
			if($channels && count($channels)){
				for($i=0;$i<count($channels);$i++){
					UserChannel::insert(array(
					array(
					  'user_id' => $userId,
					  'channel_id' => $channels[$i],
					  'created_at' => date('Y-m-d H:i:s')
					  )
					));
				}
			}	
			//mail start
			$data = array(
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password
			);            
			$emails = array($request->email); 
			Mail::send('emails.adminregister', $data, function ($message) use ($emails) {
			$message->from(env('MAIL_FROM'), 'Youtube Video');
			$message->to($emails)->subject('Admin has created your account in Youtube Video');
			});
			//mail end
		}
	    return redirect('admin/user/index')->with('alert-success', 'User added succesfully');
    }
    
    public function update($id, UserRequest $request)
	{
	   $channels = Input::get ('channels');		
	   $isEmailExist = User::where('id', '!=', $id)->where('email','=',Input::get('email'))->count();	
	   if($isEmailExist){
			return redirect("admin/user/edit/$id")->with('alert-success', 'The email has already been taken.');
	   }
	   $user_data = User::find($id);	  
	   if($user_data){ 
		   $useremail = $user_data->email;
		   $user_data->name=Input::get ('name');
		   $user_data->email=Input::get('email');
		   $user_data->status=Input::get('status');		   
		   $user_data->save();	  
		   $userId =  $user_data->id;
		   if(!empty($userId)){
			   DB::table('user_channels')->where('user_id', '=', $userId)->delete();
			   if($channels && count($channels)){
					for($i=0;$i<count($channels);$i++){
						UserChannel::insert(array(
						array(
						  'user_id' => $userId,
						  'channel_id' => $channels[$i],
						  'created_at' => date('Y-m-d H:i:s')
						  )
						));
					}
			   }	
		   }	   	   
	   }
	   return redirect('admin/user/index')->with('alert-success', 'User updated succesfully');
	}
    //Delste user
    public function delete($id)
	{
		$user = User::find($id);
		if($user){
			$user->is_deleted = 1;
			$user->save();
		}
	    return redirect('admin/user/index')->with('alert-success', 'User deleted succesfully');
	}
	
	 /* Change User Password get post methods */
    protected function getuserChange_password($id) {	        
        return View('admin.users.user_change_password',array('id' => $id));
    }
	//ChangePasswordRequest
    public function postuserChange_password(ChangePasswordRequest $request) {	
		$user_id = Input::get ('user_id');	
		if(!empty($user_id)){
			$user = User::findOrFail($user_id);
			$user->fill(['password' => bcrypt($request->password)])->save();
			return redirect('/admin/user/index')->with('alert-success', 'Password has been changed');
		}
		return redirect('/admin/user/index')->with('alert-success', 'Please try latter');
    }
    
    /* Change User Password get post methods */
    protected function getChange_password() {	        
        return View('admin.users.changeadminpassword');
    }
	//ChangePasswordRequest
    public function postChange_password(ChangePasswordRequest $request) {		
		$user = User::findOrFail(Auth::user()->id);
        $user->fill(['password' => bcrypt($request->password)])->save();
		return redirect('/admin/changeadminpassword')->with('alert-success', 'Password has been changed');
    }

}
