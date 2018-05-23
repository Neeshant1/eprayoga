<?php
namespace App\Http\Controllers;
use App\Requests\CreateEmailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmailService;
class EmailController extends Controller
{

	private $emailService;

    public function __construct(EmailService $emailService) {
        $this->emailService = $emailService;
    }

    public function save(CreateEmailRequest $request)
    {

        try{
       
        // $request->session()->put('$users', 'hallo');

    
        // //$request->session()->get('$users');

        $email = $this->emailService->save( $request->json()->all());


        }catch(Exception $e) {
            throw $e;
        }

        return $email;

    }

    public function update(Request $request)
    {

         $email = $request->email_config_id;
         $this->validate($request, [
        'email' => 'required|unique:bl_email_config,email,'.$email .',email_config_id,is_deleted,0' 
                    ]);
    	$email = $this->emailService->update($request->json()->all());

        return $email;

        //return response()->json($userType, 201);
       // return $request->json()->get('address_type');
        //return $request->json()->get('user_type_id');
    }

     public function delete(Request $request)
    {
    	$email = $this->emailService->delete($request->json()->all());
        return $email;;
       
    }

    public function deleteAll(Request $request)
    {
        $email = $this->emailService->deleteAll();
        return $email;
       
    }

     public function getAll(){
    	$email = $this->emailService->getAll();
        return $email;;
    }

     public function getById(Request $request){
    	$email = $this->emailService->getById($request->json()->all());
        return $email;;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

        public function activate(Request $request)
    {
        $email = $this->emailService->activate($request->json()->all());
        return $email;;
       
    }

    public function deActivate(Request $request)
    {
        $email = $this->emailService->deActivate($request->json()->all());
        return $email;;
       
    }


    public function deleteEmail(Request $request)
    {
        $email = $this->emailService->deleteEmail($request->json()->all());
        return $email;;
       
    }

     public function search(Request $request){
        $email = $this->emailService->search($request->get("search_text"));
        return $email;;
    }

}    