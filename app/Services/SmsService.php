<?php
namespace App\Services;
use App\Repositories\SmsRepository;

class SmsService{

    private $smsRepository;

    public function __construct(SmsRepository $smsRepository) {
         $this->smsRepository = $smsRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->smsRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->smsRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->smsRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->smsRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->smsRepository->getAll();
   }

    public function getById($data){
        $result = $this->smsRepository->getById($data);
        return $result;
    }

         public function activate($data){
         $result = $this->smsRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->smsRepository->deActivate($data);
        return $result;
    }

    public function deleteSms($data){
         $result = $this->smsRepository->deleteSms($data);
        return $result;
    }

    public function search($data){
        return $this->smsRepository->search($data);
   }
}

?>