<?php

namespace App\Services;

use App\Repositories\AddressTypeRepository;

class AddressTypeService
{
    //private $auth;

    //private $dispatcher;

    private $addressTypeRepository;

    //private $userValidator;

    public function __construct(
    //     Authentication $auth,
    //     Dispatcher $dispatcher,
         AddressTypeRepository $addressTypeRepository
    //     UserValidator $userValidator
    ) {
    //     $this->auth = $auth;
    //     $this->dispatcher = $dispatcher;
         $this->addressTypeRepository = $addressTypeRepository;
    //     $this->userValidator = $userValidator;
     }

    public function save(array $data,$user_profile_id){
        
        $addressType = $this->addressTypeRepository->save($data,$user_profile_id);
        return $addressType;
    }

    public function update(array $data,$user_profile_id)
    {
      //  $account = $this->auth->getCurrentUser();

        // Check if the user has permission to create other users.
        // Will throw an exception if not.
       // $account->checkPermission('users.create');

        // Use our validation helper to check if the given email
        // is unique within the account.

        // if (!$this->userValidator->isEmailUniqueWithinAccount($data['email'], $account->id)) {
        //     throw new EmailIsNotUniqueException($data['email']);
        // }

        // Set the account ID on the user and create the record in the database
        //$data['account_id'] = $account->id

        $addressType = $this->addressTypeRepository->update($data,$user_profile_id);

        // If we set the relation right away on the user model, then we can
        // call $user->account without quering the database. This is useful if
        // we need to call $user->account in any of the event listeners
        //$user->setRelation('account', $account);

        // Fire an event so that listeners can react
        //$this->dispatcher->fire(new UserWasCreated($user));

        return $addressType;
    }

    public function delete(array $data){
         return $this->addressTypeRepository->delete($data);
    }

     public function deleteAll($user_id){
         return $this->addressTypeRepository->deleteAll($user_id);
    }


    public function getAll(){
        return $this->addressTypeRepository->getAll();
    }

    public function getById($data){
        return $this->addressTypeRepository->getById($data);
    }

     public function activate($data)
    {
        $result = $this->addressTypeRepository->activate($data);
        return $result;
       
    }

    public function deActivate($data)
    {
        $result = $this->addressTypeRepository->deActivate($data);
        return $result;
       
    }


    public function deleteAddressType($data)
    {
        $result = $this->addressTypeRepository->deleteAddressType($data);
        return $result;
       
    }

    public function search($data){
        return $this->addressTypeRepository->search($data);
   }

   public function selectAddressType(){
        return $this->addressTypeRepository->selectAddressType();
    }
}

