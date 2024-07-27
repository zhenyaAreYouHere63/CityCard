<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['firstName', 'lastName', 'role', 'email', 'password', 'phone_number'];

    public function card()
    {
        return $this->hasMany(Card::class, 'user_id');
    }

    public function hasRole($role): bool {
        return $this->role === $role;
    }
}
