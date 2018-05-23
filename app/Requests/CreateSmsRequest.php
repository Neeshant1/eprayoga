<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateSmsRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'app_sms_gateway_name' => ['required', 
                    Rule::unique('bl_sms_config')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })], 
            'app_sms_user_id' => ['required', 
                    Rule::unique('bl_sms_config')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'app_sms_user_password'    => 'required',
            'app_sms_gateway_url'      => 'required',
            'app_sms_gateway_status'      => 'required',
            'app_sms_registered_phone_number'     => 'required',
            'app_sms_gateway_authentication_tocken'   => 'required',
            'app_sms_gateway_api_id'  => 'required',
            'genp_active'           => 'required'
        ];
    }
}

?>