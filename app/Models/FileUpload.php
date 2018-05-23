<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{

    protected $table = "bl_file";

    protected $primaryKey = 'file_id';

    public $timestamps = false;
    //non numeric primary
    //incrementing =false;
    protected $fillable = [
        'file_name','file_id','clnt_id','clnt_group_id','file_date','file_category_type','status', 'update_time','user_profile_id'
    ];


}

?>