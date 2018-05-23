<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $table = "bl_faq";

    protected $primaryKey = "faq_id";

    public $timestamps = false;
 
    protected $fillable = [
         'faq_code','faq_category_id','is_published','is_public','question','answer','keywords','notes', 'created_by_user_id','last_update_user_id'
       ];

}

?>