<?php
namespace App\Services;
use App\Repositories\PricingRepository;

class PricingService{

    private $pricingRepository;

    public function __construct(PricingRepository $pricingRepository) {
         $this->pricingRepository = $pricingRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->pricingRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->pricingRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->pricingRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->pricingRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->pricingRepository->getAll();
   }

    public function getById($data){
        $result = $this->pricingRepository->getById($data);
        return $result;
    }

         public function activate($data){
         $result = $this->pricingRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->pricingRepository->deActivate($data);
        return $result;
    }

    public function deletePricing($data){
         $result = $this->pricingRepository->deletePricing($data);
        return $result;
    }

    public function search($data){
        return $this->pricingRepository->search($data);
   }

    
}

?>