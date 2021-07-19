<?php

namespace App\Models;

use Jenssegers\Date\Date as JDate;

class Week
{
    public string $date;
    public array $times = [];
    public string $nextMonday;

    public static function create(Specialist $specialist, JDate $date): Week
    {
        $date->startOfWeek();
        $week = new Week();
        $week->date = $date->toDateString();
        for ($i = 0; $i < 7; $i++) {
            /** @var Day $day */
            $day = $specialist->days()
                ->where('day','=',$date)
                ->first();
            if(isset($day)) {
                $day->setSchedule();
                $week->times[$i] = $day->times;
                $week->times[$i];
            } else {
                $week->times[$i] = [];
            }
            $date->addDay();
        }
        $week->nextMonday = $date->addDays(7)->toDateString();
        return $week;
    }

}
