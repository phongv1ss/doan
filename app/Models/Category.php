<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    protected $primaryKey = 'category_id';
    protected $table = 'categories';
    protected $fillable = ['category_id','name'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }    
    public function getCategoriesForCreate()
    {
        return Category::where('status', 1)->get();
    }
}