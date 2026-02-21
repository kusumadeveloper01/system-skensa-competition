<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competition extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'registration_start_date' => 'date',
        'registration_end_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    
    public function competition_type(): BelongsTo
    {
        return $this->belongsTo(CompetitionType::class);
    }
    
    public function registrations(): HasMany
    {
        return $this->hasMany(CompetitionRegistration::class);
    }
    
    public function topic_categories(): HasMany
    {
        return $this->hasMany(CompetitionTopicCategory::class);
    }
    
    public function collaborative_partners(): HasMany
    {
        return $this->hasMany(CompCollabPartner::class);
    }
}
