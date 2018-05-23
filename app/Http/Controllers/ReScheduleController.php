<?php
namespace App\Http\Controllers;
use App\Requests\CreateReScheduleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReScheduleService;
class ReScheduleController extends Controller
{

	private $reScheduleService;

    public function __construct(ReScheduleService $reScheduleService) {
        $this->reScheduleService = $reScheduleService;
    }

    public function save(CreateReScheduleRequest $request)
    {

        try{
       

        $re_schedule = $this->reScheduleService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $re_schedule;
    }

    public function update(Request $request)
    {
    	$re_schedule = $this->reScheduleService->update($request->json()->all());

        return $re_schedule;

    }

     public function delete(Request $request)
    {
    	$re_schedule = $this->reScheduleService->delete($request->json()->all());
        return $re_schedule;
       
    }

     public function getById(Request $request){
    	$re_schedule = $this->reScheduleService->getById($request->json()->all());
        return $re_schedule;
      
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

}    