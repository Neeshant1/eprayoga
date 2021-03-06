<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class OriginTypeRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [  
        'orig_type_name' => ['required', 
                    Rule::unique('bl_origin_type_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })]
           ];
    }
}

?>