<?php
namespace App\Services;
use App\Repositories\CustomersRepository;

class CustomersService{

    private $customersRepository;

    public function __construct(CustomersRepository $customersRepository) {
         $this->customersRepository = $customersRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->customersRepository->save($data,$user_profile_id);
        return $result;
    }
     public function save1(array $data){
        
            $result = $this->customersRepository->save1($data);
             return $result;
        
        
    }

    public function update(array $data){
        $result = $this->customersRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->customersRepository->delete($data);
        return $result;
    }


    public function getAll(){
        return $this->customersRepository->getAll();
   }

    public function getById($data){
        $result = $this->customersRepository->getById($data);
        return $result;
    }
      public function activate($data){
         $result = $this->customersRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->customersRepository->deActivate($data);
        return $result;
    }
    public function search($data){
        return $this->customersRepository->search($data);
   }

    public function deleteAll(){
         $result = $this->customersRepository->deleteAll();
        return $result;
    }

    public function getCount(){
        return $this->customersRepository->getCount();
    }

    public function getCust($user_id,$user_type){
        $result = $this->customersRepository->getCust($user_id,$user_type);
        return $result;
    }
}

?>