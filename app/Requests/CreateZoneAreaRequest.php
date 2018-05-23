<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateZoneAreaRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [ 

        'zone_name' => ['required', 
                    Rule::unique('bl_zone_area_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })]           
        ];
    }
}

?>