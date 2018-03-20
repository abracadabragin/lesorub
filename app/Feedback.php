<?php

namespace Lesorub;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "feedbacks";

    protected $fillable = [
        'author_name',
        'text'
    ];

    public function feedbackPhotos()
    {
        return $this->hasMany('FeedbackPhoto');
    }
}
