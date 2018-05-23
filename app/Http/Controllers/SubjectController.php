<?php
namespace App\Http\Controllers;
use App\Requests\CreateSubjectRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SubjectService;
use Illuminate\Support\Facades\DB;
use Log;
class SubjectController extends Controller
{

	private $subjectService;

    public function __construct(SubjectService $subjectService) {
        $this->subjectService = $subjectService;
    }

    public function save(CreateSubjectRequest $request)
    {

        try{
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        // $request->session()->put('$users', 'hallo');

    
        // //$request->session()->get('$users');

        $subject = $this->subjectService->save( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $subject;

    }

    public function update(Request $request)
    {
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id; 

        $subject_name = $request->subject_name;
        $subject_id = $request->subject_id;
        $category_id = $request->category_id;

        $tmp = json_encode($subject_name,true);
        
        $catid = DB::select("select subject_id,subject_name,clnt_id,category_id from bl_subject where clnt_id = ".$user_id." and subject_name = ".$tmp." and category_id = ".$category_id." and subject_id = ".$subject_id."");
        
        Log::info(count($catid));

            if(count($catid) <= 0){
                 $this->validate($request, [        
                'subject_name' => 'required|unique:bl_subject,subject_name,NULL,'.$subject_name .',clnt_id,'.$user_id.',category_id,'.$category_id.',is_deleted,0' 
                    ]);

            }

            $subject = $this->subjectService->update($request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);

                return $subject;         

    }

     public function delete(Request $request)
    {
    	$subject = $this->subjectService->delete($request->json()->all());
        return $subject;
       
    }

    public function deleteAll(Request $request)
    {    $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
         $user_type = $value ->user_type;
        $subject = $this->subjectService->deleteAll($user_id,$user_type);
        return $subject;
       
    }

     public function getAll(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

         $clnt_group_id = $value ->clnt_group_id;
        $user_type = $value ->user_type;
        $user_id = $value ->user_id;
        
    	$subject = $this->subjectService->getAll($user_id,$user_type);
        return $subject;
    }

     public function getById(Request $request){
        
    	$subject = $this->subjectService->getById($request->json()->all());
        return $subject;
       // return $request->json()->get('address_type');
    }

     public function getSubjecyByCategoryId(Request $request){
         $value = $request->session()->get('user');
         $user_profile_id = $value ->user_profile_id;
         $clnt_group_id = $value ->clnt_group_id;
         $user_id = $value ->user_id;

    $subject = $this->subjectService->getSubjecyByCategoryId($request->json()->all(),$user_id);
    return $subject;
       
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }
     public function activate(Request $request)
    {
        $subject = $this->subjectService->activate($request->json()->all());
        return $subject;
       
    }

    public function deActivate(Request $request)
    {
        $subject = $this->subjectService->deActivate($request->json()->all());
        return $subject;
       
    }


    public function deleteSubject(Request $request)
    {
        $subject = $this->subjectService->deleteSubject($request->json()->all());
        return $subject;
       
    }

    public function search(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $subject = $this->subjectService->search($request->get("search_text"),$user_id);
        return $subject;
    }
    public function getcol(Request $request)
    {

        $subject = $this->subjectService->getcol($request->json()->all());
        return $subject;
       
    }
    
    public function getSubjecyByCategoryIdCust(Request $request){

    $subject = $this->subjectService->getSubjecyByCategoryIdCust($request->json()->all());
    return $subject;
       
    }

    public function getListclient(Request $request){
       // echo json_encode($request);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        //dd($request);
       //dd($request->query('client_id'));

        $subject = $this->subjectService->getListclient($request->query());
        return $subject;
    }



}    