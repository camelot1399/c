<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Date\Date as JDate;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index');
    }

    public function personalInfo(Request $request)
    {
        $datetime = JDate::createFromTimestamp($request->datetime);
        $specialist = $request->specialist_id;
//        $specialist = new Doctors(['id'=>$request->specialist_id]);
        $user = \Auth::user();
        return view('schedule.personalInfo')->with(compact(['datetime','user','specialist']));
    }
}
