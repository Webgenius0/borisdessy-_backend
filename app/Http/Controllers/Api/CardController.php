<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class CardController extends Controller
{
    use ApiResponse;

    /**
     * return jsonresponse
     * @return \Illuminate\Http\JsonResponse
     */
     public function allCards() : JsonResponse {
        $allcards = Card::all();
        return $this->success(
            $allcards,
            'All Cards',
            200
        );
     }
     
        /**
        * return jsonresponse
        * @param Request $request
        * @return \Illuminate\Http\JsonResponse
        */
     public function filterCards(Request $request) : JsonResponse | Request{

       $platform = $request->platform;
         $cards = Card::where('platform_name', $platform)->get();
        return $this->success(
            $cards,
            'Filtered Cards',
            200
        );
     }

     /**
      * return jsonresponse
      */

     public function upcomingVouchers() : JsonResponse {
       $upcomingVoucher = Card::where('type','voucher')->latest()->take(4)->get();
        return $this->success(
            $upcomingVoucher,
            'Upcoming Vouchers',
            code: 200
        );
     }

        /**
        * return jsonresponse
        */
     public function upcomingCards() : JsonResponse {
       $upcomingVoucher = Card::where('type','gift')->latest()->take(4)->get();
        return $this->success(
            $upcomingVoucher,
            'Upcoming cards',
            code: 200
        );
     }
}
