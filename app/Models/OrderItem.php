<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'signage_id', 'name', 'location', 'category_name', 'price_per_day', 'rotation_time', 'avg_daily_views'
    ];

    // Define the inverse relationship (belongs to Order)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
