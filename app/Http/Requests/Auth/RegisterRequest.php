<?php
/**
 * Short description for file
 *
 * @FileName		RegisterRequest.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Register Request in  here
 */
namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
         'name' => 'required|alpha_num|min:3|max:32',
        'email' => 'required|email|unique:users',
        'password' => 'required|alphaNum|min:3|confirmed',
        'password_confirmation' => 'required|same:password'
        ];
    }
	
	public function messages()
{
    return [
        'name.required' => 'Name is required',
        'email.required'  => 'Email address is required',
		'password.required'  => 'Password is required',
		'password_confirmation.required'  => 'Confirm password is required',
    ];
}
	
}
