<?php
namespace App\Services;
use App\Repositories\ShoppingCartRepository;
use Illuminate\Http\Request;
use Log;

class ShoppingCartService{

    private $ShoppingCartRepository;

    public function __construct(ShoppingCartRepository $ShoppingCartRepository) {
         $this->ShoppingCartRepository = $ShoppingCartRepository;
     }

    public function getAllProduct($user_id){
        return $this->ShoppingCartRepository->getAllProduct($user_id);
    }
    
    public function addShoppingCart(array $data, $user_profile_id){

    // echo "string    $data->name";
//dd($data);
        $result = $this->ShoppingCartRepository->addShoppingCart($data, $user_profile_id);
        return $result;
    }

    public function confirmOrder(array $data, $user_profile_id, $user_id, $user_type,$clnt_group_id){
        $result = $this->ShoppingCartRepository->confirmOrder($data, $user_profile_id, $user_id, $user_type,$clnt_group_id);
        return $result;
    }

    public function getAllPerforma($user_type, $user_id){
        $result = $this->ShoppingCartRepository->getAllPerforma($user_type, $user_id);
        return $result;
    }

    public function getAllCart($user_profile_id){
       return $this->ShoppingCartRepository->getAllCart($user_profile_id);
    }

    public function confirmCartOrder(array $data, $user_profile_id, $user_id, $user_type,$clnt_group_id){

        $result = $this->ShoppingCartRepository->confirmCartOrder($data, $user_profile_id, $user_id, $user_type,$clnt_group_id);
        return $result;
    }

     public function delete($data, $user_profile_id){
         $result = $this->ShoppingCartRepository->delete($data, $user_profile_id);
        return $result;
    }

    public function getPromoCode(array $data, $user_profile_id, $user_type, $user_id){

    // echo "string    $data->name";
    //dd($data);
        $result = $this->ShoppingCartRepository->getPromoCode($data, $user_profile_id, $user_type, $user_id);
        return $result;
    }
  

    public function getAllShopCart(){
        return $this->ShoppingCartRepository->getAllShopCart();
    }

    public function search($data,$user_id){
        return $this->ShoppingCartRepository->search($data,$user_id);
   }
   public function getsearchresult($data,$user_id){
        return $this->ShoppingCartRepository->getsearchresult($data,$user_id);
   }
    public function getCustExam($user_profile_id){
        return $this->ShoppingCartRepository->getCustExam($user_profile_id);
    }

    public function getCustExam1($user_profile_id){
        return $this->ShoppingCartRepository->getCustExam1($user_profile_id);
    }

    public function getCustExam2($user_profile_id){
        return $this->ShoppingCartRepository->getCustExam2($user_profile_id);
    }

   public function getCartCount($user_profile_id ){ 
        return $this->ShoppingCartRepository->getCartCount($user_profile_id );

    }
    public function searchPromocode($data){
        return $this->ShoppingCartRepository->searchPromocode($data);
   }
    public function allocatePromocode($user_profile_id, $id){
        return $this->ShoppingCartRepository->allocatePromocode($user_profile_id, $id);
    }

    public function examResult($data){
       $result = $this->ShoppingCartRepository->examResult($data);
        return $result;
    }

    public function getSalesSummary($data){
        $result = $this->ShoppingCartRepository->getSalesSummary($data);
        return $result;
    }
   
    public function getExamSummary($data){
        $result = $this->ShoppingCartRepository->getExamSummary($data);
        return $result;
    }

    
    public function getExamCustSummary($data){
        $result = $this->ShoppingCartRepository->getExamCustSummary($data);
        return $result;
    }

    
    public function getExamClntPerformanceSummary($data){
        $result = $this->ShoppingCartRepository->getExamClntPerformanceSummary($data);
        return $result;
    }

    
    public function getExamCustPerformanceSummary($data){
        $result = $this->ShoppingCartRepository->getExamCustPerformanceSummary($data);
        return $result;
    }
}

?>

