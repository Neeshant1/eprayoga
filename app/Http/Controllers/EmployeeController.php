<?php
namespace App\Http\Controllers;
use App\Requests\CreateEmployeeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Log;
class EmployeeController extends Controller
{

	private $employeeService;

    public function __construct(EmployeeService $employeeService) {
        $this->employeeService = $employeeService;
    }

    public function save(CreateEmployeeRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;

        $employee = $this->employeeService->save( $request->json()->all(),$value,$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $employee;

    }

    public function update(Request $request)
    {
        $employee = $request->emp_employee_id;
        $this->validate($request, [
       'emp_pan' => 'required|unique:bl_employee,emp_pan,' .$employee .',emp_employee_id,is_deleted,0'
                   ]);
        $this->validate($request, [
       'emp_off_email_id' => 'required|unique:bl_employee,emp_off_email_id,' .$employee .',emp_employee_id,is_deleted,0'
                   ]);
    	$employee = $this->employeeService->update($request->json()->all());

        return $employee;

    }

     public function delete(Request $request)
    {
    	$employee = $this->employeeService->delete($request->json()->all());
        return $employee;
       
    }

     public function getAll(Request $request){

         $value = $request->session()->get('user');
         $user_id = $value ->user_id;
         $user_type = $value ->user_type;

    	$employee = $this->employeeService->getAll($user_id,$user_type);
        return $employee;
    }

     public function getEmployee(Request $request){

         $value = $request->session()->get('user');
         $user_id = $value ->user_id;
         $user_type = $value ->user_type;

        $employee = $this->employeeService->getEmployee($user_id,$user_type);
        return $employee;
    }

     public function getById(Request $request){
    	$employee = $this->employeeService->getById($request->json()->all());
        return $employee;
      
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

    public function activate(Request $request)
    {
        $result = $this->employeeService->activate($request->json()->all());
        return $result;
       
    }

    public function deActivate(Request $request)
    {
        
        $result = $this->employeeService->deActivate($request->json()->all());
        return $result;
       
    }

    public function deleteEmployee(Request $request)
    {
        $result = $this->employeeService->deleteEmployee($request->json()->all());
        return $result;
       
    }

    public function search(Request $request){
        $result = $this->employeeService->search($request->get("search_text"));
        return $result;
    }

    public function deleteAll(Request $request) {
        $result = $this->employeeService->deleteAll();
        return $result;
       
   }

    public function searchEmp(Request $request){

         $value = $request->session()->get('user');
         $user_id = $value ->user_id;
         $user_type = $value ->user_type;
        $data['employee_no'] = $request->get("employee_no");
        $data['band'] = $request->get("band");
        $data['emp_department'] = $request->get("department");
        $data['location'] = $request->get("location");
        $result = $this->employeeService->searchEmp($data,$user_type,$user_id);
        return $result;
    }

}    