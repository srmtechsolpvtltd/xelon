<?php
/**
 * Short description for file
 *
 * @FileName		ChannelByUser.php
 * @Created On		10 February 2014
 * @author			Rohit Yadav <rohit.yadav@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		User ChannelByUser Model
 */
namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;	

class ChannelByUser extends Model
{
	protected $table = 'channelbyusers';
	 
    function getChannels()
    {
		return $this->belongsTo('App\Models\User','user_id', 'id');		
	}
	
	public function addChannel($data)
	{
		$id=DB::table('channelbyusers')->insertGetId(['channel_name'=>$data['channel_name'],'channel_url'=>$data['channel_url'],'user_id'=>$data['user_id'],'username'=>$data['username'],'password'=>$data['password'],'logo_path'=>$data['logo_path'],'created_at'=>date('Y-m-d h:i:s')]);		
		
	}
	
}
