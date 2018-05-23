<?php
namespace App\Services;
use App\Repositories\InstructionRepository;

class InstructionService{

    private $instructionRepository;

    public function __construct(InstructionRepository $instructionRepository) {
         $this->instructionRepository = $instructionRepository;
     }

    public function save(array $data){

        $result = $this->instructionRepository->save($data);
        return $result;
    }

    public function update(array $data){
        $result = $this->instructionRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->instructionRepository->delete($data);
        return $result;
    }

     public function deleteAll(){
         $result = $this->instructionRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->instructionRepository->getAll();
   }

    public function getById($data){
        $result = $this->instructionRepository->getById($data);
        return $result;
    }

    public function activate($data){
         $result = $this->instructionRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->instructionRepository->deActivate($data);
        return $result;
    }

    public function deleteInstruction($data){
         $result = $this->instructionRepository->deleteInstruction($data);
        return $result;
    }

    public function search($data){
        return $this->instructionRepository->search($data);
   }
}

?>