<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    protected $table = "bl_user_type_master";

    protected $primaryKey = 'user_type_id';

    public $timestamps = false;
 
    protected $fillable = [
       'user_type_code','user_type_name', 'created_by_user_id','last_update_user_id','is_active','is_deleted'
       ];

}

?>