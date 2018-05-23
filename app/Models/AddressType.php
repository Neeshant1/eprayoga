<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{

    protected $table = "bl_address_type_master";

    protected $primaryKey = 'add_type_id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
         'add_type_id','add_type_name','created_on_timestamp','created_by_user_id','last_update_timestamp','last_update_user_id','origin_type_id','is_active','is_deleted','add_type_code'
    ];


}

?>