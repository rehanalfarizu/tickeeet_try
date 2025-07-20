<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $location
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property \Carbon\Carbon $registration_deadline
 * @property int $max_participants
 * @property float $entry_fee
 * @property string $event_type
 * @property array $prizes
 * @property array $requirements
 * @property bool $is_team_based
 * @property bool $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'start_date',
        'end_date',
        'registration_deadline',
        'max_participants',
        'entry_fee',
        'event_type',
        'prizes',
        'requirements',
        'is_team_based',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'registration_deadline' => 'datetime',
        'entry_fee' => 'decimal:2',
        'prizes' => 'array',
        'requirements' => 'array',
        'is_team_based' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function getFormattedPrizeAttribute(): string
    {
        if (empty($this->attributes['prizes'])) {
            return 'No prizes';
        }

        $prizes = json_decode($this->attributes['prizes'], true);
        if (!is_array($prizes)) {
            return 'No prizes';
        }

        return collect($prizes)->map(function ($prize) {
            return $prize['position'] . ': ' . $prize['prize'];
        })->join(', ');
    }

    public function isRegistrationOpen(): bool
    {
        return now() <= $this->registration_deadline && $this->is_active;
    }
}
