<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;
use App\Traits\HasSerialNumber;

class Order extends Model
{
    use HasFactory, HasSerialNumber;

    protected $fillable = ['order_number', 'user_id', 'total_amount', 'items_qty', 'payment_method', 'status'];

    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
