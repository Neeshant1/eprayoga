<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    protected $table = "bl_email_config";

    protected $primaryKey = 'email_config_id';

    public $timestamps = false;
 
    protected $fillable = [
       'server_name','app_email_code','port','email','password','status'
       ];

}

?>