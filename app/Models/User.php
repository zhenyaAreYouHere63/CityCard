<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['firstName', 'lastName', 'email', 'password', 'phone_number'];

    public function card(): HasMany
    {
        return $this->hasMany(Card::class, 'user_id');
    }
}
