<?php
namespace App\Http\Controllers;
use App\Requests\CreateAwsRequest;
use App\Http\Controllers\Controller;
use App\Services\AwsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AwsController extends Controller{

	private $awsService;

    public function __construct(AwsService $awsService) {
        $this->awsService = $awsService;
    }

    public function save(CreateAwsRequest $request){
        //return $request->json()->all();
      $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
    	$result = $this->awsService->save($request->json()->all(),$user_profile_id);
       return $result;
    }

    public function update(Request $request){
        
        $aws = $request->aws_s3_master_id;
         $this->validate($request, [
        'aws_s3_id' => 'required|unique:bl_aws_s3_master,aws_s3_id,'.$aws .',aws_s3_master_id,is_deleted,0' 
                    ]);
         $this->validate($request, [
        'aws_access_key_id' => 'required|unique:bl_aws_s3_master,aws_access_key_id,'.$aws .',aws_s3_master_id,is_deleted,0' 
                    ]);
         $this->validate($request, [
        'aws_secret_access_key' => 'required|unique:bl_aws_s3_master,aws_secret_access_key,'.$aws .',aws_s3_master_id,is_deleted,0' 
                    ]);
       $result = $this->awsService->update($request->json()->all());
       return $aws;
    }

    public function delete(Request $request){
        $result = $this->awsService->delete($request->json()->all());
        return $result;
    }

    public function deleteAll(Request $request) {
        $result = $this->awsService->deleteAll();
        return $result;
       
    }


    public function getAll(){
        $result = $this->awsService->getAll();
        return $result;
    }

    public function getById(Request $request){
        $result = $this->awsService->getById($request->json()->all());
        return $result;    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $result = $this->awsService->activate($request->json()->all());
        return $result;
       
    }

    public function deActivate(Request $request)
    {
        $result = $this->awsService->deActivate($request->json()->all());
        return $result;
       
    }


    public function deleteAws(Request $request)
    {
        $result = $this->awsService->deleteAws($request->json()->all());
        return $result;
       
    }

    public function search(Request $request){
        $result = $this->awsService->search($request->get("search_text"));
        return $result;
    }

}    