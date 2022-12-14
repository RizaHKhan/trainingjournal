<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are appended to the model but do not appear on the database
     *
     * @var array<int, string>
     */
    protected $appends = [
        'programs',
        'measurement',
        'roles'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'measurement_system'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function workouts(): HasMany
    {
        return $this->hasMany(Workout::class);
    }

    public function getRolesAttribute()
    {
        return $this->roles()->get()->map(function ($role) {
            return $role->name;
        });
    }

    public function getProgramsAttribute(): Collection
    {
        return $this->programs()->get();
    }

    public function getMeasurementAttribute(): array
    {
        if ($this->measurement_system === 'imperial') {
            return [
                'temperature' => 'Fahrenheit',
                'weight'      => 'lb'
            ];
        } else {
            return [
                'temperature' => 'Celsius',
                'weight'      => 'kg'
            ];
        }
    }
}
