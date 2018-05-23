<?php
namespace App\Http\Controllers;
use App\Requests\CreateUserTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserTypeService;
class UserTypeController extends Controller
{

	private $userTypeService;

    public function __construct(UserTypeService $userTypeService) {
        $this->userTypeService = $userTypeService;
    }

    public function save(CreateUserTypeRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        // $request->session()->put('$users', 'hallo');

    
        // //$request->session()->get('$users');

        $userType = $this->userTypeService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $userType;

    }

    public function update(Request $request)
    {

        $userType = $request->user_type_id;
         $this->validate($request, [
        'user_type_name' => 'required|unique:bl_user_type_master,user_type_name,'.$userType .',user_type_id,is_deleted,0' 
                    ]);
    	$userType = $this->userTypeService->update($request->json()->all());

        return $userType;

    }

     public function delete(Request $request)
    {
    	$userType = $this->userTypeService->delete($request->json()->all());
        return $userType;
       
    }

    public function deleteAll(Request $request)
    {
        $userType = $this->userTypeService->deleteAll();
        return $userType;
       
    }

     public function getAll(){
    	$userType = $this->userTypeService->getAll();
        return $userType;
    }

     public function getById(Request $request){
    	$userType = $this->userTypeService->getById($request->json()->all());
        return $userType;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }
     public function activate(Request $request)
    {
        $userType = $this->userTypeService->activate($request->json()->all());
        return $userType;
       
    }

    public function deActivate(Request $request)
    {
        $userType = $this->userTypeService->deActivate($request->json()->all());
        return $userType;
       
    }
    public function deleteUsertype(Request $request)
    {
        $userType = $this->userTypeService->deleteUsertype($request->json()->all());
        return $userType;
       
    }
    public function search(Request $request){
        $userType = $this->userTypeService->search($request->get("user_type_name"));
        return $userType;
    }


}    