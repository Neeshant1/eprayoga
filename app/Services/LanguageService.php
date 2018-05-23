<?php
namespace App\Services;
use App\Repositories\LanguageRepository;

class LanguageService{

    private $languageRepository;

    public function __construct(LanguageRepository $languageRepository) {
         $this->languageRepository = $languageRepository;
     }

    public function save(array $data,$user_id,$user_profile_id){

        $result = $this->languageRepository->save($data,$user_id,$user_profile_id);
        return $result;
    }

    public function update(array $data,$user_id,$user_profile_id){
        $result = $this->languageRepository->update($data,$user_id,$user_profile_id);
        return $result;
    }

    public function delete($data){
         $result = $this->languageRepository->delete($data);
        return $result;
    }

    public function deleteAll($user_id,$user_type){
         $result = $this->languageRepository->deleteAll($user_id,$user_type);
        return $result;
    }


    public function getAll($user_id,$user_type){
        return $this->languageRepository->getAll($user_id,$user_type);
   }

    public function getById($data){
        $result = $this->languageRepository->getById($data);
        return $result;
    }

         public function activate($data){
         $result = $this->languageRepository->activate($data);
        return $result;
    }

    public function deActivate($data){
         $result = $this->languageRepository->deActivate($data);
        return $result;
    }

    public function deleteLanguage($data){
         $result = $this->languageRepository->deleteLanguage($data);
        return $result;
    }

    public function search($data,$user_id){
        return $this->languageRepository->search($data,$user_id);
   }

    public function selectLanguage(){
        return $this->languageRepository->selectLanguage();
   }

    
}

?>