<?php
namespace App\Http\Controllers;
use App\Requests\CreateClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClientService;
use Illuminate\Support\Facades\Log;
class ClientController extends Controller
{

	private $clientService;

    public function __construct(ClientService $clientService) {
        $this->clientService = $clientService;
    }

    public function save(CreateClientRequest $request)
    {

        try{
          
          $value = $request->session()->get('user');           

          if(count($value) > 0){
            $user_profile_id = $value->user_profile_id;
            $client = $this->clientService->save( $request->json()->all(),$user_profile_id);
          } else {
            $client = $this->clientService->save1( $request->json()->all() );
          }

        }catch(Exception $e) {
            throw $e;
        }

        return $client;

    }

    public function update(Request $request)
    {
        
        $client = $request->client_id;
        $this->validate($request, [
       'clnt_pan' => 'required|unique:bl_client,clnt_pan,' .$client .',client_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'clnt_off_email_id' => 'required|unique:bl_client,clnt_off_email_id,' .$client .',client_id,is_deleted,0'
                   ]);
    	$client = $this->clientService->update($request->json()->all());

        return $client;

    }

     public function delete(Request $request)
    {
    	$client = $this->clientService->delete($request->json()->all());
        return $client;
       
    }

     public function getAll(Request $request){
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value->user_id;
        $client = $this->clientService->getAll($user_id,$user_type);
        return $client;
    }

     public function getById(Request $request){
    	$client = $this->clientService->getById($request->json()->all());
        return $client;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value->user_id;
        $result = $this->clientService->activate($request->json()->all(),$user_id,$user_type);
        return $result;
       
    }

    public function deActivate(Request $request)
    {

        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value->user_id;
        $result = $this->clientService->deActivate($request->json()->all(),$user_id,$user_type);
        return $result;
       
    }


    public function deleteClient(Request $request)
    {
        $result = $this->clientService->deleteClient($request->json()->all());
        return $result;
       
    }

    public function search(Request $request){
        $result = $this->clientService->search($request->get("search_text"));
        return $result;
    }

    public function deleteAll(Request $request) {
        $result = $this->clientService->deleteAll();
        return $result;
       
   }

    public function getClientId(Request $request){
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value->user_id;
        $client = $this->clientService->getClientId($user_id,$user_type);
        return $client;
    }

    public function getEnroll(){

        $client = $this->clientService->getEnroll();
        return $client;
    }
 


}    