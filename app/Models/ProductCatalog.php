<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class productCatalog extends Model
{

    protected $table = "bl_product_catalog";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
       'id','name','description','product_catalog_code','category_id','topic_id','clnt_id','clnt_group_id','created_by_user_id','last_update_user_id','created_on_timestamp','last_update_timestamp','is_active','is_deleted','label','currency_id','price','discount','bundle_price','sgst','cgst','igst','language_id','employee_band','valid_from','valid_to','subject_id','other_tax1','other_tax2','other_tax3','populate_all','valid_from','valid_to','exam_attempt_type_id','no_of_attempts','valid_days'


       ];

}

?>