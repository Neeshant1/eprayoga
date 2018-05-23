<?php
namespace App\Http\Controllers;
use App\Requests\OriginTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OriginTypeService;
class OriginTypeController extends Controller
{

	private $originTypeService;

    public function __construct(OriginTypeService $originTypeService) {
        $this->originTypeService = $originTypeService;
    }

    public function save(OriginTypeRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $origin = $this->originTypeService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

       return $origin;
    }

    public function update(Request $request)
    {

         $origin = $request->orig_type_id;
         $this->validate($request, [
        'orig_type_name' => 'required|unique:bl_origin_type_master,orig_type_name,'.$origin .',orig_type_id,is_deleted,0' 
                    ]);
          $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
    	$origin = $this->originTypeService->update($request->json()->all(),$user_profile_id);

        return $origin;
    }

     public function delete(Request $request)
    {
    	$origin = $this->originTypeService->delete($request->json()->all());
        return $origin;
       
    }

     public function deleteAll(Request $request)
    {
        $origin = $this->originTypeService->deleteAll();
        return $origin;
       
    }


     public function getAll(){
    	$origin = $this->originTypeService->getAll();
        return $origin;
    }

     public function getById(Request $request){
    	$origin = $this->originTypeService->getById($request->json()->all());
        return $origin;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $origin = $this->originTypeService->activate($request->json()->all());
        return $origin;
       
    }

    public function deActivate(Request $request)
    {
        $origin = $this->originTypeService->deActivate($request->json()->all());
        return $origin;
       
    }


    public function deleteOrigin(Request $request)
    {
        $origin = $this->originTypeService->deleteOrigin($request->json()->all());
        return $origin;
       
    }

    public function search(Request $request){
        $origin = $this->originTypeService->search($request->get("orig_type_name"));
        return $origin;
    }
    
    public function selectOrigin(){
        $origin = $this->originTypeService->selectOrigin();
        return $origin;
    }

    public function selectOriginType(){
        $origin = $this->originTypeService->selectOriginType();
        return $origin;
    }


}    