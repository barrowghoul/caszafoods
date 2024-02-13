<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceptionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reception_id',
        'item_id',
        'quantity',
        'unit_price',
        'tax_percentage',
        'ieps_percentage',
        'tax_amount',
        'ieps_amount',
        'total',
    ];
    
    public function reception() : BelongsTo
    {
        return $this->belongsTo(Reception::class);
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
