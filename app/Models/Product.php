<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function orders() {
        return $this->hasMany(OrderProduct::class);
    }

    public function product_type() {
        return $this->belongsTo(ProductType::class);
    }

    public function basket_product() {
        return $this->hasMany(BasketProduct::class);
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'product_type_id',
        'image'
    ];
}
