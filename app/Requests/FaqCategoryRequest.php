<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class FaqCategoryRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
             'is_public' => 'required',
             'faq_category_name' => ['required', 
                    Rule::unique('bl_faq_category')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })] ,
             'faq_category_description' => 'required',
             'notes' => 'required',
        ];
    }
}

?>