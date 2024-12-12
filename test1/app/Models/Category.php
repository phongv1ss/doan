<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     // Tên bảng trong database
     protected $table = 'categories';
     // Khóa chính của bảng (nếu không phải 'id')
     protected $primaryKey = 'category_id';
     // Các cột có thể insert/update
     protected $fillable = ['name', 'status'];
     // Tự động quản lý cột created_at và updated_at
     public $timestamps = true;

}
