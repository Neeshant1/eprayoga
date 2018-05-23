<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateCurrencyRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'currency_name' => ['required', 
                    Rule::unique('bl_currency_code_master')->where(function ($query) {
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['is_deleted', 0]]);
                    })],
            'code' => ['required', 
                    Rule::unique('bl_currency_code_master')->where(function ($query) {
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['is_deleted', 0]]);
                    })],
            'conv_rate' => 'required',
            'type' => 'required',
            'created_by_user_id' => 'required',
            'last_update_user_id' => 'required'
        ];
    }
}

?>