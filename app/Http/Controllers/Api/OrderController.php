<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\ApiResponse;
use Flasher\Laravel\Http\Request;

class OrderController extends Controller
{
    use ApiResponse;
    public function orderHistory() {
        $user_id = auth()->user()->id;

        $orderHistory = Order::where('user_id', $user_id)->with('orderCard')->get();

        return $this->success($orderHistory, 'Order history fetched successfully', 200);
    }
 
    public function createOrder(Request $request) {

      

       
    }
}
