<?php
namespace App\Services;
use App\Repositories\UserAccessRepository;

class UserAccessService{

    private $userAccessRepository;

    public function __construct(UserAccessRepository $userAccessRepository) {
         $this->userAccessRepository = $userAccessRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->userAccessRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->userAccessRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->userAccessRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->userAccessRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->userAccessRepository->getAll();
   }

    public function getById($data){
        $result = $this->userAccessRepository->getById($data);
        return $result;
    }

    public function activate($data){
         $result = $this->userAccessRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->userAccessRepository->deActivate($data);
        return $result;
    }
}

?>