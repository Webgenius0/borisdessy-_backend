<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Traits\ApiResponse;

class TransactionHistoryController extends Controller
{
    use ApiResponse;
    public function transactionHistory()  {
        $user_id = auth()->user()->id;

        $transactionHistory = TransactionHistory::where('user_id', $user_id)->get();

        return $this->success($transactionHistory, 'Transaction history fetched successfully', 200);
    }   
}
