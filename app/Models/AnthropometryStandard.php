<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnthropometryStandard extends Model
{
    use HasFactory;

    protected $fillable = [
        'anthropometry_id',
        'age_in_months',
        'standard_deviation',
    ];
}
