<?php

namespace App\Services;

use App\Repositories\QuestionRepository;
use Log;

class QuestionService
{
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository) {
         $this->questionRepository = $questionRepository;
     }
 
    public function saveQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id){
        return $this->questionRepository->saveQuestion($data,$user_profile_id,$user_id,$clnt_group_id);
    }

    public function updateQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id){
        return $this->questionRepository->updateQuestion($data,$user_profile_id,$user_id,$clnt_group_id);    
    }

    public function deleteQuestion(array $data){
        return $this->questionRepository->deleteQuestion($data);
    }
    public function alertQuestion(array $data){
        return $this->questionRepository->alertQuestion($data);
    }

    public function getAllQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id,$user_type){
        return $this->questionRepository->getAllQuestion($data,$user_profile_id,$user_id,$clnt_group_id,$user_type);
    }
    public function getpageQuestion(array $data,$user_profile_id,$user_id,$clnt_group_id,$user_type){
        return $this->questionRepository->getpageQuestion($data,$user_profile_id,$user_id,$clnt_group_id,$user_type);
    }

    public function getQuestionById($data){
        return $this->questionRepository->getQuestionById($data);
    }

    public function getOptionsByQuestionId($data){
        return $this->questionRepository->getOptionsByQuestionId($data);

    }

    public function getAnswersByQuestionId($data){ 
        return $this->questionRepository->getAnswersByQuestionId($data);

    }

    public function saveBulkQuestionOption($data){
        return $this->questionRepository->saveBulkQuestionOption($data);
    }

        public function saveBulkQuestionAnswer($data){
        return $this->questionRepository->saveBulkQuestionAnswer($data);
    }

    public function saveQuestionOption($data){
        return $this->questionRepository->saveQuestionOption($data);
    }

    public function saveQuestionAnswer($data){
        return $this->questionRepository->saveQuestionAnswer($data);
    }

    public function deleteQuestionOption($data){
        return $this->questionRepository->deleteQuestionOption($data);
    }

    public function deleteQuestionAnswer($data){
        return $this->questionRepository->deleteQuestionAnswer($data);
    }

  
    public function activateQuestion($data){
        return $this->questionRepository->activateQuestion($data);
    }

    public function deActivateQuestion($data){
        return $this->questionRepository->deActivateQuestion($data);
    }

     public function searchQuestion($data,$user_id,$user_type){
        return $this->questionRepository->searchQuestion($data,$user_id,$user_type);
   }
//     public function getAllQuestionAndAnswer() {
//         return $this ->questionRepository->getAllQuestionAndAnswer();

// }
  public function getAllQuestionAndOptions() {
        return $this ->questionRepository->getAllQuestionAndOptions();

}

   public function deleteAll(array $data){
       return $this->questionRepository->deleteAll($data);
   }

    public function renderQuestion() {
        return $this ->questionRepository->renderQuestion();

    }

     public function sendingMail($data,$user_profile_id,$user_id,$user_login_id){
        return $this->questionRepository->sendingmail($data,$user_profile_id,$user_id,$user_login_id);
    }

    public function scoreCard($data,$user_profile_id,$user_id,$user_login_id){
        return $this->questionRepository->scoreCard($data,$user_profile_id,$user_id,$user_login_id);
    }

     public function pdfView(){
        return $this->questionRepository->pdfView();
    }



   
}

