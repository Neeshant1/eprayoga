<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = "bl_client";

    protected $primaryKey = 'client_id';

    public $timestamps = false;
 
    protected $fillable = [
	       	'user_type_id','clnt_type_id','clnt_code','clnt_name','clnt_contact_person_first_name',
	       	'clnt_contact_person_last_name','clnt_contact_person_off_phone','clnt_contact_person_mobile',
	       	'clnt_dept_name','clnt_contact_person_desgination','orig_type_id','clnt_pan','clnt_logo_location',
	       	'clnt_logo_file_name','website_url','clnt_off_email_id','clnt_facbook_id','clnt_twitter_id','tax_id','gst',
	       	'clnt_group_id','created_by_user_id','last_update_user_id','last_update_timestamp',
	       	'created_on_timestamp'
       ];

}

?>