<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $table = "bl_subject";

    protected $primaryKey = 'subject_id';

    public $timestamps = false;
 
    protected $fillable = [
       'category_id','subject_code','subject_name','created_by_user_id','last_update_user_id','is_active','is_deleted','clnt_group_id','clnt_id','sub_description'
       ];

}

?>