<?php
namespace App\Services;
use App\Repositories\UserTypeRepository;

class UserTypeService{

    private $userTypeRepository;

    public function __construct(UserTypeRepository $userTypeRepository) {
         $this->userTypeRepository = $userTypeRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->userTypeRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->userTypeRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->userTypeRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->userTypeRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->userTypeRepository->getAll();
   }

    public function getById($data){
        $result = $this->userTypeRepository->getById($data);
        return $result;
    }
    public function activate($data){
         $result = $this->userTypeRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->userTypeRepository->deActivate($data);
        return $result;
    }
    public function deleteUsertype($data){
         $result = $this->userTypeRepository->deleteUsertype($data);
        return $result;
    }
    public function search($data){
        return $this->userTypeRepository->search($data);
   }
}

?>