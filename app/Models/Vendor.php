<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'tax_id',
        'address',
        'contact',
        'phone',
        'email',
        'pay_days',
        'total',
        'balance',
        'status',
        'delivery_time',
    ];
}
