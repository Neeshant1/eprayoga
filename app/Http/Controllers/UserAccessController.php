<?php
namespace App\Http\Controllers;
use App\Requests\CreateUserAccessRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserAccessService;
class UserAccessController extends Controller
{

	private $userAccessService;

    public function __construct(UserAccessService $userAccessService) {
        $this->userAccessService = $userAccessService;
    }

    public function save(CreateUserAccessRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;


        $userAccess = $this->userAccessService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $userAccess;
    }

    public function update(Request $request)
    {

        $userAccess = $request->user_access_log_id;
         $this->validate($request, [
        'user_profile_id' => 'required|unique:bl_user_access_log,user_profile_id,'.$userAccess .',user_access_log_id,is_deleted,0' 
                    ]);
    	$userAccess = $this->userAccessService->update($request->json()->all());

        return $userAccess;
    }

     public function delete(Request $request)
    {
    	$userAccess = $this->userAccessService->delete($request->json()->all());
        return $userAccess;
       
    }

     public function deleteAll(Request $request)
    {
        $userAccess = $this->userAccessService->deleteAll();
        return $userAccess;
       
    }

     public function getAll(){
    	$userAccess = $this->userAccessService->getAll();
        return $userAccess;
    }

     public function getById(Request $request){
    	$userAccess = $this->userAccessService->getById($request->json()->all());
        return $userAccess;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $userAccess = $this->userAccessService->activate($request->json()->all());
        return $userAccess;
       
    }

    public function deActivate(Request $request)
    {
        $userAccess = $this->userAccessService->deActivate($request->json()->all());
        return $userAccess;
       
    }

}    