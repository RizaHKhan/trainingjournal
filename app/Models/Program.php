<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

    protected $fillable = [
        'name',
        'description'
    ];

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercise::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
