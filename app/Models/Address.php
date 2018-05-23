<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = "bl_address";

    protected $primaryKey = 'address_id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
        'add_id','add_type_id','user_id','user_type','cust_add_line_1','cust_add_line_2','cust_add_line_3','country_id','state_id','city_id','cust_add_landmark','clnt_group_id','zone_id','created_by_user_id','last_update_user_id'
    ];


}

?>