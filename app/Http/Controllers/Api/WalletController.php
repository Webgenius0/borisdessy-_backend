<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class WalletController extends Controller
{
    use ApiResponse;

    public function UserBalance() {
       
        $user_id = auth()->user()->id;
        $wallet = Wallet::select('balance')->where('user_id', $user_id)->first();

        return $this->success($wallet, 'User balance fetched successfully', 200);
    }
}
