<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class CreateLanguageRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [  
          'language' => ['required', 
                    Rule::unique('bl_language_master')->where(function ($query) {
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['is_deleted', 0]]);
                    })],
          'language_short_name' => ['required', 
                    Rule::unique('bl_language_master')->where(function ($query) {
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['is_deleted', 0]]);
                    })]
          ];
    }
}

?>