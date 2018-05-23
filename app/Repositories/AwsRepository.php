<?php
namespace App\Repositories;
use App\Models\Aws;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use Log;

class AwsRepository{
      private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
      }
    public function save(array $data,$user_profile_id) {
        try {
            // $query = "insert into bl_aws_s3_master(aws_s3_id,aws_access_key_id,aws_secret_access_key,s3_bucket_name,s3_url,used_for,is_active,created_by_user_id,last_update_user_id) values (?,?,?,?,?,?,?,?,?)";

            // $result = DB::insert($query,[$data['aws_s3_id'],$data['aws_access_key_id'],$data['aws_secret_access_key'],$data['s3_bucket_name'],$data['s3_url'],$data['used_for'],$data['is_active'],$data['created_by_user_id'],$data['last_update_user_id']]);
           
           $aws = new Aws;
          
           $data['last_update_user_id'] = $user_profile_id;
           $data['created_by_user_id'] = $user_profile_id;
           $aws->fill($data);
           $aws->save();


        } catch(Exception $e) {
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($aws);
   }

    public function update(array $data){

      try{
         
            $aws = Aws::where ("aws_s3_master_id",$data['aws_s3_master_id'])->first(); 

            if (is_null($aws)){
                return "failed";
            }

            $aws->fill($data);
            $aws->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($aws);
    }

    public function delete($data){

    try {
        $query = "delete from bl_aws_s3_master where aws_s3_master_id=?";

        $value_array = [$data['aws_s3_master_id']];
        
        $result = DB::delete($query,$value_array);

        } catch(Exception $e) {
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($result);

    }

  public function deleteAll(){
        try{
            $msg = Aws::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try {
        //$query = "select * from bl_aws_s3_master";
        
        $result = DB::table("bl_aws_s3_master as aws")->where('aws.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);

        } catch(Exception $e) {
           return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($result);
    }

    public function getById($data){
      
    try{
            $aws = Aws::find($data['aws_s3_master_id']);
            
            if (is_null($aws)){
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($aws);

    }

    public function activate(array $data){
       try{

           $aws = Aws::where ("aws_s3_master_id",$data['aws_s3_master_id'])->first();
           $aws->is_active = 1;
           $aws->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($aws);
    }

    public function deActivate(array $data){
      try{

           $aws = Aws::where ("aws_s3_master_id",$data['aws_s3_master_id'])->first();
           $aws->is_active = 0;
           $aws->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($aws);
   }

    public function deleteAws(array $data){
      try{

           $aws = Aws::where ("aws_s3_master_id",$data['aws_s3_master_id'])->first();
           $aws->is_deleted = 1;
           $aws->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($aws);
   }

   public function search($data){
        try{

                $sql = "is_active = 1 and is_deleted = 0 and ( aws_s3_id like '%".$data."%' or aws_access_key_id like '%".$data."%' or aws_secret_access_key like '%".$data."%' or s3_bucket_name like '%".$data."%' or s3_url like '%".$data."%' )";

           
            $aws = Aws::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($aws))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($aws);

    }

} ?>

