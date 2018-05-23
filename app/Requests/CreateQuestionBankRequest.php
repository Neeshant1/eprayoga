<?php
namespace App\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateQuestionBankRequest extends FormRequest
{
    protected $redirect = '/eprayoga/validation-fail';

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
           
            $clnt_id = $request->clnt_id;
            $category_id = $request->category_id;
            $subject_id = $request->subject_id;
            $topic_id = $request->topic_id;
            $question_type_id = $request->question_type_id;
    if(($question_type_id == 7) || ($question_type_id == 9) || ($question_type_id == 10)){
        return [            
             'clnt_id' => 'required',
             'category_id' => 'required',
             'subject_id' => 'required',
             //'topic_id' => 'required',
             'difficulty_level_id'=> 'required' , 
             'contributed_by' => 'required',
             'question_type_id' => 'required',
             'descriptive' => 'required',
             'question_txt_format' => 'required',
            //'question_img_format' => 'required',
             'pos_marks' => 'required', 
             'weightage' => 'required',
             //'answer_options' => 'required|array|min:1',
            // 'answer_options.*.question_option_txt' => 'required|string|distinct|min:1',
            // 'answer_options.*.description' => 'required|string|min:1',
             'key_answers' => 'required|min:1'
        ];
    }else{
        return [            
             'clnt_id' => 'required',
             'category_id' => 'required',
             'subject_id' => 'required',
             //'topic_id' => 'required',
             'difficulty_level_id'=> 'required' , 
             'contributed_by' => 'required',
             'question_type_id' => 'required',
             'descriptive' => 'required',
             'question_txt_format' => ['required', 
                       Rule::unique('bl_question_master')->where(function ($query) use ($clnt_id,$category_id,$subject_id,$topic_id) {
                       $query->where([['clnt_id','=',$clnt_id],['category_id','=',$category_id],['subject_id','=',$subject_id],['topic_id','=',$topic_id],['is_deleted', 0]]);
                   })],
            //'question_img_format' => 'required',
             'pos_marks' => 'required', 
             'weightage' => 'required',
             //'answer_options' => 'required|array|min:1',
            // 'answer_options.*.question_option_txt' => 'required|string|distinct|min:1',
            // 'answer_options.*.description' => 'required|string|min:1',
             'key_answers' => 'required|min:1'
        ];
    }
    }
}

?>