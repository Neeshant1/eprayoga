<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class CreateCustomersRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [    
           'user_type_id'      => 'required',        
           'cust_first_name'   => 'required',
           'cust_last_name'    => 'required',
           'cust_dob'          => 'required',
           'cust_aadhar_number' => ['required',
                   Rule::unique('bl_customer')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'cust_pan' => ['required',
                   Rule::unique('bl_customer')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'cust_passport' => ['required',
                   Rule::unique('bl_customer')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'cust_sex'          => 'required',
           'cust_res_phone_number' => 'required',
           'cust_mobile_phone_number' => ['required',
                   Rule::unique('bl_customer')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           
           'cust_per_emai_id' => 'required',
           'cust_off_email_id' => ['required',
                   Rule::unique('bl_customer')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'cust_facebook_id'   => 'required',
           'cust_twitter_id'    => 'required',
           'cust_photo_file_name' => 'required',
           'cust_photo_location'  => 'required',
           'cust_father_name'    => 'required',
           'cust_mother_name'    => 'required',
           'orig_type_id'    => 'required',
           'created_by_user_id'  => 'required',
           'last_update_user_id' => 'required',
        ];
    }
}

?>
