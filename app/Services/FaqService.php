<?php
namespace App\Services;
use App\Repositories\FaqRepository;

class FaqService{

    private $faqRepository;

    public function __construct(FaqRepository $faqRepository) {
         $this->faqRepository = $faqRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->faqRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->faqRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->faqRepository->delete($data);
        return $result;
    }

     public function deleteAll($user_id){
         $result = $this->faqRepository->deleteAll($user_id);
        return $result;
    }



    public function getAll(){
        return $this->faqRepository->getAll();
   }

    public function getById($data){
        $result = $this->faqRepository->getById($data);
        return $result;
    }

     public function activate($data){
         $result = $this->faqRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->faqRepository->deActivate($data);
        return $result;
    }

    public function deleteFaq($data){
         $result = $this->faqRepository->deleteFaq($data);
        return $result;
    }

    public function search($data){
        return $this->faqRepository->search($data);
   }
}

?>