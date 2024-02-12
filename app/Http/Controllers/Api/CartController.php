<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\CartBuyService;
use App\Http\Services\CartIndexService;
use App\Http\Services\DeleteFromCartService;
use App\Http\Services\PutToCartService;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(CartIndexService $service){
        return $service->handle();
    }

    public function buy(CartBuyService $service){
        return $service->handle();
    }

    public function putToCart(Request $request,Product $product, PutToCartService $service){
        return $service -> handle($request, $product);
    }

    public function deleteFromCart(Product $product, DeleteFromCartService $service){
        return $service -> handle($product);
    }
}
