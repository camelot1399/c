<?php

namespace Database\Seeders;

use App\Models\Doctors;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctorsObj = new Doctors();
        $doctors = $doctorsObj->doctors;
        foreach ($doctors as $doctor) {
            \DB::table('specialists')->insert([
                'user_id' => 1,
//                'category_id' => 0,
                'rating' => $doctor['rating'],
                'speciality' => $doctor['speciality'],
                'location' => $doctor['location'],
                'photo' => $doctor['photo'],
                'coast' => $doctor['coast'],
                'status' => $doctor['status'],
                'start_time' => Carbon::createFromTime(9),
                'end_time' => Carbon::createFromTime(11),
                'duration' => Carbon::createFromTime(1),
            ]);
        }
    }
}
