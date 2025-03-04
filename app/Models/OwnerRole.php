<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OwnerRole extends Model
{
    protected $fillable = [
        'name',
    ];

    public function owners(): HasMany
    {
        return $this->hasMany(Owner::class);
    }
}
