<?php
namespace App\Repositories;
use App\Models\Customers;
use App\Models\UserProfile;
use App\Models\Education;
use App\Models\SecurityQuestionAnswer;
use App\Models\Address;
use App\Models\Employee;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;
use Mail;
use App\Mail\Reminder;
use Log;
use App\Models\MainSend;

class CustomersRepository
{
     private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
      }
    public function save(array $data,$user_profile_id)
    {

         try {

             DB::beginTransaction();
            $userProfilesdefn = UserProfile::where([['user_login_id','=',$data['cust_per_emai_id']],['is_deleted', '=', 0],['is_active', '=' , 1]])->get();
            $testcust = count($userProfilesdefn);
            // $errorarray = array();
            // array_push($errorarray, $data['cust_per_emai_id']);

        if($testcust <= 0){
  
            $customers = new  Customers;
            $data['cust_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.customer_code'));
            $customers->fill($data);
            $customers->save();

            $user_profile['user_login_id'] = $customers->cust_per_emai_id;
            $user_profile['user_login_password'] = bcrypt('eprayoga');

            $user_profile['user_id'] = $customers->customer_id;
            $user_profile['user_type'] = 'C';
            $user_profile['encrypted'] = 'A';
            $user_profile['acctlock'] = 'A';
            $user_profile['created_by_user_id'] = $user_profile_id;
            $user_profile['last_update_user_id'] = $user_profile_id;
            $user = new UserProfile; 
            $user['session_id'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.customer_code'));
            $user->fill($user_profile);
            $user->save(); 

            $email_id = $user->user_login_id;
            $token = $user->session_id;
            $user = $user->user_profile_id;
            $name = $customers->cust_first_name." ".$customers->cust_last_name;

        // Mail::send('welcome_mail', ['user_login_id' => $email_id, 'session_id' => $token,'username'=> $name], function ($m) use ($email_id) {
        //         $m->from('vahaitesting@gmail.com', 'ePrayoga');
        //         $m->to($email_id)->subject('Welcome to Eprayoga');
        //       });

            $sendmail = new MainSend;
            $sendmail['email_id']=$email_id;
            $sendmail['type']='registration';
            $sendmail['template']=view('welcome_mail',['session_id' => $token,'username'=> $name]);
            $sendmail->save();

            $residential_address = $data['address_type1'];
            $residential_address['user_id'] = $customers->customer_id;
            $residential_address['user_type'] = 'C';
            $address = new Address;
            $address->fill($residential_address);
            $address->save(); 

            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $customers->customer_id; 
            $billing_address['user_type'] = 'C';   
            $billingAddress = new Address;
            $billingAddress->fill($billing_address);
            $billingAddress->save();  


            $education = $data['education'];
            $education['cust_id'] = $customers->customer_id;        
            $edu = new Education;
            $education['edu_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.education_code'));
            $edu->fill($education);
            $edu->save();

            $security_qus = $data['security-qus'];
            $security_qus['user_id'] = $customers->customer_id; 
            $security_qus['user_type'] = 'C';       
            $sec_qus = new SecurityQuestionAnswer;
            $sec_qus->fill($security_qus);
            $sec_qus->save();
        }else{
             return GlobalResponse::clientErrorResponse((array("emailmsg"=>$data['cust_per_emai_id'])));
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
             
            DB::beginTransaction();

            $address1 = $data['address_type1']['address_id'];
            $address2 = $data['address_type2']['address_id'];

            $customers = Customers::where ("customer_id",$data['customer_id'])->first(); 
            $customers->fill($data);
            $customers->save();

            //residential_address
            $residential_address = $data['address_type1'];
      
            $residential_address['user_id'] = $customers->customer_id;
            $residential_address['user_type'] = 'C';
            $address = Address::where ("user_id",$data['customer_id'])
                              ->where ("address_id",$address1)
                              ->first();
            $address->fill($residential_address);
            $address->save();  

          
            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $customers->customer_id; 
            $billing_address['user_type'] = 'C';   
            $billingAddress = Address::where ("user_id",$data['customer_id'])
                                     ->where ("address_id",$address2)
                                     ->first();
            $billingAddress->fill($billing_address);
            $billingAddress->save();  

            //for education   
            $education = $data['education'];
            $education['cust_id'] = $customers->customer_id;       
            $edu = Education::where ("cust_id",$data['customer_id'])->first();
            $edu->fill($education);
            $edu->save();

            //security qus
            $security_qus = $data['security-qus']; 
            $security_qus['user_id'] = $customers->customer_id; 
            $security_qus['user_type'] = 'C';          
            $sec_qus = SecurityQuestionAnswer::where ([["user_id",$data['customer_id']],["user_type","C"]])->first();
            $sec_qus->fill($security_qus);
            $sec_qus->save();

           //For sending mail added by palanikumar
           //We need a public ip with email configuration 
           //To Enable mail sending Feature

            // $to_email = array($data['cust_per_emai_id'], $data['cust_off_email_id']);
            // print_r($to_email);
            // $sub="Data successfully updated";
            // BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub );


        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();

        $customers['message'] = 'update';
         return GlobalResponse::createResponse($customers);
    }

    public function delete(array $data){
        try{
            DB::beginTransaction();

            $customers = Customers::where ("customer_id",$data['customer_id'])-> update(['is_deleted' => 1]);
            //residential_address
            $address = Address::where ([["user_id",$data['customer_id']],["user_type","C"]])->update(['is_deleted' => 1]);

            $education = Education::where ("cust_id",$data['customer_id'])->update(['is_deleted' => 1]);
           
            $security_qus = SecurityQuestionAnswer::where ([["user_id",$data['customer_id']],["user_type","C"]])->update(['is_deleted' => 1]);
          
            $customer = UserProfile::where ([["user_id",$data['customer_id']],["user_type","C"]])->update(['is_deleted' => 1]);


        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();

        return GlobalResponse::createResponse($customers);
    }

    public function getAll(){
        try{
            $customers = Customers::where('is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($customers))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($customers);

    }
    public function getById(array $data){
        try{
           
           $customers = Customers::where('customer_id',$data['customer_id'])->first();
           if( ! is_null($customers )){
                    $customers['address'] = DB::table('bl_address as add')
                    ->where ([["add.user_id",$data['customer_id']],['add.user_type','=','C']])
                    ->leftJoin('bl_address_type_master as atm','atm.add_type_id','=','add.add_type_id')
                    ->leftJoin('bl_zone_area_master as zone','zone.zone_area_id','=','add.zone_id')
                    ->leftJoin('bl_country_master as cou','cou.country_id','=','add.country_id')
                    ->leftJoin('bl_state_master as state','state.state_id','=','add.state_id')
                    ->leftJoin('bl_city_master as city','city.city_id','=','add.city_id')
                    ->select('add.*','zone.zone_name','cou.country_full_name','state.state_full_name','city.city_full_name','atm.add_type_name')
                    ->get(); 
                    $customers['education'] = Education::where ("cust_id",$data['customer_id'])->first(); 
                    $customers['security_qus']= DB::table("bl_cust_scrtyqtn_ans as csa")
                    ->where('csa.user_id',$data['customer_id'])
                    ->join('bl_security_questions_master as sqm','csa.question_id','=','sqm.question_id')
                    ->select('csa.*','sqm.question_name')
                    ->first();

           }else{
                return "no data found";
           }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($customers);
    }

  
    public function activate(array $data){
       try{

           $customers = Customers::where ("customer_id",$data['customer_id'])->first();
           $customers->is_active = 1;
           $customers->save();
            $user = UserProfile::where ([["user_id",$data['customer_id']],['user_type','=','C']])->first();
            $user->is_active = 1; 
            $user->save(); 
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($customers);
    }

    public function deActivate(array $data){
      try{
           $customers = Customers::where ("customer_id",$data['customer_id'])->first();
           $customers->is_active = 0;
           $customers->save();
            $user =UserProfile::where ([["user_id",$data['customer_id']],['user_type','=','C']])->first();
            $user->is_active = 0; 
            $user->save(); 
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($customers);
   }
   
    public function deleteAll(){
        try{           

            $msg = Customers::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            $msg = UserProfile::where([['is_deleted', '=', 0],['user_type','C']])->update(['is_deleted' => 1]);
            $msg = SecurityQuestionAnswer::where([['is_deleted', '=', 0],['user_type','C']])->update(['is_deleted' => 1]);
            $msg = Address::where([['is_deleted', '=', 0],['user_type','C']])->update(['is_deleted' => 1]);
            $msg = Education::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
             
        }catch(Exception $e){
           
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($msg);
    }

     public function search($data){
        try{

                $sql = "is_active = 1 and is_deleted = 0 and ( cust_first_name like '%".$data."%' or cust_aadhar_number like '%".$data."%' or cust_pan like '%".$data."%' or cust_mobile_phone_number like '%".$data."%' or cust_dob like '%".$data."%' )";

           
            $customers = DB::table("bl_customer as custom")
            ->whereRaw($sql)
            ->select("custom.*","custom.customer_id","custom.cust_dob","custom.cust_first_name")   
            ->simplePaginate(self::$RECORDS_PER_PAGE);
           
            if (is_null($customers))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($customers);

    }


    public function save1(array $data)
    {

         try {

             DB::beginTransaction();
            $userProfilesdefn = UserProfile::where([['user_login_id','=',$data['cust_per_emai_id']],['is_deleted', '=', 0],['is_active', '=' , 1]])->get();
            $testcust1 = count($userProfilesdefn);
            // $errorarray1 = array();
            // array_push($errorarray1, $data['cust_per_emai_id']);

        if($testcust1 <= 0){
  
            $customers = new  Customers;
            $data['cust_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.customer_code'));
            $customers->fill($data);
            $customers->save();

            $user_profile['user_login_id'] = $customers->cust_per_emai_id;
            $user_profile['user_login_password'] = bcrypt('eprayoga');

            $user_profile['user_id'] = $customers->customer_id;
            $user_profile['user_type'] = 'C';
            $user_profile['encrypted'] = 'A';
            $user_profile['acctlock'] = 'A';
            $user_profile['created_by_user_id'] = '1';
            $user_profile['last_update_user_id'] = '1';
            $user = new UserProfile; 
            $user['session_id'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.customer_code'));
            $user->fill($user_profile);
            $user->save(); 

            $email_id = $user->user_login_id;
            $token = $user->session_id;
            $user = $user->user_profile_id;
            $name = $customers->cust_first_name." ".$customers->cust_last_name;

        // Mail::send('welcome_mail', ['user_login_id' => $email_id, 'session_id' => $token,'username'=> $name], function ($m) use ($email_id) {
        //         $m->from('vahaitesting@gmail.com', 'ePrayoga');
        //         $m->to($email_id)->subject('Welcome to Eprayoga');
        //       });

            $sendmail = new MainSend;
            $sendmail['email_id']=$email_id;
            $sendmail['type']='registration';
            $sendmail['template']=view('welcome_mail',['session_id' => $token,'username'=> $name]);
            $sendmail->save();
            
            $residential_address = $data['address_type1'];
            $residential_address['user_id'] = $customers->customer_id;
            $residential_address['user_type'] = 'C';
            $address = new Address;
            $address->fill($residential_address);
            $address->save(); 


            
            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $customers->customer_id; 
            $billing_address['user_type'] = 'C';     
            $billingAddress = new Address;
            $billingAddress->fill($billing_address);
            $billingAddress->save();  
   
            $education = $data['education'];
            $education['cust_id'] = $customers->customer_id;        
            $edu = new Education;
            $education['edu_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.education_code'));
            $edu->fill($education);
            $edu->save();

            $security_qus = $data['security-qus'];
            $security_qus['user_id'] = $customers->customer_id; 
            $security_qus['user_type'] = 'C';       
            $sec_qus = new SecurityQuestionAnswer;
            $sec_qus->fill($security_qus);
            $sec_qus->save();       
        } else{
            return GlobalResponse::clientErrorResponse((array("emailmsg"=>$data['cust_per_emai_id'])));
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
    public function getCount(){
     
     try{
            $customers = DB::table('bl_customer')
            ->count();
        
            if (is_null($customers))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($customers);

    }

    public function getCust($user_id,$user_type){
        try{

          $result = DB::table("bl_customer as cust")
          ->where('cust.is_deleted',0)
          ->get();


      
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($result);
    }


    
} ?>

