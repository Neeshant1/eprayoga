<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class shoppingCartDetail extends Model
{

    protected $table = "bl_shopping_cart_detail";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
      		'product_catalog_id','valid_from','valid_to','shopping_cart_master_id','shopping_cart_date','order_seq','price','clnt_id','user_profile_id','clnt_group_id','discount','bundle_price','sgst','cgst','igst','other_tax1','other_tax2','other_tax3','total_tax','grand_total'

       ];

}

?>