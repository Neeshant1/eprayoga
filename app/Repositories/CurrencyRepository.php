<?php
namespace App\Repositories;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use Log;
use App\Response\GlobalResponse;

class CurrencyRepository
{
     private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }
    public function save(array $data,$user_profile_id,$user_id)
    {
         try {
  
            $currency = new  Currency;
            $data['currency_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.currency_code'));
            $data['clnt_id'] = $user_id;
            $data['created_by_user_id'] = $user_profile_id;
            $data['last_update_user_id'] = $user_profile_id;
            $currency->fill($data);
            $currency->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($currency);
    }

    public function update(array $data,$user_profile_id,$user_id){
        try{
            $data['last_update_user_id'] = $user_profile_id;
            $data['clnt_id'] = $user_id;
            $currency = Currency::where ("currency_id",$data['currency_id'])->first();

            if (is_null($currency)){
                return "failed";
            }

            $currency->fill($data);
            $currency->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($currency);
    }

    public function delete(array $data){
        try{
              $currency = Currency::where ("currency_id",$data['currency_id'])->first(); 
            if (is_null($currency)){
                return "failed";
            }
            $currency->delete();
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($currency);
    }

    public function deleteAll($user_id,$user_type){
        try{

          if($user_type == 'S'){
                 $msg = Currency::where('is_deleted', '=',0)
                             ->update(['is_deleted' => 1]);
          }else{
                 $msg = Currency::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])
                             ->update(['is_deleted' => 1]);
          }
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    

    public function getAll($user_id,$user_type){
        try{

           if($user_type == 'S'){

             $language = $currency = Currency::where('is_deleted',0)
                         ->simplePaginate(self::$RECORDS_PER_PAGE);

         }else{
           
             $language = $currency = Currency::where([['is_deleted',0],["clnt_id","=",$user_id]])
                         ->simplePaginate(self::$RECORDS_PER_PAGE);
           }

            if (is_null($language))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($currency);

    }

    public function getById(array $data){
        try{
            $currency = Currency::find($data['currency_id']);
            if (is_null($currency)){
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($currency);
    }

    //balaji
    public function deleteCurrency(array $data){
      try{

           $currency = Currency::where ("currency_id",$data['currency_id'])->first();
           $currency->is_deleted = 1;
           $currency->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($currency);
   }


    public function activate(array $data){
       try{

           $currency = Currency::where ("currency_id",$data['currency_id'])->first();
           $currency->is_active = 1;
           $currency->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($currency);
   }

    public function deActivate(array $data){
      try{

           $currency = Currency::where ("currency_id",$data['currency_id'])->first();
           $currency->is_active = 0;
           $currency->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($currency);
   }

   public function search($data,$user_id,$user_type){
        try{

            $sql = "is_active = 1 and is_deleted = 0";
                    
        if($user_type == 'S'){
            if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            {
                $sql .= " and ( conv_rate = ".$data." or type like '%".$data."%')";
            }
            else
            {
                $sql .= " and ( currency_name like '%".$data."%' or code like '%".$data."%')";
            }

        }else{
            if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            {
                $sql .= " and ( conv_rate = ".$data." or type like '%".$data."%') and clnt_id='".$user_id."'";
            }
            else
            {
                $sql .= " and ( currency_name like '%".$data."%' or code like '%".$data."%') and clnt_id='".$user_id."'";
            }
        }
          

           
           $currency = Currency::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
             // $currency = Currency::whereRaw($sql)->get();
            if (is_null($currency))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($currency);

    }
     public function pricingcurrency(){
        try{
            //$currency = DB::table("bl_currency_code_master as cnt")->where('cnt.is_deleted',0)->get();
           $currency = DB::table('bl_currency_code_master')->where([
                                  ['is_active',1],
                                  ['is_deleted',0],
                                  ])->get();
            if (is_null($currency))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($currency);

    }


} ?>

