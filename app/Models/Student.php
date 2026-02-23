<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    protected $guarded = [];

    public function competition_registration()
    {
        return $this->hasMany(CompetitionRegistration::class);
    }
}
