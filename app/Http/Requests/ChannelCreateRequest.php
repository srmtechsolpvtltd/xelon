<?php
/**
 * Short description for file
 *
 * @FileName		ChannelCreateRequest.php
 * @Created On		10 February 2014
 * @author			Rohit Yadav <rohit.yadav@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Channel Request in admin here
 */
namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChannelCreateRequest extends Request
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
         'channel_name' => 'required',
			'channel_url' => 'required',
			'is_inactive' => 'required',
			'username'=>'required',
			'password'=>'required'
        ];
    }
	
	public function messages()
{
    return [
        'channel_name.required' => 'Channel name is required',
		'channel_url.required'  => 'Channel url is required',
		'is_inactive.required'  => 'Status is required',
		'username.required'  => 'User Name is required',
		'password.required'  => 'Password is required'
    ];
} 
}
