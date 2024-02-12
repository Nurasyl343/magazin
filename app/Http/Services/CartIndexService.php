<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
class CartIndexService
{
    public function handle(){
        $productsInCart = Auth::user()->productsWithStatus("in_cart")->get();
        $sum=0;
        foreach($productsInCart as $product){
            $sum += $product->price * $product->pivot->number;
        }
        return response()->json(['productsInCart' => $productsInCart, 'sum' => $sum]);
    }
}
