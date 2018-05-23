<?php
namespace App\Services;
use App\Repositories\CategoryRepository;
use Log;

class CategoryService{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
         $this->categoryRepository = $categoryRepository;
     }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id){

        $result = $this->categoryRepository->save($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        $result = $this->categoryRepository->update($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function delete($data){
         $result = $this->categoryRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id,$user_type){
         $result = $this->categoryRepository->deleteAll($user_id,$user_type);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->categoryRepository->getAll($user_id,$user_type);
   }

    public function getList($user_id,$user_type){
        return $this->categoryRepository->getList($user_id,$user_type);
   }
    public function getListclient($data){
        $result = $this->categoryRepository->getListclient($data);
        return $result;
   }

    public function getById($data){
        $result = $this->categoryRepository->getById($data);
        return $result;
    }
    public function activate($data){
         $result = $this->categoryRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->categoryRepository->deActivate($data);
        return $result;
    }

    public function deleteCategory($data){
         $result = $this->categoryRepository->deleteCategory($data);
        return $result;
    }
    public function search($data,$user_id){
        return $this->categoryRepository->search($data,$user_id);
   }

   
    public function getListCust(){
        return $this->categoryRepository->getListCust();
   }
}

?>