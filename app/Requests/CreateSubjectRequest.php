<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

use Log;


class CreateSubjectRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {    
         $category_id = $request->category_id;
         Log::info('category_id'.$category_id);
      
        return [    
           // 'clnt_id' => 'required ',        
            'category_id' => 'required',
            //'subject_code' => 'required',
            //'subject_name' => 'required'
            'subject_name' => ['required', 
                    Rule::unique('bl_subject')->where(function ($query) use ($category_id) {
                        
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['category_id','=',$category_id],['is_deleted', 0]]);
                    })],
            'sub_description' => 'required'
        ];
    }
}

?>