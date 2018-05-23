<?php
namespace App\Repositories;
use App\Models\PromoMaster;
use App\Models\PromoAllocation;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use App\Response\GlobalResponse;

use Log;
use Carbon\Carbon;


class PromoRepository
{
    // private static  $RECORDS_PER_PAGE =2;

    //  public function __construct() {
    //     self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    // }
    public function save(array $data, $user_profile_id)
    {
         try {

            DB::beginTransaction();

            $emp_id = $data['employeelist'];

            $currentdate = new Carbon;
 
            $selectedEmp = [];

            for($i=0; $i<count($emp_id);$i++){

                  $empid = $emp_id[$i]['emp_id']; 

                  $promodetail = DB::table('bl_employee as emp')                        
                               ->join('bl_user_profile_defn as upd','emp.emp_employee_id','=','upd.user_id')
                               ->where([['upd.user_type','E']])
                               ->where('emp.emp_employee_id','=',$empid)
                               ->where('upd.user_id', '=', $empid)

                               ->select('emp.emp_first_name','emp.emp_last_name','upd.user_profile_id')
                               ->get();
     
                  array_push($selectedEmp, $promodetail);
            } 


             $q = "pm.allocated_flag = false   and CURDATE() >= pm.promo_valid_fm_date and CURDATE() < promo_valid_to_date ";

             $getdata = DB::table('bl_product_catalog as pd')
                            ->join('bl_promo_master as pm','pm.product_catalog_id','=','pd.id')

                            ->join('bl_order_detail as ord','ord.product_catalog_id','=','pd.id')

                            ->join('bl_order_master as om','om.id','=','ord.order_master_id')
                            ->join('bl_exam_attempt_type as at','at.id','=','pd.exam_attempt_type_id')

                            ->where([['pd.id',$data['product_catalog_id']],['pm.product_catalog_id',$data['product_catalog_id']],['pm.allocated_flag',0],['ord.product_catalog_id',$data['product_catalog_id']]])
                            ->where('pm.user_profile_id','=',$user_profile_id)
                            ->whereRaw($q)                         
                            ->select('pd.name','pd.product_catalog_code as exam_code','pm.id','pm.promo_code','pm.promo_gen_date','om.order_date','om.order_no','pd.no_of_attempts','at.name as attempt_type')
                            ->get();


                //assign one exams to one employee only

               for($i=0; $i<count($emp_id);$i++){
                $user = PromoMaster::where('product_catalog_id', '=', $data['product_catalog_id'])
                                     ->where('exam_allocated_to', '=', $selectedEmp[$i][0]->user_profile_id)
                                     ->join('bl_user_profile_defn as usr', 'usr.user_profile_id', '=', 'exam_allocated_to')
                                     ->join('bl_employee as emp', 'emp.emp_employee_id','=','usr.user_id')
                                     ->select('exam_name','emp.emp_first_name')
                                     ->get();

                                  //   dd($user);

                    if(count($user) > 0)
                    {
                      return response()->json(['code'      =>  401,'error' => 'Error msg','data' => $user], 401);
                      //return false;

                    //  return response()->json($user, 401);
                    }
                    else{

                       $seqno = DB::table("bl_promoalloc_client_cust_txn as promoalloc")
                              ->orderBy('created_on_timestamp', 'desc')
                                ->select('promoalloc.seq_no')
                                ->get();
                           $seq = json_decode($seqno,true);


                  $pdata['user_profile_id'] = $selectedEmp[$i][0]->user_profile_id;
                  $pdata['customer_emp_first_name'] = $selectedEmp[$i][0]->emp_first_name;
                  $pdata['customer_emp_last_name'] = $selectedEmp[$i][0]->emp_last_name;

                  $pdata['allocated_date'] = $currentdate;
                  $pdata['seq_no'] = BLAlphaNumericCodeGenerator::generateSeqNo($seq);
                 
                  $pdata['exam_code'] = $getdata[$i]->exam_code;
                  $pdata['promo_code'] = $getdata[$i]->promo_code;
                  $pdata['promo_gen_date'] = $getdata[$i]->promo_gen_date;
                  $pdata['order_date'] = $getdata[$i]->order_date;
                  $pdata['order_no'] = $getdata[$i]->order_no;
                  $pdata['no_attempts_allowed'] = $getdata[$i]->no_of_attempts;
                  $pdata['attempt_type'] = $getdata[$i]->attempt_type;

                  $pdata['created_by_user_id'] = $user_profile_id;
                  $pdata['last_update_user_id'] = $user_profile_id;

                  $promo = new  PromoAllocation;
                  $promo->fill($pdata);
                  $promo->save();


                  $status['allocated_flag'] = 1;
                  $status['exam_allocated_to'] = $selectedEmp[$i][0]->user_profile_id;

                  $promomaster = PromoMaster::where ("id",$getdata[$i]->id)->first();
                  $promomaster->fill($status);
                  $promomaster->save();

                }
              }
              
             // for($i=0; $i<count($emp_id);$i++){

                //$seqno = new PromoMaster;       
                             


             // }
        
           
        } catch(Exception $e) {
             DB::rollBack();
            return GlobalResponse::clientErrorResponse("error");
        }
        DB::commit();
        //return $promo;
        return GlobalResponse::createResponse($promo);

    }



} ?>

