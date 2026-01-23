<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionRegistration extends Model
{
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
