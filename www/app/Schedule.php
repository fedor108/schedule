<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function getDateFromDateAttribute()
    {
        return date("Y-m-d H:i", strtotime($this->date_from));
    }

    public static function getRegular()
    {
        $query = self::query();

        foreach (self::WEEK_DAYS as $day) {
            $query->orWhere('date_from', 'like', "%{$day}%");
        }

        return self::query()->get();
    }

    public static function getSingleAfter($date)
    {
        $query = self::where('date_from', '>=', $date);

        foreach (self::WEEK_DAYS as $day) {
            $query->where('date_from', 'not like', "%{$day}%");
        }

        echo $query->toSql();

        return self::query()->get();
    }

    public static function getDay($date)
    {
        $day = date("Y-m-d", strtotime($date));

        $reqular = self::getRegular()->filter(function ($item) use ($day) {
            return false !== strpos($item->date_from_date, $day);
        });

        $single = self::getSingleAfter($date)->filter(function ($item) use ($day) {
            return false !== strpos($item->date_from_date, $day);
        });

        return compact('reqular', 'single');
    }
}
