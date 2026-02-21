<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $guarded = [];
    
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function competition_registration(): HasMany
    {
        return $this->hasMany(CompetitionRegistration::class);
    }
    
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
