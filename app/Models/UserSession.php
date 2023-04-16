<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSession extends Pivot
{
    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = true;

    protected $casts = [
        'is_free' => 'boolean',
    ];

    protected $fillable = [
        'is_free',
    ];

    /**
     * Get the user that owns the UserSession
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the session that owns the UserSession
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * Get the payment method that owns the UserSession
     */
    public function payment(): MorphTo
    {
        return $this->morphTo();
    }
}
