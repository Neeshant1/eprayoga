<?php
namespace App\Services;
use App\Repositories\StateRepository;

class StateService{

    private $stateRepository;

    public function __construct(StateRepository $stateRepository) {
         $this->stateRepository = $stateRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->stateRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_profile_id){
        $result = $this->stateRepository->update($data,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->stateRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->stateRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->stateRepository->getAll();
   }

    public function getById($data){
        $result = $this->stateRepository->getById($data);
        return $result;
    }

    public function getStateByCountryId($data){
        $result = $this->stateRepository->getStateByCountryId($data);
        return $result;
    }

     public function activate($data){
         $result = $this->stateRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->stateRepository->deActivate($data);
        return $result;
    }

    public function deleteState($data){
         $result = $this->stateRepository->deleteState($data);
        return $result;
    }
    public function search($data){
        return $this->stateRepository->search($data);
   }

}

?>