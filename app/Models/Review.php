<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = ['product_id', 'user_id', 'rating', 'review'];

    // This tells Laravel that every review belongs to a User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}