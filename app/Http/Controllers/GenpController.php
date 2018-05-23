<?php
namespace App\Http\Controllers;
use App\Requests\GenpRequest;
use App\Http\Controllers\Controller;
use App\Services\GenpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class GenpController extends Controller
{

	private $genpService;

    public function __construct(GenpService $genpService) {
        $this->genpService = $genpService;
    }

    public function save(GenpRequest $request)
    {

        try{
           $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $genp = $this->genpService->save($request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }
    	
        return $genp;

    	
    }

    public function update(Request $request)
    {
    	$genp = $this->genpService->update($request->json()->all());
        return $genp;
       // return $request->json()->get('address_type');
    }

     public function delete(Request $request)
    {
    	$genp = $this->genpService->delete($request->json()->all());
       return $genp;
    }

     public function deleteAll(Request $request)
    {
        $value = $request->session()->get('user');
         $user_id = $value ->user_profile_id;
        $genp = $this->genpService->deleteAll($user_id);
        return $genp;
    }

     public function getAll()
    {
    	$genp = $this->genpService->getAll();
        return $genp;
    }

     public function getById(Request $request)
    {
    	$genp = $this->genpService->getById($request->json()->all());
        return $genp;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $genp = $this->genpService->activate($request->json()->all());
        return $genp;
       
    }

    public function deActivate(Request $request)
    {
        $genp = $this->genpService->deActivate($request->json()->all());
        return $genp;
       
    }


    public function deleteGenp(Request $request)
    {
        $genp = $this->genpService->deleteGenp($request->json()->all());
        return $genp;
       
    }

    public function search(Request $request){
        $genp = $this->genpService->search($request->get("search_text"));
        return $genp;
    }

    public function selectAddressType(){
        $genp = $this->genpService->selectAddressType();
        return $genp;
    }

}    