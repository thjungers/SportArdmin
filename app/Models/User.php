<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the responses to the registration form for the User.
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * The sections that belong to the User
     */
    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class)->withPivot('created_at', 'expires_on');
    }

    /**
     * Get all of the memberships for the User
     */
    public function memberships(): HasMany
    {
        return $this->hasMany(Membership::class);
    }

    /**
     * Get all of the subscriptions for the User
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get all of the cards for the User
     */
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    /**
     * Get all payment methods for sections for the User
     */
    public function getSectionPaymentMethods(): Collection
    {
        return $this->subscriptions->merge($this->cards);
    }

    /**
     * Get all payment methods for the User
     */
    public function getPaymentMethods(): Collection
    {
        return $this->getSectionPaymentMethods()->merge($this->memberships);
    }

    /**
     * The sessions that belong to the User
     */
    public function sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class, 'user_sessions')->using(UserSession::class)->withTimestamps();
    }
}
