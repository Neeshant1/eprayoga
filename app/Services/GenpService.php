<?php

namespace App\Services;

use App\Repositories\GenpRepository;

class GenpService
{
    //private $auth;

    //private $dispatcher;

    private $genpRepository;

    //private $userValidator;

    public function __construct( GenpRepository $genpRepository) {
         $this->genpRepository = $genpRepository;
     }

    public function save(array $data,$user_profile_id){

        $genp = $this->genpRepository->save($data,$user_profile_id);
        return $genp;
    }

    public function update(array $data)
    {
        $genp = $this->genpRepository->update($data);

        return $genp;
    }

    public function delete(array $data){
         return $this->genpRepository->delete($data);
    }

     public function deleteAll($user_id){
         return $this->genpRepository->deleteAll($user_id);
    }


    public function getAll(){
        return $this->genpRepository->getAll();
    }

    public function getById($data){
        return $this->genpRepository->getById($data);
    }

     public function activate($data)
    {
        $result = $this->genpRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->genpRepository->deActivate($data);
        return $result;
       
    }


    public function deleteGenp($data)
    {
        $result = $this->genpRepository->deleteGenp($data);
        return $result;
       
    }

    public function search($data){
        return $this->genpRepository->search($data);
   }

}

