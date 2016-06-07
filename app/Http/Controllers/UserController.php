<?php 
/**
 * Short description for file
 *
 * @FileName		UserController.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		To show the login and registration view of user
 */
namespace App\Http\Controllers;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Auth;
class UserController extends Controller {

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
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['login','register']]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	//User Login Interface
	public function login()
	{
		return view('users.login');
	}
	//User Registration Interface
	public function register()
	{
		return view('users.register');
	}
	//User Change Password Interface
	protected function getChange_password() {	        
        return View('users.changepassword');
    }
    //Update Password
    public function postChange_password(ChangePasswordRequest $request) {		
		$user = User::findOrFail(Auth::user()->id);
        $user->fill(['password' => bcrypt($request->password)])->save();
		return redirect('/changepassword')->with('alert-success', 'Password has been changed');
    }
	//User Profile Interface
	protected function get_profile() {	        
        return View('users.profile');
    }
    //Update User Profile
    public function post_profile(ProfileRequest $request) {		
		$user = User::findOrFail(Auth::user()->id);
		if($user){	
			//Checks whether user choosed to upload photo.		
			if($request->file('photo'))
			{	
				$extenstion =$request->file('photo')->getClientOriginalExtension();
				$fileName = md5(Auth::user()->id).'.'.$extenstion;
				//Moving the uploaded file to the profile folder. 
				$request->file('photo')->move(base_path() . '/public/images/profile/', $fileName);				
				$user->update(array('name' => $request->name, 'photo' => $fileName));				
			}else{
				$user->fill(['name' => $request->name])->save();
			}
			
			return redirect('/profile')->with('alert-success', 'Profile successfully updated');
		}else{
			return redirect('/profile')->with('alert-success', 'Please try latter');
		}	
    }
	

}
