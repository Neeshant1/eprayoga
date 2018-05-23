<?php
namespace App\Repositories;
use App\Models\Schedule;
use App\Models\ProductCatalog;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;


class ScheduleRepository
{
    public function save(array $data,$user_profile_id)
    {
         try {

            $prodName = DB::table("bl_product_catalog as prod")
                ->where('prod.id', '=', $data['product_catalog_id'])
                ->select('prod.name')
                  ->get();
             $tmp1 = json_decode($prodName,true);

            $data['exam_trans_ref_no'] = BLAlphaNumericCodeGenerator::generatePromoCode2($tmp1);
            $data['user_profile_id'] =$user_profile_id;
            $data['created_by_user_id'] =$user_profile_id;
            $data['last_update_user_id'] =$user_profile_id;
            $data['is_schedule'] = '1';


          if($data['promo_master_id'] == 'null'){
              $data['promo_master_id'] = null;
          }
            $schedule = new  Schedule;
            $schedule->fill($data);
            $schedule->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return $schedule;
    }

    public function update(array $data,$user_profile_id){
        try{
          
             $prodName = DB::table("bl_product_catalog as prod")
                ->where('prod.id', '=', $data['product_catalog_id'])
                ->select('prod.name')
                  ->get();
             $tmp1 = json_decode($prodName,true);


            $data['exam_trans_ref_no'] = BLAlphaNumericCodeGenerator::generatePromoCode2($tmp1);
            Schedule::find($data['exam_schedule_id'])->update(['status' => 'reschedule']);
            $data['user_profile_id'] =$user_profile_id;
            $data['created_by_user_id'] =$user_profile_id;
            $data['last_update_user_id'] =$user_profile_id;
            $data['is_schedule'] = '1';
            if($data['promo_master_id']=='null'){
              $data['promo_master_id']=null;
              }
           // $data['status'] = 'Reschedule';

            $schedule = new  Schedule;


            if (is_null($schedule)){
                return "failed";
            }

            $schedule->fill($data);
            $schedule->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $schedule;
    }

    public function delete(array $data){
        try{
              $schedule = Schedule::where ("exam_schedule_id",$data['exam_schedule_id'])->first(); 
            if (is_null($schedule)){
                return "failed";
            }
            $schedule->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($schedule);

    }

    public function getAll(){
        try{
            $schedule = Schedule::all();
            if (is_null($schedule))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($schedule);

    }

    public function getById(array $data){


        try{

              //dd($data['exam_schedule_id']);
            $schedule = Schedule::find($data['exam_schedule_id']);
            if (is_null($schedule)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($schedule);
    }

        public function getRescheduleId(array $data){
        try{
           // $schedule = Schedule::find($data['exam_schedule_id']);

           // $schedule = Schedule::where('order_detail_id','=', $data['order_detail_id']);

           //  $schedule->select('order_detail_id');
                                // ->select('exam_schedule_id','order_detail_id','exam_date','start_time','end_time');

         $schedule = DB::table("bl_exam_schedule as sch")
                      ->where('sch.exam_schedule_id','=',$data['exam_schedule_id'])
                      ->select('sch.exam_schedule_id','sch.order_detail_id','sch.exam_planned_date',DB::raw('TIME_FORMAT(sch.start_time, "%H:%i:%s") as start_time'),DB::raw('TIME_FORMAT(sch.end_time, "%H:%i:%s") as end_time'))
                      ->first();

         //              ->select('sch.exam_schedule_id','sch.order_detail_id','sch.exam_date','sch.start_time','sch.end_time','sch.actual_start_time','sch.actual_end_time');
            if (is_null($schedule)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($schedule);
    }

  //  getScheduleTime

     public function getScheduleTime(array $data){
        try{
           // $schedule = Schedule::find($data['exam_schedule_id']);

           // $schedule = Schedule::where('order_detail_id','=', $data['order_detail_id']);

           //  $schedule->select('order_detail_id');
                                // ->select('exam_schedule_id','order_detail_id','exam_date','start_time','end_time');

         $schedule = DB::table("bl_exam_design_rules as exam")
                      ->where([['exam.product_catalog_id','=',$data['product_catalog_id']],['exam.rule','=','Duration']])
                      ->select('exam.value')
                      ->get();

         //              ->select('sch.exam_schedule_id','sch.order_detail_id','sch.exam_date','sch.start_time','sch.end_time','sch.actual_start_time','sch.actual_end_time');
            if (is_null($schedule)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($schedule);
    }

} ?>

