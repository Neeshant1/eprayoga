<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductCatalogAttemptType extends Model
{

    protected $table = "bl_product_catalog_attempt_type_link";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
       'product_catalog_id','exam_attempt_type_id','no_of_attempts','valid_days'
       ];

}

?>