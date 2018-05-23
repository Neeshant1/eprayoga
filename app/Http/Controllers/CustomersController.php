<?php
namespace App\Http\Controllers;
use App\Requests\CreateCustomersRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CustomersService;
use App\Util\BLAlphaNumericCodeGenerator;
class CustomersController extends Controller
{

	private $customersService;

    public function __construct(CustomersService $customersService) {
        $this->customersService = $customersService;
    }

    public function save(CreateCustomersRequest $request)
    {

        try{
         
          $value = $request->session()->get('user');
                     

          if(count($value) > 0){
            $user_profile_id = $value->user_profile_id;
            $customers = $this->customersService->save( $request->json()->all(),$user_profile_id);
          } else {
            $customers = $this->customersService->save1( $request->json()->all());
          }

        }catch(Exception $e) {
            throw $e;
        }

        return $customers;
    }

    public function update(Request $request)
    {
        $customers = $request->customer_id;
        $this->validate($request, [
       'cust_aadhar_number' => 'required|unique:bl_customer,cust_aadhar_number,' .$customers .',customer_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'cust_pan' => 'required|unique:bl_customer,cust_pan,' .$customers .',customer_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'cust_passport' => 'required|unique:bl_customer,cust_passport,' .$customers .',customer_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'cust_mobile_phone_number' => 'required|unique:bl_customer,cust_mobile_phone_number,' .$customers .',customer_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'cust_per_emai_id' => 'required|unique:bl_customer,cust_per_emai_id,' .$customers .',customer_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'cust_off_email_id' => 'required|unique:bl_customer,cust_off_email_id,' .$customers .',customer_id,is_deleted,0'
                   ]);
    	$customers = $this->customersService->update($request->json()->all());

        return $customers;

    }

     public function delete(Request $request)
    {
    	$customers = $this->customersService->delete($request->json()->all());
      return $customers;
       
    }

     public function getAll(){
    	$customers = $this->customersService->getAll();
      return $customers;
    }

     public function getById(Request $request){
    	$customers = $this->customersService->getById($request->json()->all());
      return $customers;
      
    }
     public function activate(Request $request)
    {
        $customers = $this->customersService->activate($request->json()->all());
        return $customers;
       
    }

    public function deActivate(Request $request)
    {
        $customers = $this->customersService->deActivate($request->json()->all());
        return $customers;
       
    }
    public function deleteAll(Request $request) {
        $result = $this->customersService->deleteAll();
        return $result;
       
   }
   public function search(Request $request){
        $result = $this->customersService->search($request->get("search_text"));
        return $result;
    }
   

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function getCount(){
      $customers = $this->customersService->getCount();
      return $customers;


    }

    public function getCust(Request $request){
         $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value->user_id;
         $client = $this->customersService->getCust($user_id,$user_type);
        return  $client;
       // return $request->json()->get('address_type');
    }

}    
