<?php
namespace App\Repositories;
use App\Models\FileType;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class FileTypeRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $file_type = new  FileType;
            $data['last_update_user_id'] = $user_profile_id;
           // $data['file_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.file_type_code'));
            $data['created_by_user_id'] = $user_profile_id;
            $file_type->fill($data);
            $file_type->save();
        } catch(Exception $e) {

           return GlobalResponse::clientErrorResponse("error");

        }
        return GlobalResponse::createResponse($file_type);
    }

    public function update(array $data){
        try{
        
            $file_type = FileType::where ("file_type_id",$data['file_type_id'])->first(); 

            if (is_null($file_type)){
                return "failed";
            }

            $file_type->fill($data);
            $file_type->save();

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($file_type);
    }

    public function delete(array $data){
        try{
              $file_type = FileType::where ("file_type_id",$data['file_type_id'])->first(); 
            if (is_null($file_type)){
                return "failed";
            }
            $file_type->delete();
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($file_type);
    }

      public function deleteAll(){
         try{
              $msg = FileType::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse( $msg);
    }

    public function getAll(){
        try{
           // $file_type = FileType::all();
             $file_type = DB::table("bl_file_type_master as ft")->where('ft.is_deleted',0)
             ->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($file_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($file_type);

    }

    public function getById(array $data){
        try{
            $file_type = FileType::find($data['file_type_id']);
            if (is_null($file_type)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($file_type);
    }

    public function activate(array $data){
       try{

           $file_type = FileType::where ("file_type_id",$data['file_type_id'])->first();
           $file_type->is_active = 1;
           $file_type->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");

       }
        return GlobalResponse::createResponse($file_type);
   }

    public function deActivate(array $data){
      try{

           $file_type = FileType::where ("file_type_id",$data['file_type_id'])->first();
           $file_type->is_active = 0;
           $file_type->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");

       }
        return GlobalResponse::createResponse($file_type);
   }

    public function deleteFileType(array $data){
      try{
           $file_type = FileType::where ("file_type_id",$data['file_type_id'])->first();
           $file_type->is_deleted = 1;
           $file_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($file_type);
   }

   public function search($data){
        try{

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "is_active = 1 and is_deleted = 0 and ( file_type_description like '%".$data."%' or file_type_extension like '%".$data."%' )";
            //}

           
            $file_type = FileType::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($file_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($file_type);

    }

} ?>

