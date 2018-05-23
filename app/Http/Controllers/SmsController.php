<?php
namespace App\Http\Controllers;
use App\Requests\CreateSmsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SmsService;
class SmsController extends Controller
{

	private $smsService;

    public function __construct(SmsService $smsService) {
        $this->smsService = $smsService;
    }

    public function save(CreateSmsRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        // $request->session()->put('$users', 'hallo');

    
        // //$request->session()->get('$users');

        $sms = $this->smsService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $sms;
    }

    public function update(Request $request)
    {

        $sms = $request->sms_config_id;
         $this->validate($request, [
        'app_sms_user_id' => 'required|unique:bl_sms_config,app_sms_user_id,'.$sms .',sms_config_id,is_deleted,0' 
                    ]);
    	$sms = $this->smsService->update($request->json()->all());

        return $sms;
    }

     public function delete(Request $request)
    {
    	$sms = $this->smsService->delete($request->json()->all());
        return $sms;
       
    }

    public function deleteAll(Request $request)
    {
        $sms = $this->smsService->deleteAll();
        return $sms;
       
    }

     public function getAll(){
    	$sms = $this->smsService->getAll();
        return $sms;
    }

     public function getById(Request $request){
    	$sms = $this->smsService->getById($request->json()->all());
        return $sms;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $sms = $this->smsService->activate($request->json()->all());
        return $sms;
       
    }

    public function deActivate(Request $request)
    {
        $sms = $this->smsService->deActivate($request->json()->all());
        return $sms;
       
    }


    public function deleteSms(Request $request)
    {
        $sms = $this->smsService->deleteSms($request->json()->all());
        return $sms;
       
    }

    public function search(Request $request){
        $sms = $this->smsService->search($request->get("search_text"));
        return $sms;
    }


}    