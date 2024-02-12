<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryUpdateService
{
    public function handle($request, $category){
        $category = Category::categoryUpdate($request, $category);
        return response()->json(['status' => 'category obnovleno', 'data' => $category]);
    }
}
