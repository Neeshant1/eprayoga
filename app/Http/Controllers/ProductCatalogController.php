<?php
namespace App\Http\Controllers;
use App\Requests\productCatalogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductCatalogService;
use Log;
class ProductCatalogController extends Controller
{

	private $ProductCatalogService;

    public function __construct(ProductCatalogService $ProductCatalogService) {
        $this->ProductCatalogService = $ProductCatalogService;
    }

    public function save(productCatalogRequest $request)
    {
        try{   
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id; 
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $productCatalog = $this->ProductCatalogService->save( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $productCatalog;
    }

    public function update(Request $request)
    {   $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id; 
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
    	$productCatalog = $this->ProductCatalogService->update($request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);

        return $productCatalog;
    }

     public function delete(Request $request)
    {      
    	$productCatalog = $this->ProductCatalogService->delete($request->json()->all());
        return $productCatalog;
       
    }

     public function deleteAll(Request $request)
    {    $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id; 
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $productCatalog = $this->ProductCatalogService->deleteAll($user_id);
       return $productCatalog;
       
    }

     public function getAll(Request $request){
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id; 
        $clnt_group_id = $value ->clnt_group_id;
        $user_type = $value ->user_type;
        $user_id = $value ->user_id;
    	$productCatalog = $this->ProductCatalogService->getAll($user_id,$user_type);
        return $productCatalog;
    }

     public function getById(Request $request){
    	$productCatalog = $this->ProductCatalogService->getById($request->json()->all());
        return $productCatalog;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $productCatalog = $this->ProductCatalogService->activate($request->json()->all());
        return $productCatalog;
       
    }

    public function deActivate(Request $request)
    {
        $productCatalog = $this->ProductCatalogService->deActivate($request->json()->all());
        return $productCatalog;
       
    }


    public function search(Request $request){
       $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id; 
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $productCatalog = $this->ProductCatalogService->search($request->get("product_catalog_name"),$user_id);
        return $productCatalog;
    }

    public function getExamCart(Request $request){
        //dd($request);
         $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            $user_type = $value ->user_type;
        $examCart = $this->ProductCatalogService->getExamCart($user_profile_id,$user_type);
        return $examCart;
    }

        public function getExamCartOne(Request $request){
        //dd($request);
         $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            $user_type = $value ->user_type;
        $examCart = $this->ProductCatalogService->getExamCartOne($user_profile_id,$user_type);
       return $examCart;
    }

    public function getExamDetails(Request $request){
            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;
            
        $examCart = $this->ProductCatalogService->getExamDetails($user_profile_id);
        return $examCart;
    }

    public function selectId(Request $request){
          $value = $request->session()->get('user');
            $user_id = $value ->user_id;
            $user_type = $value ->user_type;
         $productCatalog = $this->ProductCatalogService->selectId($user_id,$user_type);
       return $productCatalog;
    }

    public function selectUserProduct(){
         $productCatalog = $this->ProductCatalogService->selectUserProduct();
        return $productCatalog;
    }

    public function getListclient(Request $request){
       // echo json_encode($request);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;

        $topic = $this->ProductCatalogService->getListclient($request->query());
       return $topic;
    }

}    

