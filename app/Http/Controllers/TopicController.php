<?php
namespace App\Http\Controllers;
use App\Requests\CreateTopicRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TopicService;
use Illuminate\Support\Facades\DB;
use Log;
class TopicController extends Controller
{

	private $topicService;

    public function __construct(TopicService $topicService) {
        $this->topicService = $topicService;
    }

    public function save(CreateTopicRequest $request)
    {

        try{
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        // $request->session()->put('$users', 'hallo');

    
        // //$request->session()->get('$users');

        $topic = $this->topicService->save( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $topic;

        //return response()->json($userType, 201);
    	
        //return $request->session()->get('$users');

    	//$addressType = $this->addressTypeService->save($request->json()->get('address_type'));
        //return response()->json($addressType, 201);
    }

    public function update(Request $request)
    {

       
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
    	

        $topic_name = $request->topic_name;
        $category_id = $request->category_id;
        $subject_id = $request->subject_id;
        $topic_id = $request->topic_id;

        $tmp = json_encode($topic_name,true);
        
        $catid = DB::select("select subject_id,topic_name,clnt_id,category_id,topic_id from bl_topic where clnt_id = ".$user_id." and topic_name = ".$tmp." and category_id = ".$category_id." and topic_id = ".$topic_id." and subject_id = ".$subject_id."");


        if(count($catid) <= 0){
            $this->validate($request, [        
            'topic_name' => 'required|unique:bl_topic,topic_name,NULL,'.$topic_name .',clnt_id,'.$user_id.',clnt_id,'.$user_id.',category_id,'.$category_id.',subject_id,'.$subject_id.',is_deleted,0' 
                    ]);

        }

            $topic = $this->topicService->update($request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);

            return $topic;

        //return response()->json($userType, 201);
       // return $request->json()->get('address_type');
        //return $request->json()->get('user_type_id');
    }

     public function delete(Request $request)
    {
    	$topic = $this->topicService->delete($request->json()->all());
        return response()->json($topic, 201);
       
    }

    public function deleteAll(Request $request)
    {
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        $topic = $this->topicService->deleteAll($user_id,$user_type);
        return response()->json($topic, 201);
       
    }

     public function getAll(Request $request){

        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $clnt_group_id = $value ->clnt_group_id;
        $user_type = $value ->user_type;
        $user_id = $value ->user_id;
        
    	$topic = $this->topicService->getAll($user_id,$user_type);
        return response()->json($topic, 201);
    }

     public function getById(Request $request){
       
    	$topic = $this->topicService->getById($request->json()->all());
        return response()->json($topic, 201);
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $topic = $this->topicService->activate($request->json()->all());
        return response()->json($topic, 201);
       
    }

    public function deActivate(Request $request)
    {
        $topic = $this->topicService->deActivate($request->json()->all());
        return response()->json($topic, 201);
       
    }


    public function deleteTopic(Request $request)
    {
        $topic = $this->topicService->deleteTopic($request->json()->all());
        return response()->json($topic, 201);
       
    }

    public function search(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $topic = $this->topicService->search($request->get("search_text"),$user_id);
        return response()->json($topic, 201);
    }

     public function getTopicBySubjectId(Request $request){

        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;

        $topic = $this->topicService->getTopicBySubjectId($request->json()->all(),$user_id);
        return response()->json($topic, 201);
    }
    public function getcoll(Request $request)
    {
        $topic = $this->topicService->getcoll($request->json()->all());
        return response()->json($topic, 201);
       
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

        $topic = $this->topicService->getListclient($request->query());
        return response()->json($topic, 201);
    }
 

}    