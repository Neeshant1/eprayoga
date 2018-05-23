<?php
namespace App\Repositories;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use Log;
use App\Response\GlobalResponse;

class CityRepository
{

    private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }
    public function save(array $data,$user_profile_id)
    {
         try {
          $data['city_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.city_code'));
          $data['last_update_user_id'] = $user_profile_id;
          $data['created_by_user_id'] = $user_profile_id;
            $city = new  City;
            $city->fill($data);
            $city->save();
        } catch(Exception $e) {

           return GlobalResponse::clientErrorResponse("error");
        }
       return GlobalResponse::createResponse($city);
    }

    public function update(array $data,$user_profile_id){
        try{
           
            $city = City::where ("city_id",$data['city_id'])->first(); 
            $data['last_update_user_id'] = $user_profile_id;
            if (is_null($city)){
                return "failed";
            }

            $city->fill($data);
            $city->save();

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($city);
    }

    public function delete(array $data){
        try{
              $city = City::where ("city_id",$data['city_id'])->first(); 
            if (is_null($city)){
                return "failed";
            }
            $city->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($city);
    }

     public function deleteAll(){
        try{
            $msg = City::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }


    public function getAll(){
        try{
           // $city = City::all();
            $city = DB::table("bl_city_master as cty")
            ->where('cty.is_deleted',0)
            ->join('bl_state_master as state','cty.state_id','=','state.state_id')
            ->join('bl_country_master as country','cty.country_id','=','country.country_id')
            ->select('cty.*','state.state_full_name','country.country_full_name')
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($city))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($city);

    }

    public function getById(array $data){
        try{
           // $city = City::find($data['city_id']);
             $city = DB::table("bl_city_master as city")->where('city.city_id',$data['city_id'])->join('bl_country_master as cnt','city.country_id','=','cnt.country_id')->select('city.*','cnt.zone_id')->get();
             
            if (is_null($city)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($city);
    }

     public function activate(array $data){
       try{

           $city = City::where ("city_id",$data['city_id'])->first();
           $city->is_active = 1;
           $city->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($city);
   }

    public function deActivate(array $data){
      try{

           $city = City::where ("city_id",$data['city_id'])->first();
           $city->is_active = 0;
           $city->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($city);
   }

    public function deleteCity(array $data){
      try{

           $city = City::where ("city_id",$data['city_id'])->first();
           $city->is_deleted = 1;
           $city->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($city);
   }
   public function search($data){
        try{
            
        //       $faq = DB::table("bl_faq as faq")->whereRaw('faq.is_deleted',0)
        // ->leftJoin("bl_faq_category as faqc","faqc.faq_category_id","=","faq.faq_category_id")
        // ->select("faq.*","faqc.faq_category_id","faqc.faq_category_name")
        // ->simplePaginate(self::$RECORDS_PER_PAGE);

   
            $sql = "cou.is_active = 1 and cou.is_deleted = 0 and ( cou.city_full_name like '%".$data."%' or cou.code like '%".$data."%' or faqc.country_full_name like '%".$data."%' or faq.state_full_name like '%".$data."%' )"; 

                //FAQ Code  FAQ Category  Question  Answer  Notes   Keywords           

           
            $country = DB::table("bl_city_master as cou")
            ->whereRaw($sql)
            ->leftJoin("bl_country_master as faqc","faqc.country_id","=","cou.country_id")
             ->leftJoin("bl_state_master as faq","faq.state_id","=","cou.state_id")
            ->select("cou.*","faqc.country_full_name","faq.state_full_name")   
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

    public function getCityByStateId(array $data){
        try{
            $country = DB::table('bl_city_master')
                     ->where([['state_id',$data['state_id']],['is_deleted',0],['is_active',1]]) 
                     -> get();
            if (is_null($country)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($country);
    }

} ?>

