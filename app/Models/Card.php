<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;
    protected $table = 'cards';
    protected $fillable = ['name', 'user_id', 'number', 'balance'];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'card_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topUpHistory(): HasMany
    {
        return $this->hasMany(TopUpHistory::class, 'card_id');
    }

    public function costHistory(): HasMany
    {
        return $this->hasMany(CostHistory::class, 'card_id');
    }
}
