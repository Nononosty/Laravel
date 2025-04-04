<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Copy extends Model
{
    use HasFactory;

    protected $fillable = ['edition_id', 'wear_coefficient'];


    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    public function lendings(): HasMany
    {
        return $this->hasMany(Lending::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'lendings')
        ->withPivot('lending_date', 'plan_return_date', 'fact_return_date');
    }
    
}
