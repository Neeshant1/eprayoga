<?php
namespace App\Repositories;
use App\Models\QuestionType;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;

use Log;

class QuestionTypeRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $question_type = new  QuestionType;
            $data['question_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.question_type_code'));
            $data['created_by_user_id'] = $user_profile_id;
            $data['last_update_user_id'] = $user_profile_id;
            $question_type->fill($data);
            $question_type->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $question_type;
    }

    public function update(array $data){
        try{
        
            $question_type = QuestionType::where ("question_type_id",$data['question_type_id'])->first(); 

            if (is_null($question_type)){
                return "failed";
            }

            $question_type->fill($data);
            $question_type->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $question_type;
    }

    public function delete(array $data){
        try{
              $question_type = QuestionType::where ("question_type_id",$data['question_type_id'])->first(); 
            if (is_null($question_type)){
                return "failed";
            }
            $question_type->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question_type);

    }

     public function deleteAll($user_id){
         try{
              $msg = QuestionType::where([["created_by_user_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            //$question_type = QuestionType::all();

            $question_type = DB::table("bl_question_type_master as qs")->where('qs.is_deleted',0)->select('qs.*')->simplePaginate(self::$RECORDS_PER_PAGE);


            if (is_null($question_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question_type);

    }

    public function getById(array $data){
        try{
            $question_type = QuestionType::find($data['question_type_id']);
            if (is_null($question_type)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question_type);
    }

    public function activate(array $data){
       try{

           $question_type = QuestionType::where ("question_type_id",$data['question_type_id'])->first();
           $question_type->is_active = 1;
           $question_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($question_type);
   }

    public function deActivate(array $data){
      try{

           $question_type = QuestionType::where ("question_type_id",$data['question_type_id'])->first();
           $question_type->is_active = 0;
           $question_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($question_type);
   }

    public function deleteQuestionType(array $data){
      try{

           $question_type = QuestionType::where ("question_type_id",$data['question_type_id'])->first();
           $question_type->is_deleted = 1;
           $question_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($question_type);
   }
    public function search($data){
        try{


            $sql = "is_active = 1 and is_deleted = 0 and (question_type_name like '%".$data."%')";
           
            $question_type = QuestionType::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($question_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($question_type);

    }


    public function selectQuestionType(){
        try{
            //$question_type = QuestionType::all();

            $question_type = DB::table("bl_question_type_master as qs")->where([['qs.is_deleted',0],['qs.is_active',1]])->select('qs.*')->get();


            if (is_null($question_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($question_type);

    }

} 

?>

