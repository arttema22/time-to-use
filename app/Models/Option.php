<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'date_from',
        'date_to',
        'attribute1',
        'attribute2',
        'attribute3',
        'flag_activity',
    ];

    public function availableOptions(): HasMany
    {
        return $this->hasMany(AvailableOption::class);
    }
}
