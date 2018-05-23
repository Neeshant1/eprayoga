<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = "bl_employee";

    protected $primaryKey = 'emp_employee_id';

    public $timestamps = false;
 
    protected $fillable = [
	       	'emp_code','emp_name','emp_first_name','emp_last_name','emp_off_phone','emp_mobile','emp_dept_id',
	       	'emp_designation','emp_pan','emp_off_email_id','emp_twitter_id','emp_facbook_id',
	       	'emp_photo_file_name','emp_photo_location','emp_reporting_manager','emp_department','emp_status',
	       	'clnt_group_id','band','created_by_user_id','last_update_user_id','employee_no','clnt_id'
       ];

}

?>