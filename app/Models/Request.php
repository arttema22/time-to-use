<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    /** @use HasFactory<\Database\Factories\RequestFactory> */
    use HasFactory;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }
}
