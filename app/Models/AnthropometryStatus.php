<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnthropometryStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'anthropometry_id',
        'name',
        'max_z_score',
        'min_z_score',
    ];
}
