<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buy(){
        $ids = Auth::user()->productsWithStatus("in_cart")->allRelatedIds();
        foreach ($ids as $id) {
            Auth::user()->productsWithStatus("in_cart")->updateExistingPivot($id, ['status' => 'ordered']);
        }
        return back();
    }

    public function index(){
        $productsInCart = Auth::user()->productsWithStatus("in_cart")->get();
        $sum=0;
        foreach($productsInCart as $product){
            $sum += $product->price * $product->pivot->number;
        }
        return view('cart.index', ['productsInCart' => $productsInCart, 'sum' => $sum]);
    }

    public function orders(){
        $productsOrdered = Auth::user()->productsWithStatus("ordered")->get();
        return view('order.index', ['productsOrdered' => $productsOrdered]);
    }

    public function putToCart(Request $request, Product $product){
        $productsInCart = Auth::user()->productsWithStatus("in_cart")->where('product_id', $product->id)->first();

        if($productsInCart != null)
            Auth::user()->productsWithStatus("in_cart")->updateExistingPivot($product->id,
                ['number' => $productsInCart->pivot->number + $request ->input('number')]);
        else
            Auth::user()->productsWithStatus("in_cart")->attach($product->id,
                ['number' => $request ->input('number')]);

        return redirect()->route('cart.index');

    }

    public function deleteFromCart(Product $product){
        $productsBought = Auth::user()->productsWithStatus("in_cart")->where('product_id', $product->id)->first();

        if ($productsBought != null)
            Auth::user()->productsWithStatus("in_cart")->detach($product->id);

        return redirect()->route('cart.index');
    }
}
