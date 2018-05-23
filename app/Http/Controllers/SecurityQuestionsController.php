<?php
namespace App\Http\Controllers;
use App\Requests\CreateSecurityQuestionsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SecurityQuestionsService;
class SecurityQuestionsController extends Controller
{

    private $securityquestionservice;

    public function __construct(SecurityQuestionsService $securityquestionsService) {
        $this->securityquestionsService = $securityquestionsService;
    }

    public function save(CreateSecurityQuestionsRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $securityquestions = $this->securityquestionsService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $securityquestions;

    }

    public function update(Request $request)
    {

        $securityquestions = $request->question_id;
         $this->validate($request, [
        'question_name' => 'required|unique:bl_security_questions_master,question_name,'.$securityquestions .',question_id,is_deleted,0' 
                    ]);
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $securityquestions = $this->securityquestionsService->update($request->json()->all(), $user_profile_id );

        return $securityquestions;
    }

     public function delete(Request $request)
    {
        $securityquestions = $this->securityquestionsService->delete($request->json()->all());
        return $securityquestions;
       
    }

     public function deleteAll(Request $request)
    {
        $securityquestions = $this->securityquestionsService->deleteAll();
        return $securityquestions;
       
    }

     public function getAll(){
        $securityquestions = $this->securityquestionsService->getAll();
        return $securityquestions;
    }

     public function getById(Request $request){
        $securityquestions = $this->securityquestionsService->getById($request->json()->all());
        return $securityquestions;
    }

    public function getValidationFailMsg(){
        return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $securityquestions = $this->securityquestionsService->activate($request->json()->all());
        return $securityquestions;
       
    }

    public function deActivate(Request $request)
    {
        $securityquestions = $this->securityquestionsService->deActivate($request->json()->all());
        return $securityquestions;
       
    }


    public function deleteSecurityQuestion(Request $request)
    {
        $securityquestions = $this->securityquestionsService->deleteSecurityQuestion($request->json()->all());
        return $securityquestions;
       
    }

    public function search(Request $request){
        $securityquestions = $this->securityquestionsService->search($request->get("question_name"));
        return $securityquestions;
    }

    public function selectSecQus(){
        $securityquestions = $this->securityquestionsService->selectSecQus();
        return $securityquestions;
    }
}    