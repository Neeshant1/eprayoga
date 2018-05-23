<?php
namespace App\Repositories;
use App\Models\SecurityQuestions;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class SecurityQuestionsRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $security_questions = new  SecurityQuestions;
            $data['created_by_user_id'] = $user_profile_id;
            $data['last_update_user_id'] = $user_profile_id;
            $data['user_id'] = $user_profile_id;
            $data['user_type'] = '1';
            $data['sec_quest_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.security_question_code'));
            $security_questions->fill($data);
            $security_questions->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $security_questions;
    }

    public function update(array $data,$user_profile_id){
        try{
         
            $security_questions = SecurityQuestions::where ("question_id",$data['question_id'])->first(); 
            $data['last_update_user_id'] = $user_profile_id;
            if (is_null($security_questions)){
                return "failed";
            }

            $security_questions->fill($data);
            $security_questions->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $security_questions;
    }

    public function delete(array $data){
        try{
              $security_questions = SecurityQuestions::where ("question_id",$data['question_id'])->first(); 
            if (is_null($security_questions)){
                return "failed";
            }
            $security_questions->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($security_questions);

    }

      public function deleteAll(){
        try{
              $msg = SecurityQuestions::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($msg);
    }


    public function getAll(){
        try{
            //$security_questions = SecurityQuestions::all();

            
               $security_questions = DB::table("bl_security_questions_master as sq")->where('sq.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($security_questions))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($security_questions);

    }

    public function getById(array $data){
        try{
            $security_questions = SecurityQuestions::find($data['question_id']);
            if (is_null($security_questions)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($security_questions);
    }

    public function activate(array $data){
       try{

           $security_questions = SecurityQuestions::where ("question_id",$data['question_id'])->first();
           $security_questions->is_active = 1;
           $security_questions->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($security_questions);
   }

    public function deActivate(array $data){
      try{

           $security_questions = SecurityQuestions::where ("question_id",$data['question_id'])->first();
           $security_questions->is_active = 0;
           $security_questions->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($security_questions);
   }

    public function deleteSecurityQuestion(array $data){
      try{

           $security_questions = SecurityQuestions::where ("question_id",$data['question_id'])->first();
           $security_questions->is_deleted = 1;
           $security_questions->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($security_questions);
   }

   public function search($data){
        try{
            

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "is_active = 1 and is_deleted = 0 and ( question_name like '%".$data."%' )";
            //}

           
            $security_questions = SecurityQuestions::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($security_questions))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

      return GlobalResponse::createResponse($security_questions);

    }

    public function selectSecQus(){
        try{
           $security_questions = DB::table('bl_security_questions_master as sqm')
           ->where([['sqm.is_active',1],['sqm.is_deleted',0],])
           ->select('sqm.*')
           ->get();

            if (is_null($security_questions))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($security_questions);

    }


} ?>

