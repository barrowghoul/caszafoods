<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RequisitionDetail extends Model
{
    use HasFactory;

    const OPENED = 'abierta';
    const ORDERED = 'pedida';
    const PENDING = 'pendiente';

    function item() : BelongsTo {
        return $this->belongsTo(Item::class);
    }

    function requisition() : BelongsTo {
        return $this->belongsTo(Requisition::class);
    }

    function purchase_order() : BelongsTo {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
