<?php
namespace App\Services;
use App\Repositories\AwsRepository;

class AwsService{

    private $awsRepository;

    public function __construct(AwsRepository $awsRepository) {
         $this->awsRepository = $awsRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->awsRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->awsRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->awsRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->awsRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->awsRepository->getAll();
   }

    public function getById($data){
        $result = $this->awsRepository->getById($data);
        return $result;
    }

    public function activate($data){
         $result = $this->awsRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->awsRepository->deActivate($data);
        return $result;
    }

    public function deleteAws($data){
         $result = $this->awsRepository->deleteAws($data);
        return $result;
    }

    public function search($data){
        return $this->awsRepository->search($data);
   }
}

?>