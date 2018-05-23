<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{

    protected $table = "bl_question_type_master";

    protected $primaryKey = 'question_type_id';

    public $timestamps = false;
 
    protected $fillable = [
       'question_type_code','question_type_name','created_by_user_id','last_update_user_id'
       ];

}

?>