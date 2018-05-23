<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = "bl_category";

    protected $primaryKey = 'category_id';

    public $timestamps = false;
 
    protected $fillable = [
       'category_id','category_code','category_name','created_by_user_id','last_update_user_id','is_active','is_deleted','clnt_group_id','clnt_id','category_description'
       ];

}

?>