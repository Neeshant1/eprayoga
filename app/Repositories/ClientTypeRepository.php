<?php
namespace App\Repositories;
use App\Models\ClientType;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class ClientTypeRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $client_type = new  ClientType;
            $data['last_update_user_id'] = $user_profile_id;
            $data['clnt_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.client_type_code'));
            $data['created_by_user_id'] = $user_profile_id;
            $client_type->fill($data);
            $client_type->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($client_type);
    }

    public function update(array $data,$user_profile_id){
        try{
          
            $client_type = ClientType::where ("clnt_type_id",$data['clnt_type_id'])->first();
            $data['last_update_user_id'] = $user_profile_id;
            if (is_null($client_type)){
                return "failed";
            }

            $client_type->fill($data);
            $client_type->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_type);
    }

    public function delete(array $data){
        try{
              $client_type = ClientType::where ("clnt_type_id",$data['clnt_type_id'])->first(); 
            if (is_null($client_type)){
                return "failed";
            }
            $client_type->delete();
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_type);
    }

      public function deleteAll(){
         try{
              $msg = ClientType::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
           // $client_type = ClientType::all();
             $client_type = DB::table("bl_client_type_master as clnt")->where('clnt.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($client_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($client_type);

    }

    public function getById(array $data){
        try{
            $client_type = ClientType::find($data['clnt_type_id']);
            if (is_null($client_type)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_type);
    }

    public function activate(array $data){
       try{

           $client_type = ClientType::where ("clnt_type_id",$data['clnt_type_id'])->first();
           $client_type->is_active = 1;
           $client_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($client_type);
   }

    public function deActivate(array $data){
      try{

           $client_type = ClientType::where ("clnt_type_id",$data['clnt_type_id'])->first();
           $client_type->is_active = 0;
           $client_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($client_type);
   }

    public function deleteClientType(array $data){
      try{

           $client_type = ClientType::where ("clnt_type_id",$data['clnt_type_id'])->first();
           $client_type->is_deleted = 1;
           $client_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($client_type);
   }

   public function search($data){
        try{
            
            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "is_active = 1 and is_deleted = 0 and ( clnt_type_name like '%".$data."%')";
            //}

           
            $client_type = ClientType::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($client_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_type);

    }

    public function selectClientType(){
        try{
           // $client_type = ClientType::all();
             $client_type = DB::table("bl_client_type_master as clnt")->where([['clnt.is_deleted',0],['clnt.is_active',1]])->get();

            if (is_null($client_type))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_type);

    }

} ?>

