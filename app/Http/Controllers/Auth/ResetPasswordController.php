<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getReset($session_id = null)
    {

            if (is_null($session_id))
            {
                throw new NotFoundHttpException;
            }

            else{
                
             $userReset = DB::table('bl_user_profile_defn')
                        ->select('user_login_id')
                        ->where('session_id','=',$session_id)   
                        ->get();

            $email_id = count($userReset);                                              
            if($email_id === 1){

              return redirect('/auth_reset')->with('user_login_id', $userReset[0]->user_login_id)
                                           ->with('session_id', $session_id); 
                        
            }
  
            else{             
              return redirect('/');
            }
                                           
            }        
    }

   public function postReset(Request $request)
    {

            $pwd = $request-> get('password');
            $getid=$request->get('user_login_id');
            $sessionid=$request->get('session_id');
            $pwd = $request-> get('password');


            $user = UserProfile::where(['session_id'=>$sessionid])
                                  ->first(); 
           
            $password=openssl_digest($pwd, 'sha512'); 
            $user->user_login_password=$password;
            $user->update();

            return redirect('/')->with('message','Password Reset Sucessfully');                  
            
    }
  
  public function getToken($token){
      
        if (isset($_GET["token"]) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])) {

            $token = $_GET["token"];
        }
        
        // if($token)
    
               $query = DB::table('bl_user_profile_defn')->where('token', '=', $token)->get();
              
                if(count($query) <= 0){
                    return redirect('/forgot_password_message')->with('forgot_password_message','Invalid UserName and Password');
                } else {
                   $tmp = json_decode($query,true);
                   $tims = $tmp[0]['created_on_timestamp'];
                   $timsta = date($tims);
                   $date = date(strtotime( $timsta ) + 24 * 3600 );
                   $strtot = date("Y-m-d H:i:s",$date);

                //current time 
                   $timezone = 'ASIA/KOLKATA';
                   $date1 = new DateTime('now', new DateTimeZone($timezone));
                   $localtime = $date1->format('Y-m-d H:i:s');

                // valid 24 hours
                   $totaltimeday = (24*3600);

                // time difference 
                   $timeFirst  = strtotime($localtime);
                   $timeSecond = strtotime($strtot);
                   $differenceInSeconds = ($timeSecond - $timeFirst);
                }
               
               

        if( $totaltimeday >= $differenceInSeconds){
              // $session_id = $token;
              $mode = 1;
          //    $va = $this->getReset($session_id, $mode);
               $userReset = DB::table('bl_user_profile_defn')
                              ->select('user_login_id','session_id')
                              ->where('token','=',$token)   
                              ->get();
               $email_id = count($userReset);   
               if($email_id === 1){
                  Session::put('user_login_id', $userReset[0]->user_login_id);
                  Session::put('session_id', $userReset[0]->session_id);
                  
                  $query = DB::table('bl_user_profile_defn')->where( 'token', '=', $token)->delete();
                  return redirect('/auth_reset'); 
                                         
              }
                
              else{   
           
                return redirect('/');
              }

        } else{
              return redirect('/forgot_password_message')->with('forgot_password_message','Invalid UserName and Password');

        }
      
      
     

    
  }
}
