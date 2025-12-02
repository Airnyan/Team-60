<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccessability extends Model
{
    /** @use HasFactory<\Database\Factories\UserAccessabilityFactory> */
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class);
    }
}
