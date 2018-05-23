<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class invoiceHeader extends Model
{

    protected $table = "bl_invoice_header";

    protected $primaryKey = 'id';

    public $timestamps = false;
 
    protected $fillable = [
       'invoice_no','name','invoice_date','cust_first_name','cust_last_name','type','cust_id','clnt_id','cust_tax_ref_no','total_bill_amt','currency','other_ref','pay_mode','signature','signature_title','name_of_authority','order_no','order_date','sales_terms1','sales_terms2','sales_terms3','sales_terms4','sales_terms5','total_invoice_qty','created_on_timestamp','created_by_user_id','last_update_timestamp','last_update_user_id'


       ];

}

?>