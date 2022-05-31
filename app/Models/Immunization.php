<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Immunization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function standards(): HasMany
    {
        return $this->hasMany(ImmunizationStandard::class);
    }
}
