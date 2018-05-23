<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = "bl_country_master";

    protected $primaryKey = 'country_id';

    public $timestamps = false;
 
    protected $fillable = [
       'country_short_name','country_full_name','country_phonecode','zone_id','country_mastercol','last_update_user_id','country_id','created_by_user_id','country_code'
       ];

}

?>