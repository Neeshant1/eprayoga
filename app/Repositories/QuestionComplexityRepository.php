<?php
namespace App\Repositories;
use App\Models\QuestionComplexity;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;

use Log;

class QuestionComplexityRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id) 
    {
         try {
  
            $question_complexity = new  QuestionComplexity;
            $data['difficulty_level_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.difficult_level_code'));
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $question_complexity->fill($data);
            $question_complexity->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $question_complexity;
    }

    public function update(array $data){
        try{
   
            $question_complexity = QuestionComplexity::where ("difficulty_level_id",$data['difficulty_level_id'])->first(); 

            if (is_null($question_complexity)){
                return "failed";
            }

            $question_complexity->fill($data);
            $question_complexity->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $question_complexity;
    }

    public function delete(array $data){
        try{
              $question_complexity = QuestionComplexity::where ("difficulty_level_id",$data['difficulty_level_id'])->first(); 
            if (is_null($question_complexity)){
                return "failed";
            }
            $question_complexity->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($question_complexity);

    }


      public function deleteAll($user_id){
         try{
              $msg = QuestionComplexity::where([["created_by_user_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
          //  $question_complexity = QuestionComplexity::all();
            
              $question_complexity = DB::table("bl_difficulty_level_master as dm")->where('dm.is_deleted',0)->select('dm.*')->simplePaginate(self::$RECORDS_PER_PAGE);


            if (is_null($question_complexity))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($question_complexity);

    }

    public function getById(array $data){
        try{
            $question_complexity = QuestionComplexity::find($data['difficulty_level_id']);
            if (is_null($question_complexity)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($question_complexity);
    }

     public function activate(array $data){
       try{

           $question_complexity = QuestionComplexity::where ("difficulty_level_id",$data['difficulty_level_id'])->first();
           $question_complexity->is_active = 1;
           $question_complexity->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($question_complexity);
   }

    public function deActivate(array $data){
      try{

           $question_complexity = QuestionComplexity::where ("difficulty_level_id",$data['difficulty_level_id'])->first();
           $question_complexity->is_active = 0;
           $question_complexity->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($question_complexity);
   }

    public function deleteQuestionComplexity(array $data){
      try{

           $question_complexity = QuestionComplexity::where ("difficulty_level_id",$data['difficulty_level_id'])->first();
           $question_complexity->is_deleted = 1;
           $question_complexity->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return $question_complexity;
   }
   public function search($data){
        try{
             
            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "is_active = 1 and is_deleted = 0 and ( difficulty_level_name like '%".$data."%' or difficulty_level_code like '%".$data."%' )";
            //}

           
            $question_complexity = QuestionComplexity::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($question_complexity))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($question_complexity);

    }

    public function selectQuestionComplexity(){
        try{
          //  $question_complexity = QuestionComplexity::all();
            
              $question_complexity = DB::table("bl_difficulty_level_master as dm")
              ->where([['dm.is_deleted',0],['is_active',1]])
              ->select('dm.*')->get();


            if (is_null($question_complexity))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($question_complexity);

    }


} ?>

