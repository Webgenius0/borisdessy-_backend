<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Traits\ApiResponse;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
   use ApiResponse;

   /**
    * return jsonresponse
    * @return \Illuminate\Http\JsonResponse
    */
   public function allCards(): JsonResponse
   {
      $allcards = Card::withAvg('reviews', 'rating')->get()
         ->map(function ($card) {
            $card->reviews_avg_rating  = round($card->reviews_avg_rating, 1);
            return $card;
         });
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
   public function filterCards(Request $request): JsonResponse | Request
   {

      $platform = $request->platform;
      $cards = Card::where('platform_name', $platform)
         ->withAvg('reviews', 'rating')
         ->get()
         ->map(function ($card) {
            $card->reviews_avg_rating = round($card->reviews_avg_rating);
            return $card;
         });
      return $this->success(
         $cards,
         'Filtered Cards',
         200
      );
   }

   /**
    * return jsonresponse
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
   public function upcomingVouchers(): JsonResponse
   {
      $upcomingVoucher = Card::where('type', 'voucher')->latest()->take(15)
         ->withAvg('reviews', 'rating')
         ->get()
         ->map(function ($card) {
            $card->reviews_avg_rating = round($card->reviews_avg_rating);
            return $card;
         });
      return $this->success(
         $upcomingVoucher,
         'Upcoming Vouchers',
         code: 200
      );
   }

   /**
    * return jsonresponse
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */

   public function upcomingCards(): JsonResponse
   {
      $upcomingVoucher = Card::where('type', 'gift')->latest()->take(15)
         ->withAvg('reviews', 'rating')
         ->get()
         ->map(function ($card) {
            $card->reviews_avg_rating = round($card->reviews_avg_rating);
            return $card;
         });
      return $this->success(
         $upcomingVoucher,
         'Upcoming cards',
         code: 200
      );
   }

   /**
    * return jsonresponse
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */

   public function cardDetails(Request $request): JsonResponse
{
    $card_id = $request->card_id;

    $card = Card::where('id', $card_id)
        ->with([
            'cardCountries:card_id,name',
            'cardAvaialeAmounts:card_id,value',
            'reviews.user:id,name,avatar',
            'reviews:id,card_id,user_id,rating,comment'
        ])
        ->withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->first();

    if (!$card) {
        return $this->error('Card not found', code: 404);
    }



    $total_reviews = $card->reviews->count();
   
      $total_reviews = $card->reviews->count();

      $total_reviews = $card->reviews->count();

      if ($total_reviews > 0) {
          $reviews = collect([1.0, 2.0, 3.0, 4.0, 5.0])->map(function ($value) use ($card, $total_reviews) {
              $count = $card->reviews->filter(function ($review) use ($value) {
                  return round($review->rating) === $value; 
              })->count();
      
      
              return [
                  'value' => $value,
                  'reviewPercentages' => $total_reviews > 0 ? round(($count / $total_reviews) * 100) . '%' : '0%',
              ];
          });
      } else {
          $reviews = collect([]); 
      }
      

    $card_type = $card->type;

    $othersProduct = Card::where('type', $card_type)
        ->take(15)
        ->withAvg('reviews', 'rating')
        ->get()
        ->map(function ($card) {
            $card->reviews_avg_rating = round($card->reviews_avg_rating);
            return $card;
        });

    $details = [
        'card' => $card,
        'reviews' => $reviews,
        'othersProduct' => $othersProduct,
    ];

    return $this->success(
        $details,
        'Card Details',
        code: 200
    );
}


      /**
    * return jsonresponse
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */

   public function globalSearch(Request $request) : JsonResponse
   {

      $search = $request->search;

      $card = Card::where('card_name', 'like', "%$search%")->orWhere('platform_name', 'like', "%$search%")->orWhere('type', 'like', "%$search%")
         ->withAvg('reviews', 'rating')
         ->get()
         ->map(function ($card) {
            $card->reviews_avg_rating = round($card->reviews_avg_rating, 1);
            return $card;
         });

      return $this->success(
         $card,
         'card Details',
         code: 200
      );
   }
}
