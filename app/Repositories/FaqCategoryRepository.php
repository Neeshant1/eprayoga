<?php
namespace App\Repositories;
use App\Models\FaqCategory;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use Log;

class FaqCategoryRepository
{
     private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $faqcategory = new  FaqCategory;
            $data['faq_category_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.faq_cateqory_code'));
             $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $faqcategory->fill($data);
            $faqcategory->save();
        } catch(Exception $e) {

           return GlobalResponse::clientErrorResponse("error");
        }
       return GlobalResponse::createResponse($faqcategory);

    }

    public function update(array $data){
        try{
       
            $faqcategory = FaqCategory::where ("faq_category_id",$data['faq_category_id'])->first(); 

            if (is_null($faqcategory)){
                return "failed";
            }

            $faqcategory->fill($data);
            $faqcategory->save();

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($faqcategory);
    }

    public function delete(array $data){
        try{
              $faqcategory = FaqCategory::where ("faq_category_id",$data['faq_category_id'])->first(); 
            if (is_null($faqcategory)){
                return "failed";
            }
            $faqcategory->delete();
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($faqcategory);
    }

   public function deleteAll($user_id){
        try{
            $msg = FaqCategory::where([["created_by_user_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            $faqcategory =  DB::table("bl_faq_category as fc")->where('fc.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($faqcategory))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($faqcategory);

    }

    public function getById(array $data){
        try{
            $faqcategory = FaqCategory::find($data['faq_category_id']);
            if (is_null($faqcategory)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($faqcategory);
    }

      public function activate(array $data){
       try{

           $faqcategory = FaqCategory::where ("faq_category_id",$data['faq_category_id'])->first();
           $faqcategory->is_active = 1;
           $faqcategory->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($faqcategory);
   }

    public function deActivate(array $data){
      try{

           $faqcategory = FaqCategory::where ("faq_category_id",$data['faq_category_id'])->first();
           $faqcategory->is_active = 0;
           $faqcategory->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($faqcategory);
   }

    public function deleteFaqCategory(array $data){
      try{

           $faqcategory = FaqCategory::where ("faq_category_id",$data['faq_category_id'])->first();
           $faqcategory->is_deleted = 1;
           $faqcategory->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($faqcategory);
   }

    public function selectFaqCategory(){
        try{
           $faqcategory = FaqCategory::where([['is_deleted',0],['is_active',1]]) -> get();
            if (is_null($faqcategory))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($faqcategory);

    }
     public function search($data){
        try{

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                $sql = "is_active = 1 and is_deleted = 0 and ( faq_category_name like '%".$data."%')";
            //}
           
            $faqcategory = FaqCategory::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($faqcategory))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($faqcategory);

    }

} ?>

