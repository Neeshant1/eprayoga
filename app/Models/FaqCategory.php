<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{

    protected $table = "bl_faq_category";

    protected $primaryKey = 'faq_category_id';

    public $timestamps = false;
 
    protected $fillable = [
       'faq_category_code','is_public','faq_category_name','faq_category_description','notes',
       'created_by_user_id', 'last_update_user_id'
       ];

}

?>