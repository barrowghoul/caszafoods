<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    const ABIERTA = 'abierta';
    const ENVIADA = 'enviada';
    const CANCELADA = 'cancelada';
    const COMPLETA = 'completa';

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    function vendor() : BelongsTo {
        return $this->belongsTo(Vendor::class);
    }

    function details() {
        return $this->hasMany(PurchaseOrderDetail::class);
    }
}
