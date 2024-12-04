<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_id','name'];
    public function create()
{
    $categories = Category::where('status', 1)->get();
    return view('products.create', compact('categories'));
}
}