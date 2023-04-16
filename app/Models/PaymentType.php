<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    protected $casts = [
        'valid_on' => 'date',
        'expires_on' => 'date',
    ];

    protected $fillable = [
        'name',
        'type',
        'amount',
        'number_of_sessions',
        'valid_on',
        'expires_on',
        'pt_expires_on',
    ];

    /**
     * Get the section that owns the PaymentType
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
