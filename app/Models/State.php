<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $table = "bl_state_master";

    protected $primaryKey = 'state_id';

    public $timestamps = false;
 
    protected $fillable = [
       'state_code','country_id','state_full_name','code','zone_id','created_by_user_id','last_update_user_id',
       ];

}

?>