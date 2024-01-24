<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'cost', 'min', 'max', 'on_hand', 'family_id', 'unit_id', 'tax_id', 'is_service', 'ieps'];

    function family()
    {
        return $this->belongsTo(Family::class);

    }

    function unit()
    {
        return $this->belongsTo(Unit::class);

    }
}
