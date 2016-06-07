<?php
/**
 * Short description for file
 *
 * @FileName		UserChannel.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		User Channel Model
 */
namespace App\Models;
use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;	

class UserChannel extends Model
{
	function getAssociatedChannels()
    {
		return $this->belongsTo('App\Models\User','user_id', 'id');		
	}
	
	public function getUserApprovedChannel(){
		
			$data=DB::table('user_channels')
            ->join('channels', function ($join){
				
				$join->on('user_channels.channel_id', '=', 'channels.id')
				->where('user_channels.user_id','=',Auth::id());
			})
            ->join('channel_logos', function($join){
				
				$join->on('channel_logos.channel_id', '=', 'channels.id')
				->where('channel_logos.is_inactive','=',0)->where('channels.is_deleted','=','0');
				
			})
            ->select('user_channels.user_id','channels.id', 'channels.channel_name','channels.channel_url','channel_logos.logo_path','channels.username','channels.password')->take(1)
            ->get();	
            return $data;
	}
	
	public function SaveVideoRelease($data){
		$DurationArray=array('0'=>'Entire duration of video','1'=>'First 5 seconds','2'=>'First 30 seconds','3'=>'5 seconds at start and finish');
		if($data['submitMode']==1){
		$id=DB::table('videos')->insertGetId(['user_id'=>$data['user_id'],'channel_id'=>$data['channel_id'],'meta_title'=>$data['title'],'meta_description'=>$data['meta_description'],'meta_tag'=>$data['meta_tag'],'watermark_path'=>$data['watermark'],'video_path'=>$data['video'],'video_screenshot'=>$data['video_screenshot'],'duration_of_watermark'=>$DurationArray[$data['duration']],'isrc'=>$data['isrc'],'upc'=>$data['upc'],'label'=>$data['label'],'genre'=>$data['genre'],'release_date'=>$data['release_date'],'description'=>$data['description'],'type'=>0,'video_status'=>2,'created_at'=>date('Y-m-d h:i:s')]);
		return $id;
		}
		else{
			DB::table('videos')->insert(['user_id'=>$data['user_id'],'channel_id'=>$data['channel_id'],'meta_title'=>$data['title'],'meta_description'=>$data['meta_description'],'meta_tag'=>$data['meta_tag'],'watermark_path'=>$data['watermark'],'video_path'=>$data['video'],'video_screenshot'=>$data['video_screenshot'],'duration_of_watermark'=>$DurationArray[$data['duration']],'isrc'=>$data['isrc'],'upc'=>$data['upc'],'label'=>$data['label'],'genre'=>$data['genre'],'release_date'=>$data['release_date'],'description'=>$data['description'],'type'=>0,'video_status'=>$data['submitMode'],'created_at'=>date('Y-m-d h:i:s')]);
		}
	}
	
	public function getPackshotTemplate(){
		
		$data=DB::table('overlaytemplate')->select('overlaytemplate.*')->where('overlaytemplate.is_approve','=',1)->get();
		return $data;	
	}
	
	public function SaveVideoPackShot($data){
		if($data['submitMode']==1){
		$id=DB::table('videos')->insertGetId(['user_id'=>$data['user_id'],'channel_id'=>$data['channel_id'],'meta_title'=>$data['title'],'meta_description'=>$data['meta_description'],'meta_tag'=>$data['meta_tag'],'banner'=>$data['banner'],'video_path'=>$data['video'],'video_screenshot'=>$data['video_screenshot'],'featartist'=>$data['featartist'],'artist_name'=>$data['artist_name'],'title_track'=>$data['title_track'],'isrc'=>$data['isrc'],'upc'=>$data['upc'],'label'=>$data['label'],'genre'=>$data['genre'],'release_date'=>$data['release_date'],'description'=>$data['description'],'type'=>1,'video_status'=>2,'created_at'=>date('Y-m-d h:i:s')]);
		return $id;
		}
		else{
			DB::table('videos')->insert(['user_id'=>$data['user_id'],'channel_id'=>$data['channel_id'],'meta_title'=>$data['title'],'meta_description'=>$data['meta_description'],'meta_tag'=>$data['meta_tag'],'banner'=>$data['banner'],'video_path'=>$data['video'],'video_screenshot'=>$data['video_screenshot'],'featartist'=>$data['featartist'],'artist_name'=>$data['artist_name'],'title_track'=>$data['title_track'],'isrc'=>$data['isrc'],'upc'=>$data['upc'],'label'=>$data['label'],'genre'=>$data['genre'],'release_date'=>$data['release_date'],'description'=>$data['description'],'type'=>1,'video_status'=>$data['submitMode'],'created_at'=>date('Y-m-d h:i:s')]);	
		}
		
	}
	
	public function getActiveLogo($channel_id){
		
		$data=DB::table('channel_logos')->select('channel_logos.logo_path')->where('channel_logos.channel_id','=',$channel_id)->where('channel_logos.is_inactive','=',0)->first();
		return $data;
		
	}
	
	public function getVideoDetail($id){
		$data=DB::table('videos')->select('*')->where('id','=',$id)->first();
		return $data;
	}
	
}
