<?php
namespace App\Repositories;
use App\Models\Sms;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;

use Log;

class SmsRepository
{
     private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }
    public function save(array $data,$user_profile_id)
    {
         try {
            
            $data['app_sms_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.sms_code'));
            $sms = new  Sms;
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $sms->fill($data);
            $sms->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $sms;
    }

    public function update(array $data){
        try{
       
            $sms = Sms::where ("sms_config_id",$data['sms_config_id'])->first(); 

            if (is_null($sms)){
                return "failed";
            }

            $sms->fill($data);
            $sms->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $sms;
    }

    public function delete(array $data){
        try{
              $sms = Sms::where ("sms_config_id",$data['sms_config_id'])->first(); 
            if (is_null($sms)){
                return "failed";
            }
            $sms->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($sms);
    }

    public function deleteAll(){
        try{
            $msg = Sms::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            $sms = DB::table("bl_sms_config as sms")->where('sms.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($sms))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($sms);

    }

    public function getById(array $data){
        try{
            $sms = Sms::find($data['sms_config_id']);
            if (is_null($sms)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($sms);
    }

     public function activate(array $data){
       try{

           $sms = Sms::where ("sms_config_id",$data['sms_config_id'])->first();
           $sms->is_active = 1;
           $sms->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($sms);
   }

    public function deActivate(array $data){
      try{

           $sms = Sms::where ("sms_config_id",$data['sms_config_id'])->first();
           $sms->is_active = 0;
           $sms->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($sms);
   }

    public function deleteSms(array $data){
      try{

           $sms = Sms::where ("sms_config_id",$data['sms_config_id'])->first();
           $sms->is_deleted = 1;
           $sms->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($sms);
   }

    public function search($data){
        try{
             
                $sql = "is_active = 1 and is_deleted = 0 and ( app_sms_code like '%".$data."%' or app_sms_gateway_name like '%".$data."%' or app_sms_user_id like '%".$data."%' or app_sms_gateway_url like '%".$data."%' or app_sms_registered_phone_number like '%".$data."%' or app_sms_gateway_api_id like '%".$data."%' )";
           
            $sms = Sms::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($sms))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($sms);

    }

} ?>

