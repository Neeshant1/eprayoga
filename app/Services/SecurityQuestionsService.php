<?php
namespace App\Services;
use App\Repositories\SecurityQuestionsRepository;

class SecurityQuestionsService{

    private $securityquestionsRepository;

    public function __construct(SecurityQuestionsRepository $securityquestionsRepository) {
         $this->securityquestionsRepository = $securityquestionsRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->securityquestionsRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_profile_id ){
        $result = $this->securityquestionsRepository->update($data,$user_profile_id );
        return $result;
    }

    public function delete($data){
         $result = $this->securityquestionsRepository->delete($data);
        return $result;
    }

     public function deleteAll(){
         $result = $this->securityquestionsRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->securityquestionsRepository->getAll();
   }

    public function getById($data){
        $result = $this->securityquestionsRepository->getById($data);
        return $result;
    }

    public function activate($data)
    {
        $result = $this->securityquestionsRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->securityquestionsRepository->deActivate($data);
        return $result;
       
    }


    public function deleteSecurityQuestion($data)
    {
        $result = $this->securityquestionsRepository->deleteSecurityQuestion($data);
        return $result;
       
    }

    
    public function search($data){
        return $this->securityquestionsRepository->search($data);
   }

    public function selectSecQus(){
        return $this->securityquestionsRepository->selectSecQus();
    }
}

?>