<?php
namespace App\Http\Controllers;
use App\Requests\CountryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CountryService;
class CountryController extends Controller
{

	private $countryService;

    public function __construct(CountryService $countryService) {
        $this->countryService = $countryService;
    }

    public function save(CountryRequest $request)
    {

        try{
          
        
         $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;

        $country = $this->countryService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $country;
    }

    public function update(Request $request)
    {

        $country = $request->country_id;
         $this->validate($request, [
        'country_full_name' => 'required|unique:bl_country_master,country_full_name,'.$country .',country_id,is_deleted,0' 
                    ]);
         $this->validate($request, [
        'country_short_name' => 'required|unique:bl_country_master,country_short_name,'.$country .',country_id,is_deleted,0' 
                    ]);
         $this->validate($request, [
        'country_phonecode' => 'required|unique:bl_country_master,country_phonecode,'.$country .',country_id,is_deleted,0' 
                    ]);
         $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
    	$country = $this->countryService->update($request->json()->all(), $user_profile_id);

        return $country;
    }

     public function delete(Request $request)
    {
    	$country = $this->countryService->delete($request->json()->all());
        return $country;
       
    }

     public function deleteAll(Request $request)
    {
        $country = $this->countryService->deleteAll();
        return $country;
       
    }

     public function getAll(){
    	$country = $this->countryService->getAll();
        return $country;
    }

     public function getById(Request $request){
    	$country = $this->countryService->getById($request->json()->all());
        return $country;
       // return $request->json()->get('address_type');
    }

    public function getCountryByZoneId(Request $request){
    $country = $this->countryService->getCountryByZoneId($request->json()->all());
    return $country;
       
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $country = $this->countryService->activate($request->json()->all());
        return $country;
       
    }

    public function deActivate(Request $request)
    {
        $country = $this->countryService->deActivate($request->json()->all());
        return $country;
       
    }


    public function deleteCountry(Request $request)
    {
        $country = $this->countryService->deleteCountry($request->json()->all());
        return $country;
       
    }
    public function search(Request $request){
        $country = $this->countryService->search($request->get("country_full_name"));
        return $country;
    }
    public function getcountryincustomer(){
        $country = $this->countryService->getcountryincustomer();
        return $country;
    }

}    