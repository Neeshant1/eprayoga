<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PromoAllocation extends Model
{

    protected $table = "bl_promoalloc_client_cust_txn";

    protected $primaryKey = 'id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
        'client_id','user_profile_id','exam_code','customer_emp_first_name','customer_emp_last_name','promo_gen_date','promo_code','allocated_date','seq_no','order_no','order_date','attempt_type','no_attempts_allowed','created_by_user_id','last_update_user_id'
    ];


}

?>