<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompCollabPartner extends Model
{
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);

    }

    public function collaborative_partner()
    {
        return $this->belongsTo(CollaborativePartner::class);
    }
}
