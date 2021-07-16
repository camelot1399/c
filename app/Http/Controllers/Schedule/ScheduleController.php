<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use App\Models\Week;
use Illuminate\Http\Request;
use Jenssegers\Date\Date as JDate;

class ScheduleController extends Controller
{
    public function index(Specialist $specialist)
    {
        $date = new JDate('monday this week');
        $week = Week::create($specialist,$date);
        $weeks = [$week];
//        dd($weeks);
        return view('schedule.index',compact(['specialist','weeks']));
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
