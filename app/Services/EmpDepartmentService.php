<?php
namespace App\Services;
use App\Repositories\EmpDepartmentRepository;

class EmpDepartmentService{

    private $empDepartmentRepository;

    public function __construct(EmpDepartmentRepository $empDepartmentRepository) {
         $this->empDepartmentRepository = $empDepartmentRepository;
     }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id){

        $result = $this->empDepartmentRepository->save($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function update(array $data,$user_id,$user_profile_id,$clnt_group_id){
        $result = $this->empDepartmentRepository->update($data,$user_id,$user_profile_id,$clnt_group_id);
        return $result;
    }

    public function delete($data){
         $result = $this->empDepartmentRepository->delete($data);
        return $result;
    }

     public function deleteAll($user_id,$user_type){
         $result = $this->empDepartmentRepository->deleteAll($user_id,$user_type);
        return $result;
    }


    public function getAll($user_id,$user_type){
         $result = $this->empDepartmentRepository->getAll($user_id,$user_type);
         return $result;
   }

    public function getById($data){
        $result = $this->empDepartmentRepository->getById($data);
        return $result;
    }

    public function activate($data)
    {
        $result = $this->empDepartmentRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->empDepartmentRepository->deActivate($data);
        return $result;
       
    }


    public function deleteDepartment($data)
    {
        $result = $this->empDepartmentRepository->deleteDepartment($data);
        return $result;
       
    }

    public function search($data,$user_id){
        return $this->empDepartmentRepository->search($data,$user_id);
   }

    public function selectDept(){
        return $this->empDepartmentRepository->selectDept();
    }

}

?>