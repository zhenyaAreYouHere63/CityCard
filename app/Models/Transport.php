<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transport extends Model
{
    use HasFactory;

    protected $table = 'transports';
    protected $fillable = ['name', 'price', 'cities_id'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'cities_id');
    }

    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(
            Ticket::class,
            'transport_ticket',
            'transports_id',
            'tickets_id'
        );
    }
}
