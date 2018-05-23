<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [    
            'exam_date' => 'required ',        
            'category_id' => 'required',
            'subject_id' => 'required',
            'topic_id' => 'required',
            'is_active' => 'required',
            'is_deleted' => 'required',
            'created_by_user_id' => 'required',
            'last_update_user_id' => 'required'
        ];
    }
}

?>