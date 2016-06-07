<?php
/**
 * Short description for file
 *
 * @FileName		AddLogoRequest.php
 * @Created On		10 February 2014
 * @author			Rohit Yadav <rohit.yadav@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Channel Request in admin here
 */
namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class OverlayTemplateRequest extends Request
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
			'videoTemplate'=>'required|mimes:mp4',
			'is_inactive' => 'required'
			
        ];
    }
	
	public function messages()
{
    return [
		'videoTemplate.required'=>'Video Template is required',
		'videoTemplate.mimes'=>'Allowed file type [mp4].',
		'is_inactive.required'  => 'Status is required'
		
    ];
} 
}
