<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Services\ProductStoreService;
use App\Http\Services\ProductUpdateService;
use App\Models\Product;


class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }


    public function store(ProductStoreRequest $request, ProductStoreService $service)
    {
        return $service->handle($request);
    }


    public function show(Product $id)
    {
        return response()->json(['status'=> 'Product naiden','request' => $id],);
    }


    public function update(ProductUpdateRequest $request, Product $product, ProductUpdateService $service )
    {
        return $service->handle($request, $product);
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['status'=> 'Udalen']);
    }
}
