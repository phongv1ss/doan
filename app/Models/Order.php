<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;

    // Khai báo bảng tương ứng
    protected $table = 'orders';

    // Nếu bảng không dùng các trường `created_at` và `updated_at`, thêm thuộc tính này
    public $timestamps = true;

    // Khai báo các cột có thể điền giá trị thông qua Eloquent
    protected $fillable = [
        'customer_id',
        'created_at',
        'updated_at',
    ];

    // Thiết lập quan hệ với bảng `users` (khách hàng)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Thiết lập quan hệ với bảng `order_details`
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
