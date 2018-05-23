<?php
namespace App\Repositories;
use App\Models\ProductCatalog;
use App\Models\Category;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\ExamDesign;
use App\Models\ProductCatalogAttemptType;
use App\Models\ShoppingCartMaster;
use App\Models\ShoppingCartDetail;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use App\Util\BLAlphaNumericCodeGenerator;
use Log;
use Carbon\Carbon;

class ProductCatalogRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id)
    {
         try {
  
           $productvalid = DB::table("bl_product_catalog as proc")->where('proc.is_deleted',0)
          ->select('proc.id','proc.is_deleted','proc.exam_attempt_type_id','proc.category_id','proc.subject_id','proc.topic_id','proc.clnt_id','proc.label')

          ->where([
            ['proc.clnt_id','=',$user_id],
            ['proc.category_id','=',$data['category_id']],
            ['proc.subject_id','=',$data['subject_id']],
            ['proc.topic_id','=',$data['topic_id']],
            ['proc.exam_attempt_type_id','=',$data['exam_attempt_type_id']],
            ])                  
          ->get();


          if(count($productvalid) >0){

            return false;

          }else {

            $product_catalog = new  ProductCatalog;
            $data['clnt_group_id'] = $clnt_group_id;
           $data['clnt_id'] = $user_id;
           $data['last_update_user_id'] = $user_profile_id;
           $data['created_by_user_id'] = $user_profile_id;
            $data['product_catalog_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.product_catalog_code'));
            $product_catalog->fill($data);
            $product_catalog->save();

          }
           
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $product_catalog;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        try{
           
           $productvalid = DB::table("bl_product_catalog as proc")->where('proc.is_deleted',0)

          ->select('proc.id')

          ->where([
            ['proc.clnt_id','=',$user_id],
            ['proc.category_id','=',$data['category_id']],
            ['proc.subject_id','=',$data['subject_id']],
            ['proc.topic_id','=',$data['topic_id']],
            ['proc.exam_attempt_type_id','=',$data['exam_attempt_type_id']],
            ])                  
          ->get();

          $tempproduct = json_decode($productvalid,true);
          if((count($productvalid) >0) && ($tempproduct[0]['id'] != $data['id'])){


            return false;

          }else {


            $product_catalog = ProductCatalog::where ("id",$data['id'])->first();
            $data['last_update_user_id'] = $user_profile_id;
            $data['product_catalog_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.product_catalog_code'));
            $product_catalog->fill($data);
            $product_catalog->save();

          

          }
          
           

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $product_catalog;

    }

    public function delete(array $data){

        try{

            DB::beginTransaction();

            $product_catalog = ProductCatalog::where ("id",$data['id'])-> update(['is_deleted' => 1]);
          
            $product_attempt = ProductCatalogAttemptType::where ("product_catalog_id",$data['id'])->update(['is_deleted' => 1]);

        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();

        return GlobalResponse::createResponse($product_catalog);

    }

    public function deleteAll($user_id){
         try{
              $msg = ProductCatalog::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg); 
    }

    public function getAll($user_id,$user_type){
        try{

                if($user_type == 'S'){

                $product = DB::table("bl_product_catalog as proc")
                ->where('proc.is_deleted', '=',0)
                ->join('bl_client_group as clntg','clntg.clnt_group_id','=','proc.clnt_group_id')
                ->join('bl_client as clnt','clnt.client_id','=','proc.clnt_id')
                ->join('bl_category as cat','proc.category_id','=','cat.category_id')
                ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
                ->join('bl_topic as top','proc.topic_id','=','top.topic_id')
                ->join('bl_currency_code_master as cur','cur.currency_id','=','proc.currency_id')
                ->join('bl_language_master as lang','proc.language_id','=','lang.language_id')
                ->join('bl_exam_attempt_type as exam','exam.id', '=', 'proc.exam_attempt_type_id')
                ->select('proc.id','proc.name','proc.description','proc.label','proc.price','proc.discount','proc.bundle_price','proc.sgst','proc.is_active','proc.is_deleted',
                  'proc.exam_attempt_type_id','proc.valid_days','proc.no_of_attempts',
                  'proc.cgst','proc.igst','proc.other_tax1','proc.other_tax2','proc.other_tax3','proc.populate_all','proc.employee_band','proc.valid_from','proc.valid_to',
                  'cat.category_name','cat.category_id','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name','exam.name as examName','proc.description',
                  'clnt.client_id','clnt.clnt_name','clntg.clnt_group_id','clntg.clnt_group_name','cur.currency_id','cur.currency_name','lang.language_id','lang.language')
                ->simplePaginate(self::$RECORDS_PER_PAGE);


                 }else{

                  $product = DB::table("bl_product_catalog as proc")->where([['proc.is_deleted', '=', 0],['proc.clnt_id','=',$user_id]])
                ->join('bl_client_group as clntg','clntg.clnt_group_id','=','proc.clnt_group_id')
                ->join('bl_client as clnt','clnt.client_id','=','proc.clnt_id')
                ->join('bl_category as cat','proc.category_id','=','cat.category_id')
                ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
                ->join('bl_topic as top','proc.topic_id','=','top.topic_id')
                ->join('bl_currency_code_master as cur','cur.currency_id','=','proc.currency_id')
                ->join('bl_language_master as lang','proc.language_id','=','lang.language_id')
                ->join('bl_exam_attempt_type as exam','exam.id', '=', 'proc.exam_attempt_type_id')
                ->select('proc.id','proc.name','proc.description','proc.label','proc.price','proc.discount','proc.bundle_price','proc.sgst','proc.is_active','proc.is_deleted',
                  'proc.exam_attempt_type_id','proc.valid_days','proc.no_of_attempts',
                  'proc.cgst','proc.igst','proc.other_tax1','proc.other_tax2','proc.other_tax3','proc.populate_all','proc.employee_band','proc.valid_from','proc.valid_to',
                  'cat.category_name','cat.category_id','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name','exam.name as examName','proc.description',
                  'clnt.client_id','clnt.clnt_name','clntg.clnt_group_id','clntg.clnt_group_name','cur.currency_id','cur.currency_name','lang.language_id','lang.language')
                ->simplePaginate(self::$RECORDS_PER_PAGE);
              }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($product);

    }

    public function getExamCart($user_profile_id,$user_type){

        try{

            if($user_type == 'E'){

              // $exams = DB::table('bl_promo_master as pm')
              //            ->join('bl_product_catalog as pc','pm.product_catalog_id','=','pc.id')
              //            ->join('bl_exam_schedule as es','pm.id','=','es.promo_master_id','left outer')
              //            ->join('bl_category as cat','cat.category_id','=','pc.category_id')
              //            ->join('bl_subject as sub','sub.subject_id','=','pc.subject_id')
              //            ->join('bl_topic as top','top.topic_id','=','pc.topic_id')
              //             ->Where('pm.exam_allocated_to','=',$user_profile_id)
              //            ->whereRaw('pm.allocated_flag=1 and CURDATE() >= pm.promo_valid_fm_date and CURDATE() < promo_valid_to_date')
              //        ->select('es.exam_schedule_id','pm.id as promo_id','pm.exam_name','pm.exam_code','pm.no_attempts_sofar','pm.no_attempts_allowed as no_of_attempts','pc.id as product_catalog_id','pc.category_id','pc.subject_id','pc.topic_id','pc.description','pc.product_catalog_code','es.is_schedule','es.status','es.exam_planned_date',DB::raw('TIME_FORMAT(es.start_time, "%H:%i:%s") as start_time'),DB::raw('TIME_FORMAT(es.end_time, "%H:%i:%s") as end_time'), 'cat.category_name','sub.subject_name','top.topic_name','pm.order_detail_id','pm.exam_allocated_to','pm.client_id','es.exam_trans_ref_no','es.user_profile_id','es.time_elapsed')                  
              //         ->get();
             $exams = DB::select("select * from (select proM.id,proM.id as promo_id,proM.promo_code,proM.exam_allocated_to, user_profile_id, proM.order_detail_id ,prod.valid_days,prod.name,extyp.name as exam_name,prod.product_catalog_code,proM.no_attempts_allowed as no_of_attempts,prod.id as product_catalog_id,cat.category_name,sub.subject_name,top.topic_name,cat.category_id,proM.promo_valid_fm_date as valid_from,proM.promo_valid_to_date as valid_to ,sub.subject_id,top.topic_id,proM.no_attempts_sofar from bl_promo_master as proM join bl_product_catalog as prod on proM.product_catalog_id = prod.id join bl_category as cat on cat.category_id = prod.category_id join bl_subject as sub on sub.subject_id = prod.subject_id join bl_topic as top on top.topic_id = prod.topic_id join bl_exam_attempt_type as extyp on extyp.id=prod.exam_attempt_type_id  where  proM.exam_allocated_to= ".$user_profile_id. "  and proM.no_attempts_sofar < proM.no_attempts_allowed and CURDATE() < proM.promo_valid_to_date ) as d LEFT OUTER JOIN (select exam_schedule_id, order_detail_id as orderid, status,is_schedule,start_time, end_time,exam_planned_date,user_profile_id,exam_trans_ref_no,time_elapsed,promo_master_id  from bl_exam_schedule where user_profile_id=".$user_profile_id. "  and status!='completed') as s ON d.promo_id = s.promo_master_id ");
    
             }

            else{

              $exams = DB::table('bl_order_detail as bod')
                         ->leftjoin('bl_product_catalog', 'bod.product_catalog_id','=','bl_product_catalog.id')
                         ->leftjoin('bl_order_master', 'bod.order_master_id','=','bl_order_master.id')                                 
                         ->leftjoin('bl_exam_schedule','bod.id','=','bl_exam_schedule.order_detail_id')
                         ->select('bod.id','bl_product_catalog.name as exam_name','bl_product_catalog.description','bl_product_catalog.product_catalog_code','bl_product_catalog.category_id','bl_product_catalog.subject_id','bl_product_catalog.topic_id','bl_product_catalog.no_of_attempts','bl_product_catalog.valid_days','bl_exam_schedule.exam_planned_date','bl_exam_schedule.is_schedule','bl_exam_schedule.status',DB::raw('TIME_FORMAT(bl_exam_schedule.start_time, "%H:%i:%s") as start_time'),DB::raw('TIME_FORMAT(bl_exam_schedule.end_time, "%H:%i:%s") as end_time'))                               
                         ->get();

             }
 
         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($exams);

    }


     public function getExamCartOne($user_profile_id,$user_type){

        try{

            if($user_type == 'E'){

             
             $exams = DB::select("select * from ( select exam_schedule_id, order_detail_id as orderid, status,is_schedule,start_time, end_time,exam_planned_date,user_profile_id,exam_trans_ref_no,
time_elapsed,promo_master_id  from bl_exam_schedule where user_profile_id=".$user_profile_id.  "  and status ='completed') as d LEFT JOIN ( select proM.id,proM.id as promo_id,proM.promo_code,proM.exam_allocated_to, user_profile_id, proM.order_detail_id ,prod.valid_days,prod.name,extyp.name as exam_name,prod.product_catalog_code,proM.no_attempts_allowed as no_of_attempts,prod.id as product_catalog_id,cat.category_name,sub.subject_name,top.topic_name,cat.category_id, proM.promo_valid_fm_date as valid_from,proM.promo_valid_to_date as valid_to ,sub.subject_id,top.topic_id, proM.no_attempts_sofar from bl_promo_master as proM join bl_product_catalog as prod on proM.product_catalog_id = prod.id join bl_category as cat on cat.category_id = prod.category_id join bl_subject as sub on sub.subject_id = prod.subject_id join bl_topic as top on top.topic_id = prod.topic_id join bl_exam_attempt_type as extyp on extyp.id=prod.exam_attempt_type_id  where  proM.exam_allocated_to= ".$user_profile_id. ") as s ON s.promo_id = d.promo_master_id");
    
             }

            
 
         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($exams);

    }

    public function getById(array $data){
        try{
          

             $product_catalog = DB::table("bl_product_catalog as proc")->where('proc.id',$data['id'])
             ->join('bl_client_group as clntg','clntg.clnt_group_id','=','proc.clnt_group_id')
                ->join('bl_client as clnt','clnt.client_id','=','proc.clnt_id')
                ->join('bl_category as cat','proc.category_id','=','cat.category_id')
                ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
                ->join('bl_topic as top','proc.topic_id','=','top.topic_id')
                ->join('bl_currency_code_master as cur','cur.currency_id','=','proc.currency_id')
                ->join('bl_language_master as lang','proc.language_id','=','lang.language_id')
                ->join('bl_exam_attempt_type as exam','exam.id', '=', 'proc.exam_attempt_type_id')
                ->select('proc.id as product_catalog_id','proc.name','proc.description','proc.label','proc.price','proc.discount','proc.bundle_price','proc.sgst',
                  'proc.exam_attempt_type_id','proc.valid_days','proc.no_of_attempts',
                  'proc.cgst','proc.igst','proc.other_tax1','proc.other_tax2','proc.other_tax3','proc.populate_all','proc.employee_band','proc.valid_from','proc.valid_to',
                  'cat.category_name','cat.category_id','sub.subject_id','sub.subject_name','top.topic_id','top.topic_name','exam.name as examName','proc.description',
                  'clnt.client_id','clnt.clnt_name','clntg.clnt_group_id','clntg.clnt_group_name','cur.currency_id','cur.currency_name','lang.language_id','lang.language')
                ->get();
               
          
            if (is_null($product_catalog)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($product_catalog);
    }

    public function activate(array $data){
       try{

           $product_catalog = ProductCatalog::where ("id",$data['id'])->first();
           $tempproduct = json_decode($product_catalog,true);
           $tempcat = Category::where ([["category_id",$tempproduct['category_id']],['is_active','=','1'],['is_deleted','=','0']])->first();
           $tempsub = Subject::where ([["subject_id",$tempproduct['subject_id']],['is_active','=','1'],
            ['is_deleted','=','0']])->first();
           $temptop = Topic::where ([["topic_id",$tempproduct['topic_id']],['is_active','=','1'],
            ['is_deleted','=','0']])->first();
           $tempdesign = ExamDesign::where ([["product_catalog_id",$data['id']],['is_deleted','=','0']])->first();
           
            $questioncount = DB::table('bl_question_master as qm')
            ->where ([
            ['qm.category_id','=',$tempproduct['category_id']],
            ['qm.subject_id','=',$tempproduct['subject_id']],
            ['qm.topic_id','=',$tempproduct['topic_id']],
            ['qm.is_active','=','1'],
            ['qm.is_deleted','=','0']])
            ->select('qm.question_id')
            ->get();
          $tempquestiondesign = ExamDesign::where ([["product_catalog_id",$data['id']],['is_deleted','=','0'],['rule','=','no_of_question']])->select('value')->get();
          
          $tmpjsondes = json_decode($tempquestiondesign,true); 
         
           if(count($tempcat) <= 0){
            $tempcat = Category::where ([["category_id",$tempproduct['category_id']]])->first();
            return GlobalResponse::clientErrorResponse((array("alertMeassage"=>"Please Check the Category Name :".$tempcat['category_name'])));
           }
           else if(count($tempsub) <=  0){
            $tempsub = Subject::where ([["subject_id",$tempproduct['subject_id']]])->first();
            return GlobalResponse::clientErrorResponse((array("alertMeassage"=>"Please Check the Subject Name :".$tempsub['subject_name'])));
           }
           else if(count($temptop) <=  0){
            $temptop = Topic::where ([["topic_id",$tempproduct['topic_id']]])->first();
            return GlobalResponse::clientErrorResponse((array("alertMeassage"=>"Please Check the Topic Name :".$temptop['topic_name'])));
           }
           else if(count($tempdesign) <=  0){
            return GlobalResponse::clientErrorResponse((array("alertMeassage"=>"Please create the ExamDesign ")));
           }else if(count($questioncount) < $tmpjsondes[0]['value'] ){
            return GlobalResponse::clientErrorResponse((array("alertMeassage"=>"Please update the ExamDesign ")));
           }
            $product_catalog->is_active = 1;
           $product_catalog->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($product_catalog);
   }

    public function deActivate(array $data){
      try{

           $product_catalog = ProductCatalog::where ("id",$data['id'])->first();
           $product_catalog->is_active = 0;
           $product_catalog->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($product_catalog);
  }

    public function search($data,$user_id){
        try{
          
            $sql = "proc.is_deleted = 0 and proc.clnt_id = '".$user_id ."'and(proc.name like '%".$data."%' or clnt.clnt_name like '%".$data."%' or clntg.clnt_group_name like '%".$data."%' or sub.subject_name like '%".$data."%' or cat.category_name like '%".$data."%')"; 

           
            $product = DB::table("bl_product_catalog as proc")
            ->whereRaw($sql)
            ->join('bl_client_group as clntg','clntg.clnt_group_id','=','proc.clnt_group_id')
            ->join('bl_client as clnt','clnt.client_id','=','proc.clnt_id')
            ->join('bl_category as cat','proc.category_id','=','cat.category_id')
            ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
            ->select("proc.*","clnt.client_id","clnt.clnt_name","clntg.clnt_group_id","clntg.clnt_group_name",
              "cat.category_id","cat.category_name","sub.subject_id","sub.subject_name")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
              if (is_null($product))
              {
                return "failed";
              }

            }catch(Exception $e){
                return GlobalResponse::clientErrorResponse("error");
              }

               return GlobalResponse::createResponse($product);

    }

      public function getExamDetails($user_profile_id){

        try{
         //dd($user_profile_id);

            $exam_cart = DB::select("select pd.id, pd.name ,count(pm.id) as promo_count from bl_promo_master as pm ,bl_product_catalog as pd where pd.id =  pm.product_catalog_id and pm.allocated_flag = false and pm.user_profile_id = '".$user_profile_id."'   and CURDATE() >= pm.promo_valid_fm_date and CURDATE() < promo_valid_to_date group by pd.id,pd.name ");
 
            }catch(Exception $e){
              return GlobalResponse::clientErrorResponse("error");
            }


               return GlobalResponse::createResponse($exam_cart);

    }


    public function selectId($user_id,$user_type){
        try{
          if($user_type == 'S'){
            $product = DB::table("bl_product_catalog as proc")->where('proc.is_deleted',0)
            ->where(function($q) {
                    $currentdate =new Carbon();
                    $q->where('proc.valid_from', '<=' , $currentdate)
                    ->orWhere('proc.valid_to', '>=' , $currentdate);
              })
            ->get();

          }else{
            $product = DB::table("bl_product_catalog as proc")->where([['proc.is_deleted',0],['proc.clnt_id','=',$user_id]])
            ->where(function($q) {
                    $currentdate =new Carbon();
                    $q->where('proc.valid_from', '<=' , $currentdate)
                    ->orWhere('proc.valid_to', '>=' , $currentdate);
              })
            ->get();

          }
            

            if (is_null($product))
            {
                return "failed";
            }

           }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
            }

             return GlobalResponse::createResponse($product);

    }

    public function selectUserProduct(){
        try{
            $product = DB::table("bl_product_catalog as proc")
                        ->join('bl_category as cat','proc.category_id','=','cat.category_id')
                        ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
                        ->join('bl_topic as top','proc.topic_id','=','top.topic_id')
                        ->where([['proc.is_deleted',0],['proc.is_active',1],['proc.populate_all','=',1]])
                  ->where(function($q) {
                          $currentdate =new Carbon();
                          $q->where('proc.valid_from', '<=' , $currentdate)
                          ->orWhere('proc.valid_to', '>=' , $currentdate);
                    })
                    ->select('top.topic_name','sub.subject_name','cat.category_name','proc.name','proc.description','proc.id','proc.price','top.topic_id','cat.category_id','sub.subject_id')
                    ->get();

            if (is_null($product))
            {
                return "failed";
            }

           }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
            }

            return GlobalResponse::createResponse($product);

    }

    public function getListclient(array $data){
      try{
           
          $user_profile_id = $data['client_id'];

        $exam = DB::select("select * from(select product_catalog_id,group_concat(value) as value,group_concat(rule) as rule from bl_exam_design_rules where rule='no_of_question' or rule='total_mark' group by product_catalog_id) as a left join (select prod.id,prod.clnt_id,prod.name,prod.product_catalog_code,prod.valid_days,cat.category_name,sub.subject_name,top.topic_name,curr.currency_name,prod.price from bl_product_catalog as prod,bl_category as cat, bl_subject as sub, bl_topic as top, bl_currency_code_master as curr where prod.category_id = cat.category_id and top.topic_id=prod.topic_id and sub.subject_id = prod.subject_id and curr.currency_id = prod.currency_id ) as b on  a.product_catalog_id = b.id where b.clnt_id = '".$user_profile_id."' ");

          

       if (is_null($exam))
       {
           return "failed";
       }       

      }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($exam); 
  }  


} ?>

