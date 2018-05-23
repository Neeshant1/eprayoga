<?php
namespace App\Http\Controllers;
//use App\Requests\CreateUserTypeRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


//use App\Services\UserTypeService;
class UserController extends Controller
{



    public function login( Request $request)
    {


    	 $mail_id = $request->input('email_id');
    	 $pwd = $request->input('password');
    	 $password = $pwd;

        echo "checking mailid  $mail_id";
        echo "checking pwd  $pwd";

    	  $user = UserProfile::where('user_login_id','=',$mail_id)
    	                      ->where('user_login_password','=',$password) 
    	                      ->first();

    	echo "user1111  $user";

         if ($user === null) {
         	echo "wrong $user";

                // return redirect("/");   
           }else{
           	echo "correct $user";
            // return redirect("/admin_main");
           }

    }

    public function logout(Request $request)
    {

    }


}    