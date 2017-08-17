<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'title',
        'practice_id',
        'slug',
        'description',
        'text',
        'price',
        'conditions',
        'room',
    ];
}
