<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderCard;
use App\Models\Wallet;
use App\Traits\ApiResponse;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use ApiResponse;
    public function orderHistory()
    {
        $user_id = auth()->user()->id;

        $orderHistory = Order::where('user_id', $user_id)->with('orderCard')->get();

        return $this->success($orderHistory, 'Order history fetched successfully', 200);
    }

    /**
     * Create a new order.
     */
    public function createOrder(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'order_cards' => 'required|array',
            'order_cards.*.card_id' => 'required|exists:cards,id',
            'order_cards.*.quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric', 
            'note' => 'nullable|string',
            'delivery_date' => 'nullable|date',
        ]);
        
        if ($validatedData->fails()) {
            return $this->error($validatedData->errors(), 'Validation Error', 422);
        }
        
        $user = auth()->user();
        
        if (!$user) {
            return $this->error(['user' => 'User not authenticated.'], 'Authentication Error', 401);
        }
                
  
        
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $validatedData->validated()['total_price'],
            'status' => 'pending',
            'note' => $validatedData->validated()['note'] ?? null,
        ]);
        
        $orderCards = [];
        foreach ($validatedData->validated()['order_cards'] as $orderCard) {
            $orderCards[] = OrderCard::create([
                'order_id' => $order->id,
                'card_id' => $orderCard['card_id'],
                'quantity' => $orderCard['quantity'],
                'unit_price' => $orderCard['unit_price'] ?? 0,
            ]);
            
        }
      
        return $this->success(message:'Order Created Successfully', code: 201);
    }        
}
