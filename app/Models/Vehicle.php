<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function priceList(): HasMany
    {
        return $this->hasMany(PriceList::class);
    }

    public function piers(): BelongsToMany
    {
        return $this->belongsToMany(Piers::class);
    }

    public function availableOption(): BelongsToMany
    {
        return $this->belongsToMany(AvailableOption::class);
    }
}
