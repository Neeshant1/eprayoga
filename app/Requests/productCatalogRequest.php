<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class productCatalogRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [           
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'subject_id' => 'required',
            'topic_id' => 'required',
        ];
    }
}

?>