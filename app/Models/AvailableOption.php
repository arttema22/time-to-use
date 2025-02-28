<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AvailableOption extends Model
{
    /** @use HasFactory<\Database\Factories\AvailableOptionFactory> */
    use HasFactory;

    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }

    public function vehicle(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
