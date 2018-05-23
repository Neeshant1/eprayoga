<?php
namespace App\Services;
use App\Repositories\QuestionTypeRepository;

class QuestionTypeService{

    private $questionTypeRepository;

    public function __construct(QuestionTypeRepository $questionTypeRepository) {
         $this->questionTypeRepository = $questionTypeRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->questionTypeRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->questionTypeRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->questionTypeRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id){
         $result = $this->questionTypeRepository->deleteAll($user_id);
        return $result;
    }


    public function getAll(){
        return $this->questionTypeRepository->getAll();
   }

    public function getById($data){
        $result = $this->questionTypeRepository->getById($data);
        return $result;
    }

     public function activate($data){
         $result = $this->questionTypeRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->questionTypeRepository->deActivate($data);
        return $result;
    }

    public function deleteQuestionType($data){
         $result = $this->questionTypeRepository->deleteQuestionType($data);
        return $result;
    }
    public function search($data){
        return $this->questionTypeRepository->search($data);
   }

    public function selectQuestionType(){
        return $this->questionTypeRepository->selectQuestionType();
   }
}

?>