<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QuestionComplexity extends Model
{

    protected $table = "bl_difficulty_level_master";

    protected $primaryKey = 'difficulty_level_id';

    public $timestamps = false;
 
    protected $fillable = [
       'difficulty_level_code','difficulty_level_name', 'created_by_user_id','last_update_user_id'
       ];

}

?>