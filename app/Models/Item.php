<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'cost', 'min', 'max', 'on_hand', 'family_id', 'unit_id', 'tax_id', 'is_service', 'ieps', 'warehouse_id'];

    function family() : BelongsTo
    {
        return $this->belongsTo(Family::class);

    }

    function unit() :BelongsTo
    {
        return $this->belongsTo(Unit::class);

    }

    function tax() :BelongsTo
    {
        return $this->belongsTo(Tax::class);

    }

    function warehouse() :BelongsTo
    {
        return $this->belongsTo(Warehouse::class);

    }
}
