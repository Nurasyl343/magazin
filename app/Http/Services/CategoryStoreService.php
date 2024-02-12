<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryStoreService
{
    public function handle($request){
        $category = Category::categoryStore($request);
        return response()->json(['status' => 'Category sozdano', 'data' => $category]);
    }
}
