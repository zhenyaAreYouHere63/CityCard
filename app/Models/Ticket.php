<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = ['card_id', 'type'];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function transport(): BelongsToMany
    {
        return $this->belongsToMany(Transport::class, 'ticket_transport', 'tickets_id', 'transports_id');
    }

    public function tripHistory(): HasMany
    {
        return $this->hasMany(TripHistory::class, 'ticket_id');
    }
}
