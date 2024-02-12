<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;

class CartBuyService
{
    public function handle(){
        $ids = Auth::user()->productsWithStatus("in_cart")->allRelatedIds();
        $productsOrdered = array();
        foreach($ids as $id) {
            Auth::user()->productsWithStatus("in_cart")->updateExistingPivot($id, ['status' => 'ordered']);
            $product = Auth::user()->productsWithStatus("ordered")->where('product_id', $id)->get(['name']);
            $productsOrdered[] = $product;
        }
        return response()->json(['status' => 'Zakazano', 'Zakazannye producty' => $productsOrdered]);
    }

}
