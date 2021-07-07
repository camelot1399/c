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
        return view('schedule.index',compact('specialist'));
    }

    public function personalInfo(Request $request)
    {
        $str = str_replace('T',' ',$request->datetime);
        $datetime = JDate::createFromDate($str);
//        dd($request->datetime,$datetime->format('j F Y года'),$datetime->format('H:i'));
        $specialist = $request->specialist_id;
        $user = \Auth::user();
        return view('schedule.personalInfo')->with(compact(['datetime','user','specialist']));
    }
}
