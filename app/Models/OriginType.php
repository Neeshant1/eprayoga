<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OriginType extends Model
{

    protected $table = "bl_origin_type_master";

    protected $primaryKey = 'orig_type_id';

    public $timestamps = false;
 
    protected $fillable = [
         'orig_type_code','orig_type_name','created_by_user_id','last_update_user_id'
       ];

}

?>