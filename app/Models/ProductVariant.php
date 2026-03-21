<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
        public function product()
    {
        return $this->belongsTo(Product::class);
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
