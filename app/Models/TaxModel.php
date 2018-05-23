<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TaxModel extends Model
{

    protected $table = "bl_tax_config";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
       'name','description','value'

       ];

}

?>