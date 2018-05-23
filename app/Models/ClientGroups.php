<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ClientGroups extends Model
{

    protected $table = "bl_client_group";

    protected $primaryKey = 'clnt_group_id';

    public $timestamps = false;
 
    protected $fillable = [
	       	'user_type_id','clnt_group_code','clnt_group_name','clnt_group_pan','clnt_group_off_email_id',
	       	'clnt_group_twitter_id','clnt_group_facbook_id','clnt_group_logo_file_name','clnt_group_logo_location',
	       	'orig_type_id','clnt_group_location','clnt_group_city','clnt_group_contact_person_first_name',
	       	'clnt_group_contact_person_last_name','clnt_group_contact_person_off_phone',
	       	'clnt_group_contact_person_mobile','clnt_group_dept_name','clnt_group_contact_person_desgination',
	       	'created_by_user_id','last_update_user_id','website_url','tax_id'
       ];

}

?>