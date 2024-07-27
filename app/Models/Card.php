<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = 'cards';
    protected $fillable = ['name', 'user_id', 'number', 'balance'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'card_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'card_id');
    }

    public function topUpHistory()
    {
        return $this->hasMany(TopUpHistory::class, 'card_id');
    }

    public function costHistory()
    {
        return $this->hasMany(CostHistory::class, 'card_id');
    }
}
