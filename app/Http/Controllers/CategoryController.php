<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{

    public function index()
    {
        $allCategories = Category::all();
        return view('categories.index', ['categories' => $allCategories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'code'=>'required|max:6',
        ]);
        Category::create($validated);
        return redirect()->route('admin.users.index')->with('message', 'Категория создано');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'code'=>'required|max:6',
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')->with('message', 'Изменено');
    }


    public function destroy(Category $category)
    {
        if($category->products->isEmpty()){
            $category->delete();
            return redirect()->route('categories.index')->with('message', 'Удален');
        }
        else{
            return redirect()->route('categories.index')->with('message', 'В категории есть продукты! Вы не можете удалить категорию!');
        }
    }
}
