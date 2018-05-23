<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class CreateQuestionComplexityRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [          
        'difficulty_level_name' => ['required', 
                    Rule::unique('bl_difficulty_level_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })]  
        ];
    }
}

?>