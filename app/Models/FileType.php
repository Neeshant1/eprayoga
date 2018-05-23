<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{

    protected $table = "bl_file_type_master";

    protected $primaryKey = 'file_type_id';

    public $timestamps = false;
 
    protected $fillable = [
       'file_type_extension','file_type_description','is_allowed','created_on_timestamp','created_by_user_id','last_update_timestamp','last_update_user_id','is_active','is_deleted'
       ];

}

?>