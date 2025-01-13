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

   public function cardDetails(Request $request) : JsonResponse
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
      $one_star = $card->reviews->where('rating', 1)->count() / $card->reviews->count() * 100;
      $two_star = $card->reviews->where('rating', 2)->count() / $card->reviews->count() * 100;
      $three_star = $card->reviews->where('rating', 3)->count() / $card->reviews->count() * 100;
      $four_star = $card->reviews->where('rating', 4)->count() / $card->reviews->count() * 100;
      $five_star = $card->reviews->where('rating', 5)->count() / $card->reviews->count() * 100;
      $reviews = [
         'one_star' => round($one_star, 1),
         'two_star' => round($two_star, 1),
         'three_star' => round($three_star, 1),
         'four_star' => round($four_star, 1),
         'five_star' => round($five_star, 1),
      ];

      $card_type = $card->type;

      $othersProduct = Card::where('type',$card_type)->take(15)->withAvg('reviews', 'rating')->get()
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
