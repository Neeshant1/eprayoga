<?php
namespace App\Repositories;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class CountryRepository
{
    private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
      try {
        $data['country_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.country_code'));
        $data['created_by_user_id'] = $user_profile_id;
        $data['last_update_user_id'] = $user_profile_id;
          
            $country = new  Country;
            $country->fill($data);
            $country->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($country);
    }

    public function update(array $data,$user_profile_id){
        try{
         
            $country = Country::where ("country_id",$data['country_id'])->first(); 
            $data['last_update_user_id'] = $user_profile_id;
            if (is_null($country)){
                return "failed";
            }

            $country->fill($data);
            $country->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($country);
    }

    public function delete(array $data){
        try{
              $country = Country::where ("country_id",$data['country_id'])->first(); 
            if (is_null($country)){
                return "failed";
            }
            $country->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($country);
    }

    public function deleteAll(){
        try{
            $msg = Country::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }


  /*  public function getAll(){
        try{
            $country = Country::where('is_deleted',0) -> get();
            if (is_null($country))
            {
                return "failed";
            }

        }catch(Exception $e){
            throw $e;
        }

        return $country;

    }*/

    public function getAll(){
        try{
            $country = DB::table("bl_country_master as cnt")
            ->where('cnt.is_deleted',0)
            ->join('bl_zone_area_master as zone','cnt.zone_id','=','zone.zone_area_id')
            ->select('cnt.*','zone.zone_name')
            ->simplePaginate(self::$RECORDS_PER_PAGE);


          
            if (is_null($country))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($country);

    }



    public function getById(array $data){
        try{
            $country = Country::find($data['country_id']);
            if (is_null($country)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($country);
    }

    public function getCountryByZoneId(array $data){
        try{
            $country = DB::table('bl_country_master')
                   ->where([['zone_id',$data['zone_id']],['is_deleted',0],['is_active',1]])
            ->get();
            if (is_null($country)){
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($country);
    }

     public function activate(array $data){
       try{

           $country = Country::where ("country_id",$data['country_id'])->first();
           $country->is_active = 1;
           $country->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($country);
   }

    public function deActivate(array $data){
      try{

           $country = Country::where ("country_id",$data['country_id'])->first();
           $country->is_active = 0;
           $country->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($country);
   }

    public function deleteCountry(array $data){
      try{

           $country = Country::where ("country_id",$data['country_id'])->first();
           $country->is_deleted = 1;
           $country->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($country);
   }
   public function search($data){
        try{
            
        //       $faq = DB::table("bl_faq as faq")->whereRaw('faq.is_deleted',0)
        // ->leftJoin("bl_faq_category as faqc","faqc.faq_category_id","=","faq.faq_category_id")
        // ->select("faq.*","faqc.faq_category_id","faqc.faq_category_name")
        // ->simplePaginate(self::$RECORDS_PER_PAGE);

   
            $sql = "cou.is_active = 1 and cou.is_deleted = 0 and ( cou.country_full_name like '%".$data."%' or cou.country_phonecode like '%".$data."%' or faqc.zone_name like '%".$data."%' )"; 

                //FAQ Code  FAQ Category  Question  Answer  Notes   Keywords           

           
            $country = DB::table("bl_country_master as cou")
            ->whereRaw($sql)
            ->leftJoin("bl_zone_area_master as faqc","faqc.zone_area_id","=","cou.zone_id")
            ->select("cou.*","faqc.zone_code","faqc.zone_name")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($country))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($country);

    }
     public function getcountryincustomer(){
        try{
            $country = DB::table("bl_country_master as cnt")
            ->where('cnt.is_deleted',0)
            ->where('cnt.is_active',1)
            ->select('cnt.*')
            ->get();          
            if (is_null($country))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($country);

    }

} ?>

