<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateFaqRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [  
            'faq_category_id' => 'required',
            'is_published' => 'required',
             'is_public' => 'required',
             'answer'  => 'required',
             'keywords' => 'required',
             'notes'  => 'required',

             'question' => ['required', 
                    Rule::unique('bl_faq')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
             

        ];

    }
}

?>