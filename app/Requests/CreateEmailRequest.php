<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class CreateEmailRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'server_name' => ['required',
                    Rule::unique('bl_email_config')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'port' => 'required',
            'email' => ['required', 
                    Rule::unique('bl_email_config')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'password' => 'required',
            'status'  => 'required',
        ];
    }
}

?>