<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateFileTypeRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [           
            'file_type_description' => 'required',
            'file_type_extension' => ['required', 
                    Rule::unique('bl_file_type_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })] 
        ];
    }
}

?>