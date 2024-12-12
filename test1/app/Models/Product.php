<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;


    // Chỉ định các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'name',
        'image',
        'price',
        'sale_price',
        'category_id',
        'description',
        'status',
    ];

    protected $table = 'products';  // Đảm bảo tên bảng đúng

    // Mối quan hệ với bảng carts
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

}
