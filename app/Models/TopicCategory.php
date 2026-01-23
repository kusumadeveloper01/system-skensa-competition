<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    protected $guarded = [];

    public function competition_topic_category()
    {
        return $this->hasMany(CompetitionTopicCategory::class);
    }
}
