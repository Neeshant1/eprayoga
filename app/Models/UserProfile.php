<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Contracts\Auth\CanResetPassword;

class UserProfile extends Model
{

    protected $table = "bl_user_profile_defn";

    protected $primaryKey = 'user_profile_id';

    public $timestamps = false;
 
    protected $fillable = [
       'user_login_id','user_login_password','encrypted','acctlock','created_by_user_id','last_update_user_id','clnt_group_id','user_id','user_type','clnt_id','session_id'
       ];

}

?>