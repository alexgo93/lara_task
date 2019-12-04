<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = ['name', 'phone', 'email', 'message'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback';

//    public function users()
//    {
//        return $this->belongsToMany('App\User');
//    }
}
