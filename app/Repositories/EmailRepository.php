<?php
namespace App\Repositories;
use App\Models\Email;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use Log;

class EmailRepository
{
      private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }
    public function save(array $data)
    {
         try {
            
            $data['app_email_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.email_code'));
            $email = new  Email;
            $email->fill($data);
            $email->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($email);
    }

    public function update(array $data){
        try{
        
            $email = Email::where ("email_config_id",$data['email_config_id'])->first(); 

            if (is_null($email)){
                return "failed";
            }

            $email->fill($data);
            $email->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($email);
    }

    public function delete(array $data){
        try{
              $email = Email::where ("email_config_id",$data['email_config_id'])->first(); 
            if (is_null($email)){
                return "failed";
            }
            $email->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($email);
    }

    public function deleteAll(){
        try{
            $msg = Email::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            $email = DB::table("bl_email_config as email")->where('email.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($email))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($email);

    }

    public function getById(array $data){
        try{
            $email = Email::find($data['email_config_id']);
            if (is_null($email)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($email);
    }

      public function activate(array $data){
       try{

           $email = Email::where ("email_config_id",$data['email_config_id'])->first();
           $email->is_active = 1;
           $email->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($email);
   }

    public function deActivate(array $data){
      try{

           $email = Email::where ("email_config_id",$data['email_config_id'])->first();
           $email->is_active = 0;
           $email->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($email);
   }

    public function deleteEmail(array $data){
      try{

           $email = Email::where ("email_config_id",$data['email_config_id'])->first();
           $email->is_deleted = 1;
           $email->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($email);
   }

   public function search($data){
        try{

                $sql = "is_active = 1 and is_deleted = 0 and ( app_email_code like '%".$data."%' or server_name like '%".$data."%' or port like '%".$data."%' or email like '%".$data."%' or password like '%".$data."%' )";
           
            $email = Email::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($email))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($email);

    }

} ?>

