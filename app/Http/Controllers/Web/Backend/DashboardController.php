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
use Yajra\DataTables\DataTables;

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

    public function card(Request $request) {
        $countries = Country::pluck('country_name');
        $platforms = Platform::pluck('name');
        $all_price_values = AllPriceValue::pluck('value');
   
        
        if($request->ajax()){
            $data = Card::with('countries')->with('allPriceValues')->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $button = '<button type="button" id="EditCard"  data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-id="'.$row->id.'" 
                    data-card_name="'.$row->card_name.'" 
                    data-type="'.$row->type.'"
                    data-platform_name="'.$row->platform_name.'"
                    data-acc='.$row->countries->pluck('name').'
                    data-apv=" '.$row->allPriceValues->pluck('value').' "
                    data-price="'.$row->price.'"
                    data-discount="'.$row->discount.'"
                    data-seller_name="'.$row->seller_name.'"
                    data-usage="'.$row->usage.'" 
                    data-description="'.$row->description.'"
                    data-image="'.$row->image.'"
                    data-card-type "'.$row->type.'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" data-id="'.$row->id.'" class="DeleteCard btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);

        }

       return view('backend.layouts.card',compact('countries','platforms','all_price_values'));
    }

    public function store(Request $request)  {
      $validateData = Validator::make($request->all(), [
        'card_name' => 'required',
        'type' => 'required',
        'platform_name' => 'required',
        'country_name.*' => 'required',
        'avaiable_amounts.*' => 'required',
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
      
      if($request->hasfile('image')){
        $newImage = $request->file('image');
        $newImagePath = uploadImage($newImage, 'card/images');

    }

        $card = Card::create([
            'card_name' => $request->card_name,
            'type' => $request->type,
            'platform_name' => $request->platform_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'seller_name' => $request->seller_name,
            'usage' => $request->usage,
            'description' => $request->description,
            'image' => $newImagePath,
        ]);

        $card_id = $card->id;

        foreach($request->country_name as  $country_name){
            $card->countries()->create([
               'card_id' => $card_id,
                'name' => $country_name,
            ]);
        }

        foreach($request->avaiable_amounts as  $avaiable_amount){
            $card->allPriceValues()->create([
               'card_id' => $card_id,
                'value' => $avaiable_amount,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Card Added Successfully',
        ]);
      

    }

    public function update(Request $request) {
       
        $validateData = Validator::make($request->all(), [
            'card_name' => 'required',
            'type' => 'required',
            'platform_name' => 'required',
            'country_name.*' => 'required',
            'avaiable_amounts.*' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'seller_name' => 'required',
            'usage' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);
        if ($validateData->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validateData->errors()->first(),
            ]);
        }
        $card = Card::find($request->id);
        
        $newImagePath = $card->image;
    
        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
    
            if ($newImage->isValid()) {
                if ($card->image) {
                    $previousImagePath = public_path($card->image);
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }
                $newImagePath = uploadImage($newImage, 'blog/images');
            } else {
                return back()->withErrors('The uploaded image is invalid.');
            }
        }

        $card->update([
            'card_name' => $request->card_name,
            'type' => $request->type,
            'platform_name' => $request->platform_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'seller_name' => $request->seller_name,
            'usage' => $request->usage,
            'description' => $request->description,
            'image' => $newImagePath,
           
        ]);

        

        $card_id = $card->id;

        $card->countries()->delete();
        foreach($request->country_name as  $country_name){
            $card->countries()->create([
                'card_id' => $card_id,
                'name' => $country_name,
            ]);
        }

        $card->allPriceValues()->delete();
        foreach($request->avaiable_amounts as  $avaiable_amount){
            $card->allPriceValues()->create([
                'card_id' => $card_id,
                'value' => $avaiable_amount,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Card Updated Successfully',
        ]);
    }

    public function destroy(Request $request) {
        $card = Card::find($request->id);

        if ($card->image) {
            $imagePath = public_path($card->image);
    
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $card->delete();
        return response()->json([
            'status' => true,
            'message' => 'Card Deleted Successfully',
        ]);
    }
}
