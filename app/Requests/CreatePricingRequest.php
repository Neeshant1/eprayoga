<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreatePricingRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [  
            'prc_type'       => 'required',
            //'prc_description'    => 'required',
            'prc_eff_from_date'        => 'required',
            'prc_eff_to_date'  => 'required',
            'prc_active'  => 'required',
            'prc_currency'       => 'required',
            'prc_price' => 'required',
            'prc_disc' => 'required',
            'prc_usance' => 'required',
            'created_by_user_id' => 'required',
            'last_update_user_id' => 'required',

             'prc_description' => ['required', 
                    Rule::unique('bl_pricing')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })] 
        ];
    }
}

?>