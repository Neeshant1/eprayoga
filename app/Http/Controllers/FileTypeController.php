<?php
namespace App\Http\Controllers;
use App\Requests\CreateFileTypeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FileTypeService;
class fileTypeController extends Controller
{

	private $FileTypeService;

    public function __construct(FileTypeService $FileTypeService) {
        $this->FileTypeService = $FileTypeService;
    }

    public function save(CreatefileTypeRequest $request)
    {
        try{   
            $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id; 
        $fileType = $this->FileTypeService->save( $request->json()->all(),$user_profile_id);
        }catch(Exception $e) {
            throw $e;
        }
        return $fileType;
    }

    public function update(Request $request)
    {
    	$fileType = $this->FileTypeService->update($request->json()->all());

        return $fileType;
    }

     public function delete(Request $request)
    {
    	$fileType = $this->FileTypeService->delete($request->json()->all());
        return $fileType;
       
    }

     public function deleteAll(Request $request)
    {
        $fileType = $this->FileTypeService->deleteAll();
        return $fileType;       
    }

     public function getAll(){
    	$fileType = $this->FileTypeService->getAll();
        return $fileType;
    }

     public function getById(Request $request){
    	$fileType = $this->FileTypeService->getById($request->json()->all());
        return $fileType;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $fileType = $this->FileTypeService->activate($request->json()->all());
        return $fileType;
       
    }

    public function deActivate(Request $request)
    {
        $fileType = $this->FileTypeService->deActivate($request->json()->all());
        return $fileType;
       
    }


    public function deletefileType(Request $request)
    {
        $fileType = $this->FileTypeService->deletefileType($request->json()->all());
        return $fileType;
       
    }

    public function search(Request $request){
        $fileType = $this->FileTypeService->search($request->get("clnt_type_name"));
        return $fileType;
    }

}    