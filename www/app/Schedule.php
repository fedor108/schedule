<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    const WEEK_DAYS = ['Monday', 'Tuesday', 'Wednsday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    protected $fillable = [
        'event_id',
        'date_from',
        'date_to',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'userable');
    }

    public function getCarbonDateFromAttribute()
    {
        return new Carbon($this->attributes['date_from']);
    }

    public static function getRegular()
    {
        $query = self::query();

        foreach (self::WEEK_DAYS as $day) {
            $query->orWhere('date_from', 'like', "%{$day}%");
        }

        return $query->get();
    }

    public static function getSingleAfter($date)
    {
        $query = self::where('date_from', '>=', $date);

        foreach (self::WEEK_DAYS as $day) {
            $query->where('date_from', 'not like', "%{$day}%");
        }

        return $query->get();
    }

    public static function getDay($date)
    {
        $day = new Carbon($date);

        echo $day->dayOfWeek;

        $reqular = self::getRegular()->filter(function ($item) use ($day) {
            echo " {$item->carbon_date_from->dayOfWeek} ";
            return $item->carbon_date_from->dayOfWeek == $day->dayOfWeek;
        });

        $single = self::getSingleAfter($date)->filter(function ($item) use ($day) {
            return $item->carbon_date_from->format('Y-m-d') == $day->format('Y-m-d');
        });

        return compact('reqular', 'single');
    }
}
