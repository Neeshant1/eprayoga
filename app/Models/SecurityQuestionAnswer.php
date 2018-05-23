<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SecurityQuestionAnswer extends Model
{

    protected $table = "bl_cust_scrtyqtn_ans";

    protected $primaryKey = 'cust_scrtyqtn_ans_id';

    public $timestamps = false;
 
    protected $fillable = [
         'question_id','cust_answer','clnt_id','clnt_group_id','sec_quest_code','user_id','user_type','created_by_user_id','last_update_user_id','is_active','is_deleted'
       ];

}

?>