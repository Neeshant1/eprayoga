<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PromoMaster extends Model
{

    protected $table = "bl_promo_master";

    protected $primaryKey = 'id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
        'client_id','user_profile_id','exam_code','exam_name','promo_code','promo_gen_date','promo_valid_fm_date','promo_valid_to_date','payment_ref_no','order_no','order_date','allocated_flag','exam_allocated_to','no_attempts_sofar','no_attempts_allowed','created_by_user_id','last_update_user_id','order_detail_id'
    ];


}

?>