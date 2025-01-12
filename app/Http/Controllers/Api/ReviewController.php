<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    use ApiResponse;
    public function StoreReview(Request $request) {

        $validateData = Validator::make($request->all(),[
            'user_id' => 'required | unique:reviews,user_id',
            'card_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        if($validateData->fails()) {
            return $this->error($validateData->errors(), 'Validation Error', 422);
        }

        $newReview = new Review();
        $newReview->user_id = $request->user_id;
        $newReview->card_id = $request->card_id;
        $newReview->user_id = $request->user_id;
        $newReview->rating = $request->rating;
        $newReview->comment = $request->comment;
        $newReview->save();


        return $this->success($request->all(), 'Review Create Successful', 201);
    }

    public function allRating() {
        $allRating = Review::with('user')->get();
        
        return $this->success($allRating, 'All Rating', 200);
    }
}
