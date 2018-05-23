<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = "bl_question_master";

    protected $primaryKey = 'question_id';

    public $timestamps = false;
 
    protected $fillable = [
       'clnt_id','clnt_group_id','question_id','category_id','subject_id','topic_id','difficult_level_id','contributed_by','question_type_id','descriptive','question_txt_format','pos_marks','neg_marks','is_active','is_deleted','weightage','created_by_user_id','last_update_user_id','difficulty_level_id','tips'
       ];
}

?>