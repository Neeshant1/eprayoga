<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{

    protected $table = "bl_user_access_log";

    protected $primaryKey = 'user_access_log_id';

    public $timestamps = false;
 
    protected $fillable = [
       'user_profile_id','login_ip_address'
       ];

}

?>