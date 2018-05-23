<?php
namespace App\Services;
use App\Repositories\FaqCategoryRepository;

class FaqCategoryService{

    private $faqCategoryRepository;

    public function __construct(FaqCategoryRepository $faqCategoryRepository) {
         $this->faqCategoryRepository = $faqCategoryRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->faqCategoryRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->faqCategoryRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->faqCategoryRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id){
         $result = $this->faqCategoryRepository->deleteAll($user_id);
        return $result;
    }


    public function getAll(){
        return $this->faqCategoryRepository->getAll();
   }

    public function getById($data){
        $result = $this->faqCategoryRepository->getById($data);
        return $result;
    }

     public function activate($data){
         $result = $this->faqCategoryRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->faqCategoryRepository->deActivate($data);
        return $result;
    }

    public function deleteFaqCategory($data){
         $result = $this->faqCategoryRepository->deleteFaqCategory($data);
        return $result;
    }

    public function selectFaqCategory(){
        return $this->faqCategoryRepository->selectFaqCategory();
   }
   public function search($data){
        return $this->faqCategoryRepository->search($data);
   }
}

?>