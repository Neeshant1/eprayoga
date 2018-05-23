<?php
namespace App\Http\Controllers;
use App\Requests\CreateQuestionTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QuestionTypeService;
class QuestionTypeController extends Controller
{

	private $questionTypeService;

    public function __construct(QuestionTypeService $questionTypeService) {
        $this->questionTypeService = $questionTypeService;
    }

    public function save(CreateQuestionTypeRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $questionType = $this->questionTypeService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $questionType;

    }

    public function update(Request $request)
    {

          $questionType = $request->question_type_id;
         $this->validate($request, [
        'question_type_name' => 'required|unique:bl_question_type_master,question_type_name,'.$questionType .',question_type_id,is_deleted,0' 
                    ]);
    	$questionType = $this->questionTypeService->update($request->json()->all());

        return $questionType;
    }

     public function delete(Request $request)
    {
    	$questionType = $this->questionTypeService->delete($request->json()->all());
        return $questionType;
       
    }

     public function deleteAll(Request $request)
    {
         $value = $request->session()->get('user');
         $user_id = $value ->user_profile_id;
        $questionType = $this->questionTypeService->deleteAll($user_id);
        return $questionType;
       
    }

     public function getAll(){
    	$questionType = $this->questionTypeService->getAll();
        return $questionType;
    }

     public function getById(Request $request){
    	$questionType = $this->questionTypeService->getById($request->json()->all());
        return $questionType;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $questionType = $this->questionTypeService->activate($request->json()->all());
        return $questionType;
       
    }

    public function deActivate(Request $request)
    {
        $questionType = $this->questionTypeService->deActivate($request->json()->all());
        return $questionType;
       
    }


    public function deleteQuestionType(Request $request)
    {
        $questionType = $this->questionTypeService->deleteQuestionType($request->json()->all());
        return $questionType;
       
    }
    public function search(Request $request){
        $questionType = $this->questionTypeService->search($request->get("question_type_name"));
        return $questionType;
    }

    public function selectQuestionType(){
        $questionType = $this->questionTypeService->selectQuestionType();
        return $questionType;
    }

}    