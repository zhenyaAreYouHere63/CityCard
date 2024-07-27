<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripHistory extends Model
{
    use HasFactory;

    protected $table = 'trip_histories';
    protected $fillable = ['ticket_id', 'route', 'date'];

    public function tickets()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
