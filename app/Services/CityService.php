<?php
namespace App\Services;
use App\Repositories\CityRepository;

class CityService{

    private $cityRepository;

    public function __construct(CityRepository $cityRepository) {
         $this->cityRepository = $cityRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->cityRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_profile_id){
        $result = $this->cityRepository->update($data,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->cityRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->cityRepository->deleteAll();
        return $result;
    }

    public function getAll(){
        return $this->cityRepository->getAll();
   }

    public function getById($data){
        $result = $this->cityRepository->getById($data);
        return $result;
    }

     public function activate($data){
         $result = $this->cityRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->cityRepository->deActivate($data);
        return $result;
    }

    public function deleteCity($data){
         $result = $this->cityRepository->deleteCity($data);
        return $result;
    }
    public function search($data){
        return $this->cityRepository->search($data);
   }

   public function getCityByStateId($data){
        $result = $this->cityRepository->getCityByStateId($data);
        return $result;
    }
}

?>