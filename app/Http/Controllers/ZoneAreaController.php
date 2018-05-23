<?php
namespace App\Http\Controllers;
use App\Requests\CreateZoneAreaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ZoneAreaService;
class ZoneAreaController extends Controller
{

	private $zoneAreaService;

    public function __construct(ZoneAreaService $zoneAreaService) {
        $this->zoneAreaService = $zoneAreaService;
    }

    public function save(CreateZoneAreaRequest $request)
    {

        try{
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $zoneArea = $this->zoneAreaService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $zoneArea;

    }

    public function update(Request $request)
    {
        $zoneArea = $request->zone_area_id;
         $this->validate($request, [
        'zone_name' => 'required|unique:bl_zone_area_master,zone_name,' .$zoneArea .',zone_area_id,is_deleted,0' 
                    ]);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
    	$zoneArea = $this->zoneAreaService->update($request->json()->all(), $user_profile_id);

        return $zoneArea;
    }

     public function delete(Request $request)
    {
    	$zoneArea = $this->zoneAreaService->delete($request->json()->all());
        return $zoneArea;
       
    }


     public function deleteAll(Request $request)
    {
        $zoneArea = $this->zoneAreaService->deleteAll();
        return $zoneArea;
       
    }

     public function getAll(){
    	$zoneArea = $this->zoneAreaService->getAll();
        return $zoneArea;
    }

     public function getById(Request $request){
    	$zoneArea = $this->zoneAreaService->getById($request->json()->all());
        return $zoneArea;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }


    public function activate(Request $request)
    {
        $zoneArea = $this->zoneAreaService->activate($request->json()->all());
        return $zoneArea;
       
    }

    public function deActivate(Request $request)
    {
        $zoneArea = $this->zoneAreaService->deActivate($request->json()->all());
        return $zoneArea;
       
    }


    public function deleteZone(Request $request)
    {
        $zoneArea = $this->zoneAreaService->deleteZone($request->json()->all());
        return $zoneArea;
       
    }

    public function selectZone(){
        $zoneArea = $this->zoneAreaService->selectZone();
        return $zoneArea;
    }
     public function search(Request $request){
        $zoneArea = $this->zoneAreaService->search($request->get("zone_name"));
        return $zoneArea;
    }


}    