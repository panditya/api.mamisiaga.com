<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImmunizationSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'immunization_id',
        'age_in_months',
    ];

    public function immunization(): BelongsTo
    {
        return $this->belongsTo(Immunization::class);
    }
}
