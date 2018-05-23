<?php
namespace App\Repositories;
use App\Models\Instruction;
use Illuminate\Support\Facades\DB;
use App\Util\BLAlphaNumericCodeGenerator;
use App\Response\GlobalResponse;
use Log;

class InstructionRepository
{
  private static  $RECORDS_PER_PAGE =2;

     public function __construct() {
        self::$RECORDS_PER_PAGE = config('blconstants.RECORDS_PER_PAGE');
    }

    public function save(array $data)
    {
         try {

           // $instructions = Instruction ::where ('inst_type',$data['inst_type'])
           //               ->where ('inst_description',$data['inst_description'])
           //               ->first();
           //  if(! empty($instructions )){
           //      return ['status' => 'exist' ];
           //  }
  
  $data['inst_type_code'] = BLAlphaNumericCodeGenerator::getCode(config('blconstants.instruction_code'));
            $instruction = new  Instruction;
            $instruction->fill($data);
            $instruction->save();
        } catch(Exception $e) {

            return GlobalResponse::clientErrorResponse("error");
        }
        return GlobalResponse::createResponse($instruction);
    }

    public function update(array $data){
        try{
          
            $instruction = Instruction::where ("instruction_id",$data['instruction_id'])->first(); 

            if (is_null($instruction)){
                return "failed";
            }

            $instruction->fill($data);
            $instruction->save();

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($instruction);
    }

    public function delete(array $data){
        try{
              $instruction = Instruction::where ("instruction_id",$data['instruction_id'])->first(); 
            if (is_null($instruction)){
                return "failed";
            }
            $instruction->delete();
        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($instruction);
    }

     public function deleteAll(){
        try{
              $instruction = Instruction::where('is_deleted', '=', 0)->update(['is_deleted' => 1]);
            
        }catch(Exception $e){
            return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($instruction);
    }

    public function getAll(){
        try{
           // $instruction = Instruction::all();
             $instruction = DB::table("bl_instruction as is")->where('is.is_deleted',0)->simplePaginate(self::$RECORDS_PER_PAGE);

            if (is_null($instruction))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($instruction);

    }

    public function getById(array $data){
        try{
            $instruction = Instruction::find($data['instruction_id']);
            if (is_null($instruction)){
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

       return GlobalResponse::createResponse($instruction);
    }

     public function activate(array $data){
       try{

           $instruction = Instruction::where ("instruction_id",$data['instruction_id'])->first();
           $instruction->is_active = 1;
           $instruction->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($instruction);
   }

    public function deActivate(array $data){
      try{

           $instruction = Instruction::where ("instruction_id",$data['instruction_id'])->first();
           $instruction->is_active = 0;
           $instruction->save();
       }catch(Exception $e){
          return GlobalResponse::clientErrorResponse("error");
       }
      return GlobalResponse::createResponse($instruction);
   }

    public function deleteInstruction(array $data){
      try{

           $instruction = Instruction::where ("instruction_id",$data['instruction_id'])->first();
           $instruction->is_deleted = 1;
           $instruction->save();
       }catch(Exception $e){
         return GlobalResponse::clientErrorResponse("error");
       }
       return GlobalResponse::createResponse($instruction);
   }

   public function search($data){
        try{

                $sql = "is_active = 1 and is_deleted = 0 and ( inst_description like '%".$data."%' or inst_type like '%".$data."%' )";
   
            $instruction = Instruction::whereRaw($sql)->simplePaginate(self::$RECORDS_PER_PAGE);
            if (is_null($instruction))
            {
                return "failed";
            }

        }catch(Exception $e){
           return GlobalResponse::clientErrorResponse("error");
        }

        return GlobalResponse::createResponse($instruction);
    }

} ?>

