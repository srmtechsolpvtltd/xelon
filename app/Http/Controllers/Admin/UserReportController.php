<?php 
/**
 * Short description for file
 *
 * @FileName		UserChannelController.php
 * @Created On		29 February 2014
 * @author			Rohit Yadav <rohit.yadav@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Add, update channel in admin here
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
class UserReportController extends AdminController {

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
	 * Show the reporting section to the user.
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
		
        $data =  UserReports::orderBy('created_at','desc')->whereBetween('created_at', array($fromDate, $toDate))->where('admin','=','0')->where('is_deleted','=','0')->paginate(10);
		
		
		} 
		else {
		  $data =  UserReports::orderBy('created_at','desc')->where('admin','=','0')->where('is_deleted','=','0')->paginate(10);  
		}
		
		
		
		
		return view('admin.userReports.index', ['users' => $data,'to'=>@$to,'from'=>@$from,'pageNo'=>@$pageNo]);    
    }
	//Create Excel
	public function ExcelReport($from,$to)
	{
		$fromArray=explode('-',$from);
		$toArray=explode('-',$to);
		$fromDate=$fromArray[2]."-".$fromArray[0]."-".$fromArray[1]." 00:00:00";
		$toDate=$toArray[2]."-".$toArray[0]."-".$toArray[1]." 23:59:59";
	$data =  DB::table('users')->orderBy('created_at','desc')->whereBetween('created_at', array($fromDate, $toDate))->where('admin','=','0')->where('is_deleted','=','0')->get();
	
	
	Excel::create('user_report', function($excel) use($data) {
                                                        
                        
                        $excel->sheet('User_Report', function($sheet) use($data) { 
                            $allArray = array();
                            $allArray[] = array('#','Name','Email','Created On');
							$i=1;
							foreach($data as $row):
							 $allArray[] = array($i++,$row->name,$row->email,date("m-d-Y", strtotime($row->created_at))); 
							endforeach;
                                                                             
                            $sheet->fromArray(
                            $allArray
                            , null, 'A1',  false, false);

                        });
                        
                                                         
                    })->export('xls');
	
	}
     
	public function ExcelReportNofiter()
	{
      $data = DB::table('users')->orderBy('created_at','desc')->where('admin','=','0')->where('is_deleted','=','0')->get();
	
	  Excel::create('user_report', function($excel) use($data) {
                                                        
                        
                        $excel->sheet('User_Report', function($sheet) use($data) { 
                            $allArray = array();
                            $allArray[] = array('#','Name','Email','Created On');
							  $i=1;
							foreach($data as $row):
							 $allArray[] = array($i++,$row->name,$row->email,date("m-d-Y", strtotime($row->created_at))); 
							endforeach;
                                                                             
                            $sheet->fromArray(
                            $allArray
                            , null, 'A1',  false, false);

                        });
                        
                                                         
                    })->export('xls');
	}
	
	 public function PdfNofiter()
   {
	     $data = DB::table('users')->orderBy('created_at','desc')->where('admin','=','0')->where('is_deleted','=','0')->get();
			
			$pdf = PDF::loadView('pdf.user', ["users"=>$data]);
            return $pdf->download('user.pdf');
	
   }
   //Create Pdf
   public function Pdf($from,$to)
	{
	$fromArray=explode('-',$from);
	$toArray=explode('-',$to);
	$fromDate=$fromArray[2]."-".$fromArray[0]."-".$fromArray[1]." 00:00:00";
	$toDate=$toArray[2]."-".$toArray[0]."-".$toArray[1]." 23:59:59";
	$data =  DB::table('users')->orderBy('created_at','desc')->whereBetween('created_at', array($fromDate, $toDate))->where('admin','=','0')->where('is_deleted','=','0')->get();
	     
			
			$pdf = PDF::loadView('pdf.user', ["users"=>$data]);
            return $pdf->download('user.pdf');
	
   }
	
	

}
