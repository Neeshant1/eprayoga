<?php
namespace App\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Session;

class CreateCategoryRequest extends FormRequest
{
   protected $redirect = '/eprayoga/validation-fail';    public function authorize()
   {

       return true;
   }    public function rules()
   {      

        
       return [    
         //'clnt_id' => 'required ',
      
        
           'category_name' => ['required', 
                    Rule::unique('bl_category')->where(function ($query) {     
                        $query->where([['clnt_id','=',$this->session()->get('user')->user_id],['is_deleted', 0]]);
                    })],


            'category_description' => 'required'

       ];
   }
}?>