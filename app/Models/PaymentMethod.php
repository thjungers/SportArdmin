<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class PaymentMethod extends Model
{
    use HasFactory;

    protected $casts = [
        'payed_on' => 'date',
        'valid_on' => 'date',
        'expires_on' => 'date',
    ];

    /**
     * Get the user that owns the PaymentMethod
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
