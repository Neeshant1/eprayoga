<?php
namespace App\Http\Controllers;
use App\Requests\CreateFaqRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FaqService;

class FaqController extends Controller
{

	private $faqService;

    public function __construct(FaqService $faqService) {
        $this->faqService = $faqService;
    }

    public function save(CreateFaqRequest $request)
    {

        try{
          $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $faq = $this->faqService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

       return $faq;
    }

    public function update(Request $request)
    {

        $faq = $request->faq_id;
         $this->validate($request, [
        'question' => 'required|unique:bl_faq,question,'.$faq .',faq_id,is_deleted,0' 
                    ]);
    	$faq = $this->faqService->update($request->json()->all());

        return $faq;

    }

     public function delete(Request $request)
    {
    	$faq = $this->faqService->delete($request->json()->all());
        return $faq;
       
    }

    public function deleteAll(Request $request)
    {
        $value = $request->session()->get('user');
        $user_id = $value ->user_profile_id;
        $faq = $this->faqService->deleteAll($user_id);
        return $faq;
       
    }

     public function getAll(){
    	$faq = $this->faqService->getAll();
        return $faq;
    }

     public function getById(Request $request){
    	$faq = $this->faqService->getById($request->json()->all());
        return $faq;
       
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $faq = $this->faqService->activate($request->json()->all());
        return $faq;
       
    }

    public function deActivate(Request $request)
    {
        $faq = $this->faqService->deActivate($request->json()->all());
        return $faq;
       
    }


    public function deleteFaq(Request $request)
    {
        $faq = $this->faqService->deleteFaq($request->json()->all());
        return $faq;
       
    }

    public function search(Request $request){
        $faq = $this->faqService->search($request->get("search_text"));
        return $faq;
    }

}    