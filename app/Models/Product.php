<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
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
=======
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'category',
        'image',
    ];
>>>>>>> d4618f42e4be1d59bbad24f92d81d093c21ac94f
}
