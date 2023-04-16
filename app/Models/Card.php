<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends SectionPaymentMethod
{
    use HasFactory;

    protected $fillable = [
        'amount_paid',
        'comment',
        'payed_on',
        'valid_on',
        'number_of_sessions',
    ];
}
