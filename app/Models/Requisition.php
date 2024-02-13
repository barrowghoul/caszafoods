<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model
{
    use HasFactory, SoftDeletes;

    const ABIERTA = 'abierta';
    const REVISION = 'revision' ;
    const APROBADA = "aprobada";
    const CERRADA = 'cerrada';

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    function details() : HasMany {
        return $this->hasMany(RequisitionDetail::class);
    }
}
