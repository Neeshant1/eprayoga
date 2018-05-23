<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateUserAccessRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'user_profile_id' => ['required', 
                    Rule::unique('bl_user_access_log')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'login_ip_address'      => 'required',
            'app_signon_type'         => 'required',          
        ];
    }
}

?>