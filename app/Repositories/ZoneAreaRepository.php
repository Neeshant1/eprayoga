<?php
namespace App\Repositories;
use App\Models\ZoneArea;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class ZoneAreaRepository
{
   private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
         try {
  
            $data['last_update_user_id'] = $user_profile_id;
            $data['zone_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.zone_code'));
            $data['created_by_user_id'] = $user_profile_id;

            $zone_area = new  ZoneArea;
            $zone_area->fill($data);
            $zone_area->save();
        } catch(Exception $e) {

           return GlobalResponse::clientErrorResponse("error");
        }
         return $zone_area;
    }

    public function update(array $data,$user_profile_id){
        try{
       
            $zone_area = ZoneArea::where ("zone_area_id",$data['zone_area_id'])->first(); 
            $data['created_by_user_id'] = $user_profile_id;
            if (is_null($zone_area)){
                return "failed";
            }

            $zone_area->fill($data);
            $zone_area->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

          return $zone_area;
    }

    public function delete(array $data){
        try{
              $zone_area = ZoneArea::where ("zone_area_id",$data['zone_area_id'])->first(); 
            if (is_null($zone_area)){
                return "failed";
            }
            $zone_area->delete();
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($zone_area);
    }

      public function deleteAll(){
         try{
              $msg = ZoneArea::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }

    public function getAll(){
        try{
            //$zone_area = ZoneArea::all();


             $zone_area = DB::table("bl_zone_area_master as zm")->where('zm.is_deleted',0)->select('zm.*')->simplePaginate(self::$RECORDS_PER_PAGE);


            if (is_null($zone_area))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($zone_area);

    }

    public function getById(array $data){
        try{
            $zone_area = ZoneArea::find($data['zone_area_id']);
            if (is_null($zone_area)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($zone_area);
    }

     public function activate(array $data){
       try{

           $zone_area = ZoneArea::where ("zone_area_id",$data['zone_area_id'])->first();
           $zone_area->is_active = 1;
           $zone_area->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($zone_area);
   }

    public function deActivate(array $data){
      try{

           $zone_area = ZoneArea::where ("zone_area_id",$data['zone_area_id'])->first();
           $zone_area->is_active = 0;
           $zone_area->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($zone_area);
   }

    public function deleteZone(array $data){
      try{

           $zone_area = ZoneArea::where ("zone_area_id",$data['zone_area_id'])->first();
           $zone_area->is_deleted = 1;
           $zone_area->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($zone_area);
   }

    public function selectZone(){
        try{
           $zone_area = DB::table('bl_zone_area_master')->where([
                                  ['is_active',1],
                                  ['is_deleted',0],
                                  ])->get();
            if (is_null($zone_area))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($zone_area);

    }
    public function search($data){
        try{

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
                 $sql = "is_active = 1 and is_deleted = 0 and ( zone_name like '%".$data."%')";
            //}


                //$zone_area = ZoneArea::where($sql)->get();
           
           $zone_area = ZoneArea::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($zone_area))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($zone_area);

    }

} ?>

