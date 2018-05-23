<?php
namespace App\Http\Controllers;
use App\Requests\CreateInstructionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\InstructionService;
class InstructionController extends Controller
{

	private $instructionService;

    public function __construct(InstructionService $instructionService) {
        $this->instructionService = $instructionService;
    }

    public function save(CreateInstructionRequest $request)
    {

        try{

        $instruction = $this->instructionService->save( $request->json()->all());
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

        return $instruction;
    }

    public function update(Request $request)
    {

    	$instruction = $this->instructionService->update($request->json()->all());
        return $instruction;
    }

     public function delete(Request $request)
    {
    	$instruction = $this->instructionService->delete($request->json()->all());
        return $instruction;
       
    }

     public function deleteAll(Request $request)
    {
        $instruction = $this->instructionService->deleteAll();
        return $instruction;
       
    }

     public function getAll(){
    	$instruction = $this->instructionService->getAll();
        return $instruction;
    }

     public function getById(Request $request){
    	$instruction = $this->instructionService->getById($request->json()->all());
        return $instruction;
    }

    public function getValidationFailMsg(){
    	return "Please verify the values for the fields !!!";
    }

     public function activate(Request $request)
    {
        $instruction = $this->instructionService->activate($request->json()->all());
        return $instruction;
       
    }

    public function deActivate(Request $request)
    {
        $instruction = $this->instructionService->deActivate($request->json()->all());
        return $instruction;
       
    }


    public function deleteInstruction(Request $request)
    {
        $instruction = $this->instructionService->deleteInstruction($request->json()->all());
        return $instruction;
       
    }
    
    public function search(Request $request){
        $instruction = $this->instructionService->search($request->get("search_text"));
        return $instruction;
    }

}    