<?php
namespace App\Http\Controllers;
//use App\Requests\CreateFaqRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PromoService;

class PromoController extends Controller
{

    private $promoService;

    public function __construct(PromoService $promoService) {
        $this->promoService = $promoService;
    }

    public function save(Request $request)
    {

        try{

            $value = $request->session()->get('user');
            $user_profile_id = $value ->user_profile_id;

        $promo = $this->promoService->save( $request->json()->all(),$user_profile_id);
        //return response()->json($addressType, 201);

        }catch(Exception $e) {
            throw $e;
        }

       return $promo;
    }

}    