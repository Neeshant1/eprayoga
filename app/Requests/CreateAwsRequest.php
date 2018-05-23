<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateAwsRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aws_s3_id' => ['required', 
                    Rule::unique('bl_aws_s3_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'aws_access_key_id' => ['required', 
                    Rule::unique('bl_aws_s3_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
            'aws_secret_access_key' => ['required', 
                    Rule::unique('bl_aws_s3_master')->where(function ($query) {
                        $query->where('is_deleted', 0);
                    })],
             's3_bucket_name' => 'required',
             's3_url'       => 'required',
             'used_for' => 'required',
             'is_active' => 'required'
        ];
    }
}

?>