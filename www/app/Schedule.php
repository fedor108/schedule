<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'event_id',
        'date_from',
        'date_to',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
