<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'name',
        'email',
        'phone',
        'address',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
