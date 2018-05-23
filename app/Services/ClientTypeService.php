<?php
namespace App\Services;
use App\Repositories\ClientTypeRepository;
use Log;

class ClientTypeService{

    private $clientTypeRepository;

    public function __construct(ClientTypeRepository $clientTypeRepository) {
         $this->clientTypeRepository = $clientTypeRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->clientTypeRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_profile_id){
        $result = $this->clientTypeRepository->update($data,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->clientTypeRepository->delete($data);
        return $result;
    }

     public function deleteAll(){
         $result = $this->clientTypeRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        $test = $this->clientTypeRepository->getAll();
        //return $this->clientTypeRepository->getAll();
        return $test;
   }

    public function getById($data){
        $result = $this->clientTypeRepository->getById($data);
        return $result;
    }

    public function activate($data)
    {
        $result = $this->clientTypeRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->clientTypeRepository->deActivate($data);
        return $result;
       
    }


    public function deleteClientType($data)
    {
        $result = $this->clientTypeRepository->deleteClientType($data);
        return $result;
       
    }

    public function search($data){
        return $this->clientTypeRepository->search($data);
   }

    public function selectClientType(){
        $test = $this->clientTypeRepository->selectClientType();
        //return $this->clientTypeRepository->getAll();
        return $test;
        //return $this->clientTypeRepository->selectClientType();
   }

}

?>