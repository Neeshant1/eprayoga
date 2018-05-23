<?php
namespace App\Repositories;
use App\Models\ReSchedule;
use App\Response\GlobalResponse;

class ReScheduleRepository
{
    // public function save(array $data)
    // {
    //      try {
  
    //         $re_schedule = new  ReSchedule;
    //         $re_schedule->fill($data);
    //         $re_schedule->save();
    //     } catch(Exception $e) {

    //         return GlobalResponse::clientErrorResponse("error");
    //     }
    //     return $re_schedule;
    // }

    public function update(array $data){
        try{
            
            $re_schedule = ReSchedule::where ("exam_schedule_id",$data['exam_schedule_id'])->first(); 

            if (is_null($re_schedule)){
                return "failed";
            }

            $re_schedule->fill($data);
            $re_schedule->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return $re_schedule;
    }

    public function delete(array $data){
        try{
              $re_schedule = ReSchedule::where ("exam_schedule_id",$data['exam_schedule_id'])->first(); 
            if (is_null($re_schedule)){
                return "failed";
            }
            $re_schedule->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($re_schedule);

    }

    // public function getAll(){
    //     try{
    //         $re_schedule = ReSchedule::all();
    //         if (is_null($re_schedule))
    //         {
    //             return "failed";
    //         }

    //     }catch(Exception $e){
    //         return GlobalResponse::clientErrorResponse("error");
    //     }

    //     return $re_schedule;

    // }

    public function getById(array $data){
        try{
            $re_schedule = ReSchedule::find($data['exam_schedule_id']);
            if (is_null($re_schedule)){
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($re_schedule);
    }

} ?>

