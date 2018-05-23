<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateEmployeeRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [         
           'emp_first_name'    => 'required',
           'emp_last_name'         => 'required',
           'emp_pan' => ['required',
                   Rule::unique('bl_employee')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'emp_off_email_id' =>'required',
            'employee_no' => ['required',
                   Rule::unique('bl_employee')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
            'emp_mobile'     => ['required',
                   Rule::unique('bl_employee')->where(function ($query) {
                       $query->where('is_deleted', 0);
                   })],
           'emp_twitter_id'        => 'required',
           'emp_facbook_id'  => 'required',
           'emp_photo_file_name'  => 'required',
           'emp_photo_location'       => 'required',
           'emp_reporting_manager' => 'required',
           'emp_department'   => 'required'
        ];
    }
}

?>
