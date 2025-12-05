<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_product', 'order_id', 'product_id');
    }

    public function product_type() {
        return $this->belongsTo(ProductType::class);
    }

    public function basket_product() {
        return $this->belongsToMany(Basket::class, 'basket_products', 'basket_id', 'product_id');
    }
    

    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'category',
        'image',
    ];
}
