<?php
namespace App\Services;
use App\Repositories\ProductCatalogRepository;


class ProductCatalogService{

    private $ProductCatalogRepository;

    public function __construct(ProductCatalogRepository $ProductCatalogRepository) {
         $this->ProductCatalogRepository = $ProductCatalogRepository;
     }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id){

        $result = $this->ProductCatalogRepository->save($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function update(array $data,$user_profile_id,$user_id,$clnt_group_id){
        $result = $this->ProductCatalogRepository->update($data,$user_profile_id,$user_id,$clnt_group_id);
        return $result;
    }

    public function delete($data){
         $result = $this->ProductCatalogRepository->delete($data);
        return $result;
    }

     public function deleteAll($user_id){
         $result = $this->ProductCatalogRepository->deleteAll($user_id);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->ProductCatalogRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->ProductCatalogRepository->getById($data);
        return $result;
    }

    public function activate($data)
    {
        $result = $this->ProductCatalogRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->ProductCatalogRepository->deActivate($data);
        return $result;
       
    }


    public function search($data,$user_id){
        return $this->ProductCatalogRepository->search($data,$user_id);
   }

     public function getExamCart($user_profile_id,$user_type){

        return $this->ProductCatalogRepository->getExamCart($user_profile_id,$user_type);
    }

    public function getExamCartOne($user_profile_id,$user_type){

        return $this->ProductCatalogRepository->getExamCartOne($user_profile_id,$user_type);
    }

         public function getExamDetails($user_profile_id){

        return $this->ProductCatalogRepository->getExamDetails($user_profile_id);
    }

    public function selectId($user_id,$user_type){
        $result = $this->ProductCatalogRepository->selectId($user_id,$user_type);
        return $result;
    }

    public function selectUserProduct(){
        $result = $this->ProductCatalogRepository->selectUserProduct();
        return $result;
    }

    public function getListclient($data){
        $result = $this->ProductCatalogRepository->getListclient($data);
        return $result;
    }

    
      

}

?>

