<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Jenssegers\Date\Date as JDate;

class ScheduleController extends Controller
{
    public function index(Specialist $specialist)
    {
        $day1 = new JDate('monday this week');
        $day2 = new JDate('monday next week');
        $books = $specialist->books()
            ->where('datetime','>',$day1)
            ->where('datetime','<',$day2)
            ->get();
        $start_time = 9;
        $end_time = 12;
        $duration = 1;
        $schedules = [];
        for ($day = 0; $day < 7; $day++) {
            $schedules[$day] = compact('start_time','end_time','duration');
        }
        foreach ($schedules as $schedule) {
            //
        }
//        dd($books);
        return view('schedule.index',compact(['specialist','books']));
    }

    public function personalInfo(Specialist $specialist, Request $request)
    {
        if (isset($request->datetime)) {
            $str = $request->datetime;//str_replace('T',' ',$request->datetime);
            $datetime = JDate::createFromDate($str);
//            $datetime = new DateTime();
//            $datetime->setTimestamp($request->datetime);
//            dd($datetime);
//        dd($request->datetime,$datetime->format('j F Y года'),$datetime->format('H:i'));
//        $specialist = $request->specialist_id;
            $user = \Auth::user();
            return view('schedule.personalInfo')->with(compact(['datetime','user','specialist']));
        } else {
            return back();
        }
    }
}
