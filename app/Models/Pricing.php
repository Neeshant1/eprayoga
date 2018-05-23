<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{

    protected $table = "bl_pricing";

    protected $primaryKey = 'pricing_id';

    public $timestamps = false;
 
    protected $fillable = [
         'prc_code','prc_type','prc_description','prc_eff_from_date','prc_eff_to_date','prc_detail_desc','prc_active','prc_currency','prc_price','prc_disc','prc_payment_mode','prc_usance','created_by_user_id','last_update_user_id','is_active','is_deleted'
       ];

}

?>