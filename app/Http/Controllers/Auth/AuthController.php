<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest; 
use App\Http\Requests\Auth\RegisterRequest; 
use DB;
use Auth;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    protected $auth;
    
    protected $user; 

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
		$this->user = $user; 
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
     public function getLogin() {		
		return View('guests.login');
		
    }
	
   public function postLogin(LoginRequest $request) {
        $users = DB::select('select * from users where email = :email', ['email' => $request->email]);      
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'is_deleted' => 0])) {
			if(Auth::user()->admin == 1){			
				return redirect('admin/user/dashboard');				
			}else{
				return redirect('home');
			}	
        }else if(isset($users[0]->status) && @$users[0]->status=='0') {
			 if(isset($request->isuser)){
				 return redirect('/')->withErrors(['LoginFailedError' => 'Your account is not active.',]);
			 }else{
				 return redirect('admin/login')->withErrors(['LoginFailedError' => 'Your account is not active.',]);
			 }
        }else if(@$users[0]->is_deleted=='1') {
			return redirect('/')->withErrors(['LoginFailedError' => 'Your account has been deleted, please contact with admin.',]);
        }else {
			if(isset($request->isuser)){
				return redirect('/')->withErrors(['LoginFailedError' => 'The email or the password is invalid. Please try again.',]);
			}else{
				return redirect('admin/login')->withErrors(['LoginFailedError' => 'The email or the password is invalid. Please try again.',]);   
            }
        }
 
        
    }
    
    /* Register get post methods */
    protected function getRegister() {
        return View('guests.register');
    }

    protected function postRegister(RegisterRequest $request) {
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->status = 1;
        $this->user->password = bcrypt($request->password);
        $this->user->save();        
        ////////// Email Start/////////////
         $data = array(
        'name' => $request->name,
        'email' => $request->email,
         );            
        $emails = array($request->email); 
        Mail::send('emails.register', $data, function ($message) use ($emails) {
        $message->from(env('MAIL_FROM'), 'Youtube Video');
        $message->to($emails)->subject('New user registered');
        });
        ////////// Email End/////////////
        return redirect('user/login');
    }
    
    protected function getLogout()
    {
        $this->auth->logout();
        return redirect('home');
    }

    
}
