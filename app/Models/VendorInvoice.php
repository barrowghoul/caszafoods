<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VendorInvoice extends Model
{
    use HasFactory;

    const PENDIENTE = 'pendiente';
    const PAGADA = 'pagada';
    const CANCELADA = 'cancelada';
    const VENCIDA = 'vencida';

    protected $fillable = [
        'vendor_id',
        'invoice',
        'status',
        'reception_id',
        'pay_date',
        'subtotal',
        'tax',
        'ieps',
        'total',
        'transaction_code',
    ];

    public function vendor() : BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function reception() : BelongsTo
    {
        return $this->belongsTo(Reception::class);
    }

    public function details() : HasMany
    {
        return $this->hasMany(VendorInvoiceDetail::class);
    }
}
