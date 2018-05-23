<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = "bl_education";

    protected $primaryKey = 'education_id';

    public $timestamps = false;
 
    protected $fillable = [
       'edu_type_code','edu_univ_code','edu_category_name','edu_sub_category','edu_active','edu_university_name',
       'edu_country','cust_id','created_by_user_id','last_update_user_id','is_active','is_deleted'
       ];

}

?>