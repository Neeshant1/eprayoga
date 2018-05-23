<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class orderMaster extends Model
{

    protected $table = "bl_order_master";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
      			'order_code','order_date','tax_ref_no','total','currency_id','total_tax','gateway_param','user_profile_id','clnt_id','clnt_group_id'


       ];

}

?>