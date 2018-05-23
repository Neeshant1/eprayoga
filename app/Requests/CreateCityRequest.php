<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateCityRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'city_full_name' => ['required', 
                    Rule::unique('bl_city_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
           'code' => ['required', 
                    Rule::unique('bl_city_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'state_id'       => 'required',
            'country_id'  => 'required',
            'created_by_user_id' => 'required',
            'last_update_user_id' => 'required'
        ];
    }
}

?>