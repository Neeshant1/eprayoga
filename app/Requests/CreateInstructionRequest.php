<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateInstructionRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [   
        'inst_type' => 'required',         
            'inst_description' => 'required',
             'inst_eff_date_from' => 'required',
             'inst_eff_date_to' => 'required',
            //'inst_type' => 'required| min:300',
             'created_by_user_id' => 'required',
              'last_update_user_id' => 'required',


        ];
    }
}

?>