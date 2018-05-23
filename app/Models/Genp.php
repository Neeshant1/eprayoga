<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Genp extends Model
{

    protected $table = "bl_generic_param_master";

    protected $primaryKey = 'generic_param_id';

    public $timestamps = false;
 
    protected $fillable = [
       	'genp_code','genp_type','genp_desc','genp_app_timezone','genp_app_date_format','genp_app_currency','genp_app_currency_symbol','genp_app_default_language','genp_app_out_going_email_add',
       	'created_by_user_id','last_update_user_id','genp_active'
       ];

}

?>