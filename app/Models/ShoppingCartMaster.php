<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class shoppingCartMaster extends Model
{

    protected $table = "bl_shopping_cart_master";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
      			'shopping_code','shopping_date','tax_ref_no','total','currency_id','total_tax','gateway_param','user_profile_id','created_by_user_id','last_update_user_id','clnt_id','clnt_group_id','order_date'


       ];

}

?>