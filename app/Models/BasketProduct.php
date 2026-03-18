<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    /** @use HasFactory<\Database\Factories\UserAccessabilityFactory> */
    use HasFactory;
    protected $fillable = [
        'basket_id',
        'variant_id',
        'quantity',
        'price'
    ];
    public function basket() {
        return $this->belongsTo(Basket::class);
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class);
    }

}
