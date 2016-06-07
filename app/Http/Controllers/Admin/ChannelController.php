<?php 
/**
 * Short description for file
 *
 * @FileName		ChannelController.php
 * @Created On		9 February 2016
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Add, update channel in admin
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Models\Channel;
use Illuminate\Support\Facades\Session;
use Datatables;
use Input;
use DB;
use Auth;
use App\Http\Requests\Admin\ChannelUpdateRequest;
use App\Http\Requests\Admin\ChannelCreateRequest;
use App\Http\Requests\Admin\AddLogoRequest;
use Redirect;
use Image;
class ChannelController extends AdminController {

	/*
	|--------------------------------------------------------------------------
	| Channel Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
	public function index()
    { 
		
		$query=Input::get('search'); 
		if(!empty($query)){	
			$pages = Channel::with('channels')->where('channel_name', 'LIKE', '%' . $query . '%')->where('is_deleted','=',0)->paginate(10);
			$pages->setPath('index');
		} 
		else {
		   $pages = Channel::with('channels')->where('is_deleted','=',0)->orderBy('created_at','desc')
			->paginate(10);  
			$pages->setPath('index');
		}
		
		return view('admin.channels.index', ['pages' => $pages, 'query'=>@$query]);    
    }   
    
    //Update channel
    
    public function update(ChannelUpdateRequest $request, Channel $obj)
    {
		$id=$request->input('id');
		$data['channel_name']=$request->input('channel_name');
		$data['channel_url']=$request->input('channel_url');
		$data['is_inactive']=$request->input('is_inactive');
		$data['username']=$request->input('username');
		$data['password']=$request->input('password');
		$obj->updateChannel($id,$data);
		Session::put('msg', 'Record Updated Successfully!');
        return Redirect::to('admin/channel/index');
		
	}
	
	public function getLogo($id)
	{
		
		$data=DB::table('channel_logos')->where('channel_id','=',$id)->orderBy('created_at','desc')->paginate(10);
		
		return view('admin.channels.logo',['data'=>$data,'channel_id'=>$id]);		
		
	}
	
	//Create channel
	public function createChannel(ChannelCreateRequest $request,Channel $obj)
	{
		$extenstion =$request->file('logo')->getClientOriginalExtension();//retrieving the extension of the uploaded file.
		$fileName= md5($request->file('logo')->getClientOriginalName()).time().'.'.$extenstion;
		$request->file('logo')->move(base_path() . '/public/images/channellogo/', $fileName);
		$dir = public_path().'/';
		$img = Image::make($dir.'/images/channellogo/'.$fileName);
		// now you are able to resize the instance
		$img->resize(335, 335);
		// finally we save the image as a new file
		$img->save($dir.'/images/channellogo/thumb/'.$fileName);
		$data['channel_name']=$request->input('channel_name');
		$data['channel_url']=$request->input('channel_url');
		$data['is_inactive']=$request->input('is_inactive');
		$data['username']=$request->input('username');
		$data['password']=$request->input('password');
		$data['logo_path']= $fileName;
		$obj->addChannel($data);
		
		Session::put('msg', 'Record Added Successfully!');
        return Redirect::to('admin/channel/index');
		
		
	}
	
	//Create logo
	public function addlogo(AddLogoRequest $request,Channel $obj)
	{
		$extenstion =$request->file('logo')->getClientOriginalExtension();//retrieving the extension of the uploaded file.
		$fileName= md5($request->file('logo')->getClientOriginalName()).time().'.'.$extenstion;
		$request->file('logo')->move(base_path() . '/public/images/channellogo/', $fileName);
		$dir = public_path().'/';
		$img = Image::make($dir.'/images/channellogo/'.$fileName);
		// now you are able to resize the instance
		$img->resize(335, 335);
        $channel_id=$request->input('channel_id');
		// finally we save the image as a new file
		$img->save($dir.'/images/channellogo/thumb/'.$fileName);
		$data['is_inactive']=$request->input('is_inactive');
		$data['logo_path']=$fileName;
		$data['channel_id']=$request->input('channel_id');
		$obj->addChannelLogo($data);
		Session::put('msg', 'Record Added Successfully!');
        return Redirect::to('admin/channel/logo/'.$data['channel_id']);
		
		
	}

}
