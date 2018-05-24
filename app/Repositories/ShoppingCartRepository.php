<?php
namespace App\Repositories;
use App\Models\ProductCatalog;
use App\Models\ShoppingCartMaster;
use App\Models\ShoppingCartDetail;
use App\Models\OrderMaster;
use App\Models\OrderDetail;
use App\Models\Schedule;
use App\Models\InvoiceHeader;
use App\Models\InvoiceDetail;
use App\Models\PromoMaster;
use App\Models\PromoDetail;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Response\GlobalResponse;
use Log;
use Carbon\Carbon;
use App\Models\PromoAllocation;
use Illuminate\Pagination\Paginator;



class ShoppingCartRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function getAllProduct($user_id){
        try{    
                
                // $sql = 'proc.valid_from' >= $currentdate or 'proc.valid_to' >= $currentdate;
  
              $product = DB::table("bl_product_catalog as proc")
                
                ->where(function($q) use ($user_id){
                    $currentdate =new Carbon();
                    // $q->where('proc.valid_from', '<=' , $currentdate)
                    // ->orWhere('proc.valid_to', '>=' , $currentdate)
                    $q->where([['proc.is_deleted',0],['proc.is_active',1],['proc.valid_from', '<=' , $currentdate],['proc.valid_to', '>=' , $currentdate]])
                ->orWhere([['proc.populate_all',1],['proc.is_deleted',0],['proc.is_active',1],['proc.clnt_id','=',$user_id],['proc.valid_from', '<=' , $currentdate],['proc.valid_to', '>=' , $currentdate]]);
              })
                //->orWhere('proc.valid_to', '>=' , $currentdate)
                ->join('bl_category as cat','proc.category_id','=','cat.category_id')
                ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
                ->join('bl_topic as top','proc.topic_id','=','top.topic_id')
                // ->join('bl_product_catalog_attempt_type_link as prod_link','prod_link.product_catalog_id','=','proc.id')
                ->join('bl_exam_attempt_type as exam','exam.id', '=', 'proc.exam_attempt_type_id')
                ->select('proc.*','cat.category_name','cat.category_id','sub.subject_id','top.topic_id','sub.subject_name','top.topic_name','exam.name as examName')
                ->simplePaginate(self::$RECORDS_PER_PAGE);

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

         return GlobalResponse::createResponse($product);


    }

     public function addShoppingCart(array $data, $user_profile_id)
    {
         try {
            DB::beginTransaction();        
            $shoppingMasterId = $data[0]['shopping_cart_master_id'];
          
            if($shoppingMasterId == 0){
                $test = DB::table('bl_shopping_cart_detail')
                                ->where('product_catalog_id', '=', $data[0]['product_catalog_id'])
                                ->join('bl_shopping_cart_master as shopM','shopM.id','=','shopping_cart_master_id')
                                ->select('shopping_cart_master_id')
                                ->get();
                
                $test2 = json_decode($test,true);
                if(count($test2) > 0){
                    $test3 = DB::table('bl_shopping_cart_detail')
                                ->where('product_catalog_id', '=', $data[0]['product_catalog_id'])
                                ->join('bl_shopping_cart_master as shopM','shopM.id','=','shopping_cart_master_id')
                                ->delete();

                    $test1 = DB::table('bl_shopping_cart_master')
                                ->where('id', '=', $test2[0]['shopping_cart_master_id'])
                                ->delete();
                    $shoppingCartMaster = new ShoppingCartMaster;         
                    $shoppingCartMaster['last_update_user_id'] = $user_profile_id;
                    $shoppingCartMaster['shopping_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.shopping_code'));
                    $shoppingCartMaster['created_by_user_id'] = $user_profile_id;
                    $shoppingCartMaster['tax_ref_no'] = '1';
                    $shoppingCartMaster['total'] = '1';
                    $shoppingCartMaster['currency_id'] = '1';
                    $shoppingCartMaster['total_tax'] = '1';  
                    $shoppingCartMaster['gateway_param'] = '1';  
                    $shoppingCartMaster['user_profile_id'] = $user_profile_id;  
                    $shoppingCartMaster->fill($data[0]);
                    $shoppingCartMaster->save();

                   
                    $currentTimestamp =new Carbon();                                    
                    for ($x = 0; $x < count($data); $x++){
                        $data[$x]['user_profile_id'] = $user_profile_id;
                        $data[$x]['shopping_cart_master_id'] = $shoppingCartMaster->id; 
                        $shopping_Detail['shopping_cart_date'] = $shoppingCartMaster->shopping_date; 

                    }
                      // $test4 = DB::table('bl_shopping_cart_detail')
                      //           ->where('id', '=', $test2[0]['shopping_cart_master_id'])
                      //           ->update('shopping_cart_master_id',$shoppingCartMaster->id); 
                      $shoppingCartMasterId = $shoppingCartMaster->id; 
                     // Model::insert($data); // Eloquent approach
                      DB::table('bl_shopping_cart_detail')->insert($data); // Query Builder approach
                } else {
                    $shoppingCartMaster = new ShoppingCartMaster;         
                    $shoppingCartMaster['last_update_user_id'] = $user_profile_id;
                    $shoppingCartMaster['shopping_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.shopping_code'));
                    $shoppingCartMaster['created_by_user_id'] = $user_profile_id;
                    $shoppingCartMaster['tax_ref_no'] = '1';
                    $shoppingCartMaster['total'] = '1';
                    $shoppingCartMaster['currency_id'] = '1';
                    $shoppingCartMaster['total_tax'] = '1';  
                    $shoppingCartMaster['gateway_param'] = '1';  
                    $shoppingCartMaster['user_profile_id'] = $user_profile_id;  
                    $shoppingCartMaster->fill($data[0]);
                    $shoppingCartMaster->save();

                   
                    $currentTimestamp =new Carbon();                                    
                    for ($x = 0; $x < count($data); $x++){
                        $data[$x]['user_profile_id'] = $user_profile_id;
                        $data[$x]['shopping_cart_master_id'] = $shoppingCartMaster->id; 
                        $shopping_Detail['shopping_cart_date'] = $shoppingCartMaster->shopping_date; 

                    }

                      $shoppingCartMasterId = $shoppingCartMaster->id; 
                     // Model::insert($data); // Eloquent approach
                      DB::table('bl_shopping_cart_detail')->insert($data); // Query Builder approach
                }
               
             
            } else {
                $shopping_Detail = DB::table('bl_shopping_cart_detail')
                                ->where('product_catalog_id', '=', $data[0]['product_catalog_id'])
                                ->delete();
               for ($x = 0; $x < count($data); $x++){
                      
                    $data[$x]['user_profile_id'] = $user_profile_id;
                    $data[$x ]['shopping_cart_master_id'] = $shoppingMasterId; 

                  }
                  DB::table('bl_shopping_cart_detail')->insert($data); // Query Builder approach

                  $data = DB::table('bl_shopping_cart_master')
                                        ->orderBy('created_on_timestamp', 'desc')
                                        ->select('id')
                                        ->take(1)
                                        ->get();
                $shoppingCartMasterId = $data[0]->id;
                //$shoppingCartMasterId = $data[0]['id'];
                
             // $shoppingCartMasterId =  DB::select('SELECT id from bl_shopping_cart_master as shopM order by created_on_timestamp desc limit 1');
          //  $shoppingCartMasterId =  json_decode($data,true);
           
            }  
            
        } catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
         DB::commit();
        return GlobalResponse::createResponse($shoppingCartMasterId);
    }

      public function confirmOrder(array $data, $user_profile_id, $user_id, $user_type, $clnt_group_id)
    {
         try {
            DB::beginTransaction();        
                $orderMaster = new OrderMaster;     
                if($user_type == 'C'){  
                $orderMaster['order_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.order_code'));
                $orderMaster['tax_ref_no'] = '1';
                $orderMaster['total'] = '1';
                $orderMaster['total_tax'] = '1';  
                $orderMaster['gateway_param'] = '1';  
                $orderMaster['user_profile_id'] = $user_profile_id;  
                $orderMaster['created_by_user_id'] = $user_profile_id;
                $orderMaster['last_update_user_id'] = $user_profile_id;
                $data[0]['clnt_group_id'] = NULL;
                $data[0]['clnt_id'] = NULL;
                $orderMaster->fill($data[0]);
                $orderMaster->save();
                
                for ($x = 0; $x < count($data); $x++){
                    $qty = $data[$x]['quantity'];
                    $int = (int)$qty;
                    $order_detail = new OrderDetail; 
                    $order_detail['user_profile_id'] = $user_profile_id;
                    $order_detail['order_master_id'] = $orderMaster->id; 
                    $order_detail['order_seq'] = $x+1;
                    $order_detail['product_catalog_id'] = $data[$x]['id'];
                    $order_detail['price'] = $data[$x]['price'];
                    $order_detail['discount'] = $data[$x]['discount'];
                    $order_detail['bundle_price']=$data[$x]['bundle_price'];
                    $order_detail['sgst']=$data[$x]['sgst'];
                    $order_detail['cgst']=$data[$x]['cgst'];
                    $order_detail['igst']=$data[$x]['igst'];
                    $order_detail['other_tax1']=$data[$x]['other_tax1'];
                    $order_detail['other_tax2']=$data[$x]['other_tax2'];
                    $order_detail['other_tax3']=$data[$x]['other_tax3'];
                    $order_detail['total_tax']=$data[$x]['tax'];
                    $order_detail['grand_total']=$data[$x]['amount'];
                    $order_detail['clnt_id']=NULL;
                    $order_detail['clnt_group_id']=NULL;   
                    $order_detail['valid_from']=$data[$x]['from'];
                    $order_detail['valid_to']=$data[$x]['to'];
                    $order_detail['unit_qty']=$data[$x]['quantity'];
                    if($data[$x]['exam_attempt_type_id'] == 1){
                     $order_detail['no_of_attempts']=99999999999;
                    }else{
                        $order_detail['no_of_attempts']=$data[$x]['quantity'];
                    }
                    
                    $order_detail->fill($data);
                    $order_detail->save();
   
                 $prodId = $order_detail->product_catalog_id;

                //get shopping cart master id 
                $data11 = DB::table('bl_shopping_cart_detail')->where("product_catalog_id",'=', $prodId)->select('shopping_cart_master_id')->get();

                //delete data from bl_shopping_cart_master & bl_shopping_cart_detail
                if(count($data11) > 0) {
                    $shopMaster = DB::table('bl_shopping_cart_master')->where("id",'=', $data11[0]->shopping_cart_master_id)->delete();
                    $shopcart = DB::table('bl_shopping_cart_detail')->where("product_catalog_id",'=', $prodId)->delete();
            }
        }
        }else{
             $orderMaster['order_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.order_code'));
                $orderMaster['tax_ref_no'] = '1';
                $orderMaster['total'] = '1';
                $orderMaster['total_tax'] = '1';  
                $orderMaster['gateway_param'] = '1';  
                $orderMaster['user_profile_id'] = $user_profile_id;  
                $orderMaster['created_by_user_id'] = $user_profile_id;
                $orderMaster['last_update_user_id'] = $user_profile_id;
                $orderMaster->fill($data[0]);
                $orderMaster->save();
                
                for ($x = 0; $x < count($data); $x++){
                    $qty = $data[$x]['quantity'];
                    $int = (int)$qty;
                    $order_detail = new OrderDetail; 
                    $order_detail['user_profile_id'] = $user_profile_id;
                    $order_detail['order_master_id'] = $orderMaster->id; 
                    $order_detail['order_seq'] = $x+1;
                    $order_detail['product_catalog_id'] = $data[$x]['id'];
                    $order_detail['price'] = $data[$x]['price'];
                    $order_detail['discount'] = $data[$x]['discount'];
                    $order_detail['bundle_price']=$data[$x]['bundle_price'];
                    $order_detail['sgst']=$data[$x]['sgst'];
                    $order_detail['cgst']=$data[$x]['cgst'];
                    $order_detail['igst']=$data[$x]['igst'];
                    $order_detail['other_tax1']=$data[$x]['other_tax1'];
                    $order_detail['other_tax2']=$data[$x]['other_tax2'];
                    $order_detail['other_tax3']=$data[$x]['other_tax3'];
                    $order_detail['total_tax']=$data[$x]['tax'];
                    $order_detail['grand_total']=$data[$x]['amount'];
                    $order_detail['clnt_id']=$user_id;
                    $order_detail['clnt_group_id']=$clnt_group_id;   
                    $order_detail['valid_from']=$data[$x]['from'];
                    $order_detail['valid_to']=$data[$x]['to'];
                    $order_detail['unit_qty']=$data[$x]['quantity'];
                    if($data[$x]['exam_attempt_type_id'] == 1){
                     $order_detail['no_of_attempts']=99999999999;
                    }else{
                        $order_detail['no_of_attempts']=$data[$x]['quantity'];
                    }
                    $order_detail->fill($data);
                    $order_detail->save();
   
                $prodId = $order_detail->product_catalog_id;
                //get shopping cart master id 
                $data11 = DB::table('bl_shopping_cart_detail')->where("product_catalog_id",'=', $prodId)->select('shopping_cart_master_id')->get();
                //delete data from bl_shopping_cart_master & bl_shopping_cart_detail
                if(count($data11) > 0) {
                    $shopMaster = DB::table('bl_shopping_cart_master')->where("id",'=', $data11[0]->shopping_cart_master_id)->delete();
                    $shopcart = DB::table('bl_shopping_cart_detail')->where("product_catalog_id",'=', $prodId)->delete();
            }
        }
            
                if($user_type == 'C'){
                    $invoice = DB::table("bl_customer as cust")
                    ->join('bl_user_profile_defn as user','user.user_id','=','cust.customer_id')
                    ->join('bl_address as address','cust.customer_id','=','address.user_id')
                    ->where([['cust.is_deleted',0],['address.add_type_id',2],['user.user_type','C']]) 
                    ->where('cust.customer_id','=',$user_id)
                    ->select('cust.cust_first_name','cust.cust_last_name','cust.customer_id')
                    ->get();

                $tmp = json_decode($invoice,true);
                $invoiceHeader = new InvoiceHeader;       
                $invoiceHeader['invoice_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.invoice_no'));
              //  $invoiceHeader['order_date'] = $orderMaster->order_date;
                $invoiceHeader['consignee_first_name'] = $tmp[0]['cust_first_name'];
                $invoiceHeader['consignee_last_name'] = $tmp[0]['cust_last_name'];
                $invoiceHeader['cust_id'] = $tmp[0]['customer_id'];
                $invoiceHeader['clnt_id'] = NULL;
                $invoiceHeader['order_no'] = $orderMaster->order_no; 
                $invoiceHeader['type'] = '1';  
                $invoiceHeader['cust_tax_ref_no'] = '1'; 
                $invoiceHeader['total_bill_amt'] = $data[0]['amount']; 
                $invoiceHeader['currency'] = '1';  
                $invoiceHeader['other_ref'] = '1';
                $invoiceHeader['pay_mode'] = '1';
                $invoiceHeader['signature_title'] = '1';
                $invoiceHeader['name_of_authority'] = '1';
                $invoiceHeader['sales_terms1'] = '1';
                $invoiceHeader['sales_terms2'] = '1';
                $invoiceHeader['sales_terms3'] = '1';
                $invoiceHeader['sales_terms4'] = '1';
                $invoiceHeader['sales_terms5'] = '1';
                $invoiceHeader['total_invoice_qty'] = '1';
                $invoiceHeader['created_by_user_id'] = $user_profile_id;
                $invoiceHeader['last_update_user_id'] = $user_profile_id;
                $invoiceHeader->save();

                } else{
                    $invoice = DB::table("bl_client as clnt")
                    ->join('bl_user_profile_defn as user','user.user_id','=','clnt.client_id')
                    ->join('bl_address as address','clnt.client_id','=','address.user_id')
                    ->where([['clnt.is_deleted',0],['address.add_type_id',2],['user.user_type','T']]) 
                    ->where('clnt.client_id','=',$user_id)
                    ->select('clnt.clnt_contact_person_first_name','clnt.clnt_contact_person_last_name','clnt.client_id')
                    ->get();

                    $tmp = json_decode($invoice,true);
                    $invoiceHeader = new InvoiceHeader;       
                    $invoiceHeader['invoice_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.invoice_no'));
                //    $invoiceHeader['order_date'] = $orderMaster->order_date;
                    $invoiceHeader['consignee_first_name'] = $tmp[0]['clnt_contact_person_first_name'];
                    $invoiceHeader['consignee_last_name'] = $tmp[0]['clnt_contact_person_last_name'];
                    $invoiceHeader['clnt_id'] = $tmp[0]['client_id'];
                    $invoiceHeader['order_no'] = $orderMaster->order_no; 
                    $invoiceHeader['type'] = '1';  
                    $invoiceHeader['cust_tax_ref_no'] = '1'; 
                    $invoiceHeader['total_bill_amt'] = $data[0]['amount']; 
                    $invoiceHeader['currency'] = '1';  
                    $invoiceHeader['other_ref'] = '1';
                    $invoiceHeader['pay_mode'] = '1';
                    $invoiceHeader['signature_title'] = '1';
                    $invoiceHeader['name_of_authority'] = '1';
                    $invoiceHeader['sales_terms1'] = '1';
                    $invoiceHeader['sales_terms2'] = '1';
                    $invoiceHeader['sales_terms3'] = '1';
                    $invoiceHeader['sales_terms4'] = '1';
                    $invoiceHeader['sales_terms5'] = '1';
                    $invoiceHeader['total_invoice_qty'] = '1';
                    $invoiceHeader['created_by_user_id'] = $user_profile_id;
                    $invoiceHeader['last_update_user_id'] = $user_profile_id;
                    $invoiceHeader->save();

                }
            for ($y = 0; $y < count($data); $y++){
                $invoiceDetail = new InvoiceDetail;       
                $invoiceDetail['invoice_code'] = $invoiceHeader->invoice_no; 
                $invoiceDetail['invoice_date'] = $invoiceHeader->invoice_date; 
                $invoiceDetail['seq_no'] = '1';
                $invoiceDetail['exam_code'] = $data[$y]['product_catalog_code'];
                $invoiceDetail['exam_name'] = $data[$y]['name'];
                $invoiceDetail['price'] =  $data[$y]['price'];
                $invoiceDetail['discount_amount'] = '1';  
                $invoiceDetail['sgst'] = $data[$y]['sgst']; 
                $invoiceDetail['cgst'] = $data[$y]['cgst']; 
                $invoiceDetail['igst'] = $data[$y]['igst'];  
                $invoiceDetail['other_tax1'] = $data[$y]['other_tax1']; 
                $invoiceDetail['other_tax2'] = $data[$y]['other_tax2'];
                $invoiceDetail['other_tax3'] = $data[$y]['other_tax3'];
                $invoiceDetail['bundle_price'] = '1';
                $invoiceDetail['total_amount'] =  $data[$y]['amount'];
                $invoiceDetail['total_qty'] = $data[$y]['quantity'];
                $invoiceDetail['total_tax_amount'] = $data[$y]['tax'];
                $invoiceDetail['total_bill_value'] = $data[$y]['amount'];
                $invoiceDetail['unit_qty'] = $data[$y]['quantity'];
                $invoiceDetail['sales_terms1'] = '1';
                $invoiceDetail['sales_terms2'] = '1';
                $invoiceDetail['sales_terms3'] = '1';
                $invoiceDetail['sales_terms4'] = '1';
                $invoiceDetail['sales_terms5'] = '1';
                $invoiceDetail['exam_attempt_type_id'] = $data[$y]['exam_attempt_type_id'];              
                $invoiceDetail['created_by_user_id'] = $user_profile_id;
                $invoiceDetail['last_update_user_id'] = $user_profile_id;
                $invoiceDetail->save();
            }
            }
        }catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
         DB::commit();
        return GlobalResponse::createResponse($orderMaster);

    }


    public function getAllPerforma($user_type, $user_id){
        try{

       if($user_type == 'C'){
                    $invoice = DB::table("bl_customer as cust")
                    ->join('bl_user_profile_defn as user','user.user_id','=','cust.customer_id')
                    ->join('bl_address as address','cust.customer_id','=','address.user_id')
                    ->join('bl_country_master as cou','cou.country_id','=','address.country_id')
                    ->where([['cust.is_deleted',0],['address.add_type_id',2],['user.user_type','C']]) 
                    ->where('cust.customer_id','=',$user_id)
                    ->select('cust.cust_first_name as consignee_first_name','cust.customer_id','address.cust_add_line_1 as consignee_add_line_1','cust.cust_pan as consignee_pan','cou.country_full_name')
                    ->get();
        } else {
             $invoice = DB::table("bl_client as clnt")
                    ->join('bl_user_profile_defn as user','user.user_id','=','clnt.client_id')
                    ->join('bl_address as address','clnt.client_id','=','address.user_id')
                    ->join('bl_country_master as cou','cou.country_id','=','address.country_id')
                    ->where([['clnt.is_deleted','=',0],['address.add_type_id','=',2],['user.user_type','=','T']]) 
                    ->where('clnt.client_id','=',$user_id)
                    ->select('clnt.clnt_contact_person_first_name as consignee_first_name','clnt.client_id','address.cust_add_line_1 as consignee_add_line_1','clnt.tax_id as consignee_pan','cou.country_full_name')
                    ->get();
        }   


        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($invoice);

    }

    
    public function getAllCart($user_profile_id){
        try{
               
                $product = DB::table('bl_user_profile_defn as user')
                    ->where('user.user_profile_id', '=', $user_profile_id)
                ->join('bl_shopping_cart_master as shopM','user.user_profile_id','=','shopM.user_profile_id')
                ->join('bl_shopping_cart_detail as shopD', 'shopD.shopping_cart_master_id', '=', 'shopM.id')
                ->join('bl_product_catalog as prd', 'shopD.product_catalog_id', '=', 'prd.id')
                ->select('prd.*','shopM.id as shopMId')
                ->get();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }


        return GlobalResponse::createResponse($product);

    }

    public function confirmCartOrder(array $data, $user_profile_id, $user_id, $user_type,$clnt_group_id)
    {

         try {
            DB::beginTransaction();   
               
                $orderMaster = new OrderMaster;     
                if($user_type == 'C'){  
                $orderMaster['order_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.order_code'));
                $orderMaster['tax_ref_no'] = '1';
                $orderMaster['total'] = '1';
                $orderMaster['total_tax'] = '1';  
                $orderMaster['gateway_param'] = '1';  
                $orderMaster['user_profile_id'] = $user_profile_id;  
                $orderMaster['created_by_user_id'] = $user_profile_id;
                $orderMaster['last_update_user_id'] = $user_profile_id;
                $data[0]['clnt_group_id'] = NULL;
                $data[0]['clnt_id'] = NULL;
                $orderMaster->fill($data[0]);
                $orderMaster->save();
                
                for ($x = 0; $x < count($data); $x++){
                    $qty = $data[$x]['quantity'];
                    $int = (int)$qty;
                    $order_detail = new OrderDetail; 
                    $order_detail['user_profile_id'] = $user_profile_id;
                    $order_detail['order_master_id'] = $orderMaster->id; 
                    $order_detail['order_seq'] = $x+1;
                    $order_detail['product_catalog_id'] = $data[$x]['id'];
                    $order_detail['price'] = $data[$x]['price'];
                    $order_detail['discount'] = $data[$x]['discount'];
                    $order_detail['bundle_price']=$data[$x]['bundle_price'];
                    $order_detail['sgst']=$data[$x]['sgst'];
                    $order_detail['cgst']=$data[$x]['cgst'];
                    $order_detail['igst']=$data[$x]['igst'];
                    $order_detail['other_tax1']=$data[$x]['other_tax1'];
                    $order_detail['other_tax2']=$data[$x]['other_tax2'];
                    $order_detail['other_tax3']=$data[$x]['other_tax3'];
                    $order_detail['total_tax']=$data[$x]['tax'];
                    $order_detail['grand_total']=$data[$x]['amount'];
                    $order_detail['clnt_id']=NULL;
                    $order_detail['clnt_group_id']=NULL;   
                    $order_detail['valid_from']=$data[$x]['from'];
                    $order_detail['valid_to']=$data[$x]['to'];
                    $order_detail['unit_qty']=$data[$x]['quantity'];
                     if($data[$x]['exam_attempt_type_id'] == 1){
                     $order_detail['no_of_attempts']=99999999999;
                    }else{
                        $order_detail['no_of_attempts']=$data[$x]['quantity'];
                    }
                    $order_detail->fill($data);
                    $order_detail->save();
   
                $prodId = $order_detail->product_catalog_id;
                $data11 = DB::table('bl_shopping_cart_detail')->where([["product_catalog_id",'=', $prodId],['user_profile_id','=',$user_profile_id]])->select('shopping_cart_master_id')->get();
                $shopMaster = DB::table('bl_shopping_cart_master')->where("id",'=', $data11[0]->shopping_cart_master_id)->delete();
                $shopcart = DB::table('bl_shopping_cart_detail')->where([["product_catalog_id",'=', $prodId],['user_profile_id','=',$user_profile_id]])->delete();
            }
        }
        else{
             $orderMaster['order_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.order_code'));
                $orderMaster['tax_ref_no'] = '1';
                $orderMaster['total'] = '1';
                $orderMaster['total_tax'] = '1';  
                $orderMaster['gateway_param'] = '1';  
                $orderMaster['user_profile_id'] = $user_profile_id;  
                $orderMaster['created_by_user_id'] = $user_profile_id;
                $orderMaster['last_update_user_id'] = $user_profile_id;
                $orderMaster->fill($data[0]);
                $orderMaster->save();
                
                for ($x = 0; $x < count($data); $x++){
                    $qty = $data[$x]['quantity'];
                    $int = (int)$qty;
                    $order_detail = new OrderDetail; 
                    $order_detail['user_profile_id'] = $user_profile_id;
                    $order_detail['order_master_id'] = $orderMaster->id; 
                    $order_detail['order_seq'] = $x+1;
                    $order_detail['product_catalog_id'] = $data[$x]['id'];
                    $order_detail['price'] = $data[$x]['price'];
                    $order_detail['discount'] = $data[$x]['discount'];
                    $order_detail['bundle_price']=$data[$x]['bundle_price'];
                    $order_detail['sgst']=$data[$x]['sgst'];
                    $order_detail['cgst']=$data[$x]['cgst'];
                    $order_detail['igst']=$data[$x]['igst'];
                    $order_detail['other_tax1']=$data[$x]['other_tax1'];
                    $order_detail['other_tax2']=$data[$x]['other_tax2'];
                    $order_detail['other_tax3']=$data[$x]['other_tax3'];
                    $order_detail['total_tax']=$data[$x]['tax'];
                    $order_detail['grand_total']=$data[$x]['amount'];
                    $order_detail['clnt_id']=$user_id;
                    $order_detail['clnt_group_id']=$clnt_group_id;   
                    $order_detail['valid_from']=$data[$x]['from'];
                    $order_detail['valid_to']=$data[$x]['to'];
                    $order_detail['unit_qty']=$data[$x]['quantity'];
                     if($data[$x]['exam_attempt_type_id'] == 1){
                     $order_detail['no_of_attempts']=99999999999;
                    }else{
                        $order_detail['no_of_attempts']=$data[$x]['quantity'];
                    }
                    $order_detail->fill($data);
                    $order_detail->save();
   
                $prodId = $order_detail->product_catalog_id;
                $data11 = DB::table('bl_shopping_cart_detail')->where([["product_catalog_id",'=', $prodId],['user_profile_id','=',$user_profile_id]])->select('shopping_cart_master_id')->get();
                $shopMaster = DB::table('bl_shopping_cart_master')->where("id",'=', $data11[0]->shopping_cart_master_id)->delete();
                $shopcart = DB::table('bl_shopping_cart_detail')->where([["product_catalog_id",'=', $prodId],['user_profile_id','=',$user_profile_id]])->delete();
            }
        }
            
                if($user_type == 'C'){
                    $invoice = DB::table("bl_customer as cust")
                    ->join('bl_user_profile_defn as user','user.user_id','=','cust.customer_id')
                    ->join('bl_address as address','cust.customer_id','=','address.user_id')
                    ->where([['cust.is_deleted',0],['address.add_type_id',2],['user.user_type','C']]) 
                    ->where('cust.customer_id','=',$user_id)
                    ->select('cust.cust_first_name','cust.cust_last_name','cust.customer_id')
                    ->get();

                $tmp = json_decode($invoice,true);
                $invoiceHeader = new InvoiceHeader;       
                $invoiceHeader['invoice_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.invoice_no'));
             //   $invoiceHeader['order_date'] = $orderMaster->order_date;
                $invoiceHeader['consignee_first_name'] = $tmp[0]['cust_first_name'];
                $invoiceHeader['consignee_last_name'] = $tmp[0]['cust_last_name'];
                $invoiceHeader['cust_id'] = $tmp[0]['customer_id'];
                $invoiceHeader['clnt_id'] = NULL;
                $invoiceHeader['order_no'] = $orderMaster->order_no; 
                $invoiceHeader['type'] = '1';  
                $invoiceHeader['cust_tax_ref_no'] = '1'; 
                $invoiceHeader['total_bill_amt'] = $data[0]['amount']; 
                $invoiceHeader['currency'] = '1';  
                $invoiceHeader['other_ref'] = '1';
                $invoiceHeader['pay_mode'] = '1';
                $invoiceHeader['signature_title'] = '1';
                $invoiceHeader['name_of_authority'] = '1';
                $invoiceHeader['sales_terms1'] = '1';
                $invoiceHeader['sales_terms2'] = '1';
                $invoiceHeader['sales_terms3'] = '1';
                $invoiceHeader['sales_terms4'] = '1';
                $invoiceHeader['sales_terms5'] = '1';
                $invoiceHeader['total_invoice_qty'] = '1';
                $invoiceHeader['created_by_user_id'] = $user_profile_id;
                $invoiceHeader['last_update_user_id'] = $user_profile_id;
                $invoiceHeader->save();

                } else{
                    $invoice = DB::table("bl_client as clnt")
                    ->join('bl_user_profile_defn as user','user.user_id','=','clnt.client_id')
                    ->join('bl_address as address','clnt.client_id','=','address.user_id')
                    ->where([['clnt.is_deleted',0],['address.add_type_id',2],['user.user_type','T']]) 
                    ->where('clnt.client_id','=',$user_id)
                    ->select('clnt.clnt_contact_person_first_name','clnt.clnt_contact_person_last_name','clnt.client_id')
                    ->get();


                    $tmp = json_decode($invoice,true);
                    $invoiceHeader = new InvoiceHeader;       
                    $invoiceHeader['invoice_no'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.invoice_no'));
                  //  $invoiceHeader['order_date'] = $orderMaster->order_date;
                    $invoiceHeader['consignee_first_name'] = $tmp[0]['clnt_contact_person_first_name'];
                    $invoiceHeader['consignee_last_name'] = $tmp[0]['clnt_contact_person_last_name'];
                    $invoiceHeader['clnt_id'] = $tmp[0]['client_id'];
                    $invoiceHeader['order_no'] = $orderMaster->order_no; 
                    $invoiceHeader['type'] = '1';  
                    $invoiceHeader['cust_tax_ref_no'] = '1'; 
                    $invoiceHeader['total_bill_amt'] = $data[0]['amount']; 
                    $invoiceHeader['currency'] = '1';  
                    $invoiceHeader['other_ref'] = '1';
                    $invoiceHeader['pay_mode'] = '1';
                    $invoiceHeader['signature_title'] = '1';
                    $invoiceHeader['name_of_authority'] = '1';
                    $invoiceHeader['sales_terms1'] = '1';
                    $invoiceHeader['sales_terms2'] = '1';
                    $invoiceHeader['sales_terms3'] = '1';
                    $invoiceHeader['sales_terms4'] = '1';
                    $invoiceHeader['sales_terms5'] = '1';
                    $invoiceHeader['total_invoice_qty'] = '1';
                    $invoiceHeader['created_by_user_id'] = $user_profile_id;
                    $invoiceHeader['last_update_user_id'] = $user_profile_id;
                    $invoiceHeader->save();

                }
        


            for ($y = 0; $y < count($data); $y++){
                $invoiceDetail = new InvoiceDetail;       
                $invoiceDetail['invoice_code'] = $invoiceHeader->invoice_no; 
                $invoiceDetail['invoice_date'] = $invoiceHeader->invoice_date; 
                $invoiceDetail['seq_no'] = '1';
                $invoiceDetail['exam_code'] = $data[$y]['product_catalog_code'];
                $invoiceDetail['exam_name'] = $data[$y]['name'];
                $invoiceDetail['price'] =  $data[$y]['price'];
                $invoiceDetail['discount_amount'] = '1';  
                $invoiceDetail['sgst'] = $data[$y]['sgst']; 
                $invoiceDetail['cgst'] = $data[$y]['cgst']; 
                $invoiceDetail['igst'] = $data[$y]['igst'];  
                $invoiceDetail['other_tax1'] = $data[$y]['other_tax1']; 
                $invoiceDetail['other_tax2'] = $data[$y]['other_tax2'];
                $invoiceDetail['other_tax3'] = $data[$y]['other_tax3'];
                $invoiceDetail['bundle_price'] = '1';
                $invoiceDetail['total_amount'] =  $data[$y]['amount'];
                $invoiceDetail['total_qty'] = $data[$y]['quantity'];
                $invoiceDetail['total_tax_amount'] = $data[$y]['tax'];
                $invoiceDetail['total_bill_value'] = $data[$y]['amount'];
                $invoiceDetail['unit_qty'] = $data[$y]['quantity'];
                $invoiceDetail['sales_terms1'] = '1';
                $invoiceDetail['sales_terms2'] = '1';
                $invoiceDetail['sales_terms3'] = '1';
                $invoiceDetail['sales_terms4'] = '1';
                $invoiceDetail['sales_terms5'] = '1';
                $invoiceDetail['exam_attempt_type_id'] = $data[$y]['exam_attempt_type_id'];              
                $invoiceDetail['created_by_user_id'] = $user_profile_id;
                $invoiceDetail['last_update_user_id'] = $user_profile_id;
                $invoiceDetail->save();
            }
              $test1 = DB::table('bl_shopping_cart_master')
                                ->where('user_profile_id', '=',$user_profile_id )
                                ->delete();
            }
        catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
         DB::commit();
        return GlobalResponse::createResponse($orderMaster);

    }

    public function delete(array $data, $user_profile_id){
     try{

          //  DB::beginTransaction();

            $cart = DB::table('bl_shopping_cart_detail')->where([["product_catalog_id",'=', $data[0]],['user_profile_id','=',$user_profile_id]])->delete();
            
            $product = DB::table('bl_shopping_cart_detail as shop')
                ->where('shop.user_profile_id', '=', $user_profile_id)               
                ->select('shop.*')
                ->get();
            if(count($product) == 0){
               $cart = DB::table('bl_shopping_cart_master')->where('user_profile_id','=',$user_profile_id)->delete();
            }
        }catch(Exception $e){
          //  DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
       // DB::commit();

        return GlobalResponse::createResponse($cart);
    }

    public function getPromoCode(array $data, $user_profile_id, $user_type, $user_id)
    {
         try {
                   
            DB::beginTransaction();        
             if($user_type == 'C'){
                $orderCode = DB::table("bl_order_detail as ordD")
                ->where('ordD.order_master_id', '=', $data['id']) 
                ->join('bl_order_master as ordM', 'ordM.id', '=', 'ordD.order_master_id')
                ->join('bl_product_catalog as proD','proD.id','=','ordD.product_catalog_id')
                ->select('ordM.order_no','ordM.order_date','ordD.id as orDid','ordD.unit_qty','proD.product_catalog_code','proD.name','proD.valid_from','proD.valid_to','proD.id as proId','ordD.no_of_attempts')
                ->get();
                $tmp = json_decode($orderCode,true);
                for ($y = 0; $y < count($tmp); $y++){
                    $qty = $tmp[$y]['unit_qty'];
                    $int = (int)$qty;
                    for($x = 0; $x < $int; $x++){
                        $promoMaster = new PromoMaster;       
                              $promoCode = DB::table("bl_promo_master as proM")
                              ->orderBy('id', 'desc')
                                ->select('proM.promo_code')
                                ->get();
                           $tmp2 = json_decode($promoCode,true);
                        $promoMaster['promo_code'] = BLAlphaNumericCodeGenerator::generatePromoCode($tmp2, $user_type);
                        $promoMaster['client_id'] = NULL;
                        $promoMaster['exam_code'] = $tmp[$y]['product_catalog_code'];
                        $promoMaster['exam_name'] = $tmp[$y]['name'];
                        $promoMaster['product_catalog_id'] = $tmp[$y]['proId'];
                        $promoMaster['promo_valid_fm_date'] = $tmp[$y]['valid_from'];
                        $promoMaster['promo_valid_to_date'] = $tmp[$y]['valid_to'];
                        $promoMaster['payment_ref_no'] = '1';
                        $promoMaster['order_no'] = $tmp[$y]['order_no'];
                        $promoMaster['order_date'] = $tmp[$y]['order_date'];
                        $promoMaster['no_attempts_sofar'] = '0';
                        if($tmp[$y]['no_of_attempts'] == 99999999999){
                            $promoMaster['no_attempts_allowed'] = 99999999999;
                        }else{
                            $promoMaster['no_attempts_allowed'] = 1;
                        }
                        $promoMaster['user_profile_id'] = $user_profile_id;  
                        $promoMaster['created_by_user_id'] = $user_profile_id;
                        $promoMaster['last_update_user_id'] = $user_profile_id;
                        $promoMaster['order_detail_id'] = $tmp[$y]['orDid'];
                        $promoMaster->save();
                    }
                 }
                }
                else{
                       $orderCode = DB::table("bl_order_detail as ordD")
                ->where('ordD.order_master_id', '=', $data['id']) 
                ->join('bl_order_master as ordM', 'ordM.id', '=', 'ordD.order_master_id')
                ->join('bl_product_catalog as proD','proD.id','=','ordD.product_catalog_id')
                ->select('ordM.order_no','ordM.order_date','ordD.id as orDid','ordD.unit_qty','proD.product_catalog_code','proD.name','proD.valid_from','proD.valid_to','proD.id as proId','ordD.no_of_attempts')
                ->get();
                $tmp = json_decode($orderCode,true);
                for ($y = 0; $y < count($tmp); $y++){
                    $qty = $tmp[$y]['unit_qty'];
                    $int = (int)$qty;
                    for($x = 0; $x < $int; $x++){
                        $promoMaster = new PromoMaster;       
                              $promoCode = DB::table("bl_promo_master as proM")
                              ->orderBy('id', 'desc')
                                ->select('proM.promo_code')
                                ->get();
                           $tmp2 = json_decode($promoCode,true);
                        $promoMaster['promo_code'] = BLAlphaNumericCodeGenerator::generatePromoCode($tmp2, $user_type);
                        $promoMaster['client_id'] = $user_id;
                        $promoMaster['exam_code'] = $tmp[$y]['product_catalog_code'];
                        $promoMaster['exam_name'] = $tmp[$y]['name'];
                        $promoMaster['product_catalog_id'] = $tmp[$y]['proId'];
                        $promoMaster['promo_valid_fm_date'] = $tmp[$y]['valid_from'];
                        $promoMaster['promo_valid_to_date'] = $tmp[$y]['valid_to'];
                        $promoMaster['payment_ref_no'] = '1';
                        $promoMaster['order_no'] = $tmp[$y]['order_no'];
                        $promoMaster['order_date'] = $tmp[$y]['order_date'];
                        $promoMaster['no_attempts_sofar'] = '0';
                        if($tmp[$y]['no_of_attempts'] == 99999999999){
                            $promoMaster['no_attempts_allowed'] = 99999999999;
                        }else{
                            $promoMaster['no_attempts_allowed'] = 1;
                        }
                        $promoMaster['user_profile_id'] = $user_profile_id;  
                        $promoMaster['created_by_user_id'] = $user_profile_id;
                        $promoMaster['last_update_user_id'] = $user_profile_id;
                        $promoMaster['order_detail_id'] = $tmp[$y]['orDid'];
                        $promoMaster->save();
                    }
                 }  
                }
        } catch(Exception $e) {
            DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
         DB::commit();
         return GlobalResponse::createResponse($promoMaster);
    }

      public function getAllShopCart(){
		 
          try{    
                $currentdate =new Carbon();
                // $sql = 'proc.valid_from' >= $currentdate or 'proc.valid_to' >= $currentdate;
                $product = DB::table("bl_product_catalog as proc")
               //->where([['proc.is_deleted',0],['proc.is_active',1],['proc.populate_all',1]]) 
                //->where(function($q) {
                   // $currentdate =new Carbon();
                   // $q->where([['proc.is_deleted',0],['proc.is_active',1],['proc.populate_all',1],['proc.valid_from', '<=' , $currentdate],['proc.valid_to', '>=' , $currentdate]]);
               // })
                ->join('bl_category as cat','proc.category_id','=','cat.category_id')
                ->join('bl_subject as sub','proc.subject_id','=','sub.subject_id')
                ->join('bl_topic as top','proc.topic_id','=','top.topic_id')
                // ->join('bl_product_catalog_attempt_type_link as prod_link','prod_link.product_catalog_id','=','proc.id')
                ->join('bl_exam_attempt_type as exam','exam.id', '=', 'proc.exam_attempt_type_id')
                ->select('proc.*','cat.category_name','cat.category_id','sub.subject_id','top.topic_id','sub.subject_name','top.topic_name','exam.name as examName')
                ->simplePaginate(self::$RECORDS_PER_PAGE);

                Log::info($product);
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($product);

    }


    public function search($data,$user_id){
        try{

        Log::info($user_id);
        

        $populate =DB::select("select populate_all from bl_product_catalog where is_active = 1 and is_deleted = 0 and populate_all=1 and name like '%".$data."%'");
        Log::info($populate);
        $tmp = json_encode($populate,true);

        if(count($tmp) > 0){

             $sql = "prod.is_active = 1 and prod.is_deleted = 0 and (prod.name like '%".$data."%' or prod.description like '%".$data."%' )";
       
           $data = DB::table("bl_product_catalog as prod")
          // ->where(function($q) {
            //        $currentdate =new Carbon();
            //        $q->where([['prod.is_deleted',0],['prod.is_active',1],['prod.populate_all',1],['prod.valid_from', '<=' , $currentdate],['prod.valid_to', '>=' , $currentdate]]);
            //  })
           ->whereRaw($sql)
          ->select("prod.*")   
           ->simplePaginate(self::$RECORDS_PER_PAGE);

        }else{
            $sql = "prod.is_active = 1 and prod.is_deleted = 0 and (prod.name like '%".$data."%' or prod.description like '%".$data."%' )";
       
           $data = DB::table("bl_product_catalog as prod")
          // ->where(function($q) {
               //     $currentdate =new Carbon();
                //    $q->where([['prod.is_deleted',0],['prod.is_active',1],['prod.populate_all',1],['prod.clnt_id','=',$user_id],['prod.valid_from', '<=' , $currentdate],['prod.valid_to', '>=' , $currentdate]]);
             // })
           ->whereRaw($sql)
          ->select("prod.*")   
           ->simplePaginate(self::$RECORDS_PER_PAGE);
       }
            if (is_null($data))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($data);

    }

    // public function getsearchresult($data){
    //     try{
    //          Log::info('Some message here.');
    //          Log::info($data);

    //         $finaldata = collect();
    //         if(!is_null($data->search)){
    //             $sql = "prod.is_deleted = 0 and (prod.name like '%".$data->search."%' )";
    //             $searchdata = DB::table("bl_product_catalog as prod")
    //             ->whereRaw($sql)
    //             ->select("prod.*")   
    //             ->get(); 
    //         }
    //         if(is_null($data->search)){
    //             $sql = "prod.is_deleted = 0 ";
    //             $searchdata = DB::table("bl_product_catalog as prod")
    //             ->whereRaw($sql)
    //             ->select("prod.*")   
    //             ->get(); 
    //         }
    //         if(!is_null($data->selectedcategory))
    //         {
    //            for($i=0;$i<count($data->selectedcategory);$i++){
    //             $tempcat = $data->selectedcategory[$i];
    //             // $searchdata = $searchdata->filter(function ($item) use ($tempcat) {
    //             // return $item->category_id == $tempcat;
    //             //  })->values();
    //             // $finaldata =  $finaldata->merge(collect($searchdata->all()));
    //             // }
    //             // $searchdata = $finaldata;

    //             $searchdata->where('category_id','=',$tempcat);
                
    //         }}

    //         if(!is_null($data->selectedsubject)){
    //             $finaldata = collect();
    //             for($i=0;$i<count($data->selectedsubject);$i++){
    //             $tempsub = $data->selectedsubject[$i];
    //             // $searchdata = $searchdata->filter(function ($item) use ($tempsub) {
    //             // return $item->subject_id == $tempsub;
    //             //  })->values();
    //             // $finaldata =  $finaldata->merge(collect($searchdata->all()));
    //             // }
    //             // $searchdata = $finaldata;
    //             $searchdata->where('subject_id','=',$tempsub);

    //         }}
    //         if(!is_null($data->selectedtopic)){
    //             $finaldata = collect();
    //             for($i=0;$i<count($data->selectedtopic);$i++){
    //             $temptop = $data->selectedtopic[$i];
    //             // $searchdata = $searchdata->filter(function ($item) use ($temptop) {
    //             // return $item->topic_id == $temptop;
    //             //  })->values();
    //             // $finaldata =  $finaldata->merge(collect($searchdata->all()));
    //             $searchdata->where('topic_id','=',$temptop);
    //             }
    //         }
    //     }
    // catch(Exception $e){
    //         return GlobalResponse::clientErrorResponse("error");
    //     } 
    //    // $searpaginate =new \Illuminate\Pagination\Paginator($searchdata,5 , 1);
    //     //Log::info($searpaginate);
    //     return response()->json($searchdata);

    // }

    public function getsearchresult($data,$user_id){
        try{
           
            if(!is_null($data->search)){
                $sql = "prod.is_active = 1 and prod.is_deleted = 0 and prod.name like '%".$data->search."%'  and (prod.clnt_id = '".$user_id."' or prod.populate_all = 1)";
                
            }
            if(is_null($data->search)){
                $sql = "prod.is_active = 1 and prod.is_deleted = 0 and (prod.clnt_id = '".$user_id."' or prod.populate_all = 1) ";
            }

            if(!is_null($data->selectedcategory))
            {
                
                $sql = $sql." and prod.category_id IN (".$data->selectedcategory.")";
             }
             if(!is_null($data->selectedsubject)){
                $sql = $sql." and prod.subject_id IN (".$data->selectedsubject.")";
             }
             if(!is_null($data->selectedtopic)){
                $sql = $sql." and prod.topic_id IN (".$data->selectedtopic.")";
             }
            

            $searchdata = DB::table("bl_product_catalog as prod")
                //->where(function($q) {
                  //  $currentdate =new Carbon();
                  //   $q->where([['prod.valid_from', '<=' , $currentdate],['prod.valid_to', '>=' , $currentdate]]);
               //  })
                ->whereRaw($sql)
                ->select("prod.*")   
                ->simplePaginate(self::$RECORDS_PER_PAGE); 
                Log::info( DB::table("bl_product_catalog as prod")
                //->where(function($q) {
                //    $currentdate =new Carbon();
                //     $q->where([['prod.valid_from', '<=' , $currentdate],['prod.valid_to', '>=' , $currentdate]]);
                 //})
                ->whereRaw($sql)
                ->select("prod.*")->tosql());
             }
        catch(Exception $e){
                return GlobalResponse::clientErrorResponse("error");
            } 
           return GlobalResponse::createResponse($searchdata);


    }
    public function getCartCount($user_profile_id){
        try{
             
               
                $product = DB::table('bl_shopping_cart_detail as shop')
                ->where('shop.user_profile_id', '=', $user_profile_id)               
                ->select('shop.*')
                ->get();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse(count($product));

    }


     
     public function getCustExam($user_profile_id){

        try{

                $exams = DB::table('bl_order_detail as bod')
                         ->leftjoin('bl_product_catalog as prod', 'bod.product_catalog_id','=','prod.id')
                         ->leftjoin('bl_exam_attempt_type as extyp', 'extyp.id','=','prod.exam_attempt_type_id')
                         ->leftjoin('bl_order_master', 'bod.order_master_id','=','bl_order_master.id') 
                        ->join('bl_category as cat','cat.category_id','=','prod.category_id')
                        ->join('bl_subject as sub','sub.subject_id','=','prod.subject_id')
                        ->join('bl_topic as top','top.topic_id','=','prod.topic_id')
                        ->select('bod.id','prod.valid_days','prod.name','prod.description','bod.unit_qty','extyp.name as exname','prod.valid_to')
                         ->where('bod.user_profile_id','=',$user_profile_id)
                          
                         ->get();
        
 
         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($exams);

    }

    public function getCustExam1($user_profile_id){
        

        try{

               // $exams = DB::table('bl_order_detail as bod')
               //           ->join('bl_product_catalog as proc', 'bod.product_catalog_id','=','proc.id')
               //           ->join('bl_order_master as bom', 'bod.order_master_id','=','bom.id')
               //           ->join('bl_exam_schedule as es','bod.id','=','es.order_detail_id','left outer')
               //          ->join('bl_promo_master as proM','proc.id','=','proM.product_catalog_id')
               //           ->select('bod.id','proc.name as exam_name','proc.description','es.is_schedule')
               //           ->get();
          //  $promo = DB::table('bl_promo_master as proM')
                           //  ->leftjoin('bl_exam_schedule as exsc','proM.id','=','exsc.promo_master_id')
                           //  ->join('bl_product_catalog as prod', 'proM.product_catalog_id','=','prod.id')
                           //  ->join('bl_category as cat','cat.category_id','=','prod.category_id')
                           //  ->join('bl_subject as sub','sub.subject_id','=','prod.subject_id')
                           //  ->join('bl_topic as top','top.topic_id','=','prod.topic_id')
                           //  ->leftjoin('bl_exam_attempt_type as extyp', 'extyp.id','=','prod.exam_attempt_type_id')
                           //  ->ORwhere('proM.user_profile_id','=',$user_profile_id)
                           //  ->ORwhere('proM.exam_allocated_to','=',$user_profile_id)
                           //  ->ORwhere([['exsc.user_profile_id','=',$user_profile_id],['exsc.status','!=','reschedule']])
                           // // ->orWhere('exsc.status','!=','reschedule')
                           //  ->ORWhere([['exsc.user_profile_id','=',$user_profile_id],['exsc.status','=','NULL']])
                           //  ->whereRaw(' CURDATE() < proM.promo_valid_to_date')
                           //  ->select('exsc.status','exsc.is_schedule','exsc.start_time','exsc.end_time','exsc.exam_planned_date','proM.promo_code','prod.valid_days','proM.id','proM.id as promo_id','prod.name','extyp.name as exname','proM.no_attempts_sofar','proM.no_attempts_allowed as no_of_attempts','prod.id as product_catalog_id','cat.category_name','sub.subject_name','top.topic_name','exsc.exam_schedule_id','proM.order_detail_id','cat.category_id','sub.subject_id','top.topic_id','exsc.user_profile_id','proM.exam_allocated_to',
                           //      'exsc.exam_trans_ref_no','exsc.time_elapsed')
                           //  ->get();
                $promo = DB::select("select * from (select proM.id,proM.id as promo_id,proM.promo_code,proM.exam_allocated_to,user_profile_id,proM.order_detail_id ,prod.valid_days,prod.name,extyp.name as exname,proM.no_attempts_allowed as no_of_attempts,prod.id as product_catalog_id,cat.category_name,sub.subject_name,top.topic_name,cat.category_id,proM.promo_valid_fm_date as valid_from,proM.promo_valid_to_date as valid_to ,sub.subject_id,top.topic_id,proM.no_attempts_sofar from bl_promo_master as proM join bl_product_catalog as prod on proM.product_catalog_id = prod.id join bl_category as cat on cat.category_id = prod.category_id join bl_subject as sub on sub.subject_id = prod.subject_id join bl_topic as top on top.topic_id = prod.topic_id join bl_exam_attempt_type as extyp on extyp.id=prod.exam_attempt_type_id  where (proM.user_profile_id=".$user_profile_id. " or proM.exam_allocated_to = ".$user_profile_id. " )    and proM.no_attempts_sofar < proM.no_attempts_allowed and CURDATE() < proM.promo_valid_to_date ) as d LEFT OUTER JOIN (select exam_schedule_id, order_detail_id as orderid, status,is_schedule,start_time, end_time,exam_planned_date,user_profile_id,exam_trans_ref_no,time_elapsed,promo_master_id  from bl_exam_schedule where user_profile_id=".$user_profile_id. "  and status!='completed') as s ON d.promo_id = s.promo_master_id ");
    

                 $tmp = json_encode($promo,true);
                 $tmp1 = json_decode($tmp,true);
                
                $order = DB::select("select * from 
                    (select bod.id,user_profile_id,bod.id as order_detail_id,prod.valid_days,prod.name,extyp.name as exname,bod.no_of_attempts,prod.id as product_catalog_id,cat.category_name,sub.subject_name,top.topic_name,cat.category_id,bod.valid_from,bod.valid_to
                    ,sub.subject_id,top.topic_id,bod.no_attempts_sofar,bod.unit_qty 
                    from    bl_order_detail as bod join bl_product_catalog as prod on bod.product_catalog_id = prod.id join bl_category as cat on cat.category_id = prod.category_id join bl_subject as sub on sub.subject_id = prod.subject_id join bl_topic as top on top.topic_id = prod.topic_id join bl_exam_attempt_type as extyp on extyp.id=prod.exam_attempt_type_id
                    where  bod.user_profile_id= ".$user_profile_id. "  and bod.no_attempts_sofar < bod.no_of_attempts and CURDATE() < bod.valid_to ) as d 
                    LEFT OUTER JOIN 
                    (select exam_schedule_id, order_detail_id as orderid, status,is_schedule,start_time,end_time,exam_planned_date,user_profile_id,exam_trans_ref_no,time_elapsed  from bl_exam_schedule where user_profile_id=".$user_profile_id. " and status!='completed') as s
                    ON d.order_detail_id = s.orderid ");
                $order = collect($order);
                $promo = collect($promo);
                $finaldata= collect();
                $tmparr = [];
                if(!is_null($tmp1)){
                        for($i=0;$i<count($tmp1);$i++){
                        $temvalue = $tmp1[$i]['order_detail_id'];
                        array_push($tmparr,$temvalue );
                        }
                }

              $finaldata = $order->whereNotIn('order_detail_id',$tmparr);

              $promo1 = $promo->filter(function ($item) {
                return $item->exam_allocated_to == NULL ;
                 })->values();

              $promo2 = $promo->filter(function($item) use ($user_profile_id){
                  return $item->exam_allocated_to == $user_profile_id ;
              })->values();
              
             $promo3 = $promo2->merge($promo1);
            $exams =   $promo3->merge($finaldata);

         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }
       
        return GlobalResponse::createResponse($exams);

    }

    public function getCustExam2($user_profile_id){

        try{

               // $exams = DB::table('bl_order_detail as bod')
               //           ->join('bl_product_catalog as proc', 'bod.product_catalog_id','=','proc.id')
               //           ->join('bl_order_master as bom', 'bod.order_master_id','=','bom.id')
               //           ->join('bl_exam_schedule as es','bod.id','=','es.order_detail_id','left outer')
               //          ->join('bl_promo_master as proM','proc.id','=','proM.product_catalog_id')
               //           ->select('bod.id','proc.name as exam_name','proc.description','es.is_schedule')
               //           ->get();

            $promo = DB::table('bl_promo_master as proM')
                        ->join('bl_exam_schedule as exsc','proM.id','=','exsc.promo_master_id','left outer')
                        ->join('bl_product_catalog as prod', 'proM.product_catalog_id','=','prod.id','left outer')
                        ->leftjoin('bl_exam_attempt_type as extyp', 'extyp.id','=','prod.exam_attempt_type_id')
                        ->ORwhere([['proM.user_profile_id','=',$user_profile_id],
                            ['exsc.status','=','completed']])
                        ->ORwhere([['proM.exam_allocated_to','=',$user_profile_id],
                            ['exsc.status','=','completed']])
                        ->select('exsc.status','exsc.is_schedule','exsc.start_time','exsc.end_time','exsc.exam_planned_date','proM.promo_code','prod.valid_days','proM.order_detail_id','proM.id','prod.name','extyp.name as exname','proM.no_attempts_sofar','proM.no_attempts_allowed as no_of_attempts','exsc.exam_schedule_id')
                        ->get();        
            $tmp = json_decode($promo,true);
            $order = DB::table('bl_order_detail as bod')
                        ->join('bl_exam_schedule as exsc','bod.id','=','exsc.order_detail_id','left outer')
                        ->join('bl_product_catalog as prod', 'bod.product_catalog_id','=','prod.id','left outer')
                        ->leftjoin('bl_exam_attempt_type as extyp', 'extyp.id','=','prod.exam_attempt_type_id')
                        ->where('bod.user_profile_id','=',$user_profile_id)
                        ->where('exsc.status','=','completed')
                        ->select('exsc.status','exsc.is_schedule','exsc.start_time','exsc.end_time','exsc.exam_planned_date','bod.id' ,'bod.id as order_detail_id','prod.valid_days','prod.name','extyp.name as exname','bod.no_of_attempts','exsc.exam_schedule_id','bod.no_attempts_sofar')
                        ->get();
                $finaldata= collect();
                $tmparr = [];
                if(!is_null($tmp)){
                        for($i=0;$i<count($tmp);$i++){
                        $temvalue = $tmp[$i]['order_detail_id'];
                        array_push($tmparr,$temvalue );
                        }
                }
              $finaldata = $order->whereNotIn('order_detail_id',$tmparr);
               $exams =   $promo->merge($finaldata);


         }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($exams);

    }
    public function searchPromocode($data){
       
        try{
         
            
            $promocode = DB::table('bl_promo_master as promo')
                                ->where('promo.promo_code', '=', $data)
                                ->select('promo.*')
                                ->get();
             if (is_null($promocode) || $promocode->isEmpty())
                    {
                        return GlobalResponse::clientErrorResponse("Enter the valid promo code");
                    }
            $promo_master_id = $promocode->pluck('id');
            $exam_allocated_to = $promocode->pluck('exam_allocated_to');
            $examschedule = DB::table('bl_exam_schedule as exam')
                                ->where('exam.promo_master_id','=',$promo_master_id)
                                ->select('exam.*')
                                ->get();
                            if(count( $examschedule) != 0 &&  !is_null($exam_allocated_to))
                            {
                                 return GlobalResponse::clientErrorResponse("Already Promo Code Assigned");
                            }
            }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
            }
            return GlobalResponse::createResponse($promocode);


    }

    public function allocatePromocode($user_profile_id, $id){
            try{
                $promoo = PromoMaster::where ("id",$id)->first();
                $promoo ['exam_allocated_to'] = $user_profile_id;
                $promoo->update();
                
                $seqno = DB::table("bl_promoalloc_client_cust_txn as promoalloc")
                             ->orderBy('created_on_timestamp', 'desc')
                             ->select('promoalloc.seq_no')
                             ->get();
                $seq = json_decode($seqno,true);

                $currentdate =new Carbon();
                  
                $pdata['user_profile_id'] = $user_profile_id;
                $pdata['customer_emp_first_name'] = '1';
                $pdata['customer_emp_last_name'] = '1';
                $pdata['allocated_date'] = $currentdate;
                $pdata['seq_no'] = BLAlphaNumericCodeGenerator::generateSeqNo($seq);
                $pdata['exam_code'] = $promoo->exam_code;
                $pdata['promo_code'] = $promoo->promo_code;
                $pdata['promo_gen_date'] = $promoo->promo_gen_date;
                $pdata['order_date'] = $promoo->order_date;
                $pdata['order_no'] = $promoo->order_no;
                $pdata['no_attempts_allowed'] = $promoo->no_of_attempts;
                $pdata['attempt_type'] = $promoo->attempt_type;
                $pdata['created_by_user_id'] = $user_profile_id;
                $pdata['last_update_user_id'] = $user_profile_id;

                $promo = new  PromoAllocation;
                $promo->fill($pdata);
                $promo->save();

                }catch(Exception $e){
                    return GlobalResponse::clientErrorResponse("error");
                
                }

                return GlobalResponse::createResponse($promo);

    }

    public function examResult(array $data){
        try{
            
            $examResult = DB::table("bl_exam_score_card as examScore")
                            ->where('examScore.exam_schedule_id','=',$data)
                            ->join('bl_category as cat','cat.category_id','=','examScore.category_id')
                            ->join('bl_subject as sub','sub.subject_id','=','examScore.subject_id')
                            ->join('bl_topic as top','top.topic_id','=','examScore.topic_id')
                             ->select('examScore.*')
                             ->get();
           

            if (is_null($examResult)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($examResult);
    }

    public function getSalesSummary(array $data){
        try{
          
            $clnt_id = $data['client_id'];
            $from = $data['from'];
            $to = $data['to'];
            $sql = "ordD.clnt_id = '".$clnt_id."' and DATE(ordD.valid_from) >= '".$from."' and DATE(ordD.valid_to) <='".$to."'";

            $salesList = DB::table('bl_order_detail as ordD')
                        ->whereRaw($sql)                       
                        ->join('bl_exam_schedule as exam','exam.order_detail_id','=','ordD.id')
                        ->join('bl_product_catalog as prod','prod.id','=','ordD.product_catalog_id')
                        ->join('bl_currency_code_master as curr','curr.currency_id','=','prod.currency_id')
                        ->select('ordD.*','exam.exam_trans_ref_no','curr.currency_name','prod.name')
                        ->get();

          

            if (is_null($salesList))
            {
               return "failed";
            }       

        }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($salesList);
    }

      
    public function getExamSummary(array $data){
        try{
           
            $clnt_id = $data['client_id'];
            $from = $data['from'];
            $to = $data['to'];
            $sql = "ordD.clnt_id = '".$clnt_id."' and DATE(ordD.valid_from) >= '".$from."' and DATE(ordD.valid_to) <='".$to."'";

            $examList = DB::table('bl_order_detail as ordD')
                        ->whereRaw($sql)                       
                        ->join('bl_exam_schedule as exam','exam.order_detail_id','=','ordD.id')
                        ->join('bl_product_catalog as prod','prod.id','=','ordD.product_catalog_id')
                        ->join('bl_employee as emp','emp.clnt_id','=','ordD.clnt_id')
                        ->select('ordD.*','exam.exam_trans_ref_no','prod.name','emp.emp_employee_id','emp.emp_first_name','exam.start_time','exam.end_time')
                        ->get();

          

            if (is_null($examList))
            {
               return "failed";
            }       

        }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($examList);  
    }

    
    public function getExamCustSummary(array $data){
        try{
           
 
            $clnt_id = $data['client_id'];
            $from = $data['from'];
            $to = $data['to'];
           
            $cust = DB::table('bl_customer as cust')
                    ->where('cust.customer_id','=', $clnt_id)
                    ->select('cust.cust_off_email_id')
                    ->get();

            $email = $cust->pluck('cust_off_email_id');

            $userId = DB::table('bl_user_profile_defn as user')
                    ->where([['user.user_login_id','=', $email],['user.user_type','=', 'C']])
                    ->select('user.user_profile_id')
                    ->get();

            $tmp = json_decode($userId,true);
            $user_profile_id = $tmp[0]['user_profile_id'];
            $sql = "ordD.user_profile_id = '".$user_profile_id."'  and DATE(ordD.valid_from) >= '".$from."' and DATE(ordD.valid_to) <='".$to."'";
            $examList = DB::table('bl_order_detail as ordD')
                        ->whereRaw($sql)                       
                        ->join('bl_product_catalog as prod','prod.id','=','ordD.product_catalog_id')
                        ->join('bl_user_profile_defn as user','user.user_profile_id','=','ordD.user_profile_id')
                        ->join('bl_exam_schedule as exam','exam.order_detail_id','=','ordD.id')
                        ->join('bl_customer as cust','cust.cust_off_email_id','=','user.user_login_id')
                        ->where('exam.status','=','completed')
                        ->select('ordD.*','prod.name','cust.customer_id','cust.cust_first_name','exam.start_time','exam.end_time','exam.exam_trans_ref_no')
                        ->get();
                       

            if (is_null($examList))
            {
               return "failed";
            }       

        }
        catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }        
        return GlobalResponse::createResponse($examList); 
    }

    
    public function getExamClntPerformanceSummary(array $data){
        try{
           
            $clnt_id = $data['client_id'];
            $sql = "ordD.clnt_id = '".$clnt_id."'";

            $examList = DB::table('bl_order_detail as ordD')
                        ->whereRaw($sql)                       
                        ->join('bl_exam_schedule as exam','exam.order_detail_id','=','ordD.id')
                        ->join('bl_product_catalog as prod','prod.id','=','ordD.product_catalog_id')
                        ->join('bl_exam_score_card as examS','examS.order_detail_id','=','ordD.id')
                        ->where('exam.status','=','completed')
                        ->select('ordD.*','exam.exam_trans_ref_no','examS.*')
                        ->get();

          

            if (is_null($examList))
            {
               return "failed";
            }       

        }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($examList); 
    }

    public function getExamCustPerformanceSummary(array $data){
        try{
           
            $clnt_id = $data['client_id'];
             $cust = DB::table('bl_customer as cust')
                    ->where('cust.customer_id','=', $clnt_id)
                    ->select('cust.cust_off_email_id')
                    ->get();

            $email = $cust->pluck('cust_off_email_id');

            $userId = DB::table('bl_user_profile_defn as user')
                    ->where([['user.user_login_id','=', $email],['user.user_type','=', 'C']])
                    ->select('user.user_profile_id')
                    ->get();

            $tmp = json_decode($userId,true);
            $user_profile_id = $tmp[0]['user_profile_id'];
            $sql = "ordD.user_profile_id = '".$user_profile_id."'";
            $examList = DB::table('bl_order_detail as ordD')
                        ->whereRaw($sql)                       
                        // ->join('bl_exam_schedule as exam','exam.order_detail_id','=','ordD.id')
                        ->join('bl_product_catalog as prod','prod.id','=','ordD.product_catalog_id')
                        ->join('bl_exam_score_card as examS','examS.order_detail_id','=','ordD.id')
                        ->join('bl_exam_schedule as exam','exam.exam_schedule_id','=','examS.exam_schedule_id')
                        ->where('exam.status','=','completed')
                        ->select('ordD.*','examS.*','exam.exam_trans_ref_no')
                        ->get();

          

            if (is_null($examList))
            {
               return "failed";
            }       

        }
       catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }        
       return GlobalResponse::createResponse($examList);   
    }


} ?>




        

   
