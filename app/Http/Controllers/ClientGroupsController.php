<?php
namespace App\Http\Controllers;
use App\Requests\CreateClientGroupsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClientGroupsService;
class ClientGroupsController extends Controller
{

	private $clientGroupsService;

    public function __construct(ClientGroupsService $clientGroupsService) {
        $this->clientGroupsService = $clientGroupsService;
    }

    public function save(CreateClientGroupsRequest $request)
    {

        try{
     
        $value = $request->session()->get('user');
        $user_profile_id = $value->user_profile_id;

        $client_group = $this->clientGroupsService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $client_group;
    }

    public function update(Request $request)
    {
     
        $client_group_id = $request->clnt_group_id;
        $this->validate($request, [
       'clnt_group_pan' => 'required|unique:bl_client_group,clnt_group_pan,' .$client_group_id .',clnt_group_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'clnt_group_off_email_id' => 'required|unique:bl_client_group,clnt_group_off_email_id,' .$client_group_id .',clnt_group_id,is_deleted,0'
                   ]);

    	$client_group = $this->clientGroupsService->update($request->json()->all());

        return $client_group;
    }

     public function delete(Request $request)
    {
    	$client_group = $this->clientGroupsService->delete($request->json()->all());
        return $client_group;
       
    }

     public function getAll(){
    	$client_group = $this->clientGroupsService->getAll();
        return $client_group;
    }

     public function getById(Request $request){
    	$client_group = $this->clientGroupsService->getById($request->json()->all());
        return $client_group;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $result = $this->clientGroupsService->activate($request->json()->all());
        return $result;
       
    }

    public function deActivate(Request $request)
    {
        $result = $this->clientGroupsService->deActivate($request->json()->all());
        return $result;
       
    }


    public function deleteClientGroup(Request $request)
    {
        $result = $this->clientGroupsService->deleteClientGroup($request->json()->all());
        return $result;
       
    }

    public function search(Request $request){
    
        $result = $this->clientGroupsService->search($request->get("search_text"));
        return $result;
    }

    public function deleteAll(Request $request) {
        $result = $this->clientGroupsService->deleteAll();
        return $result;
       
   }

    public function selectClientGroup(){
        $client_group = $this->clientGroupsService->selectClientGroup();
        return $client_group;
    }


}    