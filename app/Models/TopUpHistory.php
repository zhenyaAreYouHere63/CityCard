<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopUpHistory extends Model
{
    use HasFactory;

    protected $table = 'top_up_histories';
    protected $fillable = ['card_id', 'replenishment', 'date'];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
