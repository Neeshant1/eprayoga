<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $table = "bl_order_detail";

    protected $primaryKey = 'id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
         'product_catalog_id','user_profile_id','valid_from','valid_to','no_of_attempts','order_master_id','order_date','order_seq','price','discount','bundle_price','sgst','cgst','igst','other_tax1','other_tax2','other_tax3','total_tax','grand_total','unit_qty','sales_terms1','sales_terms2','sales_terms3','sales_terms4','sales_terms5','clnt_id','clnt_group_id'
    ];


}

?>