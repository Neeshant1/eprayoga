<?php
namespace App\Repositories;
use App\Models\Employee;
use App\Models\Address;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Mail;
use Log;
use App\Models\MainSend;

class EmployeeRepository
{
    private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
      }


    public function save(array $data,$value,$user_profile_id)
    {
         try {
            DB::beginTransaction();
            $userProfilesdefn = UserProfile::where([['user_login_id','=',$data['emp_off_email_id']],['is_deleted', '=', 0],['is_active', '=' , 1]])->get();
            $test = count($userProfilesdefn);
            // $errorarray = array();
            // array_push($errorarray, $data['emp_off_email_id']);

        if($test <= 0){
            
            $employee = new  Employee;
            $data['emp_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.employee_code'));
            $data['created_by_user_id'] =  $user_profile_id;
            $data['last_update_user_id'] =  $user_profile_id;
            $data['clnt_id'] = $value->user_id;
            $employee->fill($data);
            $employee->save();

            $user_profile['user_login_id'] = $employee->emp_off_email_id;
            $user_profile['user_login_password'] = bcrypt('eprayoga');

            $user_profile['user_id'] = $employee->emp_employee_id;
            $user_profile['user_type'] = 'E';
            $user_profile['encrypted'] = 'A';
            $user_profile['acctlock'] = 'A';
            $user_profile['created_by_user_id'] = $user_profile_id;
            $user_profile['last_update_user_id'] = $user_profile_id;
            $user_profile['clnt_group_id'] = $employee->clnt_group_id;
            $user_profile['clnt_id'] = $value->user_id;
            $user = new UserProfile;
            $user['session_id'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.employee_code'));
            $user->fill($user_profile);
            $user->save();


            $email_id = $user->user_login_id;
            $token = $user->session_id;
            $user = $user->$user_profile_id;
            $name = $employee->emp_first_name." ".$employee->emp_last_name;
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
            $residential_address['user_id'] = $employee->emp_employee_id;
            $residential_address['user_type'] = 'E';
            //$residential_address['add_type_id'] ='resident';
            $address = new Address;
            $residential_address['created_by_user_id'] = $user_profile_id;
            $residential_address['last_update_user_id'] = $user_profile_id;
            $address->fill($residential_address);
            $address->save(); 

            //billing_address
            $billing_address = $data['address_type2'];
            $billing_address['user_id'] = $employee->emp_employee_id;
            $billing_address['user_type'] = 'E';
          //  $billing_address['add_type_id'] ='billing';    
            $billingAddress = new Address;
            $billing_address['created_by_user_id'] = $user_profile_id;
            $billing_address['last_update_user_id'] = $user_profile_id;
            $billingAddress->fill($billing_address);
            $billingAddress->save(); 


            //Sending mail when Create the Employee details
            // $to_email = array($data['emp_off_email_id']);
            // $sub="Employee list   successfully Created";
            // print_r($to_email);
            // BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub);
        } else{
            return GlobalResponse::clientErrorResponse((array("emailmsg"=>$data['emp_off_email_id'])));
        }


        } catch(Exception $e) {
            DB::rollBack();
           return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
       return GlobalResponse::createResponse($sendmail->id);
 
    }

    public function update(array $data){
        try{
         
          $address1 = $data['address_type1']['address_id'];
          $address2 = $data['address_type2']['address_id'];
            DB::beginTransaction();
          $employee = Employee::where ('emp_employee_id',$data['emp_employee_id'])->first();
            if($employee != null){
                $employee->fill($data);
                $employee->save();

                //residential_address
                $residential_address = $data['address_type1'];
                $residential_address['user_id'] = $employee->emp_employee_id;
                $residential_address['user_type'] = 'E';
               // $residential_address['add_type_id'] ='resident';
                $address = Address::where ("user_id",$data['emp_employee_id'])
                                   ->where ("address_id",$address1)
                                   ->first();
                $address->fill($residential_address);
                $address->save(); 

                //billing_address
                $billing_address = $data['address_type2'];
                $billing_address['user_id'] = $employee->emp_employee_id;
                $billing_address['user_type'] = 'E';
              //  $billing_address['add_type_id'] ='billing';    
                $billingAddress = Address::where ("user_id",$data['emp_employee_id'])
                                         ->where ("address_id",$address2)
                                         ->first();
                $billingAddress->fill($billing_address);
                $billingAddress->save(); 

              
               //Sending mail when update the Employee details
               // $to_email = array($data['emp_off_email_id']);
               // $sub="Employee list   successfully updated";
               // print_r($to_email);
               // BLAlphaNumericCodeGenerator::multiple_mail($to_email,$sub);



            }  
          
        }catch(Exception $e){
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        return GlobalResponse::createResponse($employee);
    }

    public function delete(array $data){
        try{
            DB::beginTransaction();
           
            $employee = Employee::where ("emp_employee_id",$data['emp_employee_id'])-> update(['is_deleted' => 1]);
            $address = Address::where ([["user_id",$data['emp_employee_id']],['user_type','=','E']])->update(['is_deleted' => 1]);
            $employee = UserProfile::where ([["user_id",$data['emp_employee_id']],["user_type","E"]])
                        ->update(['is_deleted' => 1]);
 
        }catch(Exception $e){
            DB::rollBack();
           return GlobalResponse::clientErrorResponse("error");
        }
         DB::commit();
       return GlobalResponse::createResponse($employee);
    }

    public function getAll($user_id,$user_type){
        try{


            if($user_type == 'S'){
             
              $result = DB::table("bl_employee as emp")->where('emp.is_deleted',0)
             ->join('bl_client_group as clnt','clnt.clnt_group_id','=','emp.clnt_group_id')
             ->select('emp.*','clnt.clnt_group_name','clnt.clnt_group_code')
             ->simplePaginate(self::$RECORDS_PER_PAGE);


            }else{
             
               $result = DB::table("bl_employee as emp")->where('emp.is_deleted',0)
                 ->join('bl_client_group as clnt','clnt.clnt_group_id','=','emp.clnt_group_id')
                 ->select('emp.*','clnt.clnt_group_name','clnt.clnt_group_code')
                 ->where('emp.clnt_id','=',$user_id)
                 ->simplePaginate(self::$RECORDS_PER_PAGE);
                  

            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($result);

    }


    public function getEmployee($user_id,$user_type){
        try{



             $result = DB::table("bl_employee as emp")->where('emp.is_deleted',0)
             ->join('bl_client_group as clnt','clnt.clnt_group_id','=','emp.clnt_group_id')

             ->select('emp.*','clnt.clnt_group_name','clnt.clnt_group_code')

             ->where('emp.clnt_id','=',$user_id)
             ->get();


        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($result);

    }

    public function getById(array $data){
        try{
             $employee = Employee::where('emp_employee_id',$data['emp_employee_id'])

                        ->first();


            if( ! is_null($employee )){
                    $employee['address'] = DB::table('bl_address as add')
                    ->where ([["add.user_id",$data['emp_employee_id']],['add.user_type','=','E']])
                    ->leftJoin('bl_address_type_master as atm','atm.add_type_id','=','add.add_type_id')
                    ->leftJoin('bl_zone_area_master as zone','zone.zone_area_id','=','add.zone_id')
                    ->leftJoin('bl_country_master as cou','cou.country_id','=','add.country_id')
                    ->leftJoin('bl_state_master as state','state.state_id','=','add.state_id')
                    ->leftJoin('bl_city_master as city','city.city_id','=','add.city_id')
                    ->select('add.*','zone.zone_name','cou.country_full_name','state.state_full_name','city.city_full_name','atm.add_type_name')
                    ->get();

            }else{
                return "no data found";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($employee);
    }

    public function activate(array $data){
       try{

           $employee = Employee::where ("emp_employee_id",$data['emp_employee_id'])->update(['is_active' => 1]);
           // $employee->is_active = 1;
           // $employee->save();
            $user = UserProfile::where ([["user_id",$data['emp_employee_id']],['user_type','=','E']])->update(['is_active' => 1]);
            // $user->is_active = 1; 
            // $user->save(); 
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($employee);
    }

    public function deActivate(array $data){
      try{

           $employee = Employee::where ("emp_employee_id",$data['emp_employee_id'])->update(['is_active' => 0]);
           // $employee->is_active = 0;
           // $employee->save();
            $user = UserProfile::where ([["user_id",$data['emp_employee_id']],['user_type','=','E']])->update(['is_active' => 0]);
            // $user->is_active = 1; 
            // $user->save(); 
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($employee);
   }

    public function deleteEmployee(array $data){
      try{

            DB::beginTransaction();

            $employee = Employee::where ("emp_employee_id",$data['emp_employee_id'])-> update(['is_deleted' => 1]);
            //residential_address
           
            $employee = Address::where ("user_id",$data['emp_employee_id'])->update(['is_deleted' => 1]);

            $employee = UserProfile::where ([["user_id",$data['emp_employee_id']],["user_type","E"]])
                        ->update(['is_deleted' => 1]);

        }catch(Exception $e){
            DB::rollBack();
           return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
       return GlobalResponse::createResponse($employee);
   }

   public function deleteAll(){
        try{

            $msg = Employee::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            $msg = Address::where([['is_deleted', '=', 0],['user_type','E']])->update(['is_deleted' => 1]);
            $msg = UserProfile::where([['is_deleted', '=', 0],['user_type','E']])->update(['is_deleted' => 1]);
        }catch(Exception $e){

            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }


   public function search($data){
        try{

                $sql = "emp.is_active = 1 and emp.is_deleted = 0 and ( emp.emp_first_name like '%".$data."%' or emp.emp_last_name like '%".$data."%' or emp.emp_off_phone like '%".$data."%' ) and emp.clnt_group_id= clntgrp.clnt_group_id";
          
            $employee = DB::table('bl_employee as emp')
            ->join('bl_client_group as clntgrp','emp.clnt_group_id','=','clntgrp.clnt_group_id')
            ->whereRaw($sql)
          //  ->simplePaginate(self::$RECORDS_PER_PAGE);
            ->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($employee))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($employee);

    }

       public function searchEmp($data,$user_type,$user_id){
        try{

              $sql = " emp.clnt_id = '".$user_id."' and emp.is_active = 1 and emp.is_deleted = 0 and (  ";

            if(!is_null($data['employee_no'])){
               $sql = $sql."emp.employee_no like '%".$data['employee_no']."%'";
               
            }
            if(!is_null($data['band'])){
                if(!is_null($data['employee_no'])){
                    $sql = $sql. " or ";
                }
                $sql = $sql."emp.band like '%".$data['band']."%'";
            }
            if(!is_null($data['emp_department'])){
                 if(!is_null($data['employee_no']) || !is_null($data['band']) ){
                    $sql = $sql. " or ";
                }
                $sql = $sql."emp.emp_department like '%".$data['emp_department']."%'";
                
            }
            if(!is_null($data['location'])){
                 if(!is_null($data['employee_no'])  || !is_null($data['emp_department']) || !is_null($data['band']) ){
                    $sql = $sql. " or ";
                }
                $sql = $sql."city.city_full_name like '%".$data['location']."%'";

            }
            $sql = $sql.")";

                        $employee = DB::table("bl_employee as emp")
                            ->join("bl_address as addr","addr.user_id","=","emp.emp_employee_id")
                            ->join("bl_city_master as city","city.city_id","=","addr.city_id")
                            ->join("bl_emp_department_master as dept","dept.emp_dept_id","=","emp.emp_department")

                            ->distinct("addr.user_id")
                           
                            ->where("addr.user_type","=", 'E' )
                            
                            ->whereRaw($sql)
                            ->select("emp.*","city.city_full_name","dept.emp_dept_name")
                            ->get(); 

                           // dd($employee);  

              // $employee = DB::Employee($sql)->get();

            if (is_null($employee))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($employee);

    }



} ?>