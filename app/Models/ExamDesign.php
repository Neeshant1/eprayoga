<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ExamDesign extends Model
{

    protected $table = "bl_exam_design_rules";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
       'rule','value','category_id','subject_id','topic_id','product_catalog_id','is_deleted'


       ];

}

?>