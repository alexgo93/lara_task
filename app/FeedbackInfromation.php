<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackInfromation extends Model
{
    const UPDATED_AT = null;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback_information';

    protected $fillable = ['user_id', 'feedback_id'];

    public function getLogs($feedbackId)
    {
        return $this->where('feedback_id', $feedbackId)->get();
    }
}
