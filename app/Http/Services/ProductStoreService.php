<?php

namespace App\Http\Services;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class ProductStoreService
{

    public function handle($request)
    {
        $user_id = Auth::user()->id;
        $user = Product::productStore($request,$user_id);

        $product = Product::where('id', $user['id'])->first();
        $product->slug = SlugService::createSlug(Product::class, 'slug', $product->name);
        $product->save();

        return response()->json(['status' => 'success','request' => $product ]);

    }
}
