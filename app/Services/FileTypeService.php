<?php
namespace App\Services;
use App\Repositories\FileTypeRepository;

class fileTypeService{

    private $FileTypeRepository;

    public function __construct(FileTypeRepository $FileTypeRepository) {
         $this->FileTypeRepository = $FileTypeRepository;
     }

    public function save(array $data,$user_profile_id){

        $result = $this->FileTypeRepository->save($data,$user_profile_id);
        return $result;
    }

    public function update(array $data){
        $result = $this->FileTypeRepository->update($data);
        return $result;
    }

    public function delete($data){
         $result = $this->FileTypeRepository->delete($data);
        return $result;
    }

     public function deleteAll(){
         $result = $this->FileTypeRepository->deleteAll();
        return $result;
    }


    public function getAll(){
        return $this->FileTypeRepository->getAll();
   }

    public function getById($data){
        $result = $this->FileTypeRepository->getById($data);
        return $result;
    }

    public function activate($data)
    {
        $result = $this->FileTypeRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->FileTypeRepository->deActivate($data);
        return $result;
       
    }


    public function deletefileType($data)
    {
        $result = $this->FileTypeRepository->deletefileType($data);
        return $result;
       
    }

    public function search($data){
        return $this->FileTypeRepository->search($data);
   }
}

?>