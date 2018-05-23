<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = "bl_language_master";

    protected $primaryKey = 'language_id';

    public $timestamps = false;
 
    protected $fillable = [
         'language','language_code','language_short_name','created_by_user_id','last_update_user_id','clnt_id'
       ];

}

?>