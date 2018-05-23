<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StateRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'country_id' => 'required',
            'state_full_name' => ['required', 
                    Rule::unique('bl_state_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'code' => ['required', 
                    Rule::unique('bl_state_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
             'zone_id'   => 'required',
             'created_by_user_id' => 'required',
             'last_update_user_id' => 'required'
        ];
    }
}

?>