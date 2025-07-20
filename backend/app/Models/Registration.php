<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $event_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $institution
 * @property string $major
 * @property string $motivation
 * @property string $experience
 * @property array $skills
 * @property array $preferences
 * @property string $status
 * @property \Carbon\Carbon $registered_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Registration extends Model
{
    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'institution',
        'major',
        'motivation',
        'experience',
        'skills',
        'preferences',
        'status',
        'registered_at',
    ];

    protected $casts = [
        'skills' => 'array',
        'preferences' => 'array',
        'registered_at' => 'datetime',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
