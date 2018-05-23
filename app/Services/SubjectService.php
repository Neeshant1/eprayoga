<?php
namespace App\Services;
use App\Repositories\SubjectRepository;

class SubjectService{

    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository) {
         $this->subjectRepository = $subjectRepository;
     }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id){

        $result = $this->subjectRepository->save($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        $result = $this->subjectRepository->update($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function delete($data){
         $result = $this->subjectRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id,$user_type){
         $result = $this->subjectRepository->deleteAll($user_id,$user_type);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->subjectRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->subjectRepository->getById($data);
        return $result;
    }

    public function getSubjecyByCategoryId($data,$user_id){
        $result = $this->subjectRepository->getSubjecyByCategoryId($data,$user_id);
        return $result;
    }
     public function activate($data){
         $result = $this->subjectRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->subjectRepository->deActivate($data);
        return $result;
    }

    public function deleteSubject($data){
         $result = $this->subjectRepository->deleteSubject($data);
        return $result;
    }
    
    public function search($data,$user_id){
        return $this->subjectRepository->search($data,$user_id);
    }

    public function getcol($data){
         $result = $this->subjectRepository->getcol($data);
        return $result;
    }

    
    public function getSubjecyByCategoryIdCust($data){
        $result = $this->subjectRepository->getSubjecyByCategoryIdCust($data);
        return $result;
    }

    public function getListclient($data){
        $result = $this->subjectRepository->getListclient($data);
        return $result;
    }


}

?>