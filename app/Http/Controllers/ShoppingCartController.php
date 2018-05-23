<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\ShoppingCartService;
use Illuminate\Http\Request;

use Log;

class ShoppingCartController extends Controller
{

    private $shoppingCartService;

    public function __construct(ShoppingCartService $shoppingCartService) {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function getAllProduct(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $user_id = $value ->user_id;
        $product = $this->shoppingCartService->getAllProduct($user_id);
        return $product;
    }

    public function addShoppingCart(Request $request)
    {
        try{   
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
          //  $req = $request['name','clnt_id','clnt_group_id','id'];
             $addShoppingCart = $this->shoppingCartService->addShoppingCart($request->json()->all(),$user_profile_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $addShoppingCart;
    }

    public function confirmOrder(Request $request)
    {
        try{   
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            $user_id = $value ->user_id;
            $user_type = $value ->user_type;
            $clnt_group_id = $value ->clnt_group_id;
            
          //  $req = $request['name','clnt_id','clnt_group_id','id'];
             $confirmOrder = $this->shoppingCartService->confirmOrder($request->json()->all(),$user_profile_id, $user_id, $user_type,$clnt_group_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $confirmOrder;
    }

    public function getAllPerforma(Request $request){
         try{   
            $value = $request->session()->get('user');
            $user_id = $value ->user_id;
            $user_type = $value ->user_type;
          
             $product = $this->shoppingCartService->getAllPerforma($user_type, $user_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $product;
    }

    public function getAllCart(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $product = $this->shoppingCartService->getAllCart($user_profile_id);
        return $product;
    }

    public function confirmCartOrder(Request $request)
    {
        try{   
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            $user_id = $value ->user_id;
            $user_type = $value ->user_type;
            $clnt_group_id = $value ->clnt_group_id;
          //  echo "string    $request->json()->all()";
         // dd($request->json()->all());
          //  $req = $request['name','clnt_id','clnt_group_id','id'];
             $confirmCartOrder = $this->shoppingCartService->confirmCartOrder($request->json()->all(),$user_profile_id, $user_id, $user_type,$clnt_group_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $confirmCartOrder;
    }

     public function delete(Request $request)
    {
        
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $cart = $this->shoppingCartService->delete($request->json()->all(), $user_profile_id);
        return $cart;
       
    }

    
    public function getPromoCode(Request $request)
    {
        try{   
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
             $user_id = $value ->user_id;
            $user_type = $value ->user_type;
           
          //  echo "string    $request->json()->all()";
         // dd($request->json()->all());
          //  $req = $request['name','clnt_id','clnt_group_id','id'];
             $getPromoCode = $this->shoppingCartService->getPromoCode($request->json()->all(),$user_profile_id, $user_type, $user_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $getPromoCode;
    }

    
    
    public function getAllShopCart(){
        $product = $this->shoppingCartService->getAllShopCart();
        return $product;
    }

    public function search(Request $request){
       // $value = $request->session()->get('user');
            
      //  $user_id = $value ->user_id;
        $product = $this->shoppingCartService->search($request->get("description"),1);
        return $product;
    }

    public function getsearchresult(Request $request){
         //   $value = $request->session()->get('user');         
         //   $user_id = $value ->user_id;
        $product = $this->shoppingCartService->getsearchresult($request,1);
        return $product;
    }

    public function getCustExam(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $product = $this->shoppingCartService->getCustExam($user_profile_id);
        return $product;
    }

    public function getCustExam1(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $product = $this->shoppingCartService->getCustExam1($user_profile_id);
        return $product;
    }

    public function getCustExam2(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $product = $this->shoppingCartService->getCustExam2($user_profile_id);
        return $product;
    }

    public function getCartCount(Request $request)
    {    $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $cart = $this->shoppingCartService->getCartCount($user_profile_id );
        return $cart;
       
    }
    public function get(Request $request)
    {    $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $cart = $this->shoppingCartService->getCartCount($user_profile_id );
        return $cart;
       
    }
    //  public function searchPromocode(Request $request){
    //   $product = $this->shoppingCartService->searchPromocode("promo_code");
    //     return response()->json($product, 201);
    // }
    public function searchPromocode(Request $request){
        $product = $this->shoppingCartService->searchPromocode($request->get('search'));
        return  $product;
    }

    public function allocatePromocode(Request $request){    
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            $id = $request->input('vid');
            $cart = $this->shoppingCartService->allocatePromocode($user_profile_id, $id);
            return $cart;
       
    }

    public function examResult(Request $request){
         
        $examResult = $this->shoppingCartService->examResult($request->json()->all());
        return $examResult;
    }
    
    public function getSalesSummary(Request $request){
       // echo json_encode($request);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        //dd($request);
       //dd($request->query('client_id'));

        $subject = $this->shoppingCartService->getSalesSummary($request->query());
        return $subject;
    }

    
    public function getExamSummary(Request $request){
       // echo json_encode($request);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        //dd($request);
       //dd($request->query('client_id'));

        $subject = $this->shoppingCartService->getExamSummary($request->query());
        return $subject;
    }

    public function getExamCustSummary(Request $request){
       // echo json_encode($request);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        //dd($request);
       //dd($request->query('client_id'));

        $subject = $this->shoppingCartService->getExamCustSummary($request->query());
        return $subject;
    }

    
    public function getExamClntPerformanceSummary(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        $subject = $this->shoppingCartService->getExamClntPerformanceSummary($request->query());
        return $subject;
    }

    public function getExamCustPerformanceSummary(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        $subject = $this->shoppingCartService->getExamCustPerformanceSummary($request->query());
        return $subject;
    }
    

}    