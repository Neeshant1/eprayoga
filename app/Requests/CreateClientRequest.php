<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class CreateClientRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [    
            'clnt_type_id'    => 'required',
           'clnt_name'       => 'required',
           'orig_type_id'    => 'required',
           'clnt_pan' => ['required',
                   Rule::unique('bl_client')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'clnt_logo_location'  => 'required',
          // 'clnt_logo_file_name'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'clnt_logo_file_name' => 'required',
           'website_url'       => 'required',
           'clnt_off_email_id' => 'required',
           'clnt_facbook_id'   => 'required',
           'clnt_twitter_id'   => 'required',
           'gst'            => 'required',
           'tax_id'            => ['required',
           Rule::unique('bl_client')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'clnt_contact_person_mobile' => ['required',

           Rule::unique('bl_client')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })]
        ];
    }
}

?>

