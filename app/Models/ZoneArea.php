<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ZoneArea extends Model
{

    protected $table = "bl_zone_area_master";

    protected $primaryKey = 'zone_area_id';

    public $timestamps = false;
 
    protected $fillable = [
       'zone_code','zone_name','description','created_by_user_id','last_update_user_id',
       'zone_area_id'
       ];

}

?>