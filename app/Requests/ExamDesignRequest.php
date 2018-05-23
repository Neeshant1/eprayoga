<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ExamDesignRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [           
            'product_catalog_id' => ['required', 
                    Rule::unique('bl_exam_design_rules')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })] ,
            'category_id' => 'required',
            'subject_id' => 'required',
            'topic_id' => 'required'
            

        ];
    }
}

?>