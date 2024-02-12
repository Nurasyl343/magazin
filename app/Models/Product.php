<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable=[
        'name',
        'description',
        'price',
        'size',
        'category_id',
        'user_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function productStore($request, $user_id)
    {
        return Product::create([
            'user_id' => $user_id,
            'name' => $request['name'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'size' => $request['size'],
            'price' => $request['price'],
        ]);
    }

    public static function productUpdate($request, $product)
    {
        $product->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'size' => $request['size'],
            'price' => $request['price'],
        ]);

        return $product;
    }



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function usersBought(){
        return $this->belongsToMany(User::class, 'cart')->withTimestamps()->withPivot('number', 'status');
    }
}
