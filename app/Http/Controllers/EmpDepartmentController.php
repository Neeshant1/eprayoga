<?php
namespace App\Http\Controllers;
use App\Requests\CreateEmpDepartmentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmpDepartmentService;
use Illuminate\Support\Facades\DB;
class EmpDepartmentController extends Controller
{

	private $empDepartmentService;

    public function __construct(EmpDepartmentService $empDepartmentService) {
        $this->empDepartmentService = $empDepartmentService;
    }

    public function save(CreateEmpDepartmentRequest $request)
    {

        try{
         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $empDepartment = $this->empDepartmentService->save( $request->json()->all(),$user_profile_id,$user_id,$clnt_group_id);

        }catch(Exception $e) {
            throw $e;
        }

        return $empDepartment;
    }

    public function update(Request $request)
    {
        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;

        $empDepartment = $request->emp_dept_id;
        $empDepartmentname = $request->emp_dept_name;

        $tmp = json_encode($empDepartmentname,true);
        
        $depid = DB::select("select emp_dept_id,emp_dept_name,clnt_id from bl_emp_department_master where clnt_id = ".$user_id. " and emp_dept_name = ".$tmp. " and emp_dept_id = ".$empDepartment."");
        
            if(count($depid) <= 0){
                 $this->validate($request, [        
                'emp_dept_name' => 'required|unique:bl_emp_department_master,emp_dept_name,NULL,'.$empDepartmentname .',clnt_id,'.$user_id.',is_deleted,0' 
                    ]);

            }
         
    	$empDepartment = $this->empDepartmentService->update($request->json()->all(),$user_id,$user_profile_id,$clnt_group_id);

        return $empDepartment;

    }

     public function delete(Request $request)
    {
    	$empDepartment = $this->empDepartmentService->delete($request->json()->all());
        return $empDepartment;
       
    }

     public function deleteAll(Request $request)
    {
         $value = $request->session()->get('user');
        $user_type = $value->user_type;
        $user_profile_id = $value ->user_profile_id;
        $user_id = $value ->user_id; 
        $empDepartment = $this->empDepartmentService->deleteAll($user_id,$user_type);
        return $empDepartment;
       
    }

     public function getAll(Request $request){

         $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $user_type = $value ->user_type;      
         $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
    	$empDepartment = $this->empDepartmentService->getAll($user_id,$user_type);
        return $empDepartment;
    }

     public function getById(Request $request){
    	$empDepartment = $this->empDepartmentService->getById($request->json()->all());
        return $empDepartment;
       // return $request->json()->get('address_type');
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $empDepartment = $this->empDepartmentService->activate($request->json()->all());
        return $empDepartment;
       
    }

    public function deActivate(Request $request)
    {
        $empDepartment = $this->empDepartmentService->deActivate($request->json()->all());
        return $empDepartment;
       
    }


    public function deleteDepartment(Request $request)
    {
        $empDepartment = $this->empDepartmentService->deleteDepartment($request->json()->all());
        return $empDepartment;
       
    }
    
    public function search(Request $request){

        $value = $request->session()->get('user');
        $user_profile_id = $value ->user_profile_id;
        $clnt_group_id = $value ->clnt_group_id;
        $user_id = $value ->user_id;
        $emp_dept_name = $this->empDepartmentService->search($request->get("emp_dept_name"),$user_id);
        return $emp_dept_name;
    }

    public function selectDept(){
        $emp_dept_name = $this->empDepartmentService->selectDept();
        return $emp_dept_name;
    }

}    