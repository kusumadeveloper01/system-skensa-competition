<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Authenticatable
{
    protected $guarded = [];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
    
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
