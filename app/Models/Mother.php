<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Mother extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'place_of_birth',
        'date_of_birth',
    ];

    protected $with = [
        'pregnancies',
        'childrens'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function pregnancies(): HasMany
    {
        return $this->hasMany(Pregnancy::class);
    }

    public function childrens(): HasMany
    {
        return $this->hasMany(Children::class);
    }
}
