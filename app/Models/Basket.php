<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    /** @use HasFactory<\Database\Factories\BasketFactory> */
    use HasFactory;
    
    public function basket_product() {
        return $this->belongsToMany(Product::class, 'basket_products', 'product_id', 'basket_id');
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
