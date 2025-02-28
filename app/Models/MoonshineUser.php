<?php

declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoonshineUser extends Model
{
    protected $fillable = [
		'moonshine_user_role_id',
		'email',
		'password',
		'name',
		'avatar',
		'remember_token',
    ];

    public function moonshineUserRole(): BelongsTo
    {
        return $this->belongsTo(MoonshineUserRole::class, 'moonshine_user_role_id');
    }
}
