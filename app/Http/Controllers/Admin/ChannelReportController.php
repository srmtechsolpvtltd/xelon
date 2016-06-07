<?php 
/**
 * Short description for file
 *
 * @FileName		UserChannelController.php
 * @Created On		29 February 2014
 * @author			Rohit Yadav <rohit.yadav@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Channel report
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Models\UserReports;
use Illuminate\Support\Facades\Session;
use Input;
use DB;
use Auth;
use Redirect;
use Image;
use Excel;
use PDF;
class ChannelReportController extends AdminController {

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
		$from=trim(Input::get('From')); 
		$to=trim(Input::get('To'));
		$pageNo=trim(Input::get('page',1));
		
		if(!empty($from) && !empty($to)){
			
		$fromArray=explode('-',$from);
		$toArray=explode('-',$to);
		$fromDate=$fromArray[2]."-".$fromArray[0]."-".$fromArray[1]." 00:00:00";
		$toDate=$toArray[2]."-".$toArray[0]."-".$toArray[1]." 23:59:59";
		
          $data=DB::table('channels')
            ->join('user_channels', function ($join){
				$join->on('channels.id', '=', 'user_channels.channel_id');
			})
			->join('users',function($join){
				$join->on('user_channels.user_id','=','users.id');
			})
			->whereBetween('channels.created_at', array($fromDate, $toDate))->where('channels.is_deleted','=','0')
            ->select('channels.*','users.name')->orderBy('channels.created_at','desc')
            ->paginate(10);
		
		} 
		else {
		    
			 $data=DB::table('channels')
            ->join('user_channels', function ($join){
				$join->on('channels.id', '=', 'user_channels.channel_id');
			})
			->join('users',function($join){
				$join->on('user_channels.user_id','=','users.id');
			})->where('channels.is_deleted','=','0')
            ->select('channels.*','users.name')->orderBy('channels.created_at','desc')
            ->paginate(10);
			 
		}
		
		
		
		
		return view('admin.channelReports.index', ['channels' => $data,'to'=>@$to,'from'=>@$from,'pageNo'=>@$pageNo]);    
    }
	
	//Excel Report
	public function ExcelReport($from,$to)
	{
		$fromArray=explode('-',$from);
		$toArray=explode('-',$to);
		$fromDate=$fromArray[2]."-".$fromArray[0]."-".$fromArray[1]." 00:00:00";
		$toDate=$toArray[2]."-".$toArray[0]."-".$toArray[1]." 23:59:59";
	    $data=DB::table('channels')
            ->join('user_channels', function ($join){
				$join->on('channels.id', '=', 'user_channels.channel_id');
			})
			->join('users',function($join){
				$join->on('user_channels.user_id','=','users.id');
			})
			->whereBetween('channels.created_at', array($fromDate, $toDate))->where('channels.is_deleted','=','0')
            ->select('channels.*','users.name')->orderBy('channels.created_at','desc')
            ->get();	
	
	
	Excel::create('channel_report', function($excel) use($data) {
                                                        
                        
                        $excel->sheet('Channel_Report', function($sheet) use($data) { 
                            $allArray = array();
                            $allArray[] = array('#','Channel Name','Channel Url','Username','Password','Associated User','Created By','Created On');
							$i=1;
							foreach($data as $row):
							if($row->user_id==''){$created_by="Admin"; }else { $created_by=$row->name; }
							
							 $allArray[] = array($i++,$row->channel_name,$row->channel_url,$row->username,$row->password,$row->name,$created_by,date("m-d-Y", strtotime($row->created_at))); 
						
							endforeach;
                                                                             
                            $sheet->fromArray(
                            $allArray
                            , null, 'A1',  false, false);

                        });
                        
                                                         
                    })->export('xls');
	
	}
     
	public function ExcelReportNofiter()
	{
       $data=DB::table('channels')
            ->join('user_channels', function ($join){
				$join->on('channels.id', '=', 'user_channels.channel_id');
			})
			->join('users',function($join){
				$join->on('user_channels.user_id','=','users.id');
			})->where('channels.is_deleted','=','0')
            ->select('channels.*','users.name')->orderBy('channels.created_at','desc')
            ->get();
	
	Excel::create('channel_report', function($excel) use($data) {
                                                        
                        
                        $excel->sheet('Channel_Report', function($sheet) use($data) { 
                            $allArray = array();
                            $allArray[] = array('#','Channel Name','Channel Url','Username','Password','Associated User','Created By','Created On');
							$i=1;
							foreach($data as $row):
							if($row->user_id==''){$created_by="Admin"; }else { $created_by=$row->name; }
							
							 $allArray[] = array($i++,$row->channel_name,$row->channel_url,$row->username,$row->password,$row->name,$created_by,date("m-d-Y", strtotime($row->created_at))); 
						
							endforeach;
                                                                             
                            $sheet->fromArray(
                            $allArray
                            , null, 'A1',  false, false);

                        });
                        
                                                         
                    })->export('xls');
	}
	
	
   public function PdfNofiter()
   {
	     $data=DB::table('channels')
            ->join('user_channels', function ($join){
				$join->on('channels.id', '=', 'user_channels.channel_id');
			})
			->join('users',function($join){
				$join->on('user_channels.user_id','=','users.id');
			})->where('channels.is_deleted','=','0')
            ->select('channels.*','users.name')->orderBy('channels.created_at','desc')->get();
			
			$pdf = PDF::loadView('pdf.channel', ["data"=>$data]);
            return $pdf->download('channel.pdf');
	
   }
   //Pdf Report
   public function Pdf($from,$to)
   {
	    $fromArray=explode('-',$from);
		$toArray=explode('-',$to);
		$fromDate=$fromArray[2]."-".$fromArray[0]."-".$fromArray[1]." 00:00:00";
		$toDate=$toArray[2]."-".$toArray[0]."-".$toArray[1]." 23:59:59";
		
	    $data=DB::table('channels')
            ->join('user_channels', function ($join){
				$join->on('channels.id', '=', 'user_channels.channel_id');
			})
			->join('users',function($join){
				$join->on('user_channels.user_id','=','users.id');
			})
			->whereBetween('channels.created_at', array($fromDate, $toDate))->where('channels.is_deleted','=','0')
            ->select('channels.*','users.name')->orderBy('channels.created_at','desc')
            ->get();	
	     
			
			$pdf = PDF::loadView('pdf.channel', ["data"=>$data]);
            return $pdf->download('channel.pdf');
	
   }
}
