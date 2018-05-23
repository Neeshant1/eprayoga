<?php
namespace App\Repositories;
use App\Models\SecurityQuestionAnswer;
use App\Models\Address;
use App\Models\ClientGroups;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use Log;
use App\Response\GlobalResponse;


class ClientGroupsRepository
{

    private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
      }

    public function save(array $data,$user_profile_id)
    {
         try {

         
  
            DB::beginTransaction();
            $client_groups = new  ClientGroups;
            $data['clnt_group_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.clnt_group_code'));
            $data['created_by_user_id'] = $user_profile_id;
            $data['last_update_user_id'] = $user_profile_id;
            $client_groups->fill($data);
            $client_groups->save();

            //residential_address
            $residential_address = $data['address_type1'];
             //$residential_address['clnt_group_id'] = $client_groups->clnt_group_id;
            $residential_address['user_id'] = $client_groups->clnt_group_id;
            $residential_address['user_type'] = 'G';
            $address = new Address;
            $residential_address['created_by_user_id'] = $user_profile_id;
           // $residential_address['user_id'] = '1';
           // $residential_address['user_type'] = 'a';
            $residential_address['last_update_user_id'] = $user_profile_id;
            $address->fill($residential_address);
            $address->save();  

            // //billing_address
            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $client_groups->clnt_group_id;
            $billing_address['user_type'] = 'G';    
            $billingAddress = new Address;
            $billing_address['created_by_user_id'] = $user_profile_id;
            $billing_address['last_update_user_id'] = $user_profile_id;
            //$billing_address['user_id'] = '1';
           // $billing_address['user_type'] = 'a';
            $billingAddress->fill($billing_address);
            $billingAddress->save();  

            // //security qus
            $security_qus = $data['security-qus'];
            $security_qus['user_id'] = $client_groups->clnt_group_id;
            $security_qus['user_type'] = 'G';        
            $sec_qus = new SecurityQuestionAnswer;
            $security_qus['created_by_user_id'] = $user_profile_id;
            $security_qus['last_update_user_id'] = $user_profile_id;
           // $security_qus['user_id'] = '1';
           // $security_qus['user_type'] = 'a';
            $sec_qus->fill($security_qus);
            $sec_qus->save();


            //Sending mail when updating the groups 
    //  $to_email = array($data['clnt_group_off_email_id']);
      //      $sub="ClientGroup   successfully Created";
      //      print_r($to_email);
      //      BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub);


        } catch(Exception $e) {
             DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        return GlobalResponse::createResponse($client_groups);
    }

    public function update(array $data){
        try{
        
              
             $address1 = $data['address_type1']['address_id'];
          $address2 = $data['address_type2']['address_id'];
            DB::beginTransaction();

            $client_groups = ClientGroups::where ("clnt_group_id",$data['clnt_group_id'])->first(); 
            if($client_groups != null){
                $client_groups->fill($data);
                $client_groups->save();

               //residential_address
                $residential_address = $data['address_type1'];
                $residential_address['user_id'] = $client_groups->clnt_group_id;
                $residential_address['user_type'] = 'G';
                $address = Address::where ("user_id",$data['clnt_group_id'])
                                  ->where ("address_id",$address1)
                                  ->first();
                $address->fill($residential_address);
                $address->save();  

                //billing_address
                $billing_address = $data['address_type2'];
                $billing_address['user_id'] = $client_groups->clnt_group_id;
                $billing_address['user_type'] = 'G'; 
                $billingAddress = Address::where ("user_id",$data['clnt_group_id'])
                                 ->where ("address_id",$address2)
                                 ->first();
                $billingAddress->fill($billing_address);
                $billingAddress->save();  

                //security qus
                $security_qus = $data['security-qus'];
                $security_qus['user_id'] = $client_groups->clnt_group_id;
                $security_qus['user_type'] = 'G';         
                $sec_qus = SecurityQuestionAnswer::where ("user_id",$data['clnt_group_id'])->first();
                $sec_qus->fill($security_qus);
                $sec_qus->save();
                
               //Sending mail when updating the groups 
              // $to_email = array($data['clnt_group_off_email_id']);
              // $sub="ClientGroup  information successfully updated";
              // print_r($to_email);
              // BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub);


            }
            

        }catch(Exception $e){
             DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        return GlobalResponse::createResponse($client_groups);
    }

    public function delete(array $data){
        try{

            DB::beginTransaction();
            $client_groups = ClientGroups::where ("clnt_group_id",$data['clnt_group_id'])->update(['is_deleted' => 1]); 
            //residential_address
            $address = Address::where ("user_id",$data['clnt_group_id'])->update(['is_deleted' => 1]);
           
            $security_qus = SecurityQuestionAnswer::where ("user_id",$data['clnt_group_id'])->update(['is_deleted' => 1]);

           // $client_groups->delete();
        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
         DB::commit();
       return GlobalResponse::createResponse($client_groups);
    }

    public function getAll(){
        try{
          
            
            $result = DB::table("bl_client_group as clntgroup")->where('clntgroup.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($result);
    }

       

    public function getById(array $data){
        try{
            $client_groups = ClientGroups::where('clnt_group_id',$data['clnt_group_id'])->first();
            //$client_groups['user_type'] = 'G';

           if( ! is_null($client_groups )){
                $client_groups['address'] = DB::table('bl_address as add')
                ->where ([["add.user_id",$data['clnt_group_id']],['add.user_type','=','G']])
                ->leftJoin('bl_address_type_master as atm','atm.add_type_id','=','add.add_type_id')
                ->leftJoin('bl_zone_area_master as zone','zone.zone_area_id','=','add.zone_id')
                ->leftJoin('bl_country_master as cou','cou.country_id','=','add.country_id')
                ->leftJoin('bl_state_master as state','state.state_id','=','add.state_id')
                ->leftJoin('bl_city_master as city','city.city_id','=','add.city_id')
                ->select('add.*','zone.zone_name','cou.country_full_name','state.state_full_name','city.city_full_name','atm.add_type_name')
                ->get(); 
      
                $client_groups['security_qus']= DB::table("bl_cust_scrtyqtn_ans as csa")
                ->where([['csa.user_id',$data['clnt_group_id']],['csa.user_type','=','G']])
                ->join('bl_security_questions_master as sqm','csa.question_id','=','sqm.question_id')
                ->select('csa.*','sqm.question_name')
                ->first();

           }else{
                return "no data found";
           }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_groups);
    }

    public function activate(array $data){
       try{

           $client_groups = ClientGroups::where ("clnt_group_id",$data['clnt_group_id'])->first();
           $client_groups->is_active = 1;
           $client_groups->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($client_groups);
    }

    public function deActivate(array $data){
      try{

           $client_groups = ClientGroups::where ("clnt_group_id",$data['clnt_group_id'])->first();
           $client_groups->is_active = 0;
           $client_groups->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($client_groups);
   }

    public function deleteClientGroup(array $data){
      try{

            DB::beginTransaction();
            
            $client_groups = ClientGroups::where ("clnt_group_id",$data['clnt_group_id'])-> update(['is_deleted' => 1]);
            //residential_address
            $address = Address::where ("user_id",$data['clnt_group_id'])->update(['is_deleted' => 1]);
           
            $security_qus = SecurityQuestionAnswer::where ("user_id",$data['clnt_group_id'])->update(['is_deleted' => 1]);

        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        return GlobalResponse::createResponse($client_groups);
   }


       public function selectClientGroup(){
        try{
           $client_groups = DB::table('bl_client_group')->where([
                                  ['is_active',1],
                                  ['is_deleted',0],
                                  ])->get();
            if (is_null($client_groups))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_groups);

    }

   public function search($data){
        try{

                $sql = "is_deleted = 0 and (clntg.clnt_group_name like '%".$data."%' or 
                  clntg.clnt_group_contact_person_first_name like '%".$data."%' or 
                  clntg.user_type_id like '%".$data."%' or clntg.clnt_group_contact_person_off_phone like '%".$data."%')";
           
           
        $client_groups = DB::table("bl_client_group as clntg")
            ->whereRaw($sql)

            ->select("clntg.clnt_group_name","clntg.is_active","clntg.clnt_group_contact_person_first_name","clntg.user_type_id","clntg.clnt_group_contact_person_off_phone")   

            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($client_groups))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($client_groups);
    }

   public function deleteAll(){
        try{

            $msg = ClientGroups::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
          //  $address = Address::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
        //    $security_qus = SecurityQuestionAnswer::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($msg);
    }


 }
?>

