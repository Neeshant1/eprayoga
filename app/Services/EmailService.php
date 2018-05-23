<?php
namespace App\Services;
use App\Repositories\EmailRepository;

class EmailService{

    private $emailRepository;

    public function __construct(EmailRepository $emailRepository) {
         $this->emailRepository = $emailRepository;
     }

    public function save(array $data){

        $result = $this->emailRepository->save($data);
        return $result;
    }

    public function update(array $data){
        $result = $this->emailRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->emailRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->emailRepository->deleteAll();
        return $result;
    }



    public function getAll(){
        return $this->emailRepository->getAll();
   }

    public function getById($data){
        $result = $this->emailRepository->getById($data);
        return $result;
    }

    public function activate($data){
         $result = $this->emailRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->emailRepository->deActivate($data);
        return $result;
    }

    public function deleteEmail($data){
         $result = $this->emailRepository->deleteEmail($data);
        return $result;
    }

    public function search($data){
        return $this->emailRepository->search($data);
   }
}

?>