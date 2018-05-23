<?php
namespace App\Services;
use App\Repositories\ClientRepository;
use Log;

class ClientService{

    private $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
         $this->clientRepository = $clientRepository;
     }

    public function save(array $data,$user_profile_id){
   
            $result = $this->clientRepository->save($data,$user_profile_id);
            return $result; 
        
        
    }

    public function save1(array $data){
        
            $result = $this->clientRepository->save1($data);
             return $result;
        
        
    }

    public function update(array $data){
        $result = $this->clientRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->clientRepository->delete($data);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->clientRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->clientRepository->getById($data);
        return $result;
    }

    public function activate($data,$user_id,$user_type){
         $result = $this->clientRepository->activate($data,$user_id,$user_type);
        return $result;
    }

    public function deActivate($data,$user_id,$user_type){
         $result = $this->clientRepository->deActivate($data,$user_id,$user_type);
        return $result;
    }

    public function deleteClient($data){
         $result = $this->clientRepository->deleteClient($data);
        return $result;
    }

    public function search($data){
        return $this->clientRepository->search($data);
   }

    public function deleteAll(){
         $result = $this->clientRepository->deleteAll();
        return $result;
    }

    public function getClientId($user_id,$user_type){
        $result = $this->clientRepository->getClientId($user_id,$user_type);
        return $result;
    }

 public function getEnroll(){
        return $this->clientRepository->getEnroll();
   }


}

?>