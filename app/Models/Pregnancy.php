<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pregnancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'mother_id',
        'date'
    ];

    public function mother(): BelongsTo
    {
        return $this->belongsTo(Mother::class);
    }
}
