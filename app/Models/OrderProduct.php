<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /** @use HasFactory<\Database\Factories\OrderProductFactory> */
    use HasFactory;
    protected $fillable = [
        'order_id',
        'variant_id',
        'quantity',
    ];
    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
