<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{

    protected $table = "bl_client_type_master";

    protected $primaryKey = 'clnt_type_id';

    public $timestamps = false;
 
    protected $fillable = [
       'clnt_type_code','clnt_type_name', 'created_by_user_id','last_update_user_id'
       ];

}

?>