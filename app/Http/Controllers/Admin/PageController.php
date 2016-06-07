<?php
/**
 * Short description for file
 *
 * @FileName		PageController.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		create, update static pages in admin here
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use Input;
use Validator;
use Redirect;
use Request;
use DB;
use Auth;
use Mail;
use App\Http\Requests\PageFormRequest;
use App\Models\Page;


class PageController extends AdminController {	
 
     
    public function index()
    { 
		$query=Input::get('search'); 
		if(!empty($query)){	
			$pages = DB::table('pages')->where('title', 'LIKE', '%' . $query . '%')->paginate(10);
		} 
		else {
		   $pages = Page::orderBy('created_at','desc')
			->paginate(10);  
			$pages->setPath('index');
		}
		return view('admin.pages.pages', ['pages' => $pages, 'query'=>@$query]);    
    }
   
    
    
    public function edit( $id)
    {  
       $page=Page::find($id);
       return view('admin.pages.edit',compact('page'));
    }
    
    
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PageFormRequest $request)
	{
		
	   $page_data = Page::find($id);	   
	   $page_data->title=Input::get ('title');
	   $page_data->slug=str_slug(Input::get ('title'));
	   $page_data->page_content=Input::get('page_content');
	   $page_data->save();	   
	   return redirect('admin/pages/index')->with('alert-success', 'Page updated succesfully');
	}
		
	public function delete($id)
	{
	   Page::find($id)->delete();
	   return redirect('admin/pages/index')->with('alert-success', 'Page deleted succesfully');
	}
    
	
	// Show a page by slug
    public function show($slug)
    {		
        $page = Page::where('slug', $slug)->get(); 		
		if($page =='[]'){			
		return view('errors.invalid_url');
		} else {
        return view('admin.pages.index',compact('page'));
		}
		
    }
		
    
}
