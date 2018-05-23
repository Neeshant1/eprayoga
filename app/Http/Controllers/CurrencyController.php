<?php
namespace App\Http\Controllers;
use App\Requests\CreateCurrencyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CurrencyService;
use Illuminate\Support\Facades\DB;
class CurrencyController extends Controller
{

	private $currencyService;

    public function __construct(CurrencyService $currencyService) {
        $this->currencyService = $currencyService;
    }

    public function save(CreateCurrencyRequest $request)
    {

        try{
         $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
         $currency = $this->currencyService->save( $request->json()->all(),$user_profile_id,$user_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $currency;

    }

    public function update(Request $request)
    {
        
         $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
         $user_id = $value ->user_id; 

        $code = $request->code;
        $currency_name = $request->currency_name;
        $currency_id = $request->currency_id;

        $tmp = json_encode($currency_name,true);
        $tmp1 = json_encode($code,true);
        
        $catid = DB::select("select currency_id,currency_name,code,clnt_id from bl_currency_code_master where clnt_id = ".$user_id. " and currency_name = ".$tmp. " and currency_id = ".$currency_id."");

        $catid1 = DB::select("select currency_id,currency_name,code,clnt_id from bl_currency_code_master where clnt_id = ".$user_id. " and code = ".$tmp1. " and currency_id = ".$currency_id."");
        
            if(count($catid) <= 0){
                 $this->validate($request, [        
                'currency_name' => 'required|unique:bl_currency_code_master,currency_name,NULL,'.$currency_name .',clnt_id,'.$user_id.',is_deleted,0' 
                    ]);

            }
             if(count($catid1) <= 0){
                 $this->validate($request, [        
                'code' => 'required|unique:bl_currency_code_master,code,NULL,'.$code .',clnt_id,'.$user_id.',is_deleted,0' 
                    ]);

            }
    	 $currency = $this->currencyService->update($request->json()->all(),$user_profile_id,$user_id);
         
        return $currency;
    }

     public function delete(Request $request)
    {
    	$currency = $this->currencyService->delete($request->json()->all());
        return $currency;
       
    }

    public function deleteAll(Request $request)
    {
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value ->user_id;
        $currency = $this->currencyService->deleteAll($user_id,$user_type);
        return $currency;
       
    }

     public function getAll(Request $request){
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value ->user_id;
    	$currency = $this->currencyService->getAll($user_id,$user_type);
        return $currency;
    }

     public function getById(Request $request){
    	$currency = $this->currencyService->getById($request->json()->all());
        return response()->json($currency, 201);
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $currency = $this->currencyService->activate($request->json()->all());
        return $currency;
       
    }

    public function deActivate(Request $request)
    {
        $currency = $this->currencyService->deActivate($request->json()->all());
        return $currency;
       
    }
    public function deleteCurrency(Request $request)
    {
        $currency = $this->currencyService->deleteCurrency($request->json()->all());
        return $currency;
       
    }
    public function search(Request $request){
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_profile_id = $value ->user_profile_id;
        $user_id = $value ->user_id;
        $currency = $this->currencyService->search($request->get("currency_name"),$user_id,$user_type);
        return $currency;
    }
    public function pricingcurrency(){
        $currency = $this->currencyService->pricingcurrency();
        return $currency;
    }


}    