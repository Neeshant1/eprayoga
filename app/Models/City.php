<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = "bl_city_master";

    protected $primaryKey = 'city_id';

    public $timestamps = false;
 
    protected $fillable = [
       'city_code','city_full_name','code','state_id','country_id','created_by_user_id','last_update_user_id'
       ];

}

?>