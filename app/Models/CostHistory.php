<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CostHistory extends Model
{
    use HasFactory;

    protected $table = "cost_histories";
    protected $fillable = ['card_id', 'expense', 'date'];

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
