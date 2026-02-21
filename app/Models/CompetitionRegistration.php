<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompetitionRegistration extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'date' => 'date',
    ];

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }
    
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
