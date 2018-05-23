<?php
namespace App\Services;
use App\Repositories\QuestionComplexityRepository;

class QuestionComplexityService{

    private $questionComplexityRepository;

    public function __construct(QuestionComplexityRepository $questionComplexityRepository) {
         $this->questionComplexityRepository = $questionComplexityRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->questionComplexityRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->questionComplexityRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->questionComplexityRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id){
         $result = $this->questionComplexityRepository->deleteAll($user_id);
        return $result;
    }


    public function getAll(){
        return $this->questionComplexityRepository->getAll();
   }

    public function getById($data){
        $result = $this->questionComplexityRepository->getById($data);
        return $result;
    }


     public function activate($data){
         $result = $this->questionComplexityRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->questionComplexityRepository->deActivate($data);
        return $result;
    }

    public function deleteQuestionComplexity($data){
         $result = $this->questionComplexityRepository->deleteQuestionComplexity($data);
        return $result;
    }
     public function search($data){
        return $this->questionComplexityRepository->search($data);
   }

    public function selectQuestionComplexity(){
        return $this->questionComplexityRepository->selectQuestionComplexity();
   }

}

?>