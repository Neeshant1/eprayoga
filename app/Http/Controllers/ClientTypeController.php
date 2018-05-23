<?php
namespace App\Http\Controllers;
use App\Requests\CreateClientTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClientTypeService;
use Log;
class ClientTypeController extends Controller
{

	private $clientTypeService;

    public function __construct(ClientTypeService $clientTypeService) {
        $this->clientTypeService = $clientTypeService;
    }

    public function save(CreateClientTypeRequest $request)
    {

        try{
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;


        $clientType = $this->clientTypeService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $clientType;
    }

    public function update(Request $request)
    {

        $clientType = $request->clnt_type_id;
         $this->validate($request, [
        'clnt_type_name' => 'required|unique:bl_client_type_master,clnt_type_name,'.$clientType .',clnt_type_id,is_deleted,0' 
                    ]);
         $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
    	$clientType = $this->clientTypeService->update($request->json()->all(),$user_profile_id);

        return $clientType;

    }

     public function delete(Request $request)
    {
    	$clientType = $this->clientTypeService->delete($request->json()->all());
        return $clientType;
       
    }

     public function deleteAll(Request $request)
    {
        $clientType = $this->clientTypeService->deleteAll();
        return $clientType;
       
    }

     public function getAll(){
    	$clientType = $this->clientTypeService->getAll();
        return $clientType;
    }

     public function getById(Request $request){
    	$clientType = $this->clientTypeService->getById($request->json()->all());
        return $clientType;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $clientType = $this->clientTypeService->activate($request->json()->all());
        return $clientType;
       
    }

    public function deActivate(Request $request)
    {
        $clientType = $this->clientTypeService->deActivate($request->json()->all());
        return $clientType;
       
    }


    public function deleteClientType(Request $request)
    {
        $clientType = $this->clientTypeService->deleteClientType($request->json()->all());
        return $clientType;
       
    }

    public function search(Request $request){
        $clientType = $this->clientTypeService->search($request->get("clnt_type_name"));
        return $clientType;
    }

    public function selectClientType(){
        $clientType = $this->clientTypeService->selectClientType();
        return $clientType;
    }

}    