<?php
namespace App\Repositories;
use App\Models\Subject;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCatalog;
use App\Response\GlobalResponse;

use Log;

class SubjectRepository
{
      private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }
    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id)
    {
         try {

            $subject = new  Subject;
            $data['subject_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.subject_code'));
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;

            $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $user_id;
            //$subject = new  Subject;
            $subject->fill($data);
            $subject->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $subject;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        try{
  
            $subject = Subject::where ("subject_id",$data['subject_id'])->first(); 
            $data['last_update_user_id'] = $user_profile_id;
            $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $user_id;
            if (is_null($subject)){
                return "failed";
            }

            $subject->fill($data);
            $subject->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $subject;
    }

    public function delete(array $data){
        try{
              $subject = Subject::where ("subject_id",$data['subject_id'])->first(); 
            if (is_null($subject)){
                return "failed";
            }
            $subject->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($subject);
    }

    public function deleteAll($user_id,$user_type){
        try{
          if($user_type == 'S'){
            $msg = Subject::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
          }else{
            $msg = Subject::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
          }
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($msg);
    }

    public function getAll($user_id,$user_type){
        try{
            //$subject = Subject::all();

          if($user_type == 'S'){

          $subject = DB::table('bl_subject as sub')
          ->where([['sub.is_deleted',0],['cat.is_deleted',0],['cat.is_active',1]]) 
          ->join('bl_category as cat','sub.category_id','=','cat.category_id')
          ->select('sub.category_id','sub.subject_code','sub.subject_name','sub.subject_id','sub.is_active','sub.is_deleted','sub.clnt_group_id','sub.clnt_id','sub.sub_description','cat.category_id','cat.category_name')
          ->simplePaginate(self::$RECORDS_PER_PAGE);
          }else{

            $subject = DB::table('bl_subject as sub')
          ->where([['sub.is_deleted',0],['cat.is_deleted',0],['cat.is_active',1],['sub.clnt_id','=',$user_id]]) 
          ->join('bl_category as cat','sub.category_id','=','cat.category_id')
          ->select('sub.category_id','sub.subject_code','sub.subject_id','sub.subject_name','sub.is_active','sub.is_deleted','sub.clnt_group_id','sub.clnt_id','sub.sub_description','cat.category_id','cat.category_name')
          ->simplePaginate(self::$RECORDS_PER_PAGE);
        }

          //  ->join('bl_client as clnt','sub.clnt_id','=','clnt.clnt_code')
          //  ->select('sub.*','cat.category_name','clnt.clnt_name')
          //->get();
          //$subject = Subject::where('is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);
        
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($subject);

    }

    public function getById(array $data){
        try{
            $subject = Subject::find($data['subject_id']);
            if (is_null($subject)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($subject);
    }

    
    public function getSubjecyByCategoryId(array $data,$user_id){
        try{
            $subject = Subject::where([['category_id',$data['category_id']],['is_deleted',0],['is_active',1]])
                               ->where('clnt_id','=',$user_id) 
                               -> get();
            if (is_null($subject)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($subject);
    }

    public function activate(array $data){
       try{

           $subject = Subject::where("subject_id",$data['subject_id'])->first();
           $subject->is_active = 1;
           $subject->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($subject);
   }

    public function deActivate(array $data){
      try{

           $subject = Subject::where("subject_id",$data['subject_id'])->first();
           $subject->is_active = 0;
           $subject->save();
           $product = ProductCatalog::where('subject_id', '=',$data['subject_id'])->update(['is_active' => 0]);
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($subject);
   }

    public function deleteSubject(array $data){
      try{

           $subject = Subject::where ("subject_id",$data['subject_id'])->first();
           $subject->is_deleted = 1;
           $subject->save();
           $product = ProductCatalog::where('subject_id', '=',$data['subject_id'])->update(['is_active' => 0]);
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($subject);
   }

    public function search($data,$user_id){
        try{
             
            $sql = "sub.is_active = 1 and sub.is_deleted = 0 and sub.clnt_id = '".$user_id."' and ( cat.category_name like '%".$data."%' or sub.subject_name like '%".$data."%')" ; 

                //FAQ Code  FAQ Category  Question  Answer  Notes   Keywords           
           
            $faq = DB::table("bl_subject as sub")
            ->whereRaw($sql)
           // ->leftJoin("bl_client as clnt","clnt.clnt_code","=","sub.clnt_id")
            ->leftJoin("bl_category as cat","cat.category_id","=","sub.category_id")
           ->select("sub.*","cat.category_id","cat.category_name")
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
    public function getcol(){
       try{
           //$category = Category::all();
           $subject = Subject::where([['is_deleted',0],['is_active',1]])->get();

           if (is_null($subject))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($subject); 
  }  

  public function getSubjecyByCategoryIdCust(array $data){
        try{
            $subject = Subject::where([['category_id',$data['category_id']],['is_deleted',0],['is_active',1]])
                               
                               -> get();
            if (is_null($subject)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($subject);
  }

  public function getListclient(array $data){
       try{
           

                $subject = DB::table('bl_subject as sub')
                        ->where([['sub.is_deleted',0],['sub.is_active',1],['sub.clnt_id','=',$data['client_id']]]) 
                        ->join('bl_category as cat','sub.category_id','=','cat.category_id')
                        ->select('sub.*','cat.category_description')
                        ->get();

          

           if (is_null($subject))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($subject); 
  }  


} ?>

