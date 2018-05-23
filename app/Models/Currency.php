<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $table = "bl_currency_code_master";

    protected $primaryKey = 'currency_id';

    public $timestamps = false;
 
    protected $fillable = [
       'currency_name','currency_code','code','conv_rate','type','is_active','is_deleted','created_by_user_id','last_update_user_id','clnt_id'
       ];

}

?>