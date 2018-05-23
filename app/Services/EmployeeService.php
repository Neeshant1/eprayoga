<?php
namespace App\Services;
use App\Repositories\EmployeeRepository;

class EmployeeService{

    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository) {
         $this->employeeRepository = $employeeRepository;
     }

    public function save(array $data,$value,$user_profile_id){

        $result = $this->employeeRepository->save($data,$value,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->employeeRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->employeeRepository->delete($data);
        return $result;
    }


    public function getAll($user_id, $user_type){
        return $this->employeeRepository->getAll($user_id,$user_type);
   }

    public function getEmployee($user_id,$user_type){
        return $this->employeeRepository->getEmployee($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->employeeRepository->getById($data);
        return $result;
    }

    public function activate($data){
         $result = $this->employeeRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->employeeRepository->deActivate($data);
        return $result;
    }

    public function deleteEmployee($data){
         $result = $this->employeeRepository->deleteEmployee($data);
        return $result;
    }

    public function search($data){
        return $this->employeeRepository->search($data);
   }

    public function deleteAll(){
         $result = $this->employeeRepository->deleteAll();
        return $result;
    }

        public function searchEmp($data,$user_type,$user_id){
        return $this->employeeRepository->searchEmp($data,$user_type,$user_id);
   }
}

?>