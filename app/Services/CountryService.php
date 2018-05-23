<?php
namespace App\Services;
use App\Repositories\CountryRepository;

class CountryService{

    private $countryRepository;

    public function __construct(CountryRepository $countryRepository) {
         $this->countryRepository = $countryRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->countryRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data, $user_profile_id){
        $result = $this->countryRepository->update($data, $user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->countryRepository->delete($data);
        return $result;
    }

     public function deleteAll(){
         $result = $this->countryRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->countryRepository->getAll();
   }

    public function getById($data){
        $result = $this->countryRepository->getById($data);
        return $result;
    }

    public function getCountryByZoneId($data){
        $result = $this->countryRepository->getCountryByZoneId($data);
        return $result;
    }

     public function activate($data){
         $result = $this->countryRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->countryRepository->deActivate($data);
        return $result;
    }

    public function deleteCountry($data){
         $result = $this->countryRepository->deleteCountry($data);
        return $result;
    }
    public function search($data){
        return $this->countryRepository->search($data);
   }
   public function getcountryincustomer(){
        return $this->countryRepository->getcountryincustomer();
   }
}

?>