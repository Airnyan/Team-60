<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    public function basket() {
        return $this->belongsTo(Basket::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
