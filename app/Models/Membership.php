<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends PaymentMethod
{
    use HasFactory;

    protected $fillable = [
        'amount_paid',
        'comment',
        'payed_on',
        'valid_on',
        'expires_on',
    ];
}
