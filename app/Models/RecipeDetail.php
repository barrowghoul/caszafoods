<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'item_id',
        'quantity',
        'unit_id',
    ];

    public function recipe() : BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function unit() : BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
