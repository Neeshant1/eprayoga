<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class GenpRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'genp_type' => 'required',
            'genp_desc' => ['required', 
                    Rule::unique('bl_generic_param_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],  
            'genp_app_timezone' => 'required',
            'genp_app_date_format' => 'required',
            'genp_app_currency' => 'required',
            'genp_app_currency_symbol' => 'required',
            'genp_app_default_language' => 'required',
            'genp_app_out_going_email_add' => ['required', 
                    Rule::unique('bl_generic_param_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],  
            'genp_active' => 'required',
           
        ];
    }
}

?>