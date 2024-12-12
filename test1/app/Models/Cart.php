<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';  // Đảm bảo tên bảng đúng

    // Định nghĩa mối quan hệ "một giỏ hàng thuộc về một sản phẩm"
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
