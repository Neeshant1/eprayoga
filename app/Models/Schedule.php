<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $table = "bl_exam_schedule";

    protected $primaryKey = 'exam_schedule_id';

    public $timestamps = false;
 
    protected $fillable = [
       'user_profile_id','order_detail_id','product_catalog_id','promo_master_id','start_time','end_time','exam_planned_date','exam_rescheduled_on','actual_exam_attended_date','time_elapsed','exam_trans_ref_no','status','is_schedule','is_active','is_deleted','created_by_user_id','last_update_user_id'
       ];

}

?>