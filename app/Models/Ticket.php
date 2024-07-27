<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = ['card_id', 'type'];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function transport()
    {
        return $this->belongsToMany(Transport::class, 'ticket_transport', 'tickets_id', 'transports_id');
    }

    public function tripHistory()
    {
        return $this->hasMany(TripHistory::class, 'ticket_id');
    }
}
