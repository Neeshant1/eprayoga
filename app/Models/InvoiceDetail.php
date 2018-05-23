<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class invoiceDetail extends Model
{

    protected $table = "bl_invoice_detail";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
       'invoice_code','invoice_date','seq_no','exam_code','exam_name','price','discount_amount','sgst','cgst','igst','other_tax1','other_tax2','other_tax3','bundle_price','total_amount','total_qty','total_tax_amount','total_bill_value','unit_qty','sales_terms1','sales_terms2','sales_terms3','sales_terms4','sales_terms5','exam_attempt_type_id','created_on_timestamp','created_by_user_id','last_update_timestamp','last_update_user_id'


       ];

}

?>