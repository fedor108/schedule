<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = [
        'name',
        'title',
        'slug',
        'description',
        'text',
    ];
}
