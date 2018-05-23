<?php
namespace App\Repositories;
use App\Models\Language;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;

use Log;

class LanguageRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_id,$user_profile_id)
    {
         try {
  
            $language = new  Language;
            $data['language_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.language_code'));
            $data['clnt_id'] = $user_id;
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $language->fill($data);
            $language->save();
        } catch(Exception $e) {

           return GlobalResponse::clientErrorResponse("error");

        }
        return GlobalResponse::createResponse($language);
    }

    public function update(array $data,$user_id,$user_profile_id){
        try{
            $data['last_update_user_id'] = $user_profile_id;
            $data['clnt_id'] = $user_id;
            $language = Language::where ("language_id",$data['language_id'])->first(); 

            if (is_null($language)){
                return "failed";
            }

            $language->fill($data);
            $language->save();

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($language);
    }

    public function delete(array $data){
        try{
              $language = Language::where ("language_id",$data['language_id'])->first(); 
            if (is_null($language)){
                return "failed";
            }
            $language->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($language);
    }

      public function deleteAll($user_id,$user_type){
         try{

           if($user_type == 'S'){
                $msg = Language::where('is_deleted', '=', 0)
                                ->update(['is_deleted' => 1]);
          }else{
                $msg = Language::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])
                              ->update(['is_deleted' => 1]);
          }
            
        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }


    public function getAll($user_id,$user_type){
        try{
          //  $origin = OriginType::all();

        if($user_type == 'S'){

             $language = DB::table("bl_language_master as lang")
                         ->where('is_deleted',0)
                         ->select('lang.*')
                         ->simplePaginate(self::$RECORDS_PER_PAGE);

         }else{
           

             $language = DB::table("bl_language_master as lang")
                         ->where([['is_deleted',0],["lang.clnt_id","=",$user_id]])
                         ->select('lang.*')
                         ->simplePaginate(self::$RECORDS_PER_PAGE);
           }

           if (is_null($language))
           {
               return "failed";
           }       

         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($language);

    }

    public function getById(array $data){
        try{
            $language = Language::find($data['language_id']);
            if (is_null($language)){
                return "failed";
            }

        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($language);
    }

     public function activate(array $data){
       try{

           $language = Language::where ("language_id",$data['language_id'])->first();
           $language->is_active = 1;
           $language->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($language);
   }

    public function deActivate(array $data){
      try{
           $language = Language::where ("language_id",$data['language_id'])->first();
           $language->is_active = 0;
           $language->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($language);
   }

    public function deleteLanguage(array $data){
      try{

           $language = Language::where ("language_id",$data['language_id'])->first();
           $language->is_deleted = 1;
           $language->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($language);
   }

   public function search($data,$user_id){
        try{
            
                $sql = "is_active = 1 and is_deleted = 0 and ( language like '%".$data."%' or language_short_name like '%".$data."%' ) and language.clnt_id='".$user_id."'";
            
           
                $language = Language::whereRaw($sql)
                            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($language))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

      return GlobalResponse::createResponse($language);

    }

     public function selectLanguage(){
        try{
          //  $origin = OriginType::all();
              //$language = Language::where([['is_deleted',0],['is_active',1]])->get();
             $language = DB::table("bl_language_master as lang")->where([['is_deleted',0],['is_active',1]])->select('lang.*')->get();


            if (is_null($language))
            {
                return "failed";
            }

        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($language);

    }

} ?>

