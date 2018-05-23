<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $table = "bl_topic";

    protected $primaryKey = 'topic_id';

    public $timestamps = false;
 
    protected $fillable = [
       'category_id','subject_id','topic_code','topic_name','created_by_user_id','last_update_user_id','is_active','is_deleted','clnt_group_id','clnt_id','topic_description'
       ];

}

?>