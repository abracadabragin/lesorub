<?php

namespace Lesorub;

use Illuminate\Database\Eloquent\Model;

class FeedbackPhoto extends Model
{
    protected $fillable = [
        'feedback_id',
        'filename'
    ];

    public function product()
    {
        return $this->belongsTo('Lesorub\Feedback');
    }
}
