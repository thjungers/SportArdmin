<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class SectionPaymentMethod extends PaymentMethod
{
    use HasFactory;

    /**
     * Get the section that owns the SectionPaymentMethod
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the user session that belongs to the SectionPaymentMethod
     */
    public function userSession(): MorphMany
    {
        return $this->morphMany(UserSession::class, 'payment');
    }
}
