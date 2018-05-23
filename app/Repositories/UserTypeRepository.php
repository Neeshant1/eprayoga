<?php
namespace App\Repositories;
use App\Models\UserType;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;

use Log;

class UserTypeRepository
{
    private static  $RECORDS_PER_PAGE =2;
    public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {  
            $user_type = new  UserType;            
            $data['last_update_user_id'] = $user_profile_id;
            $data['user_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.user_type_code'));
            $data['created_by_user_id'] = $user_profile_id;
            $user_type->fill($data);
            $user_type->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $user_type;
    }

    public function update(array $data){
        try{
        
            $user_type = UserType::where ("user_type_id", $data['user_type_id'])->first(); 

            if (is_null($user_type)){
                return "failed";
            }

            $user_type->fill($data);
            $user_type->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return $user_type;
    }

    public function delete(array $data){
        try{
              $user_type = UserType::where ("user_type_id",$data['user_type_id'])->first(); 
            if (is_null($user_type)){
                return "failed";
            }
            $user_type->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_type);
    }

    public function deleteAll(){
        try{
            $msg = UserType::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            //$user_type = UserType::all();
            $user_type = UserType::where('is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($user_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_type);

    }

    public function getById(array $data){
        try{
            $user_type = UserType::find($data['user_type_id']);
            if (is_null($user_type)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_type);
    }
     public function activate(array $data){
       try{

           $user_type = UserType::where ("user_type_id",$data['user_type_id'])->first();
           $user_type->is_active = 1;
           $user_type->save();
       }catch(Exception $e){
        return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($user_type);
   }

    public function deActivate(array $data){
      try{

           $user_type = UserType::where ("user_type_id",$data['user_type_id'])->first();
           $user_type->is_active = 0;
           $user_type->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($user_type);
   }
    public function deleteUsertype(array $data){
      try{

           $user_type = UserType::where ("user_type_id",$data['user_type_id'])->first();
           $user_type->is_deleted = 1;
           $user_type->save();
       }catch(Exception $e){
         return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($user_type);
   }
   public function search($data){
        try{

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "is_active = 1 and is_deleted = 0 and ( user_type_name like '%".$data."%')";
            //}

           
            $user_type = UserType::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($user_type))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_type);

    }

} ?>

