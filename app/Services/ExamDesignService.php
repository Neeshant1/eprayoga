<?php
namespace App\Services;
use App\Repositories\ExamDesignRepository;


class ExamDesignService{

    private $ExamDesignRepository;

    public function __construct(ExamDesignRepository $ExamDesignRepository) {
         $this->ExamDesignRepository = $ExamDesignRepository;
     }

    public function save(array $data,$user_id){

        $result = $this->ExamDesignRepository->save($data,$user_id);
        return $result;
    }

    public function update(array $data,$user_id){
        $result = $this->ExamDesignRepository->update($data,$user_id);
        return $result;
    }

    public function delete($data){
         $result = $this->ExamDesignRepository->delete($data);
        return $result;
    }

     public function deleteAll(){
         $result = $this->ExamDesignRepository->deleteAll();
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->ExamDesignRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->ExamDesignRepository->getById($data);
        return $result;
    }

    public function search($data){
        return $this->ExamDesignRepository->search($data);
   }

     
    
      

}

?>

