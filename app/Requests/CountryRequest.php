<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CountryRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [  
            'country_short_name' => ['required', 
                Rule::unique('bl_country_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'country_full_name' => ['required', 
                Rule::unique('bl_country_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'country_phonecode' => ['required', 
                Rule::unique('bl_country_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],          
             'zone_id' => 'required',
             'last_update_user_id' => 'required'
        ];
    }
}

?>