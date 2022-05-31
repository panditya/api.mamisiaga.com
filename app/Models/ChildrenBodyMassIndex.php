<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildrenBodyMassIndex extends Model
{
    use HasFactory;

    protected $fillable = [
        'children_id',
        'age_in_months',
        'weight_in_kg',
        'height_in_cm',
        'head_circumference_in_cm',
    ];

    public function children(): BelongsTo
    {
        return $this->belongsTo(Children::class);
    }
}
