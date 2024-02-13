<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorInvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_invoice_id',
        'item_id',
        'quantity',
        'tax_percentage',
        'tax_amount',
        'ieps_percentage',
        'ieps_amount',
        'unit_price',
        'total',
    ];

    public function invoice() : BelongsTo
    {
        return $this->belongsTo(VendorInvoice::class);
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
