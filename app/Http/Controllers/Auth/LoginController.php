<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Models\UserAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Log;
use Carbon\Carbon;
use Session;
use Mail;
use Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller inst
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login( Request $request)
    {
        $mail_id = $request['userName'];
        $pwd = $request['userPwd'];
        $password = openssl_digest($pwd, 'sha512'); 
        $user = UserProfile::where([['user_login_id','=',$mail_id],['is_deleted', '=', 0],['is_active', '=' ,1]])
                            ->where('user_login_password','=',$password) 
                            ->select('user_profile_id','user_login_id','user_id','user_type','clnt_id','clnt_group_id')
                            ->first();

         if ($user === null || empty($user)) {
          
            return false;

           }else{
           
            $request->session()->put('user', $user);
            $value = $request->session()->get('user');  

            $request->session()->put('user_login_id', $value->user_login_id);
            Cookie::queue("user_profile_id", $value->user_login_id, 259200);

             
            $one['login_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $one['user_profile_id'] = $value->user_profile_id;
            $login = new  UserAccess;
            $login->fill($one);
            $login->save();

            $user['user_access_log_id']= $login->user_access_log_id;

            $sql = DB::table("bl_order_master")
                    ->where('user_profile_id','=',$value->user_profile_id)
                    ->get();

            $sql1 = DB::table("bl_shopping_cart_master as shopMaster")
                    ->join('bl_shopping_cart_detail as shopDetail', 'shopDetail.shopping_cart_master_id', '=', 'shopMaster.id')
                    ->select('shopMaster.user_profile_id','shopDetail.shopping_cart_master_id')
                    ->get();
            
            $empsql = DB::table("bl_promo_master as pm")
                        ->where('pm.exam_allocated_to','=',$value->user_profile_id)
                        ->whereRaw("pm.allocated_flag = true   and CURDATE() >= pm.promo_valid_fm_date and CURDATE() < promo_valid_to_date ")
                        ->select('pm.exam_allocated_to', 'pm.id')
                        ->get();

            
            if($value->user_type == 'S'){

                Session::put('user_type', $value->user_type);
                $tmp = DB::table('bl_client')
                  ->where('client_id', '=',$value->user_id )
                  ->select('clnt_contact_person_first_name','clnt_contact_person_last_name')
                                ->get();
                $tmp1 = json_decode($tmp,true);
                Session::put('user_category', "Client");
                Session::put('first_name', $tmp1[0]['clnt_contact_person_first_name']);
                Session::put('last_name', $tmp1[0]['clnt_contact_person_last_name']);
                return redirect('/admin_main');//->with('user_type','S');
            }

            else if(($value->user_type == 'T')) {
                 Session::put('user_type', $value->user_type);
                 $tmp = DB::table('bl_client')
                  ->where('client_id', '=',$value->user_id )
                  ->select('clnt_contact_person_first_name','clnt_contact_person_last_name')
                                ->get();
                $tmp1 = json_decode($tmp,true);
                Session::put('user_category', "Client");
                Session::put('first_name', $tmp1[0]['clnt_contact_person_first_name']);
                Session::put('last_name', $tmp1[0]['clnt_contact_person_last_name']);
               return redirect('/admin_main');//->with('message','You are Logged in !!!');
            }

            else if(($value->user_type == 'C') && (count($sql) == 0) && (count($sql1) > 0)){
              Session::put('user_type', $value->user_type);
                $tmp = DB::table('bl_customer')
                  ->where('customer_id', '=',$value->user_id )
                  ->select('cust_first_name','cust_last_name')
                                ->get();
                $tmp1 = json_decode($tmp,true);
                Session::put('user_category', "Customer");
                Session::put('first_name', $tmp1[0]['cust_first_name']);
                Session::put('last_name', $tmp1[0]['cust_last_name']);
                return redirect('/user_exam'); //->with('user_type','C');
            }

            elseif ($value->user_type == 'C') {
              Session::put('user_type', $value->user_type);
              $tmp = DB::table('bl_customer')
                  ->where('customer_id', '=',$value->user_id )
                  ->select('cust_first_name','cust_last_name')
                                ->get();
                $tmp1 = json_decode($tmp,true);
                Session::put('user_category', "Customer");
                Session::put('first_name', $tmp1[0]['cust_first_name']);
                Session::put('last_name', $tmp1[0]['cust_last_name']);
                return redirect('/user_exam');
            }

            $empid = json_encode($value->user_profile_id);



          //  dd(empty($empsql));

            if(empty($empsql) == false){  
              Session::put('user_type', $value->user_type);
               $tmp = DB::table('bl_employee')
                  ->where('emp_employee_id', '=',$value->user_id )
                  ->select('emp_first_name','emp_last_name')
                  ->get();
                $tmp1 = json_decode($tmp,true);
                Session::put('user_category', "Employee");
                Session::put('first_name', $tmp1[0]['emp_first_name']);
                Session::put('last_name', $tmp1[0]['emp_last_name']);
              return redirect('/employee#examCart');
            }

            else if($empid == $empsql[0]->exam_allocated_to && $value->user_type == 'E'){


                Session::put('user_type', $value->user_type);
                $tmp = DB::table('bl_employee')
                  ->where('emp_employee_id', '=',$value->user_id )
                  ->select('emp_first_name','emp_last_name')
                  ->get();
                $tmp1 = json_decode($tmp,true);
                Session::put('user_category', "Employee");
                Session::put('first_name', $tmp1[0]['emp_first_name']);
                Session::put('last_name', $tmp1[0]['emp_last_name']);
                return redirect('/employee#examCart');
                //return redirect()->action('ProductCatalogController@getExamCart', $arr);
            }

        
            
            
           }




    }

    public function signOut(Request $request) {
    
           $user = $request->session()->get('user');
           if(!is_null($user)){
            $one['login_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $one['user_access_log_id']= $user->user_access_log_id;
            Session::forget('user_type');
            Session::forget('user_category');
            Session::forget('first_name');
            Session::forget('last_name');
            Session::forget('user_login_id');
         $sql = DB::update('update bl_user_access_log set logout_timestamp = now() where user_access_log_id = ?',[$user->user_access_log_id]);
            $request->session()->forget('user');
           
            return redirect('/')->withCookie(Cookie::forget('user_profile_id'));
           }else{

            return redirect('/')->withCookie(Cookie::forget('user_profile_id'));
           }
         

    }

    public function shopCart(Request $request) {
    
           $user = $request->session()->get('user');

            $one['login_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $one['user_access_log_id']= $user->user_access_log_id;

           return redirect('/shopCart');

    }
    public function Forgot_password(Request $request) {
    
          $mail_id = $request->input('reset_password');
          $userReset = UserProfile::where('user_login_id','=',$mail_id)
                 ->select('session_id','user_login_id','user_profile_id')
                 
                 ->first();
           
      $countEmail = count($userReset);
      if($countEmail > 0){
            $getMail = $userReset->user_login_id;
            $parts = explode("@", $userReset->user_login_id);
            $username = $parts[0];
            $token = sha1(uniqid($username, true));

            DB::table('bl_user_profile_defn')->insert([
              ['user_login_id' => $getMail, 'user_login_password' => '1', 'encrypted' => '1', 'acctlock' => '1', 'created_by_user_id' => '1', 'last_update_user_id' => '1', 'user_id' => '1', 'user_type' => '1', 'token' => $token, 'session_id' => $userReset->session_id]
            ]);
            Mail::send('forgot_password_mail', ['user_login_id' => $mail_id, 'token' => $token], function ($m) use ($mail_id) {
                      $m->from('vahaitesting@gmail.com', 'ePrayoga');
                      $m->to($mail_id)->subject('Welcome to Eprayoga');
                });


            echo "Your Password Link has been sent to your Registered Email Id.";



      }else{
         echo "Please Enter your Registered Email Id.";
         //echo "<script type='text/javascript'>alert('Please Enter your Registered Email Id!')</script>";

      }   
    
  }
   public static function Session_cookie($values,$request){
    $user = UserProfile::where([['user_login_id','=',$values],['is_deleted', '=', 0]]) 
                            ->select('user_profile_id','user_login_id','user_id','user_type','clnt_id','clnt_group_id')
                            ->first();
    $request->session()->put('user', $user);
    $value = $request->session()->get('user');  
    $request->session()->put('user_login_id', $value->user_login_id);
    $one['login_ip_address'] = $_SERVER['REMOTE_ADDR'];
    $one['user_profile_id'] = $value->user_profile_id;
    $login = new  UserAccess;
    $login->fill($one);
    $login->save();
    if($value->user_type == 'S'){
          Session::put('user_type', $value->user_type);
          $tmp = DB::table('bl_client')
            ->where('client_id', '=',$value->user_id )
            ->select('clnt_contact_person_first_name','clnt_contact_person_last_name')
                          ->get();
          $tmp1 = json_decode($tmp,true);
          Session::put('user_category', "Client");
          Session::put('first_name', $tmp1[0]['clnt_contact_person_first_name']);
          Session::put('last_name', $tmp1[0]['clnt_contact_person_last_name']);
          return redirect('/admin_main');//->with('user_type','S');
      }

      else if(($value->user_type == 'T')) {
           Session::put('user_type', $value->user_type);
           $tmp = DB::table('bl_client')
            ->where('client_id', '=',$value->user_id )
            ->select('clnt_contact_person_first_name','clnt_contact_person_last_name')
                          ->get();
          $tmp1 = json_decode($tmp,true);
          Session::put('user_category', "Client");
          Session::put('first_name', $tmp1[0]['clnt_contact_person_first_name']);
          Session::put('last_name', $tmp1[0]['clnt_contact_person_last_name']);
         return redirect('/admin_main');//->with('message','You are Logged in !!!');
      }
      elseif ($value->user_type == 'C') {
        Session::put('user_type', $value->user_type);
        $tmp = DB::table('bl_customer')
            ->where('customer_id', '=',$value->user_id )
            ->select('cust_first_name','cust_last_name')
                          ->get();
          $tmp1 = json_decode($tmp,true);
          Session::put('user_category', "Customer");
          Session::put('first_name', $tmp1[0]['cust_first_name']);
          Session::put('last_name', $tmp1[0]['cust_last_name']);
          return redirect('/user_exam');
      }
      else if($value->user_type == 'E'){
          Session::put('user_type', $value->user_type);
          $tmp = DB::table('bl_employee')
            ->where('emp_employee_id', '=',$value->user_id )
            ->select('emp_first_name','emp_last_name')
            ->get();
          $tmp1 = json_decode($tmp,true);
          Session::put('user_category', "Employee");
          Session::put('first_name', $tmp1[0]['emp_first_name']);
          Session::put('last_name', $tmp1[0]['emp_last_name']);
          return redirect('/employee#examCart');
      }
      return true;
   }
}

