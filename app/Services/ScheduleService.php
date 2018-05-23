<?php
namespace App\Services;
use App\Repositories\ScheduleRepository;

class ScheduleService{

    private $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository) {
         $this->scheduleRepository = $scheduleRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->scheduleRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_profile_id){
        $result = $this->scheduleRepository->update($data,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->scheduleRepository->delete($data);
        return $result;
    }


    public function getAll(){
        return $this->scheduleRepository->getAll();
   }

    public function getById($data){
        $result = $this->scheduleRepository->getById($data);
        return $result;
    }

    public function getRescheduleId($data){
        $result = $this->scheduleRepository->getRescheduleId($data);
        return $result;
    }

    
    public function getScheduleTime($data){
        $result = $this->scheduleRepository->getScheduleTime($data);
        return $result;
    }
}

?>