<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id','>',15)->get();
        $specialists = Specialist::where('id','<=',5)->get();
        foreach ($specialists as $specialist) {
            foreach ($users as $user) {
                Feedback::factory()
                    ->for($specialist)
                    ->for($user)
                    ->state(['name'=>null,'surname'=>null])
                    ->create();
            }
        }
        foreach ($specialists as $specialist) {
            Feedback::factory()
                ->for($specialist)
                ->state(['user_id'=>null])
                ->count(3)
                ->create();
        }
    }

}
