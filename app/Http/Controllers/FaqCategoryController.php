<?php
namespace App\Http\Controllers;
use App\Requests\FaqCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FaqCategoryService;
class FaqCategoryController extends Controller
{

	private $faqCategoryService;

    public function __construct(FaqCategoryService $faqCategoryService) {
        $this->faqCategoryService = $faqCategoryService;
    }

    public function save(FaqCategoryRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $faqcategory = $this->faqCategoryService->save( $request->json()->all(),$user_profile_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $faqcategory;
    }

    public function update(Request $request)
    {

        $faqcategory = $request->faq_category_id;
         $this->validate($request, [
        'faq_category_name' => 'required|unique:bl_faq_category,faq_category_name,'.$faqcategory .',faq_category_id,is_deleted,0' 
                    ]);
    	$faqcategory = $this->faqCategoryService->update($request->json()->all());

        return $faqcategory;
    }

     public function delete(Request $request)
    {
    	$faqcategory = $this->faqCategoryService->delete($request->json()->all());
        return $faqcategory;
       
    }

    public function deleteAll(Request $request)
    {
        $value = $request->session()->get('user');
        $user_id = $value ->user_profile_id;
        $faqcategory = $this->faqCategoryService->deleteAll($user_id);
        return $faqcategory;
       
    }

     public function getAll(){
    	$faqcategory = $this->faqCategoryService->getAll();
        return $faqcategory;
    }

     public function getById(Request $request){
    	$faqcategory = $this->faqCategoryService->getById($request->json()->all());
        return $faqcategory;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

        public function activate(Request $request)
    {
        $faqcategory = $this->faqCategoryService->activate($request->json()->all());
        return $faqcategory;
       
    }

    public function deActivate(Request $request)
    {
        $faqcategory = $this->faqCategoryService->deActivate($request->json()->all());
        return $faqcategory;
       
    }


    public function deleteFaqCategory(Request $request)
    {
        $faqcategory = $this->faqCategoryService->deleteFaqCategory($request->json()->all());
        return $faqcategory;
       
    }

    public function selectFaqCategory(){
        $faqcategory = $this->faqCategoryService->selectFaqCategory();
        return $faqcategory;
    }
    public function search(Request $request){
        $faqcategory = $this->faqCategoryService->search($request->get("faq_category_name"));
        return $faqcategory;
    }


}    