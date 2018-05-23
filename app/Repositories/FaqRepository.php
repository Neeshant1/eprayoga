<?php
namespace App\Repositories;
use App\Models\Faq;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use Log;


class FaqRepository
{
     private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }
    public function save(array $data,$user_profile_id)
    {
         try {
  
            $faq = new  Faq;
            $data['faq_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.faq_code'));
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $faq->fill($data);
            $faq->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($faq);
    }

    public function update(array $data){
        try{
        
            $faq = Faq::where ("faq_id",$data['faq_id'])->first(); 

            if (is_null($faq)){
                return "failed";
            }

            $faq->fill($data);
            $faq->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($faq);
    }

    public function delete(array $data){
        try{
              $faq = Faq::where ("faq_id",$data['faq_id'])->first(); 
            if (is_null($faq)){
                return "failed";
            }
            $faq->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($faq);
    }

   public function deleteAll($user_id){
        try{
            $msg = Faq::where([["created_by_user_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
        $faq = DB::table("bl_faq as faq")->where('faq.is_deleted',0)
        ->leftJoin("bl_faq_category as faqc","faqc.faq_category_id","=","faq.faq_category_id")
        ->select("faq.*","faqc.faq_category_id","faqc.faq_category_name")
        ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($faq))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($faq);

    }

    public function getById(array $data){
        try{
            $faq = Faq::find($data['faq_id']);
            if (is_null($faq)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($faq);
    }

     public function activate(array $data){
       try{

           $faq = Faq::where ("faq_id",$data['faq_id'])->first();
           $faq->is_active = 1;
           $faq->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($faq);
   }

    public function deActivate(array $data){
      try{

           $faq = Faq::where ("faq_id",$data['faq_id'])->first();
           $faq->is_active = 0;
           $faq->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
     return GlobalResponse::createResponse($faq);
   }

    public function deleteFaq(array $data){
      try{

           $faq = Faq::where ("faq_id",$data['faq_id'])->first();
           $faq->is_deleted = 1;
           $faq->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($faq);
   }

    public function search($data){
        try{

            $sql = "faq.is_active = 1 and faq.is_deleted = 0 and ( faq.question like '%".$data."%' or faq.answer like '%".$data."%' or faq.notes like '%".$data."%' or faq.keywords like '%".$data."%' or faqc.faq_category_name like '%".$data."%' )"; 

                //FAQ Code  FAQ Category  Question  Answer  Notes   Keywords           

           
            $faq = DB::table("bl_faq as faq")
            ->whereRaw($sql)
            ->leftJoin("bl_faq_category as faqc","faqc.faq_category_id","=","faq.faq_category_id")
           ->select("faq.*","faqc.faq_category_id","faqc.faq_category_name")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($faq))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($faq);

    }


} ?>

