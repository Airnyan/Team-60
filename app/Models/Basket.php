<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    /** @use HasFactory<\Database\Factories\BasketFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
    ];
    public function basket_product() {
        return $this->hasmany(BasketProduct::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
