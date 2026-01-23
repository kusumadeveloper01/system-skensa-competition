<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function competition_registration()
    {
        return $this->hasMany(CompetitionRegistration::class);
    }
}
