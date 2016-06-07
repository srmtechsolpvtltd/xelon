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

class ProfileRequest extends Request
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
            'name' => 'required',
            'photo'=>'mimes:jpeg,jpg,png,gif'
        ];
    }
}
