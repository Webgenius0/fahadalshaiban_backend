<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'subtotal', 'despatch_fee', 'total', 'status'  // Define the fillable attributes
    ];

    // Define the relationship with OrderItems (One-to-Many)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
