<?php
namespace App\Services;
use App\Repositories\TopicRepository;

class TopicService{

    private $topicRepository;

    public function __construct(TopicRepository $topicRepository) {
         $this->topicRepository = $topicRepository;
     }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id){

        $result = $this->topicRepository->save($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        $result = $this->topicRepository->update($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function delete($data){
         $result = $this->topicRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id,$user_type){
         $result = $this->topicRepository->deleteAll($user_id,$user_type);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->topicRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->topicRepository->getById($data);
        return $result;
    }
    public function activate($data){
         $result = $this->topicRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->topicRepository->deActivate($data);
        return $result;
    }

    public function deleteTopic($data){
         $result = $this->topicRepository->deleteTopic($data);
        return $result;
    }

    public function search($data,$user_id){
        return $this->topicRepository->search($data,$user_id);
    }

     public function getTopicBySubjectId($data,$user_id){
        $result = $this->topicRepository->getTopicBySubjectId($data,$user_id);
        return $result;
    }
    public function getcoll($data){
         $result = $this->topicRepository->getcoll($data);
        return $result;
    }

    public function getListclient($data){
        $result = $this->topicRepository->getListclient($data);
        return $result;
    }

}

?>