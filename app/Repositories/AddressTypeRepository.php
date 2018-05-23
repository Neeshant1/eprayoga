<?php
namespace App\Repositories;
use App\Models\AddressType;
use App\Response\GlobalResponse;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use Log;

class AddressTypeRepository
{
   private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id)
    {
          try {
           

            $data['last_update_user_id'] = $user_profile_id;
            $data['add_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.addres_type_code'));
            $data['created_by_user_id'] = $user_profile_id;

            $add_type = new  AddressType;
            $add_type->fill($data);
            $add_type->save();

        } catch(Exception $e) {
           // DB::rollBack();


            return GlobalResponse::clientErrorResponse("error");
        }
       // DB::commit();

        return GlobalResponse::createResponse($add_type);
    }

    public function update(array $data,$user_profile_id){
        try{
            $data['last_update_user_id'] = $user_profile_id;
            $add_type = AddressType::where ("add_type_id",$data['add_type_id'])->first(); 

            if (is_null($add_type)){
                return "failed";
            }

            $add_type->fill($data);
            $add_type->save();

        }catch(Exception $e){

            return GlobalResponse::clientErrorResponse("error");

        }

        return GlobalResponse::createResponse($add_type);
    }

    public function delete(array $data){
        try{

              $add_type = AddressType::where ("add_type_id",$data['add_type_id'])->first(); 

            if (is_null($add_type)){
                return "failed";
            }

            $add_type->delete();

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($add_type);
    }

     public function deleteAll($user_id){
        try{
            $add_type = AddressType::where([["created_by_user_id",'=',$user_id],['is_deleted', '=', 0]])->update(['is_deleted' => 1]);
                                      
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($add_type);
    }

    public function getAll(){
        try{

                $add_type = DB::table("bl_address_type_master as atm")->where('atm.is_deleted',0)
                //->join('bl_origin_type_master as otm','atm.origin_type_id','=','otm.orig_type_id')
               // ->select('atm.*','otm.orig_type_code','otm.orig_type_name')
                 ->simplePaginate(self::$RECORDS_PER_PAGE);
           

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($add_type);

    }

    public function getById($data){
        try{

            $add_type = AddressType::find($data['add_type_id']);

            if (is_null($add_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($add_type);
    }

    public function activate(array $data){
       try{

           $add_type = AddressType::where ("add_type_id",$data['add_type_id'])->first();
           $add_type->is_active = 1;
           $add_type->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($add_type);
   }

    public function deActivate(array $data){
      try{

           $add_type = AddressType::where ("add_type_id",$data['add_type_id'])->first();
           $add_type->is_active = 0;
           $add_type->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($add_type);
   }

    public function deleteAddressType(array $data){
      try{

           $add_type = AddressType::where ("add_type_id",$data['add_type_id'])->first();
           $add_type->is_deleted = 1;
           $add_type->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($add_type);
   }

   public function search($data){
        try{

                $sql = "add.is_active = 1 and add.is_deleted = 0 and ( add.add_type_name like '%".$data."%')";

        
            $add_type = DB::table("bl_address_type_master as add")
            ->whereRaw($sql)
           ->select("add.*")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($add_type))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($add_type);

    }

    public function selectAddressType(){
        try{
           $add_type = DB::table('bl_address_type_master')
           ->where([['is_deleted',0],['is_active','1']])
           ->select('bl_address_type_master.*')
           ->get();
            if (is_null($add_type))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($add_type);

    }


} ?>
