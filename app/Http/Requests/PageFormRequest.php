<?php
/**
 * Short description for file
 *
 * @FileName		PageFormRequest.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Page Form Request in admin here
 */
namespace App\Http\Requests;

use App\Http\Requests\Request;

class PageFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
			//'slug'     => 'required|regex:/^[a-zA-Z0-9_\- ]+$/',
			'page_content' => 'required'
        ];
    }
	
	public function messages()
{
    return [
        'title.required' => 'Title is required',
		'slug.required'  => 'Slug is required',
        'slug.regex'  => 'Slug are not allowed to enter any spaces or special character (e.g Example or example)',
		'page_content.required'  => 'Page Content is required',
    ];
} 
}
