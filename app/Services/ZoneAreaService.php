<?php
namespace App\Services;
use App\Repositories\ZoneAreaRepository;

class ZoneAreaService{

    private $zoneAreaRepository;

    public function __construct(ZoneAreaRepository $zoneAreaRepository) {
         $this->zoneAreaRepository = $zoneAreaRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->zoneAreaRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data, $user_profile_id){
        $result = $this->zoneAreaRepository->update($data, $user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->zoneAreaRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->zoneAreaRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->zoneAreaRepository->getAll();
   }

    public function getById($data){
        $result = $this->zoneAreaRepository->getById($data);
        return $result;
    }

     public function activate($data){
         $result = $this->zoneAreaRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->zoneAreaRepository->deActivate($data);
        return $result;
    }

    public function deleteZone($data){
         $result = $this->zoneAreaRepository->deleteZone($data);
        return $result;
    }

    public function selectZone(){
        return $this->zoneAreaRepository->selectZone();
   }
   public function search($data){
        return $this->zoneAreaRepository->search($data);
   }

}

?>