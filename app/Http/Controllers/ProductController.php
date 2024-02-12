<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productsByCategory(Category $category){
            return view('products.index',['products' => $category->products]);
    }

    public function index()
    {
        $allProducts = Product::all();
        return view('products.index', ['products' => $allProducts, 'categories' => Category::all()]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=>'required',
            'size'=>'required',
            'category_id'=>'required|numeric|exists:categories,id'
        ]);
        Product::create($validated + ['user_id' => Auth::user()->id]);
        return redirect()->route('products.index')->with('message', 'Продукт создано');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product'=>$product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product'=>$product, 'categories' => Category::all()]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=>'required',
            'size'=>'required',
            'category_id'=>'required|numeric|exists:categories,id'
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('message', 'Изменено');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Удален');
    }
}
