<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'purchase_order_id',
        'item_id',
        'requisition_detail_id',
        'quantity',
        'unit_price',
        'tax_percentage',
        'tax_amount',
        'total',
        'ieps_percentage',
        'ieps_amount',
    ];

    public function purchase_order() : BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
