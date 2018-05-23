<?php
namespace App\Http\Controllers;
use App\Requests\ExamDesignRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ExamDesignService;
use Log;
class ExamDesignController extends Controller
{

	private $ExamDesignService;

    public function __construct(ExamDesignService $ExamDesignService) {
        $this->ExamDesignService = $ExamDesignService;
    }

    public function save(ExamDesignRequest $request)
    {
        try{   
            $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id; 
        $examDesign = $this->ExamDesignService->save( $request->json()->all(),$user_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $examDesign;
    }

    public function update(Request $request)
    {
      $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
          
    	$examDesign = $this->ExamDesignService->update($request->json()->all(),$user_id);
       
        return $examDesign;
    }

     public function delete(Request $request)
    {
    	$examDesign = $this->ExamDesignService->delete($request->json()->all());
        return $examDesign;
       
    }

     public function deleteAll(Request $request)
    {
        $examDesign = $this->ExamDesignService->deleteAll();
        return $examDesign;
       
    }

     public function getAll(Request $request){
        $value = $request->session()->get('user');
        $user_type = $value ->user_type;
        $user_id = $value ->user_id;
    	$examDesign = $this->ExamDesignService->getAll($user_id,$user_type);
        return $examDesign;
    }

     public function getById(Request $request){
    	$examDesign = $this->ExamDesignService->getById($request->json()->all());
        return $examDesign;
       // return $request->json()->get('address_type');
    }
    public function search(Request $request){
        $examDesign = $this->ExamDesignService->search($request->get("question_name"));
        return $examDesign;
    }
     public function getValidationFailMsg(){
        return "Please verify the values for the fields !!!";
    }


   
   


}    