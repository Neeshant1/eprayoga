<?php
namespace App\Services;
use App\Repositories\PromoRepository;

class PromoService{

    private $promoRepository;

    public function __construct(PromoRepository $promoRepository) {
         $this->promoRepository = $promoRepository;
     }

    public function save(array $data, $user_profile_id){

        $result = $this->promoRepository->save($data, $user_profile_id);
        return $result;
    }

}

?>