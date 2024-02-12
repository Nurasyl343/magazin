<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;

class PutToCartService
{
    public function handle($request, $product){
        $productsInCart = Auth::user()->productsWithStatus("in_cart")->where('product_id', $product->id)->first();

        if($productsInCart != null)
            Auth::user()->productsWithStatus("in_cart")->updateExistingPivot($product->id,
                ['number' => $productsInCart->pivot->number + $request ->input('number')]);
        else
            Auth::user()->productsWithStatus("in_cart")->attach($product->id,
                ['number' => $request ->input('number')]);

        return response()->json(['status' => 'Dobavleno']);
    }
}
