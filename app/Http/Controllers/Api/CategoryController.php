<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Services\CategoryStoreService;
use App\Http\Services\CategoryUpdateService;
use App\Http\Services\ProductStoreService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }


    public function store(CategoryStoreRequest $request, CategoryStoreService $service)
    {
        return $service -> handle($request);
    }


    public function show(Category $category)
    {
        return response()->json(['status'=> 'Category naiden','request' => $category],);
    }


    public function update(CategoryUpdateRequest $request, Category $category, CategoryUpdateService $service)
    {
        return $service->handle($request, $category);
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['status' => 'Category udalen']);
    }
}
