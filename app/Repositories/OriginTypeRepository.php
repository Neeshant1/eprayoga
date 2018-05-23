<?php
namespace App\Repositories;
use App\Models\OriginType;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use Log;

class OriginTypeRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $origin = new  OriginType;
            $data['orig_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.origin_type_code'));
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $origin->fill($data);
            $origin->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
       
       return GlobalResponse::createResponse($origin);


    }

    public function update(array $data,$user_profile_id){
        try{
    
            $data['last_update_user_id'] = $user_profile_id;
            $origin = OriginType::where ("orig_type_id",$data['orig_type_id'])->first(); 

            if (is_null($origin)){
                return "failed";
            }

            $origin->fill($data);
            $origin->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($origin);
    }

    public function delete(array $data){
        try{
              $origin = OriginType::where ("orig_type_id",$data['orig_type_id'])->first(); 
            if (is_null($origin)){
                return "failed";
            }
            $origin->delete();
        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($origin);
    }

      public function deleteAll(){
         try{
              $origin = OriginType::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($origin);
    }


    public function getAll(){
        try{
          //  $origin = OriginType::all();


             $origin = DB::table("bl_origin_type_master as org")->where('org.is_deleted',0)->select('org.*')->simplePaginate(self::$RECORDS_PER_PAGE);


            if (is_null($origin))
            {
                return "failed";
            }

        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($origin);

    }

    public function getById(array $data){
        try{
            $origin = OriginType::find($data['orig_type_id']);
            if (is_null($origin)){
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($origin);
    }

     public function activate(array $data){
       try{

           $origin = OriginType::where ("orig_type_id",$data['orig_type_id'])->first();
           $origin->is_active = 1;
           $origin->save();
       }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($origin);
   }

    public function deActivate(array $data){
      try{

           $origin = OriginType::where ("orig_type_id",$data['orig_type_id'])->first();
           $origin->is_active = 0;
           $origin->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($origin);
   }

    public function deleteOrigin(array $data){
      try{

           $origin = OriginType::where ("orig_type_id",$data['orig_type_id'])->first();
           $origin->is_deleted = 1;
           $origin->save();
       }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($origin);
   }

   public function search($data){
        try{

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
             $sql = "is_active = 1 and is_deleted = 0 and (orig_type_name like '%".$data."%')";
            //}

           
           // $origin = OriginType::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
              $origin = DB::table("bl_origin_type_master as org")
              ->whereRaw($sql)
              ->select('org.*')
              ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($origin))
            {
                return "failed";
            }

        }catch(Exception $e){
            echo "Something went wrong";
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($origin);

    }

    public function selectOrigin($data){
        try{
           $origin = DB::table('bl_origin_type_master as orign')
           ->where('clnt.clnt_id',$data['orig_type_id'])
           ->join('bl_client as clnt','clnt.orig_type_id','=', 'orign.orig_type_id' )
           ->select('orign.orig_type_name','clnt.orig_type_id')
           ->get();
            if (is_null($origin))
            {
                return "failed";
            }

        }catch(Exception $e){
             return GlobalResponse::clientErrorResponse("error");
        }

      return GlobalResponse::createResponse($origin);

    }

    public function selectOriginType(){
        try{
            $origin = OriginType::where([['is_deleted',0],['is_active',1]]) -> get();

            if (is_null($origin))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($origin);

    }

} ?>

