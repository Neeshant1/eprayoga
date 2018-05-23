<?php
namespace App\Http\Controllers;
use App\Requests\AddressTypeRequest;
use App\Http\Controllers\Controller;
use App\Services\AddressTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AddressTypeController extends Controller
{

	private $addressTypeService;

    public function __construct(AddressTypeService $addressTypeService) {
        $this->addressTypeService = $addressTypeService;
    }

    public function save(AddressTypeRequest $request)
    {

        try{
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $addressType = $this->addressTypeService->save($request->json()->all(),$user_profile_id);
        }catch(Exception $e) {
            throw $e;
        }
    	
        return $addressType;

    	
    }

    public function update(Request $request)
    {
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $addressType = $request->add_type_id;
         $this->validate($request, [
        'add_type_name' => 'required|unique:bl_address_type_master,add_type_name,'.$addressType .',add_type_id,is_deleted,0' 
                    ]);
    	$addressType = $this->addressTypeService->update($request->json()->all(),$user_profile_id);
        return $addressType;

    }

     public function delete(Request $request)
    {
    	$addressType = $this->addressTypeService->delete($request->json()->all());
        return $addressType;

    }

     public function deleteAll(Request $request)
    {
         $value = $request->session()->get('user');
         $user_id = $value ->user_id;
         $user_type = $value ->user_type;

        $addressType = $this->addressTypeService->deleteAll($user_id);
        return $addressType;
    }

     public function getAll()
    {
    	$addressType = $this->addressTypeService->getAll();
        return $addressType;
    }

     public function getById(Request $request)
    {
    	$addressType = $this->addressTypeService->getById($request->json()->all());
        return $addressType;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $addressType = $this->addressTypeService->activate($request->json()->all());
        return $addressType;
       
    }

    public function deActivate(Request $request)
    {
        $addressType = $this->addressTypeService->deActivate($request->json()->all());
        return $addressType;
       
    }


    public function deleteAddressType(Request $request)
    {
        $addressType = $this->addressTypeService->deleteAddressType($request->json()->all());
        return $addressType;
       
    }

    public function search(Request $request){
        $addressType = $this->addressTypeService->search($request->get("add_type_name"));
        return $addressType;
    }

    public function selectAddressType(){
        $addressType = $this->addressTypeService->selectAddressType();
        return $addressType;
    }

}    