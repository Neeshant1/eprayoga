<?php
namespace App\Services;
use App\Repositories\OriginTypeRepository;

class OriginTypeService{

    private $originTypeRepository;

    public function __construct(OriginTypeRepository $originTypeRepository) {
         $this->originTypeRepository = $originTypeRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->originTypeRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_profile_id){
        $result = $this->originTypeRepository->update($data,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->originTypeRepository->delete($data);
        return $result;
    }

    public function deleteAll(){
         $result = $this->originTypeRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->originTypeRepository->getAll();
   }

    public function getById($data){
        $result = $this->originTypeRepository->getById($data);
        return $result;
    }

         public function activate($data){
         $result = $this->originTypeRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->originTypeRepository->deActivate($data);
        return $result;
    }

    public function deleteOrigin($data){
         $result = $this->originTypeRepository->deleteOrigin($data);
        return $result;
    }

    public function search($data){
        return $this->originTypeRepository->search($data);
   }

    public function selectOrigin($data){
        return $this->originTypeRepository->selectOrigin($data);
    }

    public function selectOriginType(){
        return $this->originTypeRepository->selectOriginType();
    }
}

?>