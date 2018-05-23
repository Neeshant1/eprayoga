<?php
namespace App\Repositories;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;

use Log;

class StateRepository
{
   private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
        $data['state_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.state_code'));
        $data['created_by_user_id'] = $user_profile_id;
        $data['last_update_user_id'] = $user_profile_id;
            $state = new  State;
            $state->fill($data);
            $state->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $state;
    }

    public function update(array $data,$user_profile_id){
        try{
          
            $state = State::where ("state_id",$data['state_id'])->first(); 
            $data['last_update_user_id'] = $user_profile_id;
            if (is_null($state)){
                return "failed";
            }

            $state->fill($data);
            $state->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $state;
    }

    public function delete(array $data){
        try{
              $state = State::where ("state_id",$data['state_id'])->first(); 
            if (is_null($state)){
                return "failed";
            }
            $state->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($state);
    }

     public function deleteAll(){
        try{
              $msg = State::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            //$state = State::where('is_deleted',0) -> get();

             $state = DB::table("bl_state_master as st")->where('st.is_deleted',0)->join('bl_country_master as cnt','st.country_id','=','cnt.country_id')->select('st.*','cnt.country_full_name') ->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($state))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($state);

    }

    public function getById(array $data){
        try{
            $state = State::find($data['state_id']);
            if (is_null($state)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($state);
    }

    public function getStateByCountryId(array $data){
        try{
            $state = DB::table('bl_state_master')
                     ->where([['country_id',$data['country_id']],['is_deleted',0],['is_active',1]]) 
                     -> get();
            if (is_null($state)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($state);
    }

       public function activate(array $data){
       try{

           $state = State::where ("state_id",$data['state_id'])->first();
           $state->is_active = 1;
           $state->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($state);
   }

    public function deActivate(array $data){
      try{

           $state = State::where ("state_id",$data['state_id'])->first();
           $state->is_active = 0;
           $state->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($state);
   }

    public function deleteState(array $data){
      try{

           $state = State::where ("state_id",$data['state_id'])->first();
           $state->is_deleted = 1;
           $state->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($state);
   }
    public function search($data){
        try{


        //       $faq = DB::table("bl_faq as faq")->whereRaw('faq.is_deleted',0)
        // ->leftJoin("bl_faq_category as faqc","faqc.faq_category_id","=","faq.faq_category_id")
        // ->select("faq.*","faqc.faq_category_id","faqc.faq_category_name")
        // ->simplePaginate(self::$RECORDS_PER_PAGE);

   
            $sql = "cou.is_deleted = 0 and ( cou.state_full_name like '%".$data."%' or cou.code like '%".$data."%' or faqc.country_full_name like '%".$data."%' )"; 

                //FAQ Code  FAQ Category  Question  Answer  Notes   Keywords           

           
            $state = DB::table("bl_state_master as cou")
            ->whereRaw($sql)
            ->Join("bl_country_master as faqc","faqc.country_id","=","cou.country_id")
            ->select("cou.*","faqc.country_full_name")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($state))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($state);

    }

} ?>

