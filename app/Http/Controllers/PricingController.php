<?php
namespace App\Http\Controllers;
use App\Requests\CreatePricingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PricingService;
class PricingController extends Controller
{

	private $pricingService;

    public function __construct(PricingService $pricingService) {
        $this->pricingService = $pricingService;
    }

    public function save(CreatePricingRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $pricing = $this->pricingService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

       return $pricing;
    }

    public function update(Request $request)
    {
    	$pricing = $this->pricingService->update($request->json()->all());

        return $pricing;

    }

     public function delete(Request $request)
    {
    	$pricing = $this->pricingService->delete($request->json()->all());
        return $pricing;
       
    }

     public function deleteAll(Request $request)
    {
        $pricing = $this->pricingService->deleteAll();
        return $pricing;
       
    }


     public function getAll(){
    	$pricing = $this->pricingService->getAll();
        return $pricing;
    }

     public function getById(Request $request){
    	$pricing = $this->pricingService->getById($request->json()->all());
        return $pricing;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $pricing = $this->pricingService->activate($request->json()->all());
        return $pricing;
       
    }

    public function deActivate(Request $request)
    {
        $pricing = $this->pricingService->deActivate($request->json()->all());
        return $pricing;
       
    }


    public function deletePricing(Request $request)
    {
        $pricing = $this->pricingService->deletePricing($request->json()->all());
       return $pricing;
       
    }

    public function search(Request $request){
        $pricing = $this->pricingService->search($request->get("search_text"));
        return $pricing;
    }
    
   

}    