<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'code',
    ];

    public static function categoryStore($request){
        return Category::create([
            'name' => $request['name'],
            'code' => $request['code']
        ]);
    }

    public static function categoryUpdate($request, $category){
        $category->update([
            'name' => $request['name']
        ]);
        return $category;
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
