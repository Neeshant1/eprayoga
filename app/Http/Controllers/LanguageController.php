<?php
namespace App\Http\Controllers;
use App\Requests\CreateLanguageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LanguageService;
use Illuminate\Support\Facades\DB;
class LanguageController extends Controller
{

	private $languageService;

    public function __construct(LanguageService $languageService) {
        $this->languageService = $languageService;
    }

    public function save(CreateLanguageRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;       
        $user_id = $value ->user_id;
        $language = $this->languageService->save( $request->json()->all(),$user_id,$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

       return $language;
    }

    public function update(Request $request)
    {

        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $user_id = $value ->user_id;

        $language = $request->language;
        $language_short_name = $request->language_short_name;
        $language_id = $request->language_id;

        $tmp = json_encode($language,true);
        $tmp1 = json_encode($language_short_name,true);
        
        $catid = DB::select("select language_id,language,language_short_name,clnt_id from bl_language_master where clnt_id = ".$user_id. " and language = ".$tmp. " and language_id = ".$language_id."");

        $catid1 = DB::select("select language_id,language,language_short_name,clnt_id from bl_language_master where clnt_id = ".$user_id. " and language_short_name = ".$tmp1. " and language_id = ".$language_id."");
        
            if(count($catid) <= 0){
                 $this->validate($request, [        
                'language' => 'required|unique:bl_language_master,language,NULL,'.$language .',clnt_id,'.$user_id.',is_deleted,0' 
                    ]);

            }
             if(count($catid1) <= 0){
                 $this->validate($request, [        
                'language_short_name' => 'required|unique:bl_language_master,language_short_name,NULL,'.$language_short_name .',clnt_id,'.$user_id.',is_deleted,0' 
                    ]);

            }
        
    	$language = $this->languageService->update($request->json()->all(),$user_id,$user_profile_id);

        return $language;
    }

     public function delete(Request $request)
    {
    	$language = $this->languageService->delete($request->json()->all());
        return  $language;
       
    }

     public function deleteAll(Request $request)
    {
         $value = $request->session()->get('user');
         $user_id = $value ->user_profile_id;
         $user_id = $value ->user_id;
        $user_type = $value ->user_type;
         $language = $this->languageService->deleteAll($user_id,$user_type);
         return  $language;
       
    }


     public function getAll(Request $request){
        $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_id = $value ->user_profile_id;
        $user_id = $value ->user_id;
    	$language = $this->languageService->getAll( $user_id,$user_type);
        return  $language;
    }

     public function getById(Request $request){
    	$language = $this->languageService->getById($request->json()->all());
        return  $language;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $language = $this->languageService->activate($request->json()->all());
        return  $language;
       
    }

    public function deActivate(Request $request)
    {
        $language = $this->languageService->deActivate($request->json()->all());
        return  $language;
       
    }


    public function deleteLanguage(Request $request)
    {
        $language = $this->languageService->deleteLanguage($request->json()->all());
         return  $language;
       
    }

    public function search(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $language = $this->languageService->search($request->get("search_text"));
         return  $language;
    }

    public function selectLanguage(){
        $language = $this->languageService->selectLanguage();
         return  $language;
    }
    
   

}    