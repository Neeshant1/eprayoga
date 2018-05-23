<?php
namespace App\Http\Controllers;

use App\Requests\CreateQuestionBankRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QuestionService;
use Illuminate\Support\Facades\DB;
use Log;

class QuestionBankController extends Controller
{

	   private $questionService;
     public function __construct(QuestionService $questionService) {
         $this->questionService = $questionService;
     }

    public function saveQuestion(CreateQuestionBankRequest $request){
        try{    
             $value = $request->session()->get('user');

         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $clnt_group_id = $value ->clnt_group_id;
        
                 $question = $this->questionService->saveQuestion( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $question;
    }

    public function updateQuestion(Request $request)
    {
    	try{ 
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            $user_id = $value ->user_id;
            $clnt_group_id = $value ->clnt_group_id;

            $question1 = $request->question_id;
            $question_txt_format = $request->question_txt_format;
            $category_id = $request->category_id;
            $subject_id = $request->subject_id;
            $topic_id = $request->topic_id;
            $clnt_id = $request->clnt_id;
            $question_type_id = $request->question_type_id;
           
            
            $tmp = json_encode($question_txt_format,true);
                if(($question_type_id != 7) || ($question_type_id != 9) || ($question_type_id != 10)){
                        $catid = DB::select("select question_id, question_txt_format,subject_id,clnt_id,category_id,topic_id from bl_question_master where clnt_id = ".$clnt_id." and question_id = ".$question1." and question_txt_format = ".$tmp." and category_id = ".$category_id." and subject_id = ".$subject_id." and topic_id = ".$topic_id."");
                
                        if(count($catid) <= 0){
                            $this->validate($request, [
                            'question_txt_format' => 'required|unique:bl_question_master,question_txt_format,NULL,'.$tmp .',category_id,'.$category_id.',subject_id,'.$subject_id.',topic_id,'.$topic_id.',clnt_id,'.$clnt_id.',is_deleted,0' 
                                ]);  
                        } 
                }

         
            $question = $this->questionService->updateQuestion( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);
        }catch(Exception $e) {
            throw $e;
        }
            return $question;
    }

     public function deleteQuestion(Request $request)
    {

        try{    
                 $question = $this->questionService->deleteQuestion( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }

        return $question;
       
    }

    public function alertQuestion(Request $request)
    {

        try{    
                 $question = $this->questionService->alertQuestion( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }

        return $question;
       
    }

     public function getAllQuestion(Request $request){
    	try{    

            $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $user_type = $value->user_type;
         $clnt_group_id = $value ->clnt_group_id;
         $question = $this->questionService->getAllQuestion( $request->query(),$user_profile_id,$user_id,$clnt_group_id,$user_type);
        }catch(Exception $e) {
            throw $e;
        }

        return  $question;
    }
     public function getpageQuestion(Request $request){
        try{    
            // dd($request);
            $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $user_type = $value->user_type;
         $clnt_group_id = $value ->clnt_group_id;
         $question = $this->questionService->getpageQuestion( $request->query(),$user_profile_id,$user_id,$clnt_group_id,$user_type);
        }catch(Exception $e) {
            throw $e;
        }

        return  $question;
    }

    //Added for Testing by palanikumar

     public function getAllQuestionAndOptions(){
      try{    
        $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $clnt_group_id = $value ->clnt_group_id;
                 $question = $this->questionService->getAllQuestionAndOptions( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }

        return  $question;
    }

     public function getQuestionById(Request $request){
    	try{    
                 $question = $this->questionService->getQuestionById( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $question;
    }

    public function getOptionsByQuestionId(Request $request){
        try{    
             $questionOption = $this->questionService->getOptionsByQuestionId( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionOption;
       
    }

     public function getAnswersByQuestionId(Request $request){
         try{    
             $questionAnswer = $this->questionService->getAnswersByQuestionId( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionAnswer;
       
    }


    public function saveBulkQuestionAnswer(Request $request){
      try{    
             $questionAnswer = $this->questionService->saveBulkQuestionAnswer( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionAnswer;
       
    }


    public function saveBulkQuestionOption(Request $request){
      try{    
             $questionOption = $this->questionService->saveBulkQuestionOption( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionOption;
       
    }


    public function saveQuestionAnswer(Request $request){
      try{    
             $questionAnswer = $this->questionService->saveQuestionAnswer( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionAnswer;
       
    }


    public function saveQuestionOption(Request $request){
      try{    
             $questionOption = $this->questionService->saveQuestionOption( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionOption;
       
    }

    public function deleteQuestionAnswer(Request $request){
      try{    
             $questionAnswer = $this->questionService->deleteQuestionAnswer( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionAnswer;
       
    }


    public function deleteQuestionOption(Request $request){
      try{    
             $questionOption = $this->questionService->deleteQuestionOption( $request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $questionOption;
       
    }

    public function activateQuestion(Request $request){
       try{
            $question= $this->questionService->activateQuestion($request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $question;
    }

    public function deActivateQuestion(Request $request){
        try{
            $question= $this->questionService->deActivateQuestion($request->json()->all());
        }catch(Exception $e) {
            throw $e;
        }
        return $question;
    }

public function searchQuestion(Request $request){
        //dd($request);
         $value = $request->session()->get('user');
         $user_type = $value ->user_type;
         $user_id = $value ->user_id;
        return $this->questionService->searchQuestion($request->query(),$user_type,$user_id);
   }

   public function deleteAll(Request $request)
   {

       try{    
                $question = $this->questionService->deleteAll( $request->json()->all());
       }catch(Exception $e) {
           throw $e;
       }

       return $question;
     
   }

   public function renderQuestion(){
        try{    
                 $question = $this->questionService->renderQuestion();
        }catch(Exception $e) {
            throw $e;
        }

        return  $question;
    }


    public function sendingMail(Request $request){
        try{    
             $value = $request->session()->get('user');
      
         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $user_login_id = $value ->user_login_id;
       
        
        $mail = $this->questionService->sendingmail( $request->json()->all(),$user_profile_id,$user_id,$user_login_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $mail;
    }

     public function scoreCard(Request $request){
        try{    
             $value = $request->session()->get('user');
         

         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $user_login_id = $value ->user_login_id;
         
        
        $score = $this->questionService->scoreCard( $request->json()->all(),$user_profile_id,$user_id,$user_login_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $score;
    }


    public function pdfView(Request $request){
        try{    
           
        $score = $this->questionService->pdfView();
        }catch(Exception $e) {
            throw $e;
        }
        return $score;
    }


    // public function  getAllQuestionAndAnswer(){
    //     return response()->json($this->questionService->getAllQuestionAndAnswer(),201);
    // }

   
}    