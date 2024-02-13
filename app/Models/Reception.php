<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reception extends Model
{
    use HasFactory, SoftDeletes;

    const ABIERTA = 'abierta';
    const CANCELADA = 'cancelada';
    const PENDIENTE = 'pendiente';
    const CERRADA = 'cerrada';

    protected $fillable = [
        'purchase_order_id',
        'user_id',
        'vendor_id',
        'status',
        'tax',
        'ieps',
        'subtotal',
        'total',
        'comments',
        'vendor_invoice'
    ];

    public function purchase_Order() : BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vendor() : BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function reception_details() : HasMany
    {
        return $this->hasMany(ReceptionDetail::class);
    }

    public function vendor_invoice(): HasOne
    {
        return $this->hasOne(VendorInvoice::class);
    }
}
