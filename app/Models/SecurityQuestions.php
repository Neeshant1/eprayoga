<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SecurityQuestions extends Model
{

    protected $table = "bl_security_questions_master";

    protected $primaryKey = 'question_id';

    public $timestamps = false;
 
    protected $fillable = [
       'question_name','created_by_user_id','last_update_user_id','is_active','is_deleted','sec_quest_code','user_id','user_type'
       ];

}

?>