<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
class CardController extends Controller
{
    use ApiResponse;

     public function allCards() {
        $allcards = Card::all();
        return $this->success(
            $allcards,
            'All Cards',
            200
        );
     }

     public function filterCards(Request $request) {

       $platform = $request->platform;
         $cards = Card::where('platform_name', $platform)->get();
        return $this->success(
            $cards,
            'Filtered Cards',
            200
        );
     }
}
