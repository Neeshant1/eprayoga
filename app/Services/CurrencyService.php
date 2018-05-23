<?php
namespace App\Services;
use App\Repositories\CurrencyRepository;

class CurrencyService{

    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository) {
         $this->currencyRepository = $currencyRepository;
     }

    public function save(array $data,$user_id,$user_profile_id){

        
        $result = $this->currencyRepository->save($data,$user_id,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_id,$user_profile_id){
        $result = $this->currencyRepository->update($data,$user_id,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->currencyRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id,$user_type){
         $result = $this->currencyRepository->deleteAll($user_id,$user_type);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->currencyRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->currencyRepository->getById($data);
        return $result;
    }
    public function activate($data){
         $result = $this->currencyRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->currencyRepository->deActivate($data);
        return $result;
    }

    public function deleteCurrency($data){
         $result = $this->currencyRepository->deleteCurrency($data);
        return $result;
    }
    public function search($data,$user_id,$user_type){
        return $this->currencyRepository->search($data,$user_id,$user_type);
   }
   public function pricingcurrency(){
        return $this->currencyRepository->pricingcurrency();
   }

}

?>