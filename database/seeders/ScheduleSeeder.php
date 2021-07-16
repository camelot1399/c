<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Specialist;
use Illuminate\Database\Seeder;
use Jenssegers\Date\Date as JDate;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialists = Specialist::where('id','<=',10)->get();
        $day1 = new JDate('monday this week');
        $day2 = $day1->clone()->modify('+3 weeks');
//        $day2 = new JDate('monday next week');
        foreach ($specialists as $specialist) {
            for ($day = $day1;$day<$day2;$day->modify('+1 day')) {
                Schedule::factory()
                    ->state(['day'=>$day->format('Y-m-d')])
                    ->for($specialist)
                    ->create();
            }
        }
    }
}
