<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'postcode',
    ];
    public function user() {
        return $this->hasMany(User::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
}
