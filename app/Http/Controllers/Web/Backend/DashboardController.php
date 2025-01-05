<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\AllPriceValue;
use App\Models\Card;
use App\Models\Country;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index() : View
    {
        return view('backend.layouts.dashboard');
    }

    public function card(){
        $countries = Country::pluck('country_name');
        $platforms = Platform::pluck('name');
        $all_price_values = AllPriceValue::pluck('value');

       return view('backend.layouts.card',compact('countries','platforms','all_price_values'));
    }

    public function store(Request $request)  {
        dd($request->all());
      $validateData = Validator::make($request->all(), [
        'card_name' => 'required',
        'type' => 'required',
        'platform_id' => 'required',
        'country_name.*' => 'required',
        'value.*' => 'required',
        'price' => 'required',
        'discount' => 'required',
        'seller_name' => 'required',
        'usage' => 'required',
        'description' => 'required',
        'image' => 'required',
      ]);
      if ($validateData->fails()) {
        return response()->json([
          'status' => false,
          'message' => $validateData->errors()->first(),
        ]);
      }
        $image = $request->file('image');
    
      
        dd($image);

        $card = Card::create([
            'card_name' => $request->card_name,
            'type' => $request->type,
            'platform_id' => $request->platform_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'seller_name' => $request->seller_name,
            'usage' => $request->usage,
            'description' => $request->description,
       
        ]);

    }
}
