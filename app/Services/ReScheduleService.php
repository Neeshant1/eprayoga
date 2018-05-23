<?php
namespace App\Services;
use App\Repositories\ReScheduleRepository;

class ReScheduleService{

    private $reScheduleRepository;

    public function __construct(ReScheduleRepository $reScheduleRepository) {
         $this->reScheduleRepository = $reScheduleRepository;
     }

    // public function save(array $data){

    //     $result = $this->reScheduleRepository->save($data);
    //     return $result;
    // }

    public function update(array $data){
        $result = $this->reScheduleRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->reScheduleRepository->delete($data);
        return $result;
    }


   //  public function getAll(){
   //      return $this->reScheduleRepository->getAll();
   // }

    public function getById($data){
        $result = $this->reScheduleRepository->getById($data);
        return $result;
    }
}

?>