<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateClientGroupsRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [    
            'user_type_id'    => 'required ',        
           'clnt_group_name'         => 'required',
           'clnt_group_pan' => ['required',
                   Rule::unique('bl_client_group')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'clnt_group_off_email_id' => ['required',
                   Rule::unique('bl_client_group')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
            'tax_id'       => ['required',
                   Rule::unique('bl_client_group')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
            'clnt_group_contact_person_mobile'       => ['required',
                   Rule::unique('bl_client_group')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
            'clnt_group_twitter_id'        => 'required',
           'clnt_group_facbook_id'  => 'required',
           'clnt_group_logo_file_name'  => 'required',
           'clnt_group_logo_location'       => 'required',
           'orig_type_id' => 'required'
          // 'clnt_group_location'   => 'required'
          // 'clnt_group_city'   => 'required'
        ];
    }
}

?>

