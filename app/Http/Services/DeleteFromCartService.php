<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class DeleteFromCartService
{
    public function handle($product){
        $productsInCart = Auth::user()->productsWithStatus("in_cart")->where('product_id', $product->id)->first();

        if ($productsInCart != null)
            Auth::user()->productsWithStatus("in_cart")->detach($product->id);

        return response()->json(['status' => 'Udalen iz korziny']);
    }
}
