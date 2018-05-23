<?php
namespace App\Repositories;
use App\Models\Genp;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class GenpRepository
{
   private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
          try {

            $data['last_update_user_id'] = $user_profile_id;
            $data['genp_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.genaral_param_code'));
            $data['created_by_user_id'] = $user_profile_id;

            $genp = new  Genp;
            $genp->fill($data);
            $genp->save();

        } catch(Exception $e) {
           // DB::rollBack();

            return GlobalResponse::clientErrorResponse("error");

        }
       // DB::commit();


         return GlobalResponse::createResponse($genp);
    }

    public function update(array $data){
        try{
           
            $genp = Genp::where ("generic_param_id",$data['generic_param_id'])->first(); 

            if (is_null($genp)){
                return "failed";
            }

            $genp->fill($data);
            $genp->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($genp);
    }

    public function delete(array $data){
        try{

              $genp = Genp::where ("generic_param_id",$data['generic_param_id'])->first(); 

            if (is_null($genp)){
                return "failed";
            }

            $genp->delete();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

        return GlobalResponse::createResponse($genp);
    }

     public function deleteAll($user_id){
        try{
            $genp = Genp::where([["created_by_user_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");

        }

        return GlobalResponse::createResponse($genp);
    }

    public function getAll(){
        try{

                $genp = DB::table("bl_generic_param_master as genp")->where('genp.is_deleted',0)
                ->join("bl_currency_code_master as cur","genp.genp_app_currency","=","cur.currency_id")
                ->join("bl_language_master as lang","lang.language_id","=","genp.genp_app_default_language")
                ->select('genp.*','cur.currency_name','lang.language')
                 ->simplePaginate(self::$RECORDS_PER_PAGE);
           

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

         return GlobalResponse::createResponse($genp);

    }

    public function getById($data){
        try{

            $genp = Genp::find($data['generic_param_id']);

            if (is_null($genp))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

        return GlobalResponse::createResponse($genp);
    }

    public function activate(array $data){
       try{
           $genp = Genp::where ("generic_param_id",$data['generic_param_id'])->first();
           $genp->is_active = 1;
           $genp->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");

       }
        return GlobalResponse::createResponse($genp);
   }

    public function deActivate(array $data){
      try{
           $genp = Genp::where ("generic_param_id",$data['generic_param_id'])->first();
           $genp->is_active = 0;
           $genp->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");

       }
        return GlobalResponse::createResponse($genp);
   }

    public function deleteGenp(array $data){
      try{

           $genp = Genp::where ("generic_param_id",$data['generic_param_id'])->first();
           $genp->is_deleted = 1;
           $genp->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");

       }
       return GlobalResponse::createResponse($genp);
   }

   public function search($data){
        try{
             
                $sql = "genp.is_active = 1 and genp.is_deleted = 0 and ( genp.genp_desc like '%".$data."%' or genp.genp_type like '%".$data."%' or genp.genp_app_date_format like '%".$data."%' or cur.currency_name like '%".$data."%' or lang.language like '%".$data."%'  )";

        
            $genp = DB::table("bl_generic_param_master as genp")
            ->whereRaw($sql)
            ->join("bl_currency_code_master as cur","genp.genp_app_currency","=","cur.currency_id")
            ->join("bl_language_master as lang","lang.language_id","=","genp.genp_app_default_language")
            ->select("genp.*",'cur.currency_name','lang.language')
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($genp))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");

        }

        return GlobalResponse::createResponse($genp);
    }


} ?>
