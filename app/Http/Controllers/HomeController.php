<?php 
/**
 * Short description for file
 *
 * @FileName		HomeController.php
 * @Created On		9 February 2016
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		To show the home page
 */
namespace App\Http\Controllers;
use App\Http\Requests\VideoSearchRequest;
use DB;
use Auth;

class HomeController extends Controller {

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
		$this->middleware('auth');
	}

	/*********************************************************
	Function name: index
	Description: This function is used to show login page to guest
	Created Date: 9 February 2016
	Created by : Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
	Modified Date:
	Modified by : 
	**********************************************************/
	public function index()
	{
		return view('home');
	}
	
	/*********************************************************
	Function name: dashboard
	Description: This function is used to show dashboard page to user
	Created Date: 12 February 2016
	Created by : Hemant Upadhyay
	Modified Date: 29 February 2016
	Modified by : Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
	**********************************************************/
	public function dashboard()
	{
		$savedTotal=DB::table('videos')->where('user_id','=',Auth::id())->where('video_status','=',0)->count();
		$saved=DB::table('videos')->where('user_id','=',Auth::id())->where('video_status','=',0)->orderBy('created_at','desc')->take(8)->get();
		$uploadedTotal=DB::table('videos')->where('user_id','=',Auth::id())->where('video_status','=',1)->count();
		$uploaded=DB::table('videos')->where('user_id','=',Auth::id())->where('video_status','=',1)->orderBy('updated_at','desc')->take(8)->get();
		$failedTotal=DB::table('videos')->where('user_id','=',Auth::id())->where('video_status','=',2)->count();
		$failed=DB::table('videos')->where('user_id','=',Auth::id())->where('video_status','=',2)->orderBy('updated_at','desc')->take(8)->get();
		return view('home.dashboard',['saved'=>$saved,'uploaded'=>$uploaded,'failed'=>$failed,'savedTotal'=>$savedTotal,'uploadedTotal'=>$uploadedTotal,'failedTotal'=>$failedTotal]);
	}
    
}
