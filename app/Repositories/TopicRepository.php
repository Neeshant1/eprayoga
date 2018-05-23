<?php
namespace App\Repositories;
use App\Models\Topic;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCatalog;
use App\Response\GlobalResponse;
use Log;
class TopicRepository
{
    private static  $RECORDS_PER_PAGE =2;

    public function __construct() {
    self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id)
    {
         try {
  
            $topic = new  Topic;
            $data['topic_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.topic_code'));
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;

             $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $user_id;
            $topic->fill($data);
            $topic->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $topic;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        try{
            $data['last_update_user_id'] = $user_profile_id;
             $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $user_id;
            $topic = Topic::where ("topic_id",$data['topic_id'])->first(); 

            if (is_null($topic)){
                return "failed";
            }

            $topic->fill($data);
            $topic->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $topic;
    }

    public function delete(array $data){
        try{
              $topic = Topic::where ("topic_id",$data['topic_id'])->first(); 
            if (is_null($topic)){
                return "failed";
            }
            $topic->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($topic);
    }

    public function deleteAll($user_id,$user_type){
        try{
          if($user_type == 'S'){
            $msg = Topic::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
          }else{
            $msg = Topic::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
          }
          
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll($user_id,$user_type){
        try{

          if($user_type == 'S'){

             $topic = DB::table("bl_topic as top")
             ->where([['top.is_deleted',0],['cat.is_deleted',0],['sub.is_deleted',0],['cat.is_active',1],['sub.is_active',1]]) 
             ->join('bl_category as cat','cat.category_id','=','top.category_id')
             ->join('bl_subject as sub','top.subject_id','=','sub.subject_id')
             ->select('top.*','sub.subject_name','cat.category_name')
             ->simplePaginate(self::$RECORDS_PER_PAGE);


             }else{


              $topic = DB::table("bl_topic as top")
             ->where([['top.is_deleted',0],['cat.is_deleted',0],['sub.is_deleted',0],['cat.is_active',1],['sub.is_active',1],["top.clnt_id","=", $user_id]]) 
             ->join('bl_category as cat','cat.category_id','=','top.category_id')
             ->join('bl_subject as sub','top.subject_id','=','sub.subject_id')
             ->select('top.*','sub.subject_name','cat.category_name')
             ->simplePaginate(self::$RECORDS_PER_PAGE);



             }

             // ->join('bl_client as clnt','top.client_id','=','clnt.clnt_code')
            //$topic = Topic::all();
            //$topic = Topic::where('is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($topic))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($topic);

    }

    // public function getById(array $data){
    //     try{
    //         //$topic = Topic::find($data['topic_id']);
    //       $topic = DB::table("bl_topic as top")
    //          ->where('top.topic_id',$data['topic_id'])
    //          ->join('bl_category as cat','cat.category_id','=','top.category_id')
    //          ->join('bl_subject as sub','top.subject_id','=','sub.subject_id')
    //          ->select('top.*','sub.subject_name','cat.category_name')
    //          ->first();
    //         if (is_null($topic)){
    //             return "failed";
    //         }

    //     }catch(Exception $e){
    //         return GlobalResponse::clientErrorResponse("error");
    //     }

    //     return $topic;
    // }

    public function getById($data){
        try{

            $genp = Topic::find($data['topic_id']);

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

           $topic = Topic::where ("topic_id",$data['topic_id'])->first();
           $topic->is_active = 1;
           $topic->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($topic);
   }

    public function deActivate(array $data){
      try{

           $topic = Topic::where ("topic_id",$data['topic_id'])->first();
           $topic->is_active = 0;
           $topic->save();
           $product = ProductCatalog::where('topic_id', '=',$data['topic_id'])->update(['is_active' => 0]);
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($topic);
   }

    public function deleteTopic(array $data){
      try{

           $topic = Topic::where ("topic_id",$data['topic_id'])->first();
           $topic->is_deleted = 1;
           $topic->save();
           $product = ProductCatalog::where('topic_id', '=',$data['topic_id'])->update(['is_active' => 0]);
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($topic);
   }

   public function search($data,$user_id){
        try{

   
            $sql = "top.is_active = 1 and top.is_deleted = 0 and top.clnt_id= '".$user_id."'and ( top.topic_name like '%".$data."%' or  cat.category_name like '%".$data."%' or  sub.subject_name like '%".$data."%')"; 

           
            $faq = DB::table("bl_topic as top")
            ->whereRaw($sql)
            //->leftJoin("bl_client as clnt","clnt.clnt_code","=","top.client_id")
            ->leftJoin("bl_category as cat","cat.category_id","=","top.category_id")
            ->leftJoin("bl_subject as sub","sub.subject_id","=","top.subject_id")
           ->select("top.*","cat.category_id","cat.category_name","sub.subject_id","sub.subject_name")   
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
  public function getTopicBySubjectId(array $data,$user_id){
        try{
            $topic = Topic::where([['subject_id',$data['subject_id']],['is_deleted',0],['is_active',1]])
                            -> get();
            if (is_null($topic)){
                return "failed";
            }
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($topic);
    }
    public function getcoll(){
       try{
           //$category = Category::all();
           $topic = Topic::where([['is_deleted',0],['is_active',1]])->get();
           Log::info($topic);

           if (is_null($topic))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
      return GlobalResponse::createResponse($topic); 
  }

    public function getListclient(array $data){
      try{
           
        $topic = DB::table('bl_topic as top')
                ->where([['top.is_deleted',0],['top.is_active',1],['top.clnt_id','=',$data['client_id']]]) 
                ->join('bl_category as cat','top.category_id','=','cat.category_id')
                ->join('bl_subject as sub','top.subject_id','=','sub.subject_id')
                ->select('top.*','cat.category_description','sub.sub_description')
                ->get();

          

       if (is_null($topic))
       {
           return "failed";
       }       

      }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($topic);
  }  


} ?>

