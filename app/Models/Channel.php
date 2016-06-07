<?php
/**
 * Short description for file
 *
 * @FileName		Channel.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Channel Model
 */
namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;	

class Channel extends Model
{
    //
    public function channels(){
		return $this->belongsToMany('App\Models\Channel','channel_logos')->withPivot('logo_path')->where('channel_logos.is_inactive','=',0);
	}
	
	public function updateChannel($id,$data)
	{
		
	DB::table('channels')->where('id', $id)->update(['channel_name'=>$data['channel_name'],'channel_url'=>$data['channel_url'],'is_inactive'=>$data['is_inactive'],'username'=>$data['username'],'password'=>$data['password'],'updated_at'=>date('Y-m-d h:i:s')]);
		

	}
	
	public function addChannel($data)
	{
		$id=DB::table('channels')->insertGetId(['channel_name'=>$data['channel_name'],'channel_url'=>$data['channel_url'],'is_inactive'=>$data['is_inactive'],'username'=>$data['username'],'password'=>$data['password'],'created_at'=>date('Y-m-d h:i:s')]);
		
		DB::table('channel_logos')->insert(['logo_path'=>$data['logo_path'],'channel_id'=>$id,'is_inactive'=>0,'created_at'=>date('Y-m-d h:i:s')]);
		
	}
	
	public function addChannelLogo($data)
	{
		if($data['is_inactive']==0)
		{
		  DB::table('channel_logos')->where('channel_id', $data['channel_id'])->update(['is_inactive'=>1,'updated_at'=>date('Y-m-d h:i:s')]);			
		}
		DB::table('channel_logos')->insert(['logo_path'=>$data['logo_path'],'channel_id'=>$data['channel_id'],'is_inactive'=>$data['is_inactive'],'created_at'=>date('Y-m-d h:i:s')]);
		
	}

}
