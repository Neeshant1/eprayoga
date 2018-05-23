<?php
namespace App\Repositories;
use App\Models\Category;
use App\Models\ProductCatalog;
use Illuminate\Support\Facades\DB;
use Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
class CategoryRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

   public function save(array $data,$user_profile_id,$user_id,$clnt_group_id)
   {
        try {
 
           $data['category_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.category_code'));
           $data['clnt_group_id'] = $clnt_group_id;
           $data['clnt_id'] = $user_id;
           $data['last_update_user_id'] = $user_profile_id;
           $data['created_by_user_id'] = $user_profile_id;

         //  $data['clnt_id'] = '1';
           $category = new  Category;
           $category->fill($data);
           $category->save();
           
       } catch(Exception $e) {           
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($category);
   }   
    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
       try{
       
           $data['clnt_group_id'] = $clnt_group_id;
           $data['clnt_id'] = $user_id;
           $data['last_update_user_id'] = $user_profile_id;
           $category = Category::where ('category_id',$data['category_id'])->first();         
              if (is_null($category)){
               return "failed";
           }           
            $category->fill($data);
           $category->save();       
            }
            catch(Exception $e){
                return GlobalResponse::clientErrorResponse("error");
            }       
        return GlobalResponse::createResponse($category);
   }   
    public function delete(array $data){
       try{
             $category = Category::where ("category_id",$data['category_id'])->first();
           if (is_null($category)){
               return "failed";
           }
           $category->delete();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }       
        return GlobalResponse::createResponse($category);
   }   

    public function deleteAll($user_id,$user_type){
         try{
          if($user_type == 'S'){
                $msg = Category::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
          }else{
              $msg = Category::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
          }
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    } 


   public function getAll($user_id,$user_type){
       try{
          
        if($user_type == 'S'){

            $category = DB::table("bl_category as cg")
                        ->where('is_deleted',0)
                        ->simplePaginate(self::$RECORDS_PER_PAGE);

         }else{

                         $category = DB::table("bl_category as cg")
                        ->where([['is_deleted',0],["cg.clnt_id","=",$user_id]])
                        ->simplePaginate(self::$RECORDS_PER_PAGE);
            }

           if (is_null($category))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        

       return GlobalResponse::createResponse($category);
  }   

  public function getList($user_id,$user_type){
       try{

           if($user_type == 'S'){

            $category = Category::where([['is_deleted',0],['is_active',1]])-> get();
                 

           }else{

            $category = Category::where([['is_deleted',0],['is_active',1]])
                                ->where("clnt_id","=",$user_id)
                                -> get();

           }

           
          

           if (is_null($category))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($category);
  } 

  public function getListclient(array $data){
       try{
           
            $category = Category::where([['is_deleted',0],['is_active',1]])
                                ->where("clnt_id","=",$data['client_id'])
                                -> get();


           if (is_null($category))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($category); 
  }  

   public function getById(array $data){
       try{
           $category = Category::find($data['category_id']);
           if (is_null($category)){
               return "failed";
           }        }
           catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }      
         return GlobalResponse::createResponse($category);
   }
   //balaji
   public function deleteCategory(array $data){
     try{            

          $category = Category::where ("category_id",$data['category_id'])->first();
          $category->is_deleted = 1;
          $category->save();
          $product = ProductCatalog::where('category_id', '=',$data['category_id'])->update(['is_active' => 0]);
      }catch(Exception $e){
         return GlobalResponse::clientErrorResponse("error");
      }
      return GlobalResponse::createResponse($category);
  }   
   public function activate(array $data){
      try{         
          $category = Category::where ("category_id",$data['category_id'])->first();
          $category->is_active = 1;
          $category->save();
      }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
      }
      return GlobalResponse::createResponse($category);
  }    
  public function deActivate(array $data){
     try{        
          $category = Category::where ("category_id",$data['category_id'])->first();
          $category->is_active = 0;
          $category->save();
           $product = ProductCatalog::where('category_id', '=',$data['category_id'])->update(['is_active' => 0]);
      }catch(Exception $e){
         return GlobalResponse::clientErrorResponse("error");
      }
      return GlobalResponse::createResponse($category);
  }

   public function search($data,$user_id){
        try{

           $sql = "cat.is_deleted = 0 and (cat.category_name like '%".$data."%' ) and cat.  clnt_id='".$user_id."'";
       
           $category = DB::table("bl_category as cat")
           ->whereRaw($sql)
           ->leftJoin("bl_client as clnt","clnt.clnt_code","=","cat.clnt_id")
          ->select("cat.*","clnt.clnt_name")   
           ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($category))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($category);

    }

    public function getListCust(){
       try{
           //$category = Category::all();
           $category = Category::where([['is_deleted',0],['is_active',1]])
                                -> get();
          

           if (is_null($category))
           {
               return "failed";
           }       

         }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($category);
  }   
}

 ?>