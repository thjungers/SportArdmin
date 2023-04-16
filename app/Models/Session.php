<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Session extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    protected $fillable = [
        'starts_at',
        'ends_at',
    ];

    /**
     * Get the section that owns the Session
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * The users that belong to the Session
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_sessions')->using(UserSession::class)->withTimestamps();
    }
}
