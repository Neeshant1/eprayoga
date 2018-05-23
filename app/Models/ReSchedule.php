<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ReSchedule extends Model
{

    protected $table = "bl_exam_schedule";

    protected $primaryKey = 'exam_schedule_id';

    public $timestamps = false;
 
    protected $fillable = [
       'user_id','exam_date','category_id','subject_id','topic_id','is_active','is_deleted','created_by_user_id','last_update_user_id'
       ];

}

?>