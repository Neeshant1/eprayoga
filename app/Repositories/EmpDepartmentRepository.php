<?php
namespace App\Repositories;
use App\Models\EmpDepartment;
use App\Util\BLAlphaNumericCodeGenerator;
use Illuminate\Support\Facades\DB;
use Log;
use App\Response\GlobalResponse;
class EmpDepartmentRepository
{

  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data,$user_profile_id,$user_id,$clnt_group_id)
    {
         try {
  
            $emp_department = new  EmpDepartment;
            $data['emp_dept_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.department_code'));
            $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $user_id;
            $data['last_update_user_id'] = $user_profile_id;
            $data['created_by_user_id'] = $user_profile_id;
            $emp_department->fill($data);
            $emp_department->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($emp_department);
    }

    public function update(array $data,$user_id,$clnt_group_id,$user_profile_id){
        try{
            $data['clnt_group_id'] = $clnt_group_id;
            $data['clnt_id'] = $user_id;
            $data['last_update_user_id'] = $user_profile_id;           
            $emp_department = EmpDepartment::where ("emp_dept_id",$data['emp_dept_id'])->first(); 

            if (is_null($emp_department)){
                return "failed";
            }

            $emp_department->fill($data);
            $emp_department->save();

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($emp_department);
    }

    public function delete(array $data){
        try{
              $emp_department = EmpDepartment::where ("emp_dept_id",$data['emp_dept_id'])->first(); 
            if (is_null($emp_department)){
                return "failed";
            }
            $emp_department->delete();
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($emp_department);
    }

   public function deleteAll($user_id,$user_type){
         try{

             if($user_type == 'S'){
                $msg = EmpDepartment::where('is_deleted', '=', 0)
                                    ->update(['is_deleted' => 1]);
          }else{
               $msg = EmpDepartment::where([["clnt_id",'=',$user_id],['is_deleted', '=', 0]])
                                    ->update(['is_deleted' => 1]);
          }
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($msg);
    }


    public function getAll($user_id,$user_type){
        try{

          if($user_type == 'S'){
                $emp_department = EmpDepartment::all();
                $emp_department = DB::table("bl_emp_department_master as d")
                               ->where('is_deleted',0)->select('d.*')->simplePaginate(self::$RECORDS_PER_PAGE);
              }else{
                $emp_department = EmpDepartment::all();
                $emp_department = DB::table("bl_emp_department_master as d")
                               ->where("clnt_id","=",$user_id)
                               ->where('is_deleted',0)->select('d.*')->simplePaginate(self::$RECORDS_PER_PAGE);
              }
            

            if (is_null($emp_department))
            {
                return "failed";
            }

        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($emp_department);

    }

    public function getById(array $data){
        try{
            $emp_department = EmpDepartment::find($data['emp_dept_id']);
            if (is_null($emp_department)){
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($emp_department);
    }

     public function activate(array $data){
       try{

           $emp_department = EmpDepartment::where ("emp_dept_id",$data['emp_dept_id'])->first();
           $emp_department->is_active = 1;
           $emp_department->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($emp_department);
   }

    public function deActivate(array $data){
      try{

           $emp_department = EmpDepartment::where ("emp_dept_id",$data['emp_dept_id'])->first();
           $emp_department->is_active = 0;
           $emp_department->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($emp_department);
   }

    public function deleteDepartment(array $data){
      try{

           $emp_department = EmpDepartment::where ("emp_dept_id",$data['emp_dept_id'])->first();
           $emp_department->is_deleted = 1;
           $emp_department->save();
       }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($emp_department);
   }

   public function search($data,$user_id){
        try{

            //$sql = "is_active = 1 and is_deleted = 0";                   
            //if( is_numeric($data))
            //if( is_float($data) || is_numeric($data))
            //{
        $sql = "is_active = 1 and is_deleted = 0 and ( emp_dept_name like '%".$data."%') and clnt_id='".$user_id."'";
            //}
           
            $emp_department = EmpDepartment::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($emp_department))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($emp_department);

    }

    public function selectDept(){
        try{
           $emp_department = DB::table('bl_emp_department_master as dept')
           ->where([['dept.is_active',1],['dept.is_deleted',0],])
           ->select('dept.*')
           ->get();

            if (is_null($emp_department))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($emp_department);

    }


} ?>

