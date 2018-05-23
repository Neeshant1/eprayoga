<?php
namespace App\Repositories;
use App\Models\UserAccess;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;

use Log;

class UserAccessRepository
{
    public function save(array $data,$user_profile_id)
    {
         try {
            $data['last_update_user_id'] = $user_profile_id;
            $user_access = new  UserAccess;
            $user_access->fill($data);
            $user_access->save();
        } catch(Exception $e) {

             return GlobalResponse::clientErrorResponse("error");
        }
        return $user_access;
    }

    public function update(array $data){
        try{
          
            $user_access = UserAccess::where ("user_access_log_id",$data['user_access_log_id'])->first(); 

            if (is_null($user_access)){
                return "failed";
            }

            $user_access->fill($data);
            $user_access->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $user_access;
    }

    public function delete(array $data){
        try{
            $user_access = UserAccess::where ("user_access_log_id",$data['user_access_log_id'])->first(); 
            if (is_null($user_access)){
                return "failed";
            }
            $user_access->delete();
        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_access);
    }

    public function deleteAll(){
        try{
            $user_access = UserAccess::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_access);
    }

    public function getAll(){
        try{
            //$user_access = UserAccess::all();
            $user_access = DB::table("bl_user_access_log as ua")
                          ->where('ua.is_deleted',0)
                          ->get();
            if (is_null($user_access))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_access);

    }

    public function getById(array $data){
        try{
            $user_access = UserAccess::find($data['user_access_log_id']);
            if (is_null($user_access)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($user_access);
    }

    public function activate(array $data){
       try{

           $user_access = UserAccess::where ("user_access_log_id",$data['user_access_log_id'])->first();
           $user_access->is_active = 1;
           $user_access->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($user_access);
   }

    public function deActivate(array $data){
      try{

           $user_access = UserAccess::where ("user_access_log_id",$data['user_access_log_id'])->first();
           $user_access->is_active = 0;
           $user_access->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($user_access);
   }

} ?>

