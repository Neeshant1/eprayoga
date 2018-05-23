<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{

    protected $table = "bl_question_answer";

    protected $primaryKey = 'question_answer_id';

    public $timestamps = false;
 
    protected $fillable = [
           'question_id','question_answer_txt','description','is_active','is_deleted',
           'created_by_user_id','last_update_user_id'
   ];

}

?>