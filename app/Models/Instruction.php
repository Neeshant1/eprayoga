<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class  Instruction extends Model
{

    protected $table = "bl_instruction";

    protected $primaryKey = 'instruction_id';

    public $timestamps = false;
 
    protected $fillable = [
       'inst_type_code','inst_description','inst_active','inst_eff_date_from','inst_eff_date_to','inst_type','created_by_user_id','last_update_user_id','instruction_id','is_active','is_deleted'
       ];

}

?>


