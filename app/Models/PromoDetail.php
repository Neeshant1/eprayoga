<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PromoDetail extends Model
{

    protected $table = "bl_promo_detail";

    protected $primaryKey = 'id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
        'client_id','user_profile_id','promo_master_id','promo_code','promo_gen_date','used_flag','user_used_id','promo_used_date','exam_attempt_type_id','order_date','order_no','promo_alloc_date','exam_trans_ref_no','seg_number','created_by_user_id','last_update_user_id'
    ];


}

?>