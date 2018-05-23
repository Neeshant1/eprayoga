<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{

    protected $table = "bl_customer";

    protected $primaryKey = 'customer_id';

    public $timestamps = false;
 
    protected $fillable = [
	       	'user_type_id','cust_code','cust_first_name','cust_last_name','cust_dob','cust_aadhar_number','cust_pan',
	       	'cust_passport','cust_sex','cust_res_phone_number','cust_mobile_phone_number','cust_off_phone_number',
	       	'cust_per_emai_id','cust_off_email_id','cust_facebook_id','cust_twitter_id','cust_photo_file_name',
	       	'cust_photo_location','cust_father_name','cust_mother_name','orig_type_id','created_by_user_id',
	       	'last_update_user_id','is_active','is_deleted'
       ];

}

?>