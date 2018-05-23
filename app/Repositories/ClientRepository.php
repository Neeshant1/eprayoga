<?php
namespace App\Repositories;
use App\Models\Client;
use App\Models\UserProfile;
use App\Models\Employee;
use App\Models\SecurityQuestionAnswer;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Mail;
use Log;
use App\Models\MainSend;

class ClientRepository
{
    private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
      }
      
    public function save(array $data,$user_profile_id)
    {
         try {
             
            DB::beginTransaction();
            $userProfilesdefn = UserProfile::where([['user_login_id','=',$data['clnt_off_email_id']],['is_deleted', '=', 0],['is_active', '=' , 1]])->get();
            $test = count($userProfilesdefn);
            // $errorarray = array();
            // array_push($errorarray, $data['clnt_off_email_id']);

        if($test <= 0){

            $client = new Client;
            $data['clnt_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.client_code'));
            $data['created_by_user_id'] = $user_profile_id;
            $data['last_update_user_id'] = $user_profile_id;
            $client->fill($data);
            $client->save();

            $user_profile['user_login_id'] = $client->clnt_off_email_id;
            $user_profile['user_login_password'] = bcrypt('eprayoga');

            $user_profile['user_id'] = $client->client_id;
            $user_profile['user_type'] = 'T';
            $user_profile['encrypted'] = 'A';
            $user_profile['acctlock'] = 'A';
            $user_profile['created_by_user_id'] = $user_profile_id;
            $user_profile['last_update_user_id'] = $user_profile_id;
            $user_profile['clnt_group_id'] = $client->clnt_group_id;
            $user = new UserProfile; 
            $user['session_id'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.client_code'));
            $user->fill($user_profile);
            $user->save(); 

            $email_id = $user->user_login_id;
            $token = $user->session_id;
            $user = $user->user_profile_id;
            $name = $client->clnt_contact_person_first_name." ".$client->clnt_contact_person_last_name;

            // Mail::send('welcome_mail', ['user_login_id' => $email_id, 'session_id' => $token,'username'=> $name], function ($m) use ($email_id) {
            //     $m->from('vahaitesting@gmail.com', 'ePrayoga');
            //     $m->to($email_id)->subject('Welcome to Eprayoga');
            //   });

            $sendmail = new MainSend;
            $sendmail['email_id']=$email_id;
            $sendmail['type']='registration';
            $sendmail['template']=view('welcome_mail',['session_id' => $token,'username'=> $name]);
            $sendmail->save();


            //residential_address
            $residential_address = $data['address_type1'];
            $residential_address['user_id'] = $client->client_id;
            $residential_address['user_type'] = 'T';
            $residential_address['clnt_group_id'] = $client->clnt_group_id;
            $address = new Address;
            $residential_address['created_by_user_id'] = $user_profile_id;
            $residential_address['last_update_user_id'] = $user_profile_id;
            $address->fill($residential_address);
            $address->save();  


            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $client->client_id;
            $billing_address['clnt_group_id'] = $client->clnt_group_id;
            $billing_address['user_type'] = 'T';  
            $billingAddress = new Address;
            $billing_address['created_by_user_id'] = $user_profile_id;
            $billing_address['last_update_user_id'] = $user_profile_id;
            $billingAddress->fill($billing_address);
            $billingAddress->save();  

            $security_qus = $data['security-qus'];
            $security_qus['user_id'] = $client->client_id;
            $security_qus['user_type'] = 'T';         
            $sec_qus = new SecurityQuestionAnswer;
            $security_qus['created_by_user_id'] = $user_profile_id;
            $security_qus['last_update_user_id'] = $user_profile_id;
            $sec_qus->fill($security_qus);
            $sec_qus->save();

        }else{
            return GlobalResponse::clientErrorResponse((array("emailmsg"=>$data['clnt_off_email_id'])));
        }
          


        } catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        
        $mailvalue['message'] = 'create';
        $mailvalue['id'] = $sendmail->id;
        return GlobalResponse::createResponse($mailvalue);
    }

    public function update(array $data){
        try{
            
            $address1 = $data['address_type1']['address_id'];
            $address2 = $data['address_type2']['address_id'];
            DB::beginTransaction();

            $client = Client::where ("client_id",$data['client_id'])->first(); 
            $client->fill($data);
            $client->save();

            //residential_address
            $residential_address = $data['address_type1'];

            $residential_address['user_id'] = $client->client_id;
            $residential_address['user_type'] = 'T';
            $address = Address::where ("user_id",$data['client_id'])
                              ->where ("address_id",$address1)
                              ->first();
            $address->fill($residential_address);
            $address->save();  

            //billing_address
            $billing_address = $data['address_type2'];

            $billing_address['user_id'] = $client->client_id;
            $billing_address['user_type'] = 'T';     
            $billingAddress = Address::where ("user_id",$data['client_id'])
                                     ->where ("address_id",$address2)
                                     ->first();
            $billingAddress->fill($billing_address);
            $billingAddress->save();  

            //security qus
            $security_qus = $data['security-qus'];
           $security_qus['user_id'] = $client->client_id; 
            $security_qus['user_type'] = 'T';          
            $sec_qus = SecurityQuestionAnswer::where ([["user_id",$data['client_id']],["user_type","T"]])->first();
            $sec_qus->fill($security_qus);
            $sec_qus->save();

            //For sending mail  for updation
            // $to_email = array($data['clnt_off_email_id']);
            // $sub="Client update successfully completed";
            // print_r($to_email);
            // BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub);


        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        $client['message'] = 'update';
        return GlobalResponse::createResponse($client);
    }

    
    public function deleteAll(){
        try{

            $msg = Client::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            $msg = UserProfile::where([['is_deleted', '=', 0],['user_type','T']])->update(['is_deleted' => 1]);
            $msg = SecurityQuestionAnswer::where([['is_deleted', '=', 0],['user_type','T']])->update(['is_deleted' => 1]);
            $msg = Address::where([['is_deleted', '=', 0],['user_type','T']])->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($msg);
    }

    public function getAll($user_id,$user_type){
 
        try {
        if($user_type == 'S'){

          $result = DB::table("bl_client as clnt")
          ->where('clnt.is_deleted',0)
          ->simplePaginate(self::$RECORDS_PER_PAGE);


        }else{
            
          $result = DB::table("bl_client as clnt")
          ->where('clnt.is_deleted',0)
          ->where('clnt.client_id','=',$user_id)
          ->simplePaginate(self::$RECORDS_PER_PAGE);


        }
        
       

        } catch(Exception $e) {
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($result);

    }

    public function getById(array $data){
        try{
           
           $client = Client::where('client_id',$data['client_id'])->first();
           if( ! is_null($client )){
                    $client['address'] = DB::table('bl_address as add')
                    ->ORwhere ([["add.user_id",$data['client_id']],['add.user_type','=','S']])
                    ->ORwhere ([["add.user_id",$data['client_id']],['add.user_type','=','T']])
                    ->leftJoin('bl_address_type_master as atm','atm.add_type_id','=','add.add_type_id')
                    ->leftJoin('bl_zone_area_master as zone','zone.zone_area_id','=','add.zone_id')
                    ->leftJoin('bl_country_master as cou','cou.country_id','=','add.country_id')
                    ->leftJoin('bl_state_master as state','state.state_id','=','add.state_id')
                    ->leftJoin('bl_city_master as city','city.city_id','=','add.city_id')
                    ->select('add.*','zone.zone_name','cou.country_full_name','state.state_full_name','city.city_full_name','atm.add_type_name')
                    ->get(); 
      
             $client['security_qus']= DB::table("bl_cust_scrtyqtn_ans as csa")
                ->where('csa.user_id',$data['client_id'])
                 ->join('bl_security_questions_master as sqm','csa.question_id','=','sqm.question_id')
                 ->select('csa.*','sqm.question_name')
                 ->first();

           }else{
                return "no data found";
           }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($client);
    }

    public function activate(array $data,$user_id,$user_type){
       try{

           $client = Client::where ("clnt_code",$data['clnt_code'])->update(['is_active' => 1]);
           // $client->is_active = 1;
           // $client->save();
           $Employee = Employee::where ("clnt_id",$data['client_id'])->update(['is_active' => 1]);

           $user =  UserProfile::where ([["user_id",$data['client_id']],['user_type','=','T']])
                               ->oRwhere([["clnt_id",$data['client_id']],['user_type','=','E']])
                               ->update(['is_active' => 1]);
            // $user->is_active = 1; 
            // $user->save(); 
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($client);
    }

    public function deActivate(array $data,$user_id,$user_type){
      try{
          
           $client = Client::where ("clnt_code",$data['clnt_code'])->update(['is_active' => 0]);
           // $client->is_active = 0;
           // $client->save();
            $Employee = Employee::where ("clnt_id",$data['client_id'])->update(['is_active' => 0]);
           // $client->is_active = 0;
           // $client->save();
           $user = UserProfile::where ([["user_id",$data['client_id']],['user_type','=','T']])
                               ->oRwhere([["clnt_id",$data['client_id']],['user_type','=','E']])
                               ->update(['is_active' => 0]);
            // $user->is_active = 0; 
            // $user->save(); 
            
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
        return GlobalResponse::createResponse($client);
   }

    public function deleteClient(array $data){
      try{

            DB::beginTransaction();
            
            $clientone = Client::where ("client_id",$data['client_id'])-> update(['is_deleted' => 1]);
            //residential_address
            $address = Address::where ([["user_id",$data['client_id']],["user_type","T"]])->update(['is_deleted' => 1]);
           
            $security_qus = SecurityQuestionAnswer::where ([["user_id",$data['client_id']],["user_type","T"]])->update(['is_deleted' => 1]);
             
             $client = UserProfile::where ([["user_id",$data['client_id']],["user_type","T"]])
                        ->update(['is_deleted' => 1]);
            //For sending mail When client deleted
            /* $to_email = array($data['clnt_off_email_id']);
            $sub="Client Deleted successfully completed";
            print_r($to_email);
            BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub);*/


        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        return GlobalResponse::createResponse($client);
   }

   public function search($data){
        try{
          
                $sql = "is_active = 1 and is_deleted = 0 and ( clnt_name like '%".$data."%' or clnt_contact_person_first_name like '%".$data."%' or clnt_contact_person_off_phone like '%".$data."%' )";

              
            $aws = Client::whereRaw($sql)
        ->simplePaginate(self::$RECORDS_PER_PAGE);
           // ->get();
            if (is_null($aws))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($aws);

    }

    public function getClientId($user_id,$user_type){
        try{


            if($user_type == 'S'){

          $result = DB::table("bl_client as clnt")
          ->where('clnt.is_deleted',0)
          ->get();


        }else{
            
          $result = DB::table("bl_client as clnt")
          ->where('clnt.is_deleted',0)
          ->where('clnt.client_id','=',$user_id)
          ->get();


        }
            

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($result);

    }

    public function save1(array $data)
    {
     
         try {
             
            DB::beginTransaction();

             $userProfilesdefn = UserProfile::where([['user_login_id','=',$data['clnt_off_email_id']],['is_deleted', '=', 0],['is_active', '=' , 1]])->get();
             $test = count($userProfilesdefn);
             $errorarray = array();
             array_push($errorarray, $data['clnt_off_email_id']);

            if($test <= 0){
            $client = new Client;
            $data['clnt_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.client_code'));
            $data['created_by_user_id'] = 1;
            $data['last_update_user_id'] = 1;
            $client->fill($data);
            $client->save();

            $user_profile['user_login_id'] = $client->clnt_off_email_id;
            $user_profile['user_login_password'] = bcrypt('eprayoga');

            $user_profile['user_id'] = $client->client_id;
            $user_profile['user_type'] = 'T';
            $user_profile['encrypted'] = 'A';
            $user_profile['acctlock'] = 'A';
            $user_profile['created_by_user_id'] = 1;
            $user_profile['last_update_user_id'] = 1;
            $user_profile['clnt_group_id'] = $client->clnt_group_id;
            $user = new UserProfile; 
            $user['session_id'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.client_code'));
            $user->fill($user_profile);
            $user->save(); 
            $email_id = $user->user_login_id;
            $token = $user->session_id;
            $user = $user->user_profile_id;
            $name = $client->clnt_contact_person_first_name." ".$client->clnt_contact_person_last_name;

            // Mail::send('welcome_mail', ['user_login_id' => $email_id, 'session_id' => $token,'username'=> $name], function ($m) use ($email_id) {
            //     $m->from('vahaitesting@gmail.com', 'ePrayoga');
            //     $m->to($email_id)->subject('Welcome to Eprayoga');
            //   });

            $sendmail = new MainSend;
            $sendmail['email_id']=$email_id;
            $sendmail['type']='registration';
            $sendmail['template']=view('welcome_mail',['session_id' => $token,'username'=> $name]);
            $sendmail->save();


            //residential_address
            $residential_address = $data['address_type1'];
            $residential_address['user_id'] = $client->client_id;
            $residential_address['user_type'] = 'T';
            $address = new Address;
            $residential_address['created_by_user_id'] = 1;
            $residential_address['last_update_user_id'] = 1;
            $address->fill($residential_address);
            $address->save();  

            //billing_address
            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $client->client_id;
            $billing_address['user_type'] = 'T';  
            $billingAddress = new Address;
            $billing_address['created_by_user_id'] = 1;
            $billing_address['last_update_user_id'] = 1;
            $billingAddress->fill($billing_address);
            $billingAddress->save();  

            //security qus
            $security_qus = $data['security-qus']; 
            $security_qus['user_id'] = $client->client_id; 
            $security_qus['user_type'] = 'T';         
            $sec_qus = new SecurityQuestionAnswer;
            $security_qus['created_by_user_id'] = 1;
            $security_qus['last_update_user_id'] = 1;
            $sec_qus->fill($security_qus);
            $sec_qus->save();
        }else{
            return GlobalResponse::clientErrorResponse((array("emailmsg"=>$data['clnt_off_email_id'])));
        }


        } catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        

        $mailvalue['message'] = 'create';
        $mailvalue['id'] = $sendmail->id;
        return GlobalResponse::createResponse($mailvalue);
    }


    public function getEnroll(){
     
     try{
            $client = DB::table('bl_client')
            ->count();
        
            if (is_null($client))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($client);

    }



} ?>

