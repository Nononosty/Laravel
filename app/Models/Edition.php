<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edition extends Model
{
    use HasFactory;

        // Добавьте этот массив
    protected $fillable = [
        'name',
        'author',
        'picture_url'
    ];

    public function copies(): HasMany
    {
        return $this->hasMany(Copy::class);
    }
}
