<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'qnty_places',
        'date_from',
        'date_to',
        'flag_activity',
        'attribute1',
        'attribute2',
        'attribute3',
        'description',
        'license_plate',
        'qnty_siutes',
        'qnty_toilets',
        'colour',
        'length',
        'width',
        'speed',
        'flag_captain',
        'flag_shower',
        'flag_fridge',
        'flag_kitchen',
        'flag_audio',
        'flag_tv',
        'flag_open_deck',
        'flag_flybridge',
    ];

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

    public function response(): HasMany
    {
        return $this->hasMany(Response::class);
    }
}
