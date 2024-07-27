<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $table = 'transports';
    protected $fillable = ['name', 'price', 'cities_id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id');
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'transport_ticket',
            'transports_id', 'tickets_id');
    }
}

