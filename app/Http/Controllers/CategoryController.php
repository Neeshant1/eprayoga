<?php
namespace App\Http\Controllers;
use App\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;
use Log;
class CategoryController extends Controller
{

	private $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function save(CreateCategoryRequest $request)
    {

        try{
          
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $category = $this->categoryService->save( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $category;
    }

    public function update(Request $request)
    {


        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;

        $category_name = $request->category_name;
        $category_id = $request->category_id;

        $tmp = json_encode($category_name,true);
        
        $catid = DB::select("select category_id,category_name,clnt_id from bl_category where clnt_id = ".$user_id. " and category_name = ".$tmp. " and category_id = ".$category_id."");
        
            if(count($catid) <= 0){
                 $this->validate($request, [        
                'category_name' => 'required|unique:bl_category,category_name,NULL,'.$category_name .',clnt_id,'.$user_id.',is_deleted,0' 
                    ]);

            }

         $category = $this->categoryService->update($request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);

         return $category;
    }

     public function delete(Request $request)
    {   
    	$category = $this->categoryService->delete($request->json()->all());
        return $category;
       
    }

    public function deleteAll(Request $request)
    {   $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        $category = $this->categoryService->deleteAll($user_id,$user_type);
        return $category;
       
    }

     public function getAll(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_type = $value ->user_type;
        $user_id = $value ->user_id;
        
    	$category = $this->categoryService->getAll($user_id,$user_type);
        return $category;
    }

    public function getList(Request $request){

        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;

        $category = $this->categoryService->getList($user_id,$user_type);
        return $category;
    }
     public function getListclient(Request $request){
       // echo json_encode($request);
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $user_type = $value ->user_type;
        $category = $this->categoryService->getListclient($request->query());
        return $category;
    }

     public function getById(Request $request){
       
    	$category = $this->categoryService->getById($request->json()->all());
        return $category;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $category = $this->categoryService->activate($request->json()->all());
        return $category;
       
    }

    public function deActivate(Request $request)
    {
        $category = $this->categoryService->deActivate($request->json()->all());
        return $category;
       
    }

    public function deleteCategory(Request $request)
    {
        $category = $this->categoryService->deleteCategory($request->json()->all());
        return $category;
       
    }
    public function search(Request $request){
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $category = $this->categoryService->search($request->get("category_name"),$user_id);
        return $category;
    }

    
    public function getListCust(Request $request){

        $category = $this->categoryService->getListCust();
        return $category;
    }

}    