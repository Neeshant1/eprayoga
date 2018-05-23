<?php
namespace App\Http\Controllers;
use App\Requests\CreateScheduleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ScheduleService;
class ScheduleController extends Controller
{

	private $scheduleService;

    public function __construct(ScheduleService $scheduleService) {
        $this->scheduleService = $scheduleService;
    }

    public function save(Request $request)
    {

        try{

            $value = $request->session()->get('user');
            $user_profile_id = $value->user_profile_id;


            $schedule = $this->scheduleService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $schedule;

       
    }

    public function update(Request $request)
    {

        $value = $request->session()->get('user');
        $user_profile_id = $value->user_profile_id;
        //echo($request);
        $schedule = $this->scheduleService->update($request->json()->all(),$user_profile_id);

        return $schedule;
    }


     public function delete(Request $request)
    {
    	$schedule = $this->scheduleService->delete($request->json()->all());
        return $schedule;
       
    }

     public function getAll(){
    	$schedule = $this->scheduleService->getAll();
        return $schedule;
    }

     public function getById(Request $request){
    	$schedule = $this->scheduleService->getById($request->json()->all());
        return $schedule;
    }

    public function getRescheduleId(Request $request){
        $schedule = $this->scheduleService->getRescheduleId($request->json()->all());
        return $schedule;

    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    
    public function getScheduleTime(Request $request){
        $schedule = $this->scheduleService->getScheduleTime($request->json()->all());
        return $schedule;
    }

}    