<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;

    protected $casts = [
        'expires_on' => 'date',
    ];

    protected $fillable = [
        'date_of_birth',
        'address',
        'phone',
        'expires_on',
    ];

    /**
     * Get the user that owns the Registration (response to the registration form).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
