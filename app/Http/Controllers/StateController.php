<?php
namespace App\Http\Controllers;
use App\Requests\StateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StateService;
class StateController extends Controller
{

	private $stateService;

    public function __construct(StateService $stateService) {
        $this->stateService = $stateService;
    }

    public function save(StateRequest $request)
    {

        try{

        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        // //$request->session()->get('$users');

        $state = $this->stateService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $state;

    }

    public function update(Request $request)
    {

        $state = $request->state_id;
         $this->validate($request, [
        'state_full_name' => 'required|unique:bl_state_master,state_full_name,'.$state .',state_id,is_deleted,0' 
                    ]);
         $this->validate($request, [
        'code' => 'required|unique:bl_state_master,code,'.$state .',state_id,is_deleted,0' 
                    ]);
          $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
    	$state = $this->stateService->update($request->json()->all(),$user_profile_id);

        return $state;
    }

     public function delete(Request $request)
    {
    	$state = $this->stateService->delete($request->json()->all());
        return $state;
       
    }

    
     public function deleteAll(Request $request)
    {
        $state = $this->stateService->deleteAll();
        return $state;
       
    }

     public function getAll(){
    	$state = $this->stateService->getAll();
        return $state;
    }

     public function getById(Request $request){
    	$state = $this->stateService->getById($request->json()->all());
        return $state;
    
    }

    public function getStateByCountryId(Request $request){
    $state = $this->stateService->getStateByCountryId($request->json()->all());
    return $state;
       
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $state = $this->stateService->activate($request->json()->all());
        return $state;
       
    }

    public function deActivate(Request $request)
    {
        $state = $this->stateService->deActivate($request->json()->all());
        return $state;
       
    }


    public function deleteState(Request $request)
    {
        $state = $this->stateService->deleteState($request->json()->all());
        return $state;
       
    }
    public function search(Request $request){
        $state = $this->stateService->search($request->get("state_full_name"));
        return $state;
    }

}    