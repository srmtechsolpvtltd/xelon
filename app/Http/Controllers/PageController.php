<?php
/**
 * Short description for file
 *
 * @FileName		PageController.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		To show the frontend static pages
 */
namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use DB;
use Auth;
use Mail;
use App\Http\Requests\PageFormRequest;
use App\Models\Page;


class PageController extends Controller {	
    
	// Show a page by slug
    public function show($slug)
    {		
        $page = Page::where('slug', $slug)->get(); 		
		if($page =='[]'){			
		return view('errors.invalid_url');
		} else {
        return view('pages.index',compact('page'));
		}
		
    }
		
}
