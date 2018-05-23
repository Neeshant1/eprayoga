<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Aws extends Model
{

    protected $table = "bl_aws_s3_master";

    protected $primaryKey = 'aws_s3_master_id';

    public $timestamps = false;
    //non numeric primary - incrementing =false;
    protected $fillable = [
       'aws_s3_id','aws_access_key_id','aws_secret_access_key','s3_bucket_name','s3_url','used_for','is_active','created_by_user_id','last_update_user_id'

    ];


}

?>