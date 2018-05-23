<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EmpDepartment extends Model
{

    protected $table = "bl_emp_department_master";

    protected $primaryKey = 'emp_dept_id';

    public $timestamps = false;
 
    protected $fillable = [
       'emp_dept_code','emp_dept_name','is_active','is_deleted','clnt_id','clnt_group_id','created_by_user_id','last_update_user_id'
       ];

}

?>