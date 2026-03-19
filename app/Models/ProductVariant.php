<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
        public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function scopeLowStock($query, $threshold = 7)
    {
        return $query->where('stock', '<', $threshold);
    }
    protected $fillable = [
        'product_id',
        'variant_name',
        'size',
        'stock',
        'reserved_stock',
        'price',
        'discounted_price',
    ];
}
