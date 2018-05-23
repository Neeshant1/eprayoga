<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{

    protected $table = "bl_sms_config";

    protected $primaryKey = 'sms_config_id';

    public $timestamps = false;
 
    protected $fillable = [
       'app_sms_gateway_name','app_sms_code','app_sms_user_id','app_sms_user_password','app_sms_gateway_url',
       'app_sms_gateway_status','app_sms_registered_phone_number','app_sms_gateway_authentication_tocken',
       'app_sms_gateway_api_id','genp_active','created_by_user_id','last_update_user_id'
       ];

}

?>