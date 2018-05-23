<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateSecurityQuestionsRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [   
        'question_name' => ['required', 
                    Rule::unique('bl_security_questions_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })]
                             
        ];
    }
}

?>