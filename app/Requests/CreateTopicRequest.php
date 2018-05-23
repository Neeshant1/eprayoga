<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Log;

class CreateTopicRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
             
        return true;
    }

    public function rules(Request $request)
    {
        $category_id = $request->category_id;
             Log::info($category_id);
              $subject_id = $request->subject_id;
        return [     
            'category_id' => 'required',
            'subject_id' => 'required',
            'topic_name' => ['required', 
                    Rule::unique('bl_topic')->where(function ($query) use ($category_id,$subject_id) {
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['category_id','=',$category_id],['subject_id','=',$subject_id],['is_deleted', 0]]);
                    })],
            'topic_description' => 'required'  
        ];
    }
}

?>