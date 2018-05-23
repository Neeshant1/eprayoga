<?php
namespace App\Repositories;
use App\Models\Pricing;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;

use Log;

class PricingRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $pricing = new  Pricing;
            $data['prc_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.pricing_code'));
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $pricing->fill($data);
            $pricing->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $pricing;
    }

    public function update(array $data){
        try{
       
            $pricing = Pricing::where ("pricing_id",$data['pricing_id'])->first(); 
            if (is_null($pricing)){
                return "failed";
            }
            $pricing->fill($data);
            $pricing->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $pricing;
    }

    public function delete(array $data){
        try{
              $pricing = Pricing::where ("pricing_id",$data['pricing_id'])->first(); 
            if (is_null($pricing)){
                return "failed";
            }
            $pricing->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($pricing);

    }

      public function deleteAll(){
         try{
              $pricing = Pricing::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($pricing);
    }


    public function getAll(){
        try{
          //  $origin = OriginType::all();


             $pricing = DB::table("bl_pricing as price")
             ->where('price.is_deleted',0)
             ->leftJoin("bl_currency_code_master as cu","price.prc_currency","=","cu.currency_id")
             ->select('price.*','cu.currency_name')->simplePaginate(self::$RECORDS_PER_PAGE);


            if (is_null($pricing))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($pricing);

    }

    public function getById(array $data){
        try{
            $pricing = Pricing::find($data['pricing_id']);
            if (is_null($pricing)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($pricing);
    }
     public function activate(array $data){
       try{

           $pricing = Pricing::where ("pricing_id",$data['pricing_id'])->first();
           $pricing->is_active = 1;
           $pricing->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($pricing);
   }

    public function deActivate(array $data){
      try{

           $pricing = Pricing::where ("pricing_id",$data['pricing_id'])->first();
           $pricing->is_active = 0;
           $pricing->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($pricing);
   }

    public function deletePricing(array $data){
      try{

           $pricing = Pricing::where ("pricing_id",$data['pricing_id'])->first();
           $pricing->is_deleted = 1;
           $pricing->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($pricing);
   }

   public function search($data){
        try{
             
            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "price.is_deleted = 0 and ( prc_description like '%".$data."%' or prc_eff_from_date like '%".$data."%' or prc_eff_to_date like '%".$data."%' or faqc.currency_name like '%".$data."%'  )";
            //}

                $pricing = DB::table("bl_pricing as price")
            ->whereRaw($sql)
            ->leftJoin("bl_currency_code_master as faqc","price.prc_currency","=","faqc.currency_id")
            ->select("price.*","faqc.currency_name")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
           
            //$pricing = Pricing::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($pricing))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($pricing);

    }

} ?>

