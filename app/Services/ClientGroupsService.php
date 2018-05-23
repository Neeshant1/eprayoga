<?php
namespace App\Services;
use App\Repositories\ClientGroupsRepository;

class ClientGroupsService{

    private $clientGroupsRepository;

    public function __construct(ClientGroupsRepository $clientGroupsRepository) {
         $this->clientGroupsRepository = $clientGroupsRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->clientGroupsRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->clientGroupsRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->clientGroupsRepository->delete($data);
        return $result;
    }


    public function getAll(){
        return $this->clientGroupsRepository->getAll();
   }

    public function getById($data){
        $result = $this->clientGroupsRepository->getById($data);
        return $result;
    }

    public function activate($data){
         $result = $this->clientGroupsRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->clientGroupsRepository->deActivate($data);
        return $result;
    }

    public function deleteClientGroup($data){
         $result = $this->clientGroupsRepository->deleteClientGroup($data);
        return $result;
    }

    public function search($data){
        return $this->clientGroupsRepository->search($data);
   }

    public function deleteAll(){
         $result = $this->clientGroupsRepository->deleteAll();
        return $result;
    }

    public function selectClientGroup(){
        return $this->clientGroupsRepository->selectClientGroup();
   }
}

?>