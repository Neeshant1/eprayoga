<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{

    protected $table = "bl_question_option";

    protected $primaryKey = 'question_option_id';

    public $timestamps = false;
 
    protected $fillable = [
          'question_id','question_option_txt','description','is_active','is_deleted',
          'created_by_user_id','last_update_user_id','option_group'
   ];
}

?>