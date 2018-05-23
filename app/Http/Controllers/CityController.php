<?php
namespace App\Http\Controllers;
use App\Requests\CreateCityRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CityService;
use Log;
class CityController extends Controller
{

	private $cityService;

    public function __construct(CityService $cityService) {
        $this->cityService = $cityService;
    }

    public function save(CreateCityRequest $request)
    {

        try{
           
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $city = $this->cityService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $city;

    }

    public function update(Request $request)
    {
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $city = $request->city_id;
         $this->validate($request, [
        'city_full_name' => 'required|unique:bl_city_master,city_full_name,'.$city .',city_id,is_deleted,0' 
                    ]);
         $this->validate($request, [
        'code' => 'required|unique:bl_city_master,code,'.$city .',city_id,is_deleted,0' 
                    ]);
    	$city = $this->cityService->update($request->json()->all(),$user_profile_id);

        return $city;

    }

     public function delete(Request $request)
    {
    	$city = $this->cityService->delete($request->json()->all());
        return $city;
       
    }

     public function deleteAll(Request $request)
    {
        $city = $this->cityService-> deleteAll();
        return $city;
       
    }


     public function getAll(Request $request){
        $city = $this->cityService->getAll();
        $value = $request->session()->get('user');
        return $city;
    }

     public function getById(Request $request){
    	$city = $this->cityService->getById($request->json()->all());
        return $city;
       
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $city = $this->cityService->activate($request->json()->all());
        return $city;
       
    }

    public function deActivate(Request $request)
    {
        $city = $this->cityService->deActivate($request->json()->all());
        return $city;
       
    }


    public function deleteCity(Request $request)
    {
        $city = $this->cityService->deleteCity($request->json()->all());
        return $city;
       
    }
    public function search(Request $request){
        $city = $this->cityService->search($request->get("city_full_name"));
        return $city;
    }

    public function getCityByStateId(Request $request){
    $state = $this->cityService->getCityByStateId($request->json()->all());
    return $state;
       
    }

}    