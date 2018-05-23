<?php
namespace App\Http\Controllers;
use App\Requests\CreateQuestionComplexityRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QuestionComplexityService;
class QuestionComplexityController extends Controller
{

	private $questionComplexityService;

    public function __construct(QuestionComplexityService $questionComplexityService) {
        $this->questionComplexityService = $questionComplexityService;
    }

    public function save(CreateQuestionComplexityRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $questionComplexity = $this->questionComplexityService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $questionComplexity;

    }

    public function update(Request $request)
    {

        $questionComplexity = $request->difficulty_level_id;
         $this->validate($request, [
        'difficulty_level_name' => 'required|unique:bl_difficulty_level_master,difficulty_level_name,'.$questionComplexity .',difficulty_level_id,is_deleted,0' 
                    ]);
    	$questionComplexity = $this->questionComplexityService->update($request->json()->all());

        return $questionComplexity;

    }

     public function delete(Request $request)
    {
    	$questionComplexity = $this->questionComplexityService->delete($request->json()->all());
        return $questionComplexity;
       
    }

    public function deleteAll(Request $request)
    {
        $value = $request->session()->get('user');
        $user_id = $value ->user_profile_id;
        $questionComplexity = $this->questionComplexityService->deleteAll($user_id);
         return $questionComplexity;
       
    }

     public function getAll(){
    	$questionComplexity = $this->questionComplexityService->getAll();
         return $questionComplexity;
    }

     public function getById(Request $request){
    	$questionComplexity = $this->questionComplexityService->getById($request->json()->all());
        return $questionComplexity;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

        public function activate(Request $request)
    {
        $questionComplexity = $this->questionComplexityService->activate($request->json()->all());
         return $questionComplexity;
       
    }

    public function deActivate(Request $request)
    {
        $questionComplexity = $this->questionComplexityService->deActivate($request->json()->all());
         return $questionComplexity;
       
    }


    public function deleteQuestionComplexity(Request $request)
    {
        $questionComplexity = $this->questionComplexityService->deleteQuestionComplexity($request->json()->all());
        return $questionComplexity;
       
    }
    
    public function search(Request $request){
        $questionComplexity = $this->questionComplexityService->search($request->get("difficulty_level_name"));
         return $questionComplexity;
    }

    public function selectQuestionComplexity(){
        $questionComplexity = $this->questionComplexityService->selectQuestionComplexity();
         return $questionComplexity;
    }



}    