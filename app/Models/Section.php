<?php

namespace App\Models;

use App\Models\PaymentTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use HasFactory;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $casts = [
        'is_free' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'is_free',
    ];

    /**
     * Get all of the sessions for the Section
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }

    /**
     * The users that belong to the Section
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('created_at', 'expires_on');
    }

    /**
     * Get all of the payment types for the Section
     */
    public function paymentTypes(): HasMany
    {
        return $this->hasMany(PaymentTypes::class);
    }
}
