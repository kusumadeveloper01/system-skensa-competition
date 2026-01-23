<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionTopicCategory extends Model
{
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function topic_category()
    {
        return $this->belongsTo(TopicCategory::class);
    }
}
