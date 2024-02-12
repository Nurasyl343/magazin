<?php

namespace App\Http\Services;
use App\Models\Product;

class ProductUpdateService
{
    public function handle($request, $product){
        $user = Product::productUpdate($request, $product);
        return response()->json(['status'=> 'success','request' => $user],);
    }
}
